<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://memo-labo.com/style.css" />
  <link rel="stylesheet" type="text/css" href="https://memo-labo.com/global-ui.css?v=20261028" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R90T9GG6PR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-R90T9GG6PR');
</script>

<script async src="https://pagead2.googlesyndication.com/pagead/js?client=ca-pub-8063230043817903"
     crossorigin="anonymous"></script>

<?php
  include("script.php");
?>
<script defer src="https://memo-labo.com/global-ui.js?v=20261028"></script>

<?php
include("functions.php");

$site_title = "でんきメモ";
$request_path = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH);
if(!$request_path){
  $request_path = "/";
}
$is_home = ($request_path === "/" || $request_path === "/index.php");
$should_noindex = in_array($request_path, ["/search.php", "/404.php"], true);
$canonical_url = "https://memo-labo.com" . ($request_path === "/index.php" ? "/" : $request_path);

$page_title = "";
$page_short_title = "";
$page_category = "";
$filename = "https://memo-labo.com/icon/no.jpg";

$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  if("/" . $line[1] . ".php" === $request_path){
    $page_category = $line[0] ?? "";
    $page_short_title = $line[2] ?? "";
    $page_title = $line[3] ?? $page_short_title;

    if($request_path === "/v0.php"){
      $filename = "https://memo-labo.com/images/v0/6.png";
    }elseif(file_exists("icon/" . $line[1] . ".jpg")){
      $filename = "https://memo-labo.com/icon/" . $line[1] . ".jpg";
    }
    break;
  }
}
fclose($f);

$seo_title_overrides = [
  "/number.php" => "制御機器番号一覧｜27・51・52・64・67・89の意味と機器名",
  "/b_sq.php" => "B種接地線の太さ計算｜地絡電流・計算式・選定例",
  "/dt.php" => "ダブルスロー（DT）とは？仕組み・切替回路・非常用発電機",
  "/ctt.php" => "CTT（電流試験端子）とは？構造・使い方・OCR試験方法",
  "/ocr.php" => "OCR（過電流継電器）とは？原理・整定値・試験方法",
  "/v0.php" => "V0（零相電圧）とは？完全一線地絡・3810V・5%整定",
  "/st.php" => "スコットトランスとは？原理・結線・容量・接地方法",
  "/dgr.php" => "DGR（地絡方向継電器）とは？原理・位相・整定値・試験方法",
  "/rpr.php" => "RPR（逆電力継電器）とは？原理・整定値・試験方法・太陽光",
  "/elb.php" => "ELB（漏電遮断器）とは？仕組み・動作原理・接地・注意点",
  "/vt.php" => "VT（計器用変圧器）とは？原理・結線・二次側接地・注意点",
  "/uvr.php" => "UVR（不足電圧継電器）とは？原理・整定値・試験方法・誤動作",
  "/ovgr.php" => "OVGR（地絡過電圧継電器）とは？原理・整定値・試験方法・太陽光",
  "/evt.php" => "EVT（接地形計器用変圧器）とは？原理・3V0・CLR・ZPDとの違い",
  "/sog.php" => "SOG制御装置とは？仕組み・配線・試験方法・注意点",
  "/gr.php" => "GR（地絡継電器）とは？原理・整定値・試験方法・設置基準",
  "/zpd.php" => "ZPD（零相電圧検出装置）とは？原理・役割・試験方法",
  "/shield_zct.php" => "ケーブルシースアースとZCT｜くぐらせ方・接地位置・保護範囲",
  "/vtest.php" => "絶縁耐力試験の充電電流計算｜50Hz・60Hz・静電容量・試験容量",
  "/vtest2.php" => "耐圧試験のAC10.35kVはなぜ？6.6kV設備の試験電圧と注意点",
  "/vcb.php" => "VCB（真空遮断器）とは？構造・仕組み・点検ポイント",
  "/volt.php" => "公称電圧・定格電圧・最高電圧・耐電圧の違い｜6.6kVは6.9kV",
  "/as.php" => "AS（電力側開閉器）とは？PASとの違い・位置・事故時の役割",
  "/protect.php" => "絶縁用保護具の定期自主検査｜6か月・耐電圧試験・使用前点検",
  "/leak.php" => "I0・Ior・Iocとは？漏れ電流の違い・計算式・測定方法",
  "/pasz2.php" => "PAS・SOGのZ2/E接地とは？旧仕様・新仕様・多点接地の注意",
  "/pas_himo.php" => "PAS操作紐が切れた・絡まったとき｜原因・予防・交換時の注意",
  "/pas_size.php" => "大垣電機と戸上電機のPASの違い｜本体サイズ・SOG制御線・更新時の注意",
  "/keiyaku.php" => "高圧の契約電力はどう決まる？500kW・実量制・デマンドの仕組み",
  "/layer.php" => "レアショート（層間短絡）とは？原因・症状・診断方法",
  "/kick.php" => "キック試験とは？CT・VTの極性確認と減極性・加極性",
  "/setti2.php" => "共用接地とは？A・B・C・D種接地・等電位ボンディング・注意点",
  "/muteiden.php" => "無停電年次点検とは？停電3年に1回の条件・2025年制度改正"
];

$seo_description_overrides = [
  "/number.php" => "27 UVR、51 OCR・GR、52 VCB、64 OVGR、67 DGR・RPR、89 DS・LBSなど、電気設備の制御機器番号を一覧・検索で確認できます。",
  "/b_sq.php" => "B種接地線の太さを地絡電流から計算する方法を、計算式と具体例で解説。変圧器容量、低圧側過電流遮断器、接地線サイズ選定の考え方をまとめています。",
  "/dt.php" => "ダブルスロー（DT）の仕組み、商用電源と非常用発電機の切替、図面上の考え方、停電・復電時の動作を現場向けに整理しています。",
  "/ctt.php" => "CTT（電流試験端子・テストターミナル）の構造、短絡・切り離しの順序、OCR試験での使い方、4端子CTTの注意点を解説します。",
  "/ocr.php" => "OCR（過電流継電器）の動作原理、限時・瞬時要素、整定値の計算、試験方法、VCB連動試験まで現場向けにまとめています。",
  "/v0.php" => "零相電圧V0の意味、3V0との違い、6.6kV系統の完全一線地絡で3810Vになる理由、5%・10%整定、ZPDやDGRとの関係を解説します。",
  "/dgr.php" => "DGR（地絡方向継電器）の原理、V0・I0の位相判定、整定値、電圧・電流引き外し、試験方法と現場での注意点をまとめています。",
  "/rpr.php" => "RPR（逆電力継電器）の原理、整定値計算、試験方法、発電機・自家消費型太陽光での設置目的、逆潮流時の動作を解説します。",
  "/sog.php" => "SOG制御装置の仕組み、PASとの連動、SO動作、DGR要素、試験方法、P1・P2への試験電源印加時の注意点をまとめています。",
  "/zpd.php" => "ZPD（零相電圧検出装置）の構造、コンデンサ分圧、V0検出原理、試験電圧、配線、T端子などを計算例とともに解説します。",
  "/shield_zct.php" => "高圧ケーブルのシースアースをZCTへどう通すか、需要家側・電源側の接地位置と保護範囲、誤配線しやすいポイントを図と考え方で整理します。",
  "/volt.php" => "公称電圧・定格電圧・最高電圧・耐電圧の違いを比較。6.6kV系統の最高電圧6.9kVの計算や低圧の標準電圧も整理します。",
  "/as.php" => "ASと呼ばれる電力側開閉器の役割、PASとの位置関係、責任分界点、停電工事や事故時に確認したいポイントを解説します。",
  "/protect.php" => "絶縁用保護具・防具の定期自主検査、6か月以内ごとの絶縁性能確認、使用前点検、耐電圧試験、オゾン・放電音の注意点を整理します。",
  "/leak.php" => "I0・Ior・Iocの違い、抵抗性漏れ電流と容量性漏れ電流、I=2πfCVの計算、インバータ設備での測定ポイントを解説します。",
  "/pasz2.php" => "PAS・SOG制御装置のZ2/E接地について、旧仕様・新仕様の違い、多点接地を避ける理由、更新時の確認方法を整理します。",
  "/pas_himo.php" => "PAS操作紐が絡む・切れる原因、点検前の予防、交換・延長時の注意、高所で無理な応急操作を避けるための確認点をまとめています。",
  "/pas_size.php" => "大垣電機製PASと戸上電機製PASの違いを現場目線で整理。本体サイズ、SOG制御線のY端子・端末処理、PAS交換・更新工事で確認したいポイントを解説します。",
  "/keiyaku.php" => "高圧の契約電力と設備容量の違い、500kW未満の実量制、最大デマンド、500kW以上の協議契約、設備変更時の注意を解説します。",
  "/layer.php" => "変圧器やモーターのレアショート（層間短絡）の原因、症状、メガーだけでは分かりにくい理由、巻線抵抗・変圧比・油中ガス分析などの診断方法を整理します。",
  "/kick.php" => "CT・VTの極性を確認するキック試験の考え方、減極性・加極性、配線例、試験で分かることと安全上の注意を解説します。",
  "/setti2.php" => "共用接地・連接接地の違い、A種・B種・C種・D種、建築構造体接地、等電位ボンディング、ELB保護回路との接地共用の注意を整理します。",
  "/muteiden.php" => "外部委託事業場の無停電年次点検、停電点検を3年に1回以上にできる条件、2025年4月の月次点検頻度延伸制度を整理します。"
];

if(isset($seo_title_overrides[$request_path])){
  $page_title = $seo_title_overrides[$request_path];
}

if($is_home){
  $html_title = "でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識";
  $meta_title = "でんきメモ";
  $meta_description = "高圧受電設備、保護継電器、測定器、電気主任技術者・電気管理技術者の点検、試験、保守に役立つ技術メモ。";
}else{
  if(!$page_title){
    $page_title = $page_short_title ?: "でんきメモ";
  }
  $html_title = $page_title . " - " . $site_title;
  $meta_title = $page_title;
  $meta_description = $seo_description_overrides[$request_path]
    ?? ($page_title . "について、電気設備の点検・試験・保守で役立つ情報をまとめた技術メモ。");
}

$twitter_card = ($request_path === "/v0.php") ? "summary_large_image" : "summary";
$robots_content = $should_noindex
  ? "noindex,follow"
  : "index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1";

$html_title_esc = htmlspecialchars($html_title, ENT_QUOTES, "UTF-8");
$meta_title_esc = htmlspecialchars($meta_title, ENT_QUOTES, "UTF-8");
$meta_description_esc = htmlspecialchars($meta_description, ENT_QUOTES, "UTF-8");
$canonical_url_esc = htmlspecialchars($canonical_url, ENT_QUOTES, "UTF-8");
$filename_esc = htmlspecialchars($filename, ENT_QUOTES, "UTF-8");
$image_alt = $meta_title . " - でんきメモ";
$image_alt_esc = htmlspecialchars($image_alt, ENT_QUOTES, "UTF-8");

$schema = [
  "@context" => "https://schema.org",
  "@type" => $is_home ? "WebSite" : "Article",
  "name" => $is_home ? $site_title : null,
  "headline" => $is_home ? null : $meta_title,
  "description" => $meta_description,
  "url" => $canonical_url,
  "mainEntityOfPage" => $is_home ? null : [
    "@type" => "WebPage",
    "@id" => $canonical_url
  ],
  "image" => $filename,
  "publisher" => [
    "@type" => "Organization",
    "name" => $site_title,
    "url" => "https://memo-labo.com/"
  ]
];
$schema = array_filter($schema, function($value){ return $value !== null && $value !== ""; });
$schema_json = json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>

  <title><?= $html_title_esc ?></title>
  <meta name="description" content="<?= $meta_description_esc ?>">
  <meta name="robots" content="<?= htmlspecialchars($robots_content, ENT_QUOTES, 'UTF-8') ?>">
  <link rel="canonical" href="<?= $canonical_url_esc ?>">

  <meta name="twitter:card" content="<?= htmlspecialchars($twitter_card, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:site" content="@den_study">
  <meta name="twitter:title" content="<?= $meta_title_esc ?>">
  <meta name="twitter:description" content="<?= $meta_description_esc ?>">
  <meta name="twitter:image" content="<?= $filename_esc ?>">
  <meta name="twitter:image:alt" content="<?= $image_alt_esc ?>">

  <meta property="og:type" content="<?= $is_home ? 'website' : 'article' ?>">
  <meta property="og:site_name" content="でんきメモ">
  <meta property="og:url" content="<?= $canonical_url_esc ?>">
  <meta property="og:title" content="<?= $meta_title_esc ?>">
  <meta property="og:description" content="<?= $meta_description_esc ?>">
  <meta property="og:image" content="<?= $filename_esc ?>">
  <meta property="og:image:alt" content="<?= $image_alt_esc ?>">
  <meta name="thumbnail" content="<?= $filename_esc ?>">

  <script type="application/ld+json"><?= $schema_json ?></script>

</head>
<body>

<div class="wrapper">

<header>
  <h1><a href="https://memo-labo.com/index.php">でんきメモ</a></h1>
  <p>電気管理技術者の備忘録</p>
</header>

<div class="site-search">

    <form action="<?= $base_url ?>/search.php" method="get">

        <input
            type="search"
            name="q"
            placeholder="記事を検索"
            aria-label="記事を検索"
            value="<?= htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        >

        <button type="submit">
            検索
        </button>

    </form>

</div>

<main>