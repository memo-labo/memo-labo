import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';
import vm from 'node:vm';
const script=readFileSync(new URL('../source/script.php',import.meta.url),'utf8').replace(/<\/?script>/g,'');
function run(path,title){
 const callbacks={},cards=[],events=[];
 const main={querySelector:s=>s==='h1'?{textContent:title}:s==='.related-pages'?{before:card=>cards.push(card)}:null,appendChild:card=>cards.push(card)};
 const document={title,addEventListener:(name,fn)=>{callbacks[name]=fn},querySelector:()=>main,createElement:()=>({setAttribute(){}})};
 vm.runInNewContext(script,{document,location:{pathname:path},window:{gtag:(...args)=>events.push(args)}});
 callbacks.DOMContentLoaded();return {cards,events,callbacks};
}
test('OCR article has one contextual recommendation before related articles',()=>{
 const r=run('/ocr.php','OCR 過電流継電器');assert.equal(r.cards.length,1);assert.match(r.cards[0].innerHTML,/保護協調/);assert.match(r.cards[0].innerHTML,/広告/);
});
test('home, guide, search and 404 do not receive automatic product cards',()=>{
 for(const p of ['/','/index.html','/books.php','/books.html','/search','/404.php']) assert.equal(run(p,'高圧受電設備').cards.length,0,p);
});
test('unrelated articles do not receive arbitrary product cards',()=>assert.equal(run('/unrelated.php','その他のメモ').cards.length,0));
test('guide links emit the affiliate event without blocking navigation',()=>{
 const r=run('/books.php','参考書');r.callbacks.click({target:{closest:()=>({dataset:{affiliateProduct:'book',placement:'book-guide'}})}});
 assert.equal(r.events.length,1);assert.equal(r.events[0][1],'affiliate_click');assert.equal(r.events[0][2].placement,'book-guide');
 r.callbacks.click({target:{closest:()=>null}});assert.equal(r.events.length,1);
});
