#!/usr/bin/env python3
from pathlib import Path
import csv, html, json, re, shutil, sys

SITE='https://memo-labo.com'; GA='G-R90T9GG6PR'; ADS='ca-pub-8063230043817903'
EXCLUDE={'header.php','header2.php','footer.php','functions.php','script.php','search.php','random.php','sitemap.php','count.php','link.php'}

def read_text(p):
    for enc in ('utf-8-sig','utf-8','cp932'):
        try:return p.read_text(encoding=enc)
        except UnicodeDecodeError:pass
    return p.read_text(encoding='utf-8',errors='replace')

def read_rows(p):
    return [r for r in csv.reader(read_text(p).splitlines()) if len(r)>=4] if p.exists() else []

def rows_for(src, rel):
    local=src.joinpath(*rel.parts[:-1],'data.csv')
    return read_rows(local if local.exists() else src/'data.csv')

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
        c=m.group(1); items=''.join(f'<li><a href="{html.escape(r[1])}.php">{html.escape(r[2])}</a></li>' for r in rs if r[0]==c)
        return '<ul class="top-links">'+items+'</ul>'
    text=re.sub(r'<\?php\s+cat_prev\(["\']([^"\']+)["\']\);?\s*\?>',cat,text,flags=re.I)
    text=re.sub(r'<\?php\s*function\s+cat_prev\s*\([^)]*\)\s*\{.*?fclose\s*\(\s*\$f\s*\)\s*;.*?\}\s*\?>','',text,flags=re.S|re.I)
    return text

def body(text,rs,title,src,rel):
    text=re.sub(r'^\s*<\?php\s+include\(["\']header\.php["\']\);\s*\?>\s*','',text,flags=re.I)
    text=re.sub(r'\s*<\?php\s+include\(["\']footer\.php["\']\);\s*\?>\s*$','',text,flags=re.I)
    link=read_text(src/'link.php') if (src/'link.php').exists() else ''
    text=re.sub(r'<\?php\s+include\(["\'](?:\.\./)?link\.php["\']\);\s*\?>',lambda m:link,text,flags=re.I)
    text=expand_php(text,rs,title)
    return None if ('<?php' in text or '<?=' in text) else text.strip()

def related(rs,cat,prefix,current_stem):
    its=[]
    for r in rs:
        if r[0]!=cat or r[1]==current_stem:continue
        label=(r[3] or r[2]).strip()
        its.append(f'<li><a href="{prefix}{html.escape(r[1])}.php">{html.escape(label)}</a></li>')
    return '<nav class="related-pages" aria-label="関連記事"><h2>関連記事</h2><ul class="top-links">'+''.join(its)+'</ul></nav>' if its else ''

def page_description(b,fallback):
    text=re.sub(r'<(?:script|style)\b.*?</(?:script|style)>',' ',b,flags=re.S|re.I)
    text=re.sub(r'<[^>]+>',' ',text)
    text=html.unescape(text)
    text=re.sub(r'\s+',' ',text).strip()
    if len(text)<30:return fallback
    return text[:155].rstrip(' 、。・,')+'…' if len(text)>155 else text

def json_ld(canonical,title,site_title,is_index,is_root,section,description):
    website={'@type':'WebSite','@id':SITE+'/#website','name':'でんきメモ','url':SITE+'/','inLanguage':'ja'}
    org={'@type':'Organization','@id':SITE+'/#organization','name':'でんきメモ','url':SITE+'/'}
    if is_root:
        data={'@context':'https://schema.org','@graph':[org,website,{'@type':'CollectionPage','@id':canonical+'#webpage','name':title,'description':description,'url':canonical,'isPartOf':{'@id':SITE+'/#website'},'about':{'@id':SITE+'/#organization'},'inLanguage':'ja'}]}
    elif is_index:
        data={'@context':'https://schema.org','@graph':[website,{'@type':'CollectionPage','@id':canonical+'#webpage','name':title,'description':description,'url':canonical,'isPartOf':{'@id':SITE+'/#website'},'inLanguage':'ja'}]}
    else:
        page={'@type':'WebPage','@id':canonical+'#webpage','name':title,'description':description,'url':canonical,'isPartOf':{'@id':SITE+'/#website'},'inLanguage':'ja','breadcrumb':{'@id':canonical+'#breadcrumb'}}
        items=[{'@type':'ListItem','position':1,'name':'でんきメモ','item':SITE+'/'}]
        if section=='j': items.append({'@type':'ListItem','position':2,'name':'電気工事士メモ','item':SITE+'/j/index.php'})
        elif section=='b': items.append({'@type':'ListItem','position':2,'name':'ビルメンメモ','item':SITE+'/b/index.php'})
        items.append({'@type':'ListItem','position':len(items)+1,'name':title,'item':canonical})
        breadcrumb={'@type':'BreadcrumbList','@id':canonical+'#breadcrumb','itemListElement':items}
        data={'@context':'https://schema.org','@graph':[website,page,breadcrumb]}
    return '<script type="application/ld+json">'+json.dumps(data,ensure_ascii=False,separators=(',',':')).replace('</','<\\/')+'</script>'

def render(rel,stem,b,rs,script,src,is_index=False):
    cat,label,title=meta(rs,stem); depth=len(rel.parts)-1; root='../'*depth
    section=rel.parts[0] if depth else ''
    if section=='j': site_title='電気工事士メモ'; index_title='電気工事士・電気施工管理メモ'; tagline=''
    elif section=='b': site_title='ビルメンメモ'; index_title='ビルメンメモ | 設備、水道、ビル管理'; tagline=''
    else: site_title='でんきメモ'; index_title='でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識'; tagline='<p>電気管理技術者の備忘録</p>'
    canonical=SITE+'/'+str(rel).replace('\\','/')
    is_root=rel==Path('index.php'); is_404=rel==Path('404.php')
    if is_root: canonical=SITE+'/'
    full=index_title if is_index else title+' - '+site_title
    og_title=index_title if is_index else title
    description=index_title if is_index else page_description(b,full)
    logo='<h1 class="site-logo"><a href="https://memo-labo.com/">でんきメモ</a></h1>' if is_index else '<div class="site-logo"><a href="https://memo-labo.com/">でんきメモ</a></div>'
    h1='' if is_index else f'<h1 class="article-title">{html.escape(title)}</h1>'
    icon_rel=Path(section,'icon',stem+'.jpg') if section in ('j','b') else Path('icon',stem+'.jpg')
    image_meta=''
    if not is_index and (src/icon_rel).is_file():
        image_url=SITE+'/'+icon_rel.as_posix(); image_meta=f'<meta property="og:image" content="{image_url}"><meta name="twitter:image" content="{image_url}">'
    robots='<meta name="robots" content="noindex,follow">' if is_404 else '<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">'
    structured='' if is_404 else json_ld(canonical,index_title if is_index else title,site_title,is_index,is_root,section,description)
    extra_script=script if not section else ''
    search='' if section else f'<div class="site-search"><form action="{root}search" method="get"><input type="search" name="q" placeholder="記事を検索" aria-label="記事を検索"><button type="submit">検索</button></form></div>'
    return f'''<!doctype html><html lang="ja"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"><link rel="stylesheet" href="{root}style.css"><title>{html.escape(full)}</title><meta name="description" content="{html.escape(description)}">{robots}<link rel="canonical" href="{canonical}"><meta name="twitter:card" content="summary"><meta name="twitter:title" content="{html.escape(og_title)}"><meta name="twitter:description" content="{html.escape(description)}"><meta property="og:type" content="{'website' if is_index else 'article'}"><meta property="og:site_name" content="でんきメモ"><meta property="og:url" content="{canonical}"><meta property="og:title" content="{html.escape(og_title)}"><meta property="og:description" content="{html.escape(description)}"><meta property="og:locale" content="ja_JP">{image_meta}{structured}<script async src="https://www.googletagmanager.com/gtag/js?id={GA}"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){{dataLayer.push(arguments)}}gtag('js',new Date());gtag('config','{GA}');</script><script async src="https://pagead2.googlesyndication.com/pagead/js?client={ADS}" crossorigin="anonymous"></script>{extra_script}</head><body><div class="wrapper"><header>{logo}{tagline}</header>{search}<main>{h1}{b}{'' if is_index or is_404 else related(rs,cat,root,stem)}</main><div class="return"><a href="https://memo-labo.com/">TOPに戻る</a></div></div></body></html>'''

def make_search(out,src):
    rs=read_rows(src/'data.csv'); data=[{'url':r[1]+'.php','title':r[3],'label':r[2]} for r in rs if r[1]!='404']
    (out/'search-index.json').write_text(json.dumps(data,ensure_ascii=False),encoding='utf-8')
    page='''<!doctype html><html lang="ja"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="style.css"><title>サイト内検索 - でんきメモ</title><meta name="description" content="でんきメモ内の記事を検索できます。高圧受電設備、保護継電器、測定器、電気主任技術者・電気管理技術者向けの現場情報を探せます。"><link rel="canonical" href="https://memo-labo.com/search"><meta name="robots" content="noindex,follow"></head><body><div class="wrapper"><header><div class="site-logo"><a href="https://memo-labo.com/">でんきメモ</a></div></header><main><h1 class="article-title">サイト内検索</h1><form id="f"><input id="q" type="search" placeholder="検索語"><button>検索</button></form><p id="n"></p><ul id="r" class="top-links"></ul></main></div><script>let D=[];fetch('/search-index.json').then(r=>r.json()).then(x=>{D=x;go()});function go(){let q=(new URLSearchParams(location.search).get('q')||document.querySelector('#q').value||'').trim().toLowerCase();document.querySelector('#q').value=q;if(!q)return;let a=D.filter(x=>(x.title+' '+x.label).toLowerCase().includes(q));document.querySelector('#n').textContent=a.length+'件';document.querySelector('#r').innerHTML=a.map(x=>'<li><a href="/'+x.url+'">'+x.label+'</a></li>').join('')}document.querySelector('#f').onsubmit=e=>{e.preventDefault();history.replaceState(null,'','?q='+encodeURIComponent(document.querySelector('#q').value));go()}</script></body></html>'''
    (out/'search.html').write_text(page,encoding='utf-8')

def make_seo_files(out,built):
    urls=[]
    for s in built:
        rel=Path(s)
        if rel==Path('404.php'):continue
        url=SITE+'/' if rel==Path('index.php') else SITE+'/'+s.replace('\\','/')
        urls.append(url)
    xml='<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'+''.join(f'  <url><loc>{html.escape(u)}</loc><changefreq>monthly</changefreq></url>\n' for u in urls)+'</urlset>\n'
    (out/'sitemap.xml').write_text(xml,encoding='utf-8')
    (out/'robots.txt').write_text(f'User-agent: *\nAllow: /\n\nSitemap: {SITE}/sitemap.xml\n',encoding='utf-8')

def main(src,out):
    src,out=Path(src),Path(out)
    if out.exists():shutil.rmtree(out)
    out.mkdir(parents=True); script=script_js(src)
    for p in src.rglob('*'):
        if not p.is_file() or '.DAV' in p.parts or p.suffix.lower()=='.php':continue
        q=out/p.relative_to(src);q.parent.mkdir(parents=True,exist_ok=True);shutil.copy2(p,q)
    built=[]; skipped=[]
    for p in src.rglob('*.php'):
        if '.DAV' in p.parts or p.name in EXCLUDE:continue
        rel=p.relative_to(src); rs=rows_for(src,rel); stem=p.stem; _,_,title=meta(rs,stem); b=body(read_text(p),rs,title,src,rel)
        if b is None:skipped.append(str(rel));continue
        q=(out/rel).with_suffix('.html');q.parent.mkdir(parents=True,exist_ok=True);q.write_text(render(rel,stem,b,rs,script,src,p.name=='index.php'),encoding='utf-8');built.append(str(rel))
    make_search(out,src); make_seo_files(out,built)
    (out/'BUILD_REPORT.txt').write_text(f'built={len(built)}\nskipped_dynamic={len(skipped)}\n\nSKIPPED\n'+'\n'.join(skipped),encoding='utf-8')
    print('built',len(built),'skipped',len(skipped))
if __name__=='__main__':
    if len(sys.argv)!=3:raise SystemExit('usage: build_static.py SOURCE_DIR OUTPUT_DIR')
    main(sys.argv[1],sys.argv[2])
