  <?php include("header.php"); ?>

<h2>単線結線図の書き方</h2>
無料ソフト「Inkscape(インクスケープ)」を使用すると簡単。<br>  
これは無料で使えるドロー系のグラフィックアプリケーション。<br />
ドロー系ソフトとは、数値計算によって、モニターへ図形を描画していく。<br />
Adobe Illustrator（イラストレーター）と比べても、劣らない性能を持っている。<br />
エクスポートも、jpg、png、PDF、SVG、DXFという様々な形式で出力できる。<br>
Inkscapeで作成したファイルはdxf形式でも保存可能。Auto cadで開くこともできる。<br />


<h2>高圧受電設備の単線結線図の作成例</h2>
<img src="images/zumen2.svg" /><br>

<h2>高圧受電設備の複線図の作成例</h2>
<img src="svg/fukusenzu1.svg" alt="高圧受電設備の複線図" /><br>


<h2>保護継電器の図記号</h2>
<img src="images/ocr8.png" style="max-width:150px;" alt="OCR 過電流継電器の記号"><br>
<img src="images/gr10.png" style="max-width:150px;" alt="地絡継電器 記号"/><br>
<img src="images/dgr_4.png" style="max-width:150px;" alt="DGR 地絡方向継電器の記号"><br>
<img src="images/uvr2.png" alt="UVR 不足電圧継電器 図記号" style="max-width:150px;"><br>
<img src="images/ovr2.png" alt="OVR 過電圧継電器 図記号" style="max-width:150px;"><br>
<img src="images/ovgr11.png" style="max-width:150px;" alt="OVGR 地絡過電圧継電器 記号"><br>
⇒<a href="svg/hogozu.svg">ダウンロード「保護継電器の図記号（.svg）」</a>


<h2>保護具の耐電圧試験図の作成例</h2>
<img src="svg/protect1.svg" /><br>
⇒<a href="svg/protect1.svg">ダウンロード「保護具の耐電圧試験図（.svg）」</a>



<h2>Inkscape 便利な使い方</h2>
Inkscapeの動作を軽くする方法<br>
編集⇒環境設定⇒ノード<br>
・ノードのドラッグ時にアウトラインを更新する<br>
・ノードのドラッグ時にパスを更新する<br>
この２つのチェックを外す<br><br>


スタイルのコピーペースト<br>
線の太さ、文字の大きさ、フォント形式などの「スタイル」がコピペ可能<br>
⇒コピーは通常通り、ペーストするときメニューバー「編集」から貼り付け形式を選択<br><br>

拡大縮小する際に線の太さを固定して変えないようにする方法<br>
「オブジェクトの拡大縮小時にストローク幅も同じ比率で拡大縮小」ボタンを押す。<br>
<img src="images/202206181.png" style="max-width:400px;"><br>


<h2>PDFの建築図面をベクタートレースして編集</h2>
PDFを読み込み、トレースして編集することもできる。<br>
方法：PDFを読み込み⇒メニューバー > パス > ビットマップのトレース<br>
<img src="images/20211102-1.png" style="max-width:500px;" /><br><br>

建築図の上から電気の配線図や記号を書くことも出来る。<br>
<video src="images/20211102-2.mp4" style="width:100%;max-width:500px;" controls></video>


<?php include("footer.php"); ?>