import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';

const read = path => readFileSync(new URL('../' + path, import.meta.url), 'utf8');

test('home page no longer includes the book promotion section', () => {
  assert.doesNotMatch(read('source/index.php'), /reading-guide|実務を調べる・参考書を選ぶ/);
});

test('affiliate links and automatic recommendations are removed', () => {
  for (const path of ['source/books.php', 'source/script.php', 'source/footer.php', 'tools/build_static.py']) {
    assert.doesNotMatch(read(path), /amzn\\.to|link\\.amazon|amazon-cta|affiliate_click|Amazonのアソシエイト/);
  }
});
