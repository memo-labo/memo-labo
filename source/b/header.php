<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../style.css" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161921215-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-161921215-1');
</script>

<script data-ad-client="ca-pub-8063230043817903" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php
$site_title = "ビルメンメモ";
$site_url = empty($_SERVER["HTTPS"]) ? "http://" : "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  if("/b/" . $line[1] . ".php" == $_SERVER["REQUEST_URI"]){
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

if($_SERVER["REQUEST_URI"] == "/b/index.php" || $_SERVER["REQUEST_URI"] == "/b/"){
echo <<< eof
  <title>ビルメンメモ | 設備、水道、ビル管理</title>
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
eof;
?>


</head>
<body>

<div class="wrapper">

<header>
  <h1><a href="index.php">ビルメンメモ</a></h1>
</header>

<main>