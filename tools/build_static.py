#!/usr/bin/env python3
from pathlib import Path
import csv, html, json, re, shutil, sys

SITE='https://memo-labo.com'; GA='G-R90T9GG6PR'; ADS='ca-pub-8063230043817903'
EXCLUDE={'header.php','footer.php','functions.php','script.php','search.php','random.php','sitemap.php'}

def read_text(p):
    for enc in ('utf-8-sig','utf-8','cp932'):
        try:return p.read_text(encoding=enc)
        except UnicodeDecodeError:pass
    return p.read_text(encoding='utf-8',errors='replace')

def rows(src): return [r for r in csv.reader(read_text(src/'data.csv').splitlines()) if len(r)>=4]
def meta(rs,stem):
    for r in rs:
        if r[1]==stem:return r[0],r[2],r[3]
    return '',stem,stem

def script_js(src):
    p=src/'script.php'
    if not p.exists():return ''
    s=re.sub(r'<\?php.*?\?>','',read_text(p),flags=re.S)
    s=re.sub(r"const adTypes\s*=\s*shuffle\(\[.*?\]\)\.slice\(0,\s*adCount\);", "const adTypes = shuffle([...Array(AMAZON_AD_COUNT).fill('amazon'),...Array(ADSENSE_AD_COUNT).fill('adsense')]).slice(0, adCount);",s,flags=re.S)
    return s

def expand_php(text,rs,title):
    text=re.sub(r'<\?php\s+echo\s+\$page_title\s*;?\s*\?>',html.escape(title),text,flags=re.I)
    text=re.sub(r'<\?=\s*\$page_title\s*\?>',html.escape(title),text,flags=re.I)
    def cat(m):
        c=m.group(1); items=''.join(f'<li><a href="{html.escape(r[1])}.html">{html.escape(r[2])}</a></li>' for r in rs if r[0]==c)
        return '<ul class="top-links">'+items+'</ul>'
    text=re.sub(r'<\?php\s+cat_prev\(["\']([^"\']+)["\']\);?\s*\?>',cat,text,flags=re.I)
    # index.php contains the definition of cat_prev itself; remove that definition block.
    text=re.sub(r'<\?php\s*function\s+cat_prev\s*\(.*?\}\s*\?>','',text,flags=re.S|re.I)
    return text

def body(text,rs,title):
    text=re.sub(r'^\s*<\?php\s+include\(["\']header\.php["\']\);\s*\?>\s*','',text,flags=re.I)
    text=re.sub(r'\s*<\?php\s+include\(["\']footer\.php["\']\);\s*\?>\s*$','',text,flags=re.I)
    text=expand_php(text,rs,title)
    text=re.sub(r'(?i)(href=["\'][^"\']*?)\.php([?#][^"\']*)?(["\'])',lambda m:m.group(1)+'.html'+(m.group(2) or '')+m.group(3),text)
    return None if ('<?php' in text or '<?=' in text) else text.strip()

def related(rs,cat,prefix):
    its=[f'<li><a href="{prefix}{html.escape(r[1])}.html">{html.escape(r[2])}</a></li>' for r in rs if r[0]==cat]
    return '<h2>関連ページ</h2><ul class="top-links">'+''.join(its)+'</ul>' if its else ''

def render(rel,stem,b,rs,script,is_index=False):
    cat,label,title=meta(rs,stem); depth=len(rel.parts)-1; root='../'*depth
    canonical=SITE+'/' if is_index else SITE+'/'+str(rel.with_suffix('.php')).replace('\\','/')
    full='でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識' if is_index else title+' - でんきメモ'
    logo=f'<h1><a href="{root}index.html">でんきメモ</a></h1>' if is_index else f'<div class="site-title"><a href="{root}index.html">でんきメモ</a></div>'
    h1='' if is_index else f'<h1 class="article-title">{html.escape(title)}</h1>'
    icon=f'{SITE}/icon/{stem}.jpg'
    return f'''<!doctype html><html lang="ja"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"><link rel="stylesheet" href="{root}style.css"><title>{html.escape(full)}</title><link rel="canonical" href="{canonical}"><meta name="twitter:card" content="summary"><meta property="og:url" content="{canonical}"><meta property="og:title" content="{html.escape(title)}"><meta property="og:image" content="{icon}"><script async src="https://www.googletagmanager.com/gtag/js?id={GA}"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){{dataLayer.push(arguments)}}gtag('js',new Date());gtag('config','{GA}');</script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={ADS}" crossorigin="anonymous"></script>{script}</head><body><div class="wrapper"><header>{logo}<p>電気管理技術者の備忘録</p></header><div class="site-search"><form action="{root}search.html" method="get"><input type="search" name="q" placeholder="記事を検索"><button type="submit">検索</button></form></div><main>{h1}{b}{related(rs,cat,root)}</main><div class="return"><a href="{root}index.html">TOPに戻る</a></div></div></body></html>'''

def make_search(out,rs):
    data=[{'url':r[1]+'.html','title':r[3],'label':r[2]} for r in rs]
    (out/'search-index.json').write_text(json.dumps(data,ensure_ascii=False),encoding='utf-8')
    page='''<!doctype html><html lang="ja"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="style.css"><title>サイト内検索 - でんきメモ</title></head><body><div class="wrapper"><header><div class="site-title"><a href="index.html">でんきメモ</a></div></header><main><h1 class="article-title">サイト内検索</h1><form id="f"><input id="q" type="search" placeholder="検索語"><button>検索</button></form><p id="n"></p><ul id="r" class="top-links"></ul></main></div><script>let D=[];fetch('search-index.json').then(r=>r.json()).then(x=>{D=x;go()});function go(){let q=(new URLSearchParams(location.search).get('q')||document.querySelector('#q').value||'').trim().toLowerCase();document.querySelector('#q').value=q;if(!q)return;let a=D.filter(x=>(x.title+' '+x.label).toLowerCase().includes(q));document.querySelector('#n').textContent=a.length+'件';document.querySelector('#r').innerHTML=a.map(x=>'<li><a href="'+x.url+'">'+x.label+'</a></li>').join('')}document.querySelector('#f').onsubmit=e=>{e.preventDefault();history.replaceState(null,'','?q='+encodeURIComponent(document.querySelector('#q').value));go()}</script></body></html>'''
    (out/'search.html').write_text(page,encoding='utf-8')

def main(src,out):
    src,out=Path(src),Path(out)
    if out.exists():shutil.rmtree(out)
    out.mkdir(parents=True); rs=rows(src); script=script_js(src)
    for p in src.rglob('*'):
        if not p.is_file() or '.DAV' in p.parts or p.suffix.lower()=='.php':continue
        q=out/p.relative_to(src);q.parent.mkdir(parents=True,exist_ok=True);shutil.copy2(p,q)
    built=[]; skipped=[]
    for p in src.rglob('*.php'):
        if '.DAV' in p.parts or p.name in EXCLUDE:continue
        rel=p.relative_to(src); stem=p.stem; _,_,title=meta(rs,stem); b=body(read_text(p),rs,title)
        if b is None:skipped.append(str(rel));continue
        q=(out/rel).with_suffix('.html');q.parent.mkdir(parents=True,exist_ok=True);q.write_text(render(rel,stem,b,rs,script,rel==Path('index.php')),encoding='utf-8');built.append(str(rel))
    make_search(out,rs)
    (out/'BUILD_REPORT.txt').write_text(f'built={len(built)}\nskipped_dynamic={len(skipped)}\n\nSKIPPED\n'+'\n'.join(skipped),encoding='utf-8')
    print('built',len(built),'skipped',len(skipped))
if __name__=='__main__':
    if len(sys.argv)!=3:raise SystemExit('usage: build_static.py SOURCE_DIR OUTPUT_DIR')
    main(sys.argv[1],sys.argv[2])
