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


<h2>送電・配電</h2>
<?php cat_prev("souden");?>

<h2>OCR 過電流継電器 51</h2>
<?php cat_prev("ocr");?>

<h2>GR 地絡継電器 51G</h2>
<?php cat_prev("22");?>

<h2>DGR 地絡方向継電器 67</h2>
<?php cat_prev("28");?>

<h2>ZPD 零相電圧検出装置</h2>
<?php cat_prev("34");?>

<h2>UVR 不足電圧継電器 27</h2>
<?php cat_prev("23");?>

<h2>OVGR 地絡過電圧継電器</h2>
<?php cat_prev("ovgr");?>

<h2>RPR 逆電力継電器</h2>
<?php cat_prev("rpr");?>

<h2>マルチリレー</h2>
<?php cat_prev("mu");?>

<h2>保護継電器</h2>
<?php cat_prev("1");?>

<h2>漏電</h2>
<?php cat_prev("33");?>

<h2>PAS 高圧交流負荷開閉器</h2>
<?php cat_prev("29");?>

<h2>区分開閉器（責任分界点）</h2>
<?php cat_prev("24");?>

<h2>VCB 真空遮断器 52</h2>
<?php cat_prev("30");?>

<h2>LBS 限流ヒューズ付高圧交流負荷開閉器</h2>
<?php cat_prev("31");?>

<h2>遮断器・開閉器・断路器</h2>
<?php cat_prev("2");?>

<h2>ブレーカー</h2>
<?php cat_prev("cb");?>

<h2>ヒューズ</h2>
<?php cat_prev("f");?>

<h2>ケーブル</h2>
<?php cat_prev("32");?>

<h2>ケーブルシースアース</h2>
<?php cat_prev("shield");?>

<h2>避雷器 LA</h2>
<?php cat_prev("la");?>

<h2>コンデンサ SC・リアクトル SR</h2>
<?php cat_prev("5");?>

<h2>変圧器</h2>
<?php cat_prev("3");?>

<h2>計器用変成器</h2>
<?php cat_prev("4");?>

<h2>計器・制御機器</h2>
<?php cat_prev("20");?>

<h2>接地（アース）</h2>
<?php cat_prev("19");?>

<h2>メガー 絶縁抵抗測定</h2>
<?php cat_prev("25");?>

<h2>テスター</h2>
<?php cat_prev("26");?>

<h2>非常用自家発電設備</h2>
<?php cat_prev("18");?>

<h2>蓄電池（バッテリー）</h2>
<?php cat_prev("chiku");?>

<h2>太陽光発電設備</h2>
<?php cat_prev("6");?>

<h2>測定機器・試験機</h2>
<?php cat_prev("7");?>

<h2>リレー・シーケンス制御</h2>
<?php cat_prev("8");?>

<h2>APFC 55</h2>
<?php cat_prev("apfc");?>

<h2>法規・規則</h2>
<?php cat_prev("10");?>

<h2>理論・現象</h2>
<?php cat_prev("11");?>

<h2>事故・トラブル</h2>
<?php cat_prev("12");?>

<h2>掃除・メンテナンス</h2>
<?php cat_prev("souji");?>

<h2>耐圧試験（絶縁耐力試験）</h2>
<?php cat_prev("35");?>

<h2>温度、湿度、空調管理、エアコン</h2>
<?php cat_prev("ondo");?>

<h2>便利プログラム・便利ツール</h2>
<?php cat_prev("15");?>

<h2>フリーソフト紹介</h2>
<?php cat_prev("16");?>

<h2>その他</h2>
<?php cat_prev("9");?>

<?php include("link.php"); ?>

<?php include("footer.php"); ?>