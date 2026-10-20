<?php include("header.php"); ?>
  
<h2>TRG-DV40（RPR・OVGR）</h2>

⇒<a href="http://www.taiwadenki.co.jp/product/product_search.php">取扱説明書</a><br><br>

外観<br>
<img src="images/trg401.jpg" style="max-width:500px;" /><br><br>
<img src="images/dv40.jpg" style="max-width:600px;" /><br><br>

特徴<br>
継電器の前面下部に配線の端子がある。<br>
継電器試験時にキュービクル裏に潜り込まずに配線ができる。<br><br>

<img src="images/trg40-1.png" style="max-width:600px;" /><br><br>

内部接点<br>
OVGR出力接点：Ta1-Tb1-Tc1<br>
RPR出力接点：Ta2-Tb2-Tc2<br>
TRG-DV40はOVGRとRPRが独立してc接点となっている。<br>
TRG-DV30のOVGRとRPRは出力接点がT0で共通であり両方ともa接点のみ。<br>

<h2>電流の配線</h2>
高圧CT二次側回路配線に、専用クランプ型ＣＴをかませる。<br>
クランプＣＴの二次配線は端子カバーケースを外してk,l端子のＭ３ネジにアンプ端子で接続。<br>
盤内既設ＣＴ（定格二次電流５Ａ）の二次配線のk側がクランプＣＴのK側となるように。<br>
クランプCTの開口部は1.25～8sqの電線まで可能（通常CT二次側は1.25sqの制御線か？）<br>
<img src="images/trg403.jpg" style="max-width:600px;" /><br>

クランプCTなので、盤内既設ＣＴの二次側配線を変更せずに施工できる。<br>
そのため配線接続間違いによる電流メーター不動作やOCR不動作を防ぐことができる。<br><br>

クランプ型式：CA-7<br>
クランプCT２次側と継電器との間の電線は２芯シールド線を使用しシールドは片端接地する。<br>

<h2>試験方法</h2>
高圧CT二次回路、CTT端子から電流を流す。<br>
電圧はVTT端子から電圧を印加する。<br>
※クランプCTに直接電流を流してはいけない。<br><br>

電圧<br>
・試験機 V ⇒ VTT２次側 R相<br>
・試験機 E ⇒ VTT２次側 T相<br><br>

電流<br>
・試験機 Kt ⇒ CTT２次側 R相<br>
・試験機 Lt ⇒ CTT２次側 com相<br><br>

DV30とDV40の違いは専用CTがあるかどうか。<br>
その他、試験方法は<a href="trg.php">TRG-DV30</a>と同じ。<br>


<h2>その他 注意点</h2>

周波数<br>
ディップスイッチで変更する。<br>
周波数が違うと動作値に影響が出る。<br><br>

電力極性<br>
電力計測値の受電方向、逆潮流方向を表示する。<br>
受電方向：ｎ．ｄ<br>
逆潮流方向：ｒ．ｄ<br>
発電してないのに「ｒ．ｄ」が表示されたら接続が逆の可能性。<br>


<h2>CTクランプ型RPRの試験で焼損事故</h2>
CT２次側配線を RPR 付属のクランプ CTで挟み込むタイプ。<br>
試験の際は試験電流線をクランプCTに貫通させなければならない。<br>
試験電流を RPR 本体に直接入力すると RPR が焼損してしまう。<br>
同型式のCTクランプ型RPRのメーカーは、オムロン（K2ZC-K2RV-NPC）も存在する。<br><br>

対策<br>
RPR継電器本体の配線を外して直接電流や電圧を印加するから故障の原因となる。<br>
CTTやVTTから電流や電圧を印加すれば継電器本体の焼損事故は防げたかも。<br><br>


<?php include("footer.php"); ?>