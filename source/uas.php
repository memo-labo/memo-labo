  <?php include("header.php"); ?>
  
<h2>UAS 地中線用高圧交流気中負荷開閉器</h2>
<img src="images/uas.jpg" style="max-width:600px;"><br>

UAS = Underground Air Switch<br>
構造はUGSと似ている（⇒<a href="ugs.php">UGSページ</a>）<br>
値段はUGSと比べてUASの方がやや高い。<br>
重量はUGSよりUASの方が大きい。<br>
UASには、UGSにある「ガス圧低下表示」がない。<br>
UASは、UGSに比べて開閉器部分が少し大きい。<br>

<h2>開閉性能</h2>
定格負荷開閉容量（300A / 力率0.65～0.75）<br>
UAS：200回<br>
UGS：300回<br><br>

無電圧連続開閉性能が、UGSの方が性能が高い。<br>
UAS：1000回<br>
UGS：3000回<br>

<h2>UASのメリット</h2>
絶縁ガスを使用しない為、絶縁媒体の分解処理が不要。<br>
UGSのように、ガス漏れやガス圧低下の心配がない。<br>
UASは警報回路に「ガス漏れ」という項目がない。<br>
⇒<a href="sf6.php">SF6ガス（絶縁ガス）とは？</a><br>

<h2>VT内蔵タイプ</h2>
開閉器内部にVTが入っている。<br>
VT１次側はR相とT相に繋がっている。<br>
VT２次側はSOGの制御電源P1P2に繋がっている。<br><br>

UAS 絶縁耐力試験の注意<br>
VT内蔵の場合、電圧印加箇所は主回路端子一括とし、異相間には印加しないこと。<br>
一相毎の交流耐電圧試験は、開閉器内部のVTを焼損する恐れがあるので、絶対に行わないこと。<br>
（対地充電電流がVTに流れ、過励磁となり、VTが焼損する）<br>

<?php include("footer.php"); ?>