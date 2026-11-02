import contextlib
import io
import json
from html.parser import HTMLParser
from pathlib import Path
import sys
import tempfile
import unittest
from urllib.parse import urljoin, urlsplit
import xml.etree.ElementTree as ET

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / 'tools'))
import build_static as build


class Metadata(HTMLParser):
    def __init__(self, text):
        super().__init__()
        self.metas = {}
        self.links = {}
        self.related = []
        self.in_related = False
        self.feed(text)

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if tag == 'meta':
            self.metas[attrs.get('name', attrs.get('property'))] = attrs.get('content')
        if tag == 'link':
            self.links[attrs.get('rel')] = attrs.get('href')
        if tag == 'nav' and attrs.get('class') == 'related-pages':
            self.in_related = True
        if tag == 'a' and self.in_related:
            self.related.append(attrs['href'])

    def handle_endtag(self, tag):
        if tag == 'nav':
            self.in_related = False


class StaticSEO(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.tmp = tempfile.TemporaryDirectory(dir=ROOT)
        cls.addClassCleanup(cls.tmp.cleanup)
        cls.out = Path(cls.tmp.name) / 'dist'
        with contextlib.redirect_stdout(io.StringIO()):
            build.main(ROOT / 'source', cls.out)

    def test_legacy_metadata_is_preserved(self):
        titles = build.seo_overrides(ROOT / 'source', 'title')
        descriptions = build.seo_overrides(ROOT / 'source', 'description')
        self.assertTrue(titles)
        self.assertTrue(descriptions)
        for path, title in titles.items():
            text = (self.out / path.lstrip('/')).with_suffix('.html').read_text()
            parsed = Metadata(text)
            self.assertEqual(parsed.metas['og:title'], title, path)
            self.assertIn('<h1 class="article-title">' + title + '</h1>', text)
            if path in descriptions:
                self.assertEqual(parsed.metas['description'], descriptions[path], path)
                self.assertEqual(parsed.metas['og:description'], descriptions[path], path)

    def test_related_links_resolve_inside_their_section(self):
        count = 0
        for page in self.out.rglob('*.html'):
            for href in Metadata(page.read_text()).related:
                count += 1
                path = urlsplit(urljoin('/' + page.relative_to(self.out).as_posix(), href)).path
                self.assertTrue((self.out / path.lstrip('/')).with_suffix('.html').is_file(), (page, href))
        self.assertGreater(count, 0)

    def test_sitemap_matches_canonical_pages(self):
        urls = [node.text for node in ET.parse(self.out / 'sitemap.xml').getroot().findall('{*}url/{*}loc')]
        report = (self.out / 'BUILD_REPORT.txt').read_text()
        built_count = int(report.splitlines()[0].split('=')[1])
        self.assertEqual(len(urls), built_count)
        self.assertEqual(len(urls), len(set(urls)))
        self.assertNotIn(build.SITE + '/index.php', urls)
        for url in urls:
            path = urlsplit(url).path.lstrip('/') or 'index.php'
            page = (self.out / path).with_suffix('.html')
            self.assertEqual(Metadata(page.read_text()).links['canonical'], url)

    def test_search_metadata_and_targets(self):
        data = json.loads((self.out / 'search-index.json').read_text())
        for entry in data:
            self.assertTrue((self.out / entry['url']).with_suffix('.html').is_file())
        dt = next(item for item in data if item['url'] == 'dt.php')
        self.assertEqual(dt['title'], build.seo_overrides(ROOT / 'source', 'title')['/dt.php'])

    def test_root_overrides_do_not_leak_into_other_sections(self):
        rows = [['test', 'ocr', '別記事', '電気工事士の別記事']]
        self.assertEqual(build.page_title(ROOT / 'source', Path('j/ocr.php'), rows), '電気工事士の別記事')


if __name__ == '__main__':
    unittest.main()
