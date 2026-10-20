<?php include("header.php"); ?>


<h2>H3CR タイマーリレー</h2>

タイマーリレーは限時継電器とも呼ぶ。<br>
入力信号が入ってから、あらかじめ定められた時間を経過してから、接点を開閉動作させるリレー。<br><br>

タイマーリレーが使用される場所<br>
・復電時にUVRとオンディレータイマーの組み合わせで52R、52F1（フィーダー）投入動作<br>
・非常用発電機の電圧確立、ダブルスロー切替動作等<br>
・動力負荷へのMC（マグネット）操作回路用タイマ<br><br>

オンディレー動作(限時動作) とは？<br>
電源回路または入力回路に入力を加えた時点からセット時間経過後に出力。<br>
オンディレータイマ記号（a接点・b接点）<br>
<img src="images/timer1.svg" style="max-width:400px;" /><br><br>

オフディレータイマとは？<br>
タイマの電源が印加されると出力がON。<br>
タイマの電源がOFFすると同時に計時を開始、設定した時間後に出力がOFF。<br>
オフディレータイマ記号（a接点・b接点）<br>
<img src="images/timer2.svg" style="max-width:400px;" /><br>

リレータイマーの例「omron H3CR-A」<br>
<img src="images/timer1.jpg" style="max-width:300px;" alt=""><br><br>

左下：目盛数字切換スイッチ<br>
メモリのMAXを1.2、3、12、30より選択可能<br>
<img src="images/timer2.jpg" style="max-width:400px;" alt=""><br><br>

右下：時間単位切換スイッチ<br>
（sec、min、hrs、10hより選択）<br><br>

例：左下メモリを1.2、右下スイッチをminにするとMAXが30min⇒1.2minへ変換<br><br>

右上：動作モード<br>
形H3CR-AはA～Eの動作モード切り換えができる。<br>
A：オンディレー<br>
B：フリッカオフスタート<br>
B2：フリッカオンスタート<br>
C：信号オン/オフディレー<br>
D：信号オフディレー<br>
E：インターバル<br>

<h2>H3CRのソケット「P3G-08」</h2>

⇒<a href="https://www.fa.omron.co.jp/data_pdf/cat/common_sockets_ds_j_6_5.pdf?id=811">H3CRのソケット 取扱説明書</a><br><br>

配列番号<br>
③④⑤⑥<br>
②①⑧⑦<br><br>

電源<br>
②⑦<br><br>

接点c-a-b<br>
①-③-④<br>
⑧-⑥-⑤<br>

<h2>P3GA-11</h2>
⑧⑦⑥⑤<br>
　　　④<br>
⑨　　③<br>
⑩⑪①②<br><br>

②⑩<br>
電源<br><br>

⑪-⑨-⑧<br>
①-③-④<br>
c-a-b<br><br>

②-⑩に電源印加 and ②-⑤導通<br>
ゲート入力<br><br>

②-⑩に電源印加 and ②-⑥導通<br>
スタート入力<br><br>

②-⑩に電源印加 and ②-⑦導通<br>
リセット入力<br>

<h2>入力機能（スタート、リセット、ゲート）</h2>

スタート<br>
計時スタート機能として働く。<br><br>

リセット<br>
タイムアップ状態をリセットする。<br>
計時動作を中止し、制御出力をOFF（リセット）する。<br><br>

ゲート<br>
ゲート入力中は計時動作を中断する。<br>

<h2>タイマーリレーの故障例</h2>
一部の動力が急遽停電した。<br>
タイマーリレーを確認するとPOWERランプは点灯しているがOUTランプが点灯せず。<br>
調べてみるとタイマーリレーの故障が判明、それが原因で一部負荷が停電であった。<br>
非常用発電機は、起動時に全負荷を投入させず時間差で投入したいためタイマー設置。<br>
そのうちの一部のタイマーが動作不良でこのような事態に至った。<br>
参考：<a href="https://twitter.com/yamadenkikanri/status/1605047882914332673">Twitter投稿</a>
<?php include("footer.php"); ?>