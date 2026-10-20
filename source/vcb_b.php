<?php include("header.php"); ?>

<h2>母線連絡遮断器</h2>
母線連絡遮断器VCBの表記は「52B」と表記される。<br />
受電設備の停電範囲を限定したい場合、母線連絡遮断器で停電範囲を限定させて点検を行う。<br />
母線連絡遮断器１台ではVCB本体の点検に全停電が必要なので、VCB２台を直列で設ける。<br />
保全上有利な方式だが、VCBの数が増えるのでコストアップになる。<br /><br />

また、商用電源利用の変圧器と非常電源利用の変圧器の系統を分離することができる。<br><br>


単線結線図の例<br>
52B：母線連絡遮断器<br>
52G：非常用発電機遮断器<br>
<img src="images/interlock1.png" style="max-width:700px;" alt=""><br><br>


商用電源利用時<br>
52G⇒開放、52GR⇒開放、52B⇒投入<br>
一般用負荷と非常用負荷にそれぞれ給電<br>
<img src="images/interlock2.png" style="max-width:700px;" alt=""><br><br>

非常用発電機利用時<br>
52R⇒開放、52B⇒開放、52G⇒投入、52GR⇒投入、<br>
非常負荷のみ給電<br>
<img src="images/interlock3.png" style="max-width:700px;" alt=""><br><br>


<?php include("footer.php"); ?>