<?php include("header.php"); ?>

<?php
function cat_prev($cat){
  echo '<ul class="top-links">';
  $f = fopen("data.csv","r");
  while($line = fgetcsv($f)){
    if($line[0] == $cat){
      echo '<li><a href="' . $line[1] . '.php">' . $line[2] . '</a></li>';
    }
  }
  fclose($f);
  echo '</ul>';
}

function home_cat($title, $cat){
  echo '<section class="home-category">';
  echo '<h2>' . $title . '</h2>';
  cat_prev($cat);
  echo '</section>';
}
?>

<section class="home-intro">
  <strong>現場で迷ったときに、すぐ確認できる電気技術メモ。</strong>
  <p>高圧受電設備、保護継電器、測定・試験、接地、非常電源、太陽光などを実務目線でまとめています。上の検索から機器名・継電器番号・現象名でも探せます。</p>
</section>

<section class="home-section">
<div class="home-section-title">Protection relays</div>
<?php
home_cat("OCR 過電流継電器 51", "ocr");
home_cat("GR 地絡継電器 51G", "22");
home_cat("DGR 地絡方向継電器 67", "28");
home_cat("ZPD 零相電圧検出装置", "34");
home_cat("UVR 不足電圧継電器 27", "23");
home_cat("OVGR 地絡過電圧継電器", "ovgr");
home_cat("RPR 逆電力継電器", "rpr");
home_cat("マルチリレー", "mu");
home_cat("保護継電器", "1");
?>
</section>

<section class="home-section">
<div class="home-section-title">High-voltage equipment</div>
<?php
home_cat("送電・配電", "souden");
home_cat("PAS 高圧交流負荷開閉器", "29");
home_cat("区分開閉器（責任分界点）", "24");
home_cat("VCB 真空遮断器 52", "30");
home_cat("LBS 限流ヒューズ付高圧交流負荷開閉器", "31");
home_cat("遮断器・開閉器・断路器", "2");
home_cat("ブレーカー", "cb");
home_cat("ヒューズ", "f");
home_cat("避雷器 LA", "la");
home_cat("コンデンサ SC・リアクトル SR", "5");
home_cat("変圧器", "3");
home_cat("計器用変成器", "4");
home_cat("計器・制御機器", "20");
?>
</section>

<section class="home-section">
<div class="home-section-title">Grounding & measurement</div>
<?php
home_cat("漏電", "33");
home_cat("ケーブル", "32");
home_cat("ケーブルシースアース", "shield");
home_cat("接地（アース）", "19");
home_cat("メガー 絶縁抵抗測定", "25");
home_cat("テスター", "26");
home_cat("測定機器・試験機", "7");
home_cat("耐圧試験（絶縁耐力試験）", "35");
?>
</section>

<section class="home-section">
<div class="home-section-title">Power systems & control</div>
<?php
home_cat("非常用自家発電設備", "18");
home_cat("蓄電池（バッテリー）", "chiku");
home_cat("太陽光発電設備", "6");
home_cat("リレー・シーケンス制御", "8");
home_cat("APFC 55", "apfc");
?>
</section>

<section class="home-section">
<div class="home-section-title">Theory & maintenance</div>
<?php
home_cat("法規・規則", "10");
home_cat("理論・現象", "11");
home_cat("事故・トラブル", "12");
home_cat("掃除・メンテナンス", "souji");
home_cat("温度、湿度、空調管理、エアコン", "ondo");
home_cat("便利プログラム・便利ツール", "15");
home_cat("フリーソフト紹介", "16");
home_cat("その他", "9");
?>
</section>

<section class="home-section">
<div class="home-section-title">Site</div>
<section class="home-category">
<h2>サイト運営・AI化</h2>
<ul class="top-links">
<li><a href="ai_site.php">でんきメモ AI化の流れ｜GitHub＋Cloudflareへの移行とメリット</a></li>
</ul>
</section>
</section>

<?php include("link.php"); ?>
<?php include("footer.php"); ?>