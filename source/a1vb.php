<?php include("header.php"); ?>
  
<h2>MGR-A1VB-F</h2>

<img src="images/a1vb1.jpg" style="max-width:500px;"><br><br>

端子番号<br>
上段：空、空、c、b、a<br>
下段：Z1、Z2、P1、P2、B<br><br>

<img src="images/20260403-1.jpg" style="max-width:400px;"><br><br>


配線図<br>
ZCTのKとLが逆なのはケーブル引き込み、立ち上がり部分だから。<br>
ZCTの下から上に向かってケーブルを貫通させている。<br>
LBSトリップ接点を「a-c」で利用する場合もある。たぶんそれが取説通り。<br>
<img src="images/a1vb1.svg" style="max-width:800px;"><br>

動作原理<br>
GRが動作すると、P1とBが内部a接点で導通。<br>
するとBにAC100Vが印加され、LBSのTCに電圧が印加される。<br>
引き外し回路を作る際に継電器端子間に渡り線などの配線せずに済む。<br><br>

注意<br>
「使用禁止の範囲に整定しますと不要動作の原因となりますので、整定しないでください」<br>
これは「ツマミを使用禁止の範囲に設定してはいけない」という意味。<br>
「この位置にしておけばGRを不動作にできる」という意味ではない。<br>

<h2>MGR-A1V-F</h2>

試験方法（信号線の接続）<br>
・「c」と「p2」の２点で「電圧」モード<br>
・「a」と「c」の２点で「接点」モード<br>

<img src="images/gr3.svg" style="max-width:800px;"><br>

<?php include("footer.php"); ?>