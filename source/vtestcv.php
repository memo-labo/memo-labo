<?php include("header.php"); ?>

<h2>3300VのCVケーブルや三芯一括耐塩ヘッドタイプ端末の場合に耐圧試験を２回する理由</h2>

CVTケーブルの耐圧試験の図<br>
各相３相一括をV、各相シールドをE（アースへ接続）として、V-E間に電圧を印加する<br>
<img src="images/vtestcv3.svg" style="max-width:700px;" /><br><br>

CVの場合、CVTのようにシールドが３相それぞれではなく３相一括になっている。<br>
なのでCVケーブルの３相芯線を一括でV、シールドをEとして試験してしまうと、芯線の相間（RS間、ST間、TR間）の耐圧試験が出来ない。<br>
<img src="images/vtestcv4.svg" style="max-width:500px;" /><br><br>

<h2>3kV CVケーブル単体の絶縁耐力試験方法（予想）</h2>

１回目<br>
RS間をジャンパー線で短絡<br>
RS間をV、TとシールドをEとしてV-E間に電圧印加<br>
<img src="images/vtestcv1.svg" style="max-width:700px;" /><br>

２回目<br>
ST間をジャンパー線で短絡<br>
ST間をV、RとシールドをEとしてV-E間に電圧印加<br>
<img src="images/vtestcv2.svg" style="max-width:700px;" /><br>

結果<br>
RSTの各相間の耐圧と、RST各相とシールド間の耐圧が試験できる。<br>

<h2>注意点</h2>
VT内蔵PASやUGSなどVT内蔵機器につながっていない状態であることを確認する。<br>

<?php include("footer.php"); ?>