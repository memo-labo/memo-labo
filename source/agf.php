<?php include("header.php"); ?>

<h2>AGF-1-P5</h2>

外観<br>
<img src="images/agf1.jpg" style="max-width:400px;" alt=""><br><br>

内部<br>
<img src="images/20260406-1.jpg" style="max-width:800px;" alt=""><br><br>

配線図<br>
<img src="images/20260406-2.jpg" style="max-width:800px;" alt=""><br><br>

端子部分写真<br>
<img src="images/agf3.jpg" style="max-width:600px;" alt=""><br><br>
<img src="images/agf2.jpg" style="max-width:600px;" alt=""><br><br>

ソケット<br>
<img src="images/20260406-3.jpg" style="max-width:800px;" alt=""><br><br>


プラグイン形（ソケットに抜き差しできるタイプ）<br>
<br>
端子記号<br>
上段：a-b-c-B<br>
下段：Z1-Z2-P1-P2<br>
<br>
対応番号<br>
上段：6-5-4-3<br>
下段：7-8-1-2<br>
<br>
P1とBの間にはa接点がある。<br>
GRが動作すると内部リレーが動作しP1とBが導通。<br>
Bは警報用端子<br>
4-6がトリップ用端子<br>
<br>
P1接地側<br>
P2非接地側<br>
P1から6(C)に渡り線<br>
4(a)からTC<br>
TCからP2（非接地側）<br>

<h2>試験方法</h2>

信号は、aとcのa接点を利用して「接点モード」で出来る。<br>
aとc以外でも、b-c間、P1-B間もa接点なのでそこでも出来る。<br>

<!--
<h2>GR継電器を不使用にする場合の処置</h2>

トリップ回路を継電器本体から離線して絶縁テープで巻く。<br>
トリップ回路に電圧がかからなければ、引き外される心配がない。<br>
<br>
対策方法<br>
①P1P2の上流にあるMCCB２次側を離線しGRに電源が入らないようにしてMCCBは常時OFF。<br>
②4(a)だけを離線してGRが動作してもトリップ回路に電圧がかからないようにする。<br>
①②どちらでも出来るが、②の方が確実か？<br><br>

3(B)がトリップ回路に使用されている場合がある。<br>
この場合、3(B)を外して絶縁テープで養生すればトリップ無効化できる。<br>
-->

<?php include("footer.php"); ?>