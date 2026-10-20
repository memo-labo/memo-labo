<?php include("header.php"); ?>

<h2>シースアースは主変ZCTのkからlへ通して接地</h2>
この場合、サブ変電所までのケーブルで発生した地絡は保護対象。<br>
また、サブ変電所内の電気設備にて地絡が発生した場合も保護対象。<br>
<img src="images/shield1.png" /><br />

<h2>主変でシースアースは非接地、サブ変でシースを接地</h2>x
<img src="images/zct_1.svg" style="max-width:800px;" /><br />

<!--
<h2>シースアースはサブ変電所にて接地</h2>
この場合、サブ変電所までのケーブルで発生した地絡は保護対象。<br>
また、サブ変電所内の電気設備にて地絡が発生した場合も保護対象。<br>
<img src="images/shield2.png" /><br />
-->

<h2>ZCTは受電盤内、シースアースは主変ZCTに通していない</h2>
この場合、サブ変電所内の電気設備にて地絡が発生した場合のみ保護対象。<br>
サブ変電所までのケーブルで発生した地絡は、地絡電流がZCTを往復するため、保護対象外。<br>
<img src="images/shield3.png" style="max-width:600px;" /><br />


<h2>主変ではなくサブ変にDGRがある場合</h2>

サブ変にDGRをつける意味<br>
サブ変内で地絡が発生した場合にサブ変のCBを開放<br>
かつ主変（UGS等）は開放させたくない（切り分けたい）<br>
なのでシールドはZCTのLからKに潜らせてケーブル地絡に対しては無効化させる<br>
（別にさせなくても大きな問題にはならない）<br><br>

<img src="images/20260327-1.jpg" style="max-width:600px;" /><br>


<h2>ZCTとケーブルシースアースの施工不良</h2>

<img src="images/20210926.jpg" style="max-width:400px;"/><br>
主変電所からサブ変電所への送りケーブルにて、ブラケットにて接地したのち、ZCTをくぐらせている。<br>
多点接地となり、ZCTが地絡電流を正しく感知できず、迷走電流により誤動作する可能性もある。<br>
対処方法としては、ネジのところは浮かせて接続し、絶縁テープにて絶縁する必要がある。<br><br>

■対処方法<br>
<img src="images/shield1.svg" style="max-width:400px;" /><br>
まず３つのシースを１本にまとめる。<br>
端子あげされた３本＋１本をネジとナットで結合して絶縁テープで巻く。<br>
まとめた１線をZCTにくぐらせて、ブラケットアースで接地する。<br>


<img src="images/20210927-1.png" style="max-width:400px;"/><br>
ケーブルシースアースがZCTを通っておらずブラケットにネジ止めされて接地されている。<br><br>

<img src="images/20210927-2.png" style="max-width:400px;"/><br>
ケーブルシースアースのZCTの通し方が反対になっている。<br><br>

<img src="images/20210927-3.png" style="max-width:400px;"/><br>
ケーブルシースアースの配線自体は正しいがネジ止めされた部分が接地されていない。<br><br>


<?php include("footer.php"); ?>