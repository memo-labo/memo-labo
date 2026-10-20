<?php include("header.php"); ?>

<h2>K2ZC-K2WR-NRの場合</h2>

CTは１個、２個、どちらでも可<br><br>

S相でCTを１個使う場合<br>
配線<br>
S相CT(k)⇒C1S⇒C2S⇒S相CT(l)<br>
<img src="images/rpr1-3.png" alt="" style="max-width:600px;"><br><br>

R相、T相でCTを２個使う場合<br>
R相、T相の逆相をとってS相電流を検出する。<br>
配線<br>
R相CT(k)⇒A(R)⇒A(S)⇒C2S⇒C1S⇒R相CT(l)<br>
T相CT(k)⇒A(T)⇒A(S)⇒C2S⇒C1S⇒T相CT(l)<br>
<img src="images/rpr1-2.png" alt="" style="max-width:600px;"><br>

<h2>K2ZC-K2WR-NTの場合</h2>

<img src="images/rpr-nt1.png">

使用するCTは２個<br>
二電力法にて電力を計測しているため、三相３線式の配線にて不平衡の逆潮流が発生した場合、NT１台で不平衡状態での逆潮流の検出が可能。<br><br>

R相CT(k)⇒C1R⇒C2R⇒R相CT(l)<br>
T相CT(k)⇒C1T⇒C2T⇒T相CT(l)<br><br>

<?php include("footer.php"); ?>