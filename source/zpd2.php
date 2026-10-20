<?php include("header.php"); ?>

<h2>富士電機 ZPD-1</h2>
富士電機 ZPD-1は試験用ボックスが無い。<br>
ZPDがいし横部分に試験用のT端子がある。<br><br>

V0整定値が5%の場合、T端子-E端子に電圧を印加する際、動作値は570V±25%。<br>
富士電機FAQによれば、ZPD-1の試験端子には最大2000V印加可能（⇒<a href="https://felib.fujielectric.co.jp/download/faq.htm?dataid=1201659&site=japan&lang=ja">該当ページ</a>）<br><br>


ZPD１次側に試験電圧を３相一括にて印加すれば、5%整定で動作値は190Vで試験可能。<br>
ただし高圧母線に電圧が印加されてしまうため、他の作業者が感電する恐れがあり危険。<br>
ZPD１次側をDS、PC、LBS等で切り離せるようであれば、切り離す。<br>
<img src="images/zpd2_2.jpg" alt=""><br>

「ZPD-1」はDGR継電器「QH-DG3」に対応。<br>
<img src="images/zpd2_4.png" style="max-width:400px;" alt=""><br>

<h2>光商工 ZPC-9</h2>
T-E間の動作電圧（完全接地電圧3Voの5%整定）⇒ 570V<br>
変成器の色⇒<span style="color:#000000;">■ 黒色</span><br><br>

ZPC-9Bは、ZPC-9の3分の1の電圧で試験可能。<br>
変成器の色⇒<span style="color:#800000;">■ 茶色</span><br>

<img src="images/zpd2_3.png" alt=""><br><br>


<h2>泰和 TAIWA ZPD-1</h2>

光商工のZPC-9と同じく、試験用端子がZPDの本体に付いている。<br>
対応する地絡方向継電器：<a href="shg.php">SHG-M10</a>、SHG-M20<br><br>

試験内容も富士電機ZPD-1と同じ。<br>
T端子-E端子を使用時⇒V0 5%整定で動作値570V<br>
ZPD１次側三相一括-E端子を使用時⇒V0 5%整定で動作値190V<br><br>

TAIWA ZPD-13<br>
零相基準入力装置と断路器が一体化され回路を切り分け可能タイプ。<br>
３極が同時にフック棒で操作できる連動式。<br>
フレームに端子台がついており配線や試験をする際に便利。<br>
<?php include("footer.php"); ?>