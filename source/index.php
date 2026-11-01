<?php include("header.php"); ?>

<?php
function cat_prev($cat){
  echo '<ul class="top-links">';
  $f = fopen("data.csv","r");
  while($line = fgetcsv($f)){
    if($line[0] == $cat){
      echo <<< eof
  <li><a href="{$line[1]}.php">{$line[2]}</a></li>
eof;
    }
  }
  fclose($f);
  echo "</ul>";
}
?>

<h2>よく見られているページ</h2>
<ul class="top-links">
<li><a href="number.php">制御機器番号一覧｜27・51・52・64・67・89</a></li>
<li><a href="b_sq.php">B種接地線の太さ計算</a></li>
<li><a href="dt.php">ダブルスロー（DT）の仕組み</a></li>
<li><a href="ctt.php">CTT 電流試験端子</a></li>
<li><a href="ocr.php">OCR 過電流継電器</a></li>
<li><a href="v0.php">V0 零相電圧</a></li>
</ul>

<h2>保護継電器・保護協調</h2>
<h3>OCR 過電流継電器 51</h3>
<?php cat_prev("ocr");?>
<h3>GR 地絡継電器 51G</h3>
<?php cat_prev("22");?>
<h3>DGR 地絡方向継電器 67</h3>
<?php cat_prev("28");?>
<h3>UVR 不足電圧継電器 27</h3>
<?php cat_prev("23");?>
<h3>OVGR 地絡過電圧継電器 64</h3>
<?php cat_prev("ovgr");?>
<h3>RPR 逆電力継電器 67</h3>
<?php cat_prev("rpr");?>
<h3>ZPD・V0</h3>
<?php cat_prev("34");?>
<h3>マルチリレー</h3>
<?php cat_prev("mu");?>
<h3>その他の保護継電器</h3>
<?php cat_prev("1");?>

<h2>高圧受電・開閉器・遮断器</h2>
<h3>送電・配電・受電方式</h3>
<?php cat_prev("souden");?>
<h3>PAS 高圧交流負荷開閉器</h3>
<?php cat_prev("29");?>
<h3>区分開閉器・責任分界点</h3>
<?php cat_prev("24");?>
<h3>VCB 真空遮断器 52</h3>
<?php cat_prev("30");?>
<h3>LBS 高圧交流負荷開閉器</h3>
<?php cat_prev("31");?>
<h3>遮断器・開閉器・断路器</h3>
<?php cat_prev("2");?>
<h3>ブレーカー</h3>
<?php cat_prev("cb");?>
<h3>ヒューズ</h3>
<?php cat_prev("f");?>

<h2>変圧器・計器用変成器・高圧機器</h2>
<h3>変圧器</h3>
<?php cat_prev("3");?>
<h3>計器用変成器</h3>
<?php cat_prev("4");?>
<h3>コンデンサ SC・リアクトル SR</h3>
<?php cat_prev("5");?>
<h3>避雷器 LA</h3>
<?php cat_prev("la");?>
<h3>計器・制御機器</h3>
<?php cat_prev("20");?>
<h3>APFC 55</h3>
<?php cat_prev("apfc");?>

<h2>ケーブル・接地・絶縁</h2>
<h3>高圧・低圧ケーブル</h3>
<?php cat_prev("32");?>
<h3>ケーブルシースアース</h3>
<?php cat_prev("shield");?>
<h3>接地（アース）</h3>
<?php cat_prev("19");?>
<h3>漏電</h3>
<?php cat_prev("33");?>
<h3>メガー・絶縁抵抗測定</h3>
<?php cat_prev("25");?>

<h2>試験・測定・点検</h2>
<h3>耐圧試験（絶縁耐力試験）</h3>
<?php cat_prev("35");?>
<h3>測定機器・試験機</h3>
<?php cat_prev("7");?>
<h3>テスター</h3>
<?php cat_prev("26");?>
<h3>掃除・メンテナンス</h3>
<?php cat_prev("souji");?>

<h2>非常電源・発電設備</h2>
<h3>非常用自家発電設備</h3>
<?php cat_prev("18");?>
<h3>蓄電池（バッテリー）</h3>
<?php cat_prev("chiku");?>
<h3>太陽光発電設備</h3>
<?php cat_prev("6");?>

<h2>制御・シーケンス</h2>
<h3>リレー・シーケンス制御</h3>
<?php cat_prev("8");?>

<h2>法規・理論・事故</h2>
<h3>法規・規則</h3>
<?php cat_prev("10");?>
<h3>理論・現象</h3>
<?php cat_prev("11");?>
<h3>事故・トラブル</h3>
<?php cat_prev("12");?>

<h2>設備管理・環境</h2>
<h3>温度・湿度・空調管理</h3>
<?php cat_prev("ondo");?>

<h2>便利ツール・その他</h2>
<h3>便利プログラム・便利ツール</h3>
<?php cat_prev("15");?>
<h3>フリーソフト紹介</h3>
<?php cat_prev("16");?>
<h3>その他</h3>
<?php cat_prev("9");?>

<h2>サイト運営・AI化</h2>
<ul class="top-links">
<li><a href="ai_site.php">でんきメモ AI化の流れ｜GitHub＋Cloudflareへの移行とメリット</a></li>
</ul>

<?php include("link.php"); ?>

<?php include("footer.php"); ?>