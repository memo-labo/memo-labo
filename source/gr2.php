<?php include("header.php"); ?>

<h2>モールドジスコンやピラージスコンだった場合の受電盤GR</h2>

LBS＋GRの電圧引き外しタイプ。<br>
GRの例としては<a href="agf.php">AGF-1-P5（omron）</a>など。<br>
電灯トランス２次側のMCCBよりGR制御電源と引き外し電源をとっている。<br><br>


<h2>LBS＋GRの配線図の例</h2>
<img src="images/a1vb1.svg" style="max-width:600px;"><br>

<h2>VCB+OCR+GRの電流引き外し</h2>
GR制御電源はVT２次側から、VCB引き外し電源は電灯トランス２次側MCCBから。<br>
使用されている受電盤GRが非常に古いことが多い。<br><br>

MDS⇒DS⇒VCB⇒LBS⇒Trの構成図<br>
<img src="images/gr2.svg" style="max-width:800px;"><br><br>

<a href="mds.php">MDS（モールドジスコン）</a>や<a href="pds.php">PDS（ピラージスコン）</a>がUGSに変更された場合。<br>
受電盤のGRは不要となるので誤作動を防ぐ処置が必要となる。<br>

<?php include("footer.php"); ?>