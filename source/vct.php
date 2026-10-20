<?php include("header.php"); ?>

<h2>VCT 計器用変成器</h2>
<img src="images/vct1.jpg" style="max-width:400px;" alt=""><br>
電源側：UK-VK-WK<br>
負荷側：UL-VL-WL<br><br>

VCT 結線図<br>
<img src="images/vct2.jpg" style="max-width:600px;" alt=""><br><br>

銘盤<br>
<img src="images/vct3.jpg" style="max-width:600px;" alt=""><br>

<h2>VCT 単相での使用禁止</h2>
三相3線式用のVCTを単相で使用してはいけない。<br>
VTがV接続された三相回路において単相で使用した場合、使用しない相の一線が開放される。<br>
使用しない相のVTに、ケーブルの対地静電容量とVT巻線のリアクタンスにより直列共振が発生し、過電圧が発生する場合がある。<br>
その際、電圧（1.3～2倍程度）により、焼損事故になる恐れがある。<br>

<h2>A種接地とD種接地</h2>
VT・CT・VCTの二次側（低圧用は除く）取付足、外箱を必ず接地する。<br>
取付足や外箱はA種接地、低圧２次側回路はD種接地。<br>
一次側との混触による人畜の危険防止、計器の保護のため。<br>
電気設備技術基準に規定されている。<br><br>

VCTの二次端子1L、P2、3Lは接地が必要。<br>
短絡棒が1L、P2、3L端子ブロック及びアースブロックに締め付け固定を確認。<br>


ABCチャンネルに対して吊りボルトと金属板でVCTを支える<br>
<img src="images/vct6.jpg" style="max-width:600px;" alt=""><br>

上から見た図<br>
<img src="images/vct.svg" style="max-width:600px;" alt=""><br>

<h2>VCT 検定と使用期間</h2>
<img src="images/vct4.png" style="max-width:800px;" alt=""><br>

特別検定<br>
提出検定を受けた以後14年以内は、変成器を添えないで検定を受けることができる。<br>
検定証印の有効期間が7年の変成器付計器の場合、変成器の使用期間は実質的に21年となる。<br><br>


<!--
有効期限<br>
計量法の中で決められている。<br>
計器の種類によって検定等に合格した月の翌月から起算して、<br>
有効期限が１０年、７年、５年と定められている。<br><br>
-->

変成器は、検定付かつ検定有効期間内のものを使用する。<br>
検定の有効期限は検定小判に表示されている。<br>
これを使用しないと計量法違反となる。<br><br>

（計量法172条）<br>
六カ月以下の懲役若しくは五十万円以下の罰金に処し、又はこれを併科する。<br><br>

<h2>メーターの有効期限</h2>

単独計器（メーターのみ、変成器不要）<br>
電子式計器：10年<br>
機械式計器：7年<br><br>

変成器付計器（変成器と共に使用するメーター）<br>
7年 or 5年<br><br>

詳細：<a href="https://www.jemic.go.jp/kentei/dk_kentei.html">電気計器等の検定・検査 | 検定・検査業務 | 日本電気計器検定所（JEMIC）</a>

<?php include("footer.php"); ?>