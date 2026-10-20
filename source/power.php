<?php include("header.php"); ?>

<h2>有効電力・無効電力・皮相電力</h2>
有効電力（W：ワット）<br>
電力会社などから供給された電力を、熱などのエネルギーとして消費できた分<br><br>

無効電力（var：バール）<br>
電力使用の回路内で蓄積と放電を繰り返すのみとなり、目的とするエネルギーとして利用されない分<br><br>

皮相電力（VA：ブイエー）<br>
有効電力も無効電力も含めた全供給電力<br>

<h2>遅れ・進み</h2>
国際規格（IEC60050-131、JISもこれに準拠）<br>
複素皮相電力は電流を基準として計算<br>
無効電力は複素皮相電力の虚部、と定められている。<br>
遅れ無効電力が＋の表記になる。<br>
遅れ、進みは電圧を基準にした表現なので、電流基準のプラス、マイナスと食い違いが出る。<br>


<h2>力率計 cosφ（製品例：YP-12NPFU）</h2>

配線図<br>
<img src="images/power1.jpg" style="max-width:300px;"><br><br>

裏面端子<br>
<img src="images/power2.jpg" style="max-width:300px;"><br><br>

力率計の定格<br>
定格電圧はVTの２次側定格電圧、定格電流はCTの２次側定格電流を選定。<br><br>

整流回路（トランスデューサ）でDC出力に変換<br>
電圧出力DC0v～5v、電流出力DC4mA～20mA<br>


<h2>力率計 外観</h2>
点マークがあり、少し左にずれている。<br>
<img src="images/power3.jpg" style="max-width:300px;"><br>


<?php include("footer.php"); ?>