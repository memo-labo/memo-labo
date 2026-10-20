#!/usr/bin/env python3
from pathlib import Path
import csv, html, json, re, shutil, sys

SITE='https://memo-labo.com'
GA='G-R90T9GG6PR'
ADS='ca-pub-8063230043817903'
EXCLUDE={'header.php','footer.php','functions.php','script.php','search.php','sitemap.php'}

def read_text(p):
    for enc in ('utf-8-sig','utf-8','cp932'):
        try: return p.read_text(encoding=enc)
        except UnicodeDecodeError: pass
    return p.read_text(encoding='utf-8',errors='replace')

def load_data(p):
    if not p.exists(): return []
    return [r for r in csv.reader(read_text(p).splitlines()) if len(r)>=4]

def script_js(src):
    p=src/'script.php'
    if not p.exists(): return ''
    s=re.sub(r'<\?php.*?\?>','',read_text(p),flags=re.S)
    old="const adTypes = shuffle([\n        'amazon',\n        'amazon',\n        'adsense',\n        'adsense'\n    ]).slice(0, adCount);"
    new="const adTypes = shuffle([\n        ...Array(AMAZON_AD_COUNT).fill('amazon'),\n        ...Array(ADSENSE_AD_COUNT).fill('adsense')\n    ]).slice(0, adCount);"
    return s.replace(old,new)

def page_meta(rows, stem):
    for r in rows:
        if r[1]==stem: return r[0],r[2],r[3]
    return '',stem,stem

def related(rows,cat):
    if not cat: return ''
    items=[f'<li><a href="{html.escape(r[1])}.html">{html.escape(r[2])}</a></li>' for r in rows if r[0]==cat]
    return '<h2>関連ページ</h2>\n<ul class="top-links">\n'+'\n'.join(items)+'\n</ul>' if items else ''

def body_from_php(text):
    text=re.sub(r'^\s*<\?php\s+include\(["\']header\.php["\']\);\s*\?>\s*','',text,flags=re.I)
    text=re.sub(r'\s*<\?php\s+include\(["\']footer\.php["\']\);\s*\?>\s*$','',text,flags=re.I)
    if '<?php' in text or '<?=' in text: return None
    return text.strip()

def render(stem,body,rows,script,is_index=False):
    cat,label,title=page_meta(rows,stem)
    if is_index:
        title_full='でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識'; h1='<h1><a href="index.html">でんきメモ</a></h1>'; article_h1=''; canonical=f'{SITE}/'
    else:
        title_full=f'{title} - でんきメモ'; h1='<div class="site-title"><a href="index.html">でんきメモ</a></div>'; article_h1=f'<h1 class="article-title">{html.escape(title)}</h1>'; canonical=f'{SITE}/{stem}.php'
    icon=f'{SITE}/icon/{stem}.jpg'
    return f'''<!doctype html>
<html lang="ja"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css"><title>{html.escape(title_full)}</title><link rel="canonical" href="{canonical}">
<meta name="twitter:card" content="summary"><meta name="twitter:site" content="@den_study"><meta property="og:url" content="{canonical}"><meta property="og:title" content="{html.escape(title)}"><meta property="og:image" content="{icon}"><meta name="thumbnail" content="{icon}">
<script async src="https://www.googletagmanager.com/gtag/js?id={GA}"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){{dataLayer.push(arguments);}}gtag('js',new Date());gtag('config','{GA}');</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={ADS}" crossorigin="anonymous"></script>{script}
</head><body><div class="wrapper"><header>{h1}<p>電気管理技術者の備忘録</p></header>
<div class="site-search"><form action="search.html" method="get"><input type="search" name="q" placeholder="記事を検索" aria-label="記事を検索"><button type="submit">検索</button></form></div><main>{article_h1}{body}{related(rows,cat)}</main>
<div class="return"><a href="index.html">TOPに戻る</a></div></div><a class="twitter-fixed" href="https://twitter.com/den_study" target="_blank" rel="noopener noreferrer" aria-label="Twitterを開く"><img src="images/twitter.png" alt="Twitter"></a></body></html>'''

def main(src,out):
    src,out=Path(src),Path(out)
    if out.exists(): shutil.rmtree(out)
    out.mkdir(parents=True)
    rows=load_data(src/'data.csv'); script=script_js(src)
    for p in src.rglob('*'):
        if not p.is_file() or '.DAV' in p.parts or p.suffix.lower()=='.php': continue
        rel=p.relative_to(src); q=out/rel; q.parent.mkdir(parents=True,exist_ok=True); shutil.copy2(p,q)
    built=[]; skipped=[]
    for p in src.glob('*.php'):
        if p.name in EXCLUDE: continue
        b=body_from_php(read_text(p))
        if b is None: skipped.append(p.name); continue
        stem=p.stem; (out/f'{stem}.html').write_text(render(stem,b,rows,script,stem=='index'),encoding='utf-8'); built.append(p.name)
    idx=[{'url':r[1]+'.html','title':r[3],'label':r[2]} for r in rows]
    (out/'search-index.json').write_text(json.dumps(idx,ensure_ascii=False),encoding='utf-8')
    (out/'BUILD_REPORT.txt').write_text(f'built={len(built)}\nskipped_dynamic={len(skipped)}\n\nSKIPPED\n'+'\n'.join(skipped),encoding='utf-8')
    print('built',len(built),'skipped',len(skipped))
if __name__=='__main__':
    if len(sys.argv)!=3: raise SystemExit('usage: build_static.py SOURCE_DIR OUTPUT_DIR')
    main(sys.argv[1],sys.argv[2])
