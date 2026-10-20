  <?php include("header.php"); ?>

<h2><?php echo $page_title; ?></h2>
現場によってVTT（試験用端子）の位置が若干違うことがある。<br>
・VT２次側の下にVTTがある場合<br>
・VT２次側のすぐ下にUVR、制御電源MCCBがあり、その下にVTTがある場合<br>
これは一体、どちらが正しいのだろう？<br>

<h2>考察</h2>
VTTとは、Voltage Testing Teminalsの略。<br>
計器用変圧器（VT = Ｖoltage Ｔransformer）の電圧試験用端子。<br>
指示較正や試験作業の簡略化に使う。<br>
計器や継電器を接続した状態で指示較正や試験が行えるので作業が省力化できる。<br>

<h2>停電中の場合</h2>
VTTを挿して回路を上下で切り分ける。<br>
VTT２次側に電圧を印加すると電圧計の較正ができる。<br>
VTT２次にUVRや制御電源MCCBがある場合、VTT２次に電圧を印加するとUVR試験ができる。<br>
VTT１次にUVRや制御電源MCCBがある場合、VTT１次に電圧を印加するとVT逆昇圧の可能性で危険。<br>

<h2>受電中の場合</h2>
受電中の場合、VTを通ってVTT、電圧計まで電圧がきている。<br>
受電中、VTTを挿して上下を切り分けるとどうなる？<br>
VTT１次にUVRや制御電源がある場合、VTTを挿してもUVRや制御電源には何も影響を与えない。<br>
VTT２次にUVRや制御電源がある場合、VTTを挿すと無電圧になりUVRが動作し制御電源は無電圧に。<br>

<h2>VTTで切り分けが出来ず、VTTの１次側がヒューズのみ</h2>
VTT端子で上下の切り分けができない。<br>
ヒューズがVTTから見て１次側についている場合と２次側についている場合がある。<br>
<img src="images/vt4.png" style="max-width:400px;" /><br>

<?php include("footer.php"); ?>
