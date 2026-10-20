<?php include("header.php"); ?>

<h2>ラッチングリレー(キープリレー)</h2>

・リレー：MK2KP<br>
・ソケット：PF113A-E<br>
⇒<a href="https://www.fa.omron.co.jp/data_pdf/cat/mkk_ds_j_2_11.pdf?id=958">MKK ラッチングリレー 説明書</a><br><br>

外観写真（上面）<br>
<img src="images/mk2kp1.jpg" style="max-width:500px;" ><br><br>

外観写真（下面）<br>
<img src="images/mk2kp2.jpg" style="max-width:500px;" ><br><br>

内部接点<br>
<img src="images/kr1.png" style="max-width:300px;" ><br><br>

ソケット端子番号<br>
<img src="images/kr1.jpg" style="max-width:300px;" ><br><br>

c-a-b<br>
③④⑤<br>
⑨⑧⑦<br>
<br>
set<br>
②⑩<br>
<br>
reset<br>
①⑪<br>

<h2>キープリレーの回路図例</h2>
<img src="images/kr.svg" style="max-width:800px;" ><br>
過電流継電器が動作するとKRのセット回路に電圧印加されセット。<br>
過電流警報のオレンジランプが点灯。<br>
同時に警報装置への無電圧a接点が動作して警報装置が発砲。<br>
リセットボタンを押すとKRのリセット回路に電圧印加されリセット。<br>
リセットと同時にオレンジランプ消灯し警報装置の発砲が停止。<br>

<h2>特徴</h2>
セットコイルとリセットコイルの２つを持つ。<br>
セットコイルへの電圧印加でa接点がONになる。<br>
またセットコイルへの電圧印加がなくなってもa接点ONを保持する。<br>
リセットコイルへの電圧印加でa接点がOFFしてb接点がONする。<br>
動作表示機構内蔵のため、動作確認が容易。<br><br>

注意点<br>
DC仕様の場合､セット･コイル、リセット･コイルともコイル極性に注意する。<br>
誤接続すると誤動作の原因となる。<br>
AC仕様の場合はコイル極性はない。<br><br>

セット･コイルとリセット･コイルへ同時に電圧を印加すると、セット状態となる。<br>
ラッチングリレーを連続通電で使用することは意味がない。<br>
1パルスで保持するので、省電力にも有効な１パルス動作が適切。<br>

<?php include("footer.php"); ?>