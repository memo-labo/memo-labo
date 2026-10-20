<link rel="stylesheet" type="text/css" href="style.css" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R90T9GG6PR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R90T9GG6PR');
</script>

<script data-ad-client="ca-pub-8063230043817903" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php
$site_title = "電気メモ";
$site_url = empty($_SERVER["HTTPS"]) ? "http://" : "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  if("/" . $line[0] . ".php" == $_SERVER["REQUEST_URI"]){
  $page_title = $line[1];
  $page_description = $line[2];
  if(file_exists("icon/" . $line[0] . ".jpg")){
    $filename = "https://memo-labo.com/icon/" . $line[0] . ".jpg";
  }else{
    $filename = "https://memo-labo.com/icon/no.jpg";
  }
  break;
 }
}
fclose($f);

if($_SERVER["REQUEST_URI"] == "/index.php" || $_SERVER["REQUEST_URI"] == "/"){
  $page_title = "高圧受電設備、保護継電器、変圧器、測定器具、事故、トラブル例など";
}

echo <<< eof

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@den_study">
<meta property="og:url" content="{$site_url}" />
<meta property="og:title" content="{$page_title}" />
<meta property="og:description" content="{$page_description}" />
<meta property="og:image" content="{$filename}" />
eof;
?>


</head>
<body>

<div class="wrapper">

<header>
  <h1><a href="index.php">電気メモ</a></h1>
  <div align="center">
  <!-- <img src="images/logo.jpg" style="width:120px;"> -->
  <a href="index.php">
    <img style="width:120px;" src="images/logo1.png" onmouseover="this.src='images/logo2.png'" onmouseout="this.src='images/logo1.png'" />
  </a>
  </div>

  <p><input type="button" value="ON" onClick="color1()"> <input type="button" value="OFF" onClick="color2()"></p>

</header>


<script type="text/javascript">
<!--
function color1(){
	document.bgColor = "#000000";
	document.fgColor = "#ffffff";
}

function color2(){
}
-->
</script>

<main>