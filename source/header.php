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
  $meta_description = $page_title . "について、電気設備の点検・試験・保守で役立つ情報をまとめた技術メモ。";
}

$twitter_card = ($request_path === "/v0.php") ? "summary_large_image" : "summary";

$html_title_esc = htmlspecialchars($html_title, ENT_QUOTES, "UTF-8");
$meta_title_esc = htmlspecialchars($meta_title, ENT_QUOTES, "UTF-8");
$meta_description_esc = htmlspecialchars($meta_description, ENT_QUOTES, "UTF-8");
$canonical_url_esc = htmlspecialchars($canonical_url, ENT_QUOTES, "UTF-8");
$filename_esc = htmlspecialchars($filename, ENT_QUOTES, "UTF-8");

$schema = [
  "@context" => "https://schema.org",
  "@type" => $is_home ? "WebSite" : "Article",
  "name" => $is_home ? $site_title : null,
  "headline" => $is_home ? null : $meta_title,
  "description" => $meta_description,
  "url" => $canonical_url,
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
  <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
  <link rel="canonical" href="<?= $canonical_url_esc ?>">

  <meta name="twitter:card" content="<?= htmlspecialchars($twitter_card, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:site" content="@den_study">
  <meta name="twitter:title" content="<?= $meta_title_esc ?>">
  <meta name="twitter:description" content="<?= $meta_description_esc ?>">
  <meta name="twitter:image" content="<?= $filename_esc ?>">

  <meta property="og:type" content="<?= $is_home ? 'website' : 'article' ?>">
  <meta property="og:site_name" content="でんきメモ">
  <meta property="og:url" content="<?= $canonical_url_esc ?>">
  <meta property="og:title" content="<?= $meta_title_esc ?>">
  <meta property="og:description" content="<?= $meta_description_esc ?>">
  <meta property="og:image" content="<?= $filename_esc ?>">
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