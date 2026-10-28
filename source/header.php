<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://memo-labo.com/style.css" />
  <link rel="stylesheet" type="text/css" href="https://memo-labo.com/global-ui.css?v=20261028" />
  <link rel="stylesheet" type="text/css" href="https://memo-labo.com/comfort.css?v=20261028" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R90T9GG6PR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R90T9GG6PR');
</script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8063230043817903"
     crossorigin="anonymous"></script>

<?php
  include("script.php");
?>
<script defer src="https://memo-labo.com/global-ui.js?v=20261028"></script>

<?php
include("functions.php");
$site_title = "でんきメモ";
$site_url = empty($_SERVER["HTTPS"]) ? "http://" : "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  if("/" . $line[1] . ".php" == $_SERVER["REQUEST_URI"]){
    $page_title = $line[3];

    if(file_exists("icon/" . $line[1] . ".jpg")){
      $filename = "https://memo-labo.com/icon/" . $line[1] . ".jpg";
    }else{
      $filename = "https://memo-labo.com/icon/no.jpg";
    }
    break;
  }
}
fclose($f);

if($_SERVER["REQUEST_URI"] == "/index.php" || $_SERVER["REQUEST_URI"] == "/"){
echo <<< eof
  <title>でんきメモ | 高圧受電設備、保護継電器、測定器、電気主任技術者、電気管理技術者の知識</title>
eof;
}else{
echo <<< eof
  <title>{$page_title} - {$site_title}</title>
eof;
}

echo <<< eof
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@den_study">
<meta property="og:url" content="{$site_url}" />
<meta property="og:title" content="{$page_title}" />
<meta property="og:image" content="{$filename}" />
<meta name="thumbnail" content="{$filename}">
eof;
?>



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