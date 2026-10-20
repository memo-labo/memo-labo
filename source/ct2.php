<?php include("header.php"); ?>

<h2>なぜCTは２つだけで良いのか？</h2>
三相交流は、ある瞬間の電流の合成値は、常に0になる。<br>
電流のベクトル値をIa、Ib、Icとすると、Ia + Ib + Ic = 0 となる。<br>
ＣＴを２つ使用すると、Ia、Ibの電流値がわかる。<br>
すると、Ic = -(Ia + Ib)で表される。<br><br>

電流計はベクトル値ではなく絶対値で表示する。<br>
｜Ic｜＝｜Ia + Ib｜<br><br>

※絶対値の中のIa + Ibはベクトル和であることに注意。<br>

<h2>CTを３つ付けるメリットとは？</h2>

CTを３つ付けるメリットは、異相地絡を検出できる。<br>
異なる２つの相同士で地絡している状態のこと。<br>
異相地絡が起こると、短絡状態となっているので、大電流が流れる。<br><br>

<img src="images/ct21.png" style="max-width:400px;" alt=""><br>
異相地絡が発生した箇所によっては、CTを通らず、地絡による過電流をCTにて検出できない場合がある。<br>

<h2>3CTの例</h2>
エナジーサポートのUGS「GU-303DV」<br>
<img src="images/20220526_2.png" alt=""><br>



<?php include("footer.php"); ?>