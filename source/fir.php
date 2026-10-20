  <?php include("header.php"); ?>

<h2>落下式故障表示器</h2>

<img src="images/rakka1.jpg" style="max-width:300px;"><br><br>


製品例：FIR-DA3（<a href="https://www.washion.co.jp/product/p05/fir.pdf">取扱説明書</a>）<br><br>

制御器具番号 30<br>
（機器の状態又は故障表示装置）<br><br>

<img src="images/fir2.jpg" style="max-width:400px;"><br />
<img src="images/fir1.jpg" style="max-width:700px;"><br />

<h2>30とVCBのシーケンス</h2>

<img src="images/fir.svg" style="max-width:700px;" /><br>

30に電圧が印加されると接点が動作<br>
30は主に手動復帰タイプが主流<br>
30動作で表示板が落下、1-2導通、接点保持（手動復帰）<br>
30動作で3-4導通、自動復帰タイプ<br><br>

動作予測<br>
①30X動作⇒VCBハンドル（電動タイプ）での投入が不可<br>
②30X動作⇒VCBの手動投入は可能だがすぐ引き外される（30導通のためVCB切回路に電圧印加状態）<br><br>

よくあるパターンは、電圧引き外しで30のb接点でインターロック組むので①になる。<br>
しかし稀に30動作でも投入操作が出来てしまう盤もあるらしい。<br><br>

事故例（ネット情報）<br>
落下故障器の復帰に気が付かず、何度も繰り返しVCB投入⇒即座にVCB遮断を繰り返す。<br>
CTDは短時間に必要以上に何度も何度もトリップ電流を出力させたら焼ける。<br>
リレー試験が上手く行かず、何度も繰り返し⇒VCBトリップコイルもCTDも焼ける。<br>


<h2>疑問</h2>
・なぜ電流コイルと電圧コイルの２種類があるのか？<br />
・なぜ電圧コイルにSA（バリスタ）が必要になるのか？<br /><br />

電流コイル<br />
抵抗・インピーダンスが小さい<br /><br />

電圧コイル<br />
抵抗・インピーダンスが大きい<br /><br />

<h2>関連リンク</h2>
<ul>
	<li><a href="kosyo.php">電子式故障表示器/制御器具番号30</a></li>
</ul>

<?php include("footer.php"); ?>