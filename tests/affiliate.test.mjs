import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';

const read = path => readFileSync(new URL('../' + path, import.meta.url), 'utf8');

test('home page book promotion remains removed', () => {
  assert.doesNotMatch(read('source/index.php'), /reading-guide|実務を調べる・参考書を選ぶ/);
});

test('six selected links and random article placement are restored', () => {
  const script = read('source/script.php');
  for (const link of ['4fJ2QUA', '4fyfztj', '4eMcTqR', '40RFJTd', '3KlX2WB', 'B05rQUKdL']) {
    assert.ok(script.includes(link), link);
  }
  assert.match(script, /Math\\.random\\(\\)/);
  assert.match(script, /amazon-random-ad/);
  assert.match(script, /insertAdjacentElement/);
});

test('guide and disclosure remain free of previous contextual promotions', () => {
  for (const path of ['source/books.php', 'source/footer.php', 'tools/build_static.py']) {
    assert.doesNotMatch(read(path), /amazon-cta|affiliate_click|Amazonのアソシエイト/);
  }
});
