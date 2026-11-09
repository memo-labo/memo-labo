import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';

const read = path => readFileSync(new URL('../' + path, import.meta.url), 'utf8');

test('home page book promotion remains removed', () => {
  assert.doesNotMatch(read('source/index.php'), /reading-guide|実務を調べる・参考書を選ぶ/);
});

test('shared script does not inject random Amazon promotions', () => {
  const script = read('source/script.php');
  assert.doesNotMatch(script, /amazonAds|createAmazonAd|amazon-random-ad|amzn\.to|link\.amazon/);
});

test('guide and disclosure remain free of previous contextual promotions', () => {
  for (const path of ['source/books.php', 'source/footer.php', 'tools/build_static.py']) {
    assert.doesNotMatch(read(path), /amazon-cta|affiliate_click|Amazonのアソシエイト/);
  }
});
