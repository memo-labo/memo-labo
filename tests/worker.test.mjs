import assert from 'node:assert/strict';
import { test } from 'node:test';
import worker from '../worker.js';

for (const [path, target] of [
  ['/index.php', '/'],
  ['/search.php?q=OCR', '/search?q=OCR'],
  ['/ocr.php.php', '/ocr.php'],
  ['/sog.php/', '/sog.php'],
  ['/vtest2.php/1000', '/vtest2.php'],
  ['/st.php/index.php', '/st.php'],
  ['/v0.php/zpd.php', '/zpd.php'],
  ['/j/ve.php/1000', '/j/ve.php'],
  ['/dgr2.php', '/dgr.php'],
]) {
  test(`${path} redirects permanently to ${target}`, async () => {
    const response = await worker.fetch(new Request('https://memo-labo.com' + path), {});
    assert.equal(response.status, 301);
    assert.equal(response.headers.get('location'), 'https://memo-labo.com' + target);
  });
}

test('canonical PHP URL serves its static asset without redirecting', async () => {
  let fetched;
  const response = await worker.fetch(new Request('https://memo-labo.com/dt.php'), {
    ASSETS: { fetch: async (request) => {
      fetched = request.url;
      // Non-HTML response keeps this test independent of HTMLRewriter.
      return new Response('asset', { headers: { 'content-type': 'text/plain' } });
    } },
  });
  assert.equal(fetched, 'https://memo-labo.com/dt.html');
  assert.equal(response.status, 200);
  assert.equal(await response.text(), 'asset');
});

test('unknown pages keep the asset 404 status', async () => {
  const response = await worker.fetch(new Request('https://memo-labo.com/unknown.php'), {
    ASSETS: { fetch: async () => new Response('Not found', { status: 404 }) },
  });
  assert.equal(response.status, 404);
});
