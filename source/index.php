<?php include("header.php"); ?>

<?php
function cat_prev($cat){
  $category_alias = [
    "gr" => "22",
    "dgr" => "28",
    "zpd" => "34",
    "uvr" => "23",
    "other_relays" => "1",
    "pas" => "29",
    "service_switch" => "24",
    "vcb" => "30",
    "lbs" => "31",
    "switchgear" => "2",
    "transformer" => "3",
    "instrument_transformer" => "4",
    "capacitor_reactor" => "5",
    "meter_control" => "20",
    "cable" => "32",
    "grounding" => "19",
    "leakage" => "33",
    "insulation" => "25",
    "withstand_test" => "35",
    "test_equipment" => "7",
    "tester" => "26",
    "emergency_generator" => "18",
    "solar" => "6",
    "sequence" => "8",
    "rules" => "10",
    "theory" => "11",
    "trouble" => "12",
    "tools" => "15",
    "software" => "16",
    "misc" => "9"
  ];

  $csv_cat = $category_alias[$cat] ?? $cat;
  echo '<ul class="top-links">';
  $f = fopen("data.csv","r");
  while($line = fgetcsv($f)){
    if($line[0] == $csv_cat){
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

<h2>カテゴリから探す</h2>
<ul class="top-links">
<li><a href="#protection">保護継電器・保護協調</a></li>
<li><a href="#switchgear">高圧受電・開閉器・遮断器</a></li>
<li><a href="#transformer">変圧器・計器用変成器・高圧機器</a></li>
<li><a href="#cable-ground">ケーブル・接地・絶縁</a></li>
<li><a href="#test">試験・測定・点検</a></li>
<li><a href="#power">非常電源・発電設備</a></li>
<li><a href="#control">制御・シーケンス</a></li>
<li><a href="#rules-trouble">法規・理論・事故</a></li>
<li><a href="#maintenance">設備管理・環境</a></li>
<li><a href="#tools">便利ツール・その他</a></li>
</ul>

<h2 id="protection">保護継電器・保護協調</h2>
<h3>OCR 過電流継電器 51</h3>
<?php cat_prev("ocr");?>
<h3>GR 地絡継電器 51G</h3>
<?php cat_prev("gr");?>
<h3>DGR 地絡方向継電器 67</h3>
<?php cat_prev("dgr");?>
<h3>UVR 不足電圧継電器 27</h3>
<?php cat_prev("uvr");?>
<h3>OVGR 地絡過電圧継電器 64</h3>
<?php cat_prev("ovgr");?>
<h3>RPR 逆電力継電器 67</h3>
<?php cat_prev("rpr");?>
<h3>ZPD・V0</h3>
<?php cat_prev("zpd");?>
<h3>マルチリレー</h3>
<?php cat_prev("mu");?>
<h3>その他の保護継電器</h3>
<?php cat_prev("other_relays");?>

<h2 id="switchgear">高圧受電・開閉器・遮断器</h2>
<h3>送電・配電・受電方式</h3>
<?php cat_prev("souden");?>
<h3>PAS・SOG</h3>
<?php cat_prev("pas");?>
<h3>UGS・MDS・区分開閉器</h3>
<?php cat_prev("service_switch");?>
<h3>VCB 真空遮断器 52</h3>
<?php cat_prev("vcb");?>
<h3>LBS 高圧交流負荷開閉器</h3>
<?php cat_prev("lbs");?>
<h3>遮断器・開閉器・断路器</h3>
<?php cat_prev("switchgear");?>
<h3>ブレーカー</h3>
<?php cat_prev("cb");?>
<h3>ヒューズ</h3>
<?php cat_prev("f");?>

<h2 id="transformer">変圧器・計器用変成器・高圧機器</h2>
<h3>変圧器</h3>
<?php cat_prev("transformer");?>
<h3>CT・VT・EVTなど計器用変成器</h3>
<?php cat_prev("instrument_transformer");?>
<h3>コンデンサ SC・リアクトル SR</h3>
<?php cat_prev("capacitor_reactor");?>
<h3>避雷器 LA</h3>
<?php cat_prev("la");?>
<h3>計器・制御機器</h3>
<?php cat_prev("meter_control");?>
<h3>APFC 55</h3>
<?php cat_prev("apfc");?>

<h2 id="cable-ground">ケーブル・接地・絶縁</h2>
<h3>高圧・低圧ケーブル</h3>
<?php cat_prev("cable");?>
<h3>ケーブルシースアース</h3>
<?php cat_prev("shield");?>
<h3>接地（アース）</h3>
<?php cat_prev("grounding");?>
<h3>漏電・絶縁監視</h3>
<?php cat_prev("leakage");?>
<h3>メガー・絶縁抵抗測定</h3>
<?php cat_prev("insulation");?>

<h2 id="test">試験・測定・点検</h2>
<h3>耐圧試験（絶縁耐力試験）</h3>
<?php cat_prev("withstand_test");?>
<h3>測定機器・試験機</h3>
<?php cat_prev("test_equipment");?>
<h3>テスター</h3>
<?php cat_prev("tester");?>
<h3>掃除・メンテナンス</h3>
<?php cat_prev("souji");?>

<h2 id="power">非常電源・発電設備</h2>
<h3>非常用自家発電設備</h3>
<?php cat_prev("emergency_generator");?>
<h3>蓄電池（バッテリー）</h3>
<?php cat_prev("chiku");?>
<h3>太陽光発電設備</h3>
<?php cat_prev("solar");?>

<h2 id="control">制御・シーケンス</h2>
<h3>リレー・シーケンス制御</h3>
<?php cat_prev("sequence");?>

<h2 id="rules-trouble">法規・理論・事故</h2>
<h3>法規・規則</h3>
<?php cat_prev("rules");?>
<h3>理論・現象</h3>
<?php cat_prev("theory");?>
<h3>事故・トラブル</h3>
<?php cat_prev("trouble");?>

<h2 id="maintenance">設備管理・環境</h2>
<h3>温度・湿度・空調管理</h3>
<?php cat_prev("ondo");?>

<h2 id="tools">便利ツール・その他</h2>
<h3>便利プログラム・便利ツール</h3>
<?php cat_prev("tools");?>
<h3>フリーソフト紹介</h3>
<?php cat_prev("software");?>
<h3>その他</h3>
<?php cat_prev("misc");?>

<h2>サイト運営・AI化</h2>
<ul class="top-links">
<li><a href="ai_site.php">でんきメモ AI化の流れ｜GitHub＋Cloudflareへの移行とメリット</a></li>
</ul>

<?php include("link.php"); ?>

<?php include("footer.php"); ?>