#!/usr/bin/env python3
from pathlib import Path
import csv, html, re, shutil, sys

SITE = "https://memo-labo.com"
TOP_TITLE = "でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識"
SKIP = {"header.php","footer.php","functions.php","script.php","search.php","random.php","sitemap.php"}


def registry(root):
    with (root / "data.csv").open(encoding="utf-8-sig", newline="") as f:
        return [r for r in csv.reader(f) if len(r) >= 4]


def strip_shared_php(text):
    text = re.sub(r'<\?php\s+include\(["\']header\.php["\']\);\s*\?>', '', text, flags=re.I)
    text = re.sub(r'<\?php\s+include\(["\']footer\.php["\']\);\s*\?>', '', text, flags=re.I)
    return text.strip()


def make_head(name, title, icon, ad_script):
    canonical = SITE + "/" if name == "index" else f"{SITE}/{name}.php"
    document_title = TOP_TITLE if name == "index" else f"{title} - でんきメモ"
    logo = '<h1><a href="/">でんきメモ</a></h1>' if name == "index" else '<div class="site-title"><a href="/">でんきメモ</a></div>'
    article_h1 = "" if name == "index" else f'<h1 class="article-title">{html.escape(title)}</h1>'
    return f'''<!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/style.css">
<title>{html.escape(document_title)}</title>
<link rel="canonical" href="{canonical}">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@den_study">
<meta property="og:url" content="{canonical}">
<meta property="og:title" content="{html.escape(title or 'でんきメモ')}">
<meta property="og:image" content="{icon}">
<meta name="thumbnail" content="{icon}">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R90T9GG6PR"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){{dataLayer.push(arguments)}}gtag('js',new Date());gtag('config','G-R90T9GG6PR');</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8063230043817903" crossorigin="anonymous"></script>
{ad_script}
</head><body><div class="wrapper">
<header>{logo}<p>電気管理技術者の備忘録</p></header>
<div class="site-search"><form action="/search.html" method="get"><input type="search" name="q" placeholder="記事を検索" aria-label="記事を検索"><button type="submit">検索</button></form></div>
<main>
{article_h1}
'''


def make_foot(category, rows):
    related = ""
    if category:
        links = "\n".join(f'<li><a href="/{html.escape(r[1])}.php">{html.escape(r[2])}</a></li>' for r in rows if r[0] == category)
        related = f'<h2>関連ページ</h2>\n<ul class="top-links">\n{links}\n</ul>'
    return f'''\n{related}
</main>
<div class="return"><a href="/">TOPに戻る</a></div>
</div>
<a class="twitter-fixed" href="https://twitter.com/den_study" target="_blank" rel="noopener noreferrer" aria-label="Twitterを開く"><img src="/images/twitter.png" alt="Twitter"></a>
</body></html>
'''


def build(root, out):
    rows = registry(root)
    by_name = {r[1]: r for r in rows}
    ad_script = (root / "script.php").read_text(encoding="utf-8", errors="replace") if (root / "script.php").exists() else ""
    out.mkdir(parents=True, exist_ok=True)
    made, skipped = 0, []

    for src_path in root.rglob("*.php"):
        rel = src_path.relative_to(root)
        if src_path.name in SKIP:
            continue
        source = src_path.read_text(encoding="utf-8", errors="replace")
        if 'include("header.php")' not in source and "include('header.php')" not in source:
            skipped.append(str(rel))
            continue
        name = src_path.stem
        row = by_name.get(name)
        title = row[3] if row else name
        category = row[0] if row else ""
        icon = f"{SITE}/icon/{name}.jpg" if (root / "icon" / f"{name}.jpg").exists() else f"{SITE}/icon/no.jpg"
        target = out / rel
        target.parent.mkdir(parents=True, exist_ok=True)
        target.write_text(make_head(name, title, icon, ad_script) + strip_shared_php(source) + make_foot(category, rows), encoding="utf-8")
        made += 1

    for item in ("style.css", "images", "icon"):
        src = root / item
        dst = out / item
        if src.is_dir():
            shutil.copytree(src, dst, dirs_exist_ok=True)
        elif src.exists():
            shutil.copy2(src, dst)

    (out / "_skipped.txt").write_text("\n".join(skipped), encoding="utf-8")
    print(f"built={made} skipped={len(skipped)}")


if __name__ == "__main__":
    build(Path(sys.argv[1] if len(sys.argv) > 1 else "source"), Path(sys.argv[2] if len(sys.argv) > 2 else "build"))
