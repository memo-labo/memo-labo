<?php include("header.php"); ?>
  
<h2>太陽光の接続箱</h2>
PVアレイ⇒接続箱内（スイッチ⇒ブスバー⇒DCブレーカー）⇒PCS<br>

<h2>パネル、接続箱、パワコンの構成</h2>
<img src="images/202206231.svg" style="max-width:800px;"><br>

<h2>接続箱の写真</h2>
<img src="images/202206233.jpg" style="max-width:500px;" /><br>

<h2>産業用太陽光の接続箱内配線図</h2>
PV直流ケーブルとPCSとの間には逆流防止ダイオードがついている。<br>
P-N間、P-E間、N-E間にはそれぞれヒューズ＋バリスタ（ZNR）がついている。<br>
バリスタが作動して短絡状態となったとき、過電流をヒューズで保護し開路する。<br>
<img src="images/202206232.png" /><br>

<h2>注意点</h2>
太陽光設備の接続箱内は、大変危険である。<br>
太陽光パネルからの直流電圧や、別の接続箱内からも電圧が来ている。<br>
どこまでが開放状態か、無電圧か、充電状態か、テスター等でしっかり確認をする。<br>
作業中にうっかり接続箱内のブスバーに触れて高電圧の直流で感電してしまう可能性もある。<br><br>

■参考資料<br>
・<a href="https://project.nikkeibp.co.jp/ms/article/FEATURE/20140908/374920/?ST=msb&P=2">絶縁抵抗測定 接続箱 サージアブソーバを外す</a><br>
・<a href="https://www.kawamura.co.jp/wp/wp-content/uploads/2018/01/l_taiyou-indu2.pdf">太陽光発電システム配電機器[PDF資料]</a><br>

<?php include("footer.php"); ?>