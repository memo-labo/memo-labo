<?php include("header.php"); ?>
  
<h2>接地用コンデンサ（GC）</h2>

⇒<a href="https://www.hikari-gr.co.jp/products/search/product01/list08/item_33">接地補償用コンデンサ 取扱説明書</a><br>

絶縁変圧器２次側の高圧非接地電路に使用。<br>
ZCTより電源側の対地静電容量が少ない場合、地絡電流がGRの動作感度に至らず地絡検出が困難。<br>
GRを確実に動作させるためGCを接続して地絡電流の戻り回路を作る。<br>

<h2>接続図</h2>
接地用コンデンサは絶縁変圧器の２次側～ZCTの電源側に接続する。<br>
高圧回路とGCの間にはPCやLBSなど回路を断路する設備が必要。<br>
<img src="images/gc1.jpg" style="max-width:800px;" /><br>

<h2>接地用コンデンサの設置場所</h2>
対地静電容量が少ない非接地電路<br>
・6.6/6.6kv、6.6/3.3kvタイトランスの二次側（非接地系）<br>
・配電系統の22/6kV柱上変圧器の6kVの出口付近など<br>
・高圧発電機回路<br>

<h2>回路図と計算</h2>
Ig=全部の地絡電流<br>
Ic1=GCがあることで発生した充電電流<br>
Ic2=絶縁変圧器２次側から高圧受電設備の高圧充電部までの充電電流<br>
<img src="images/gc2.jpg" style="max-width:800px;" /><br>


<h2>低圧回路の接地用コンデンサ</h2>
・低圧用接地補償用コンデンサは高調波対策品<br>
・低圧GC一次側にはメンテナンスの為にMCCBを挿入する（定格電流の目安は約10A程度）<br>

<?php include("footer.php"); ?>

