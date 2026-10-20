<?php include("header.php"); ?>

<h2>三菱 MOC-A1シリーズ</h2>

個人の肌感だと最も普及しているOCR。現場でよく見かける。<br>
なのでOCRリレー試験の初級者はここから練習すると良いと思う。<br><br>

<img src="images/20261002-3.jpg" /><br><br>

MOC-A1T-R：電流引き外し<br>
MOC-A1V-R：電圧引き外し<br>
RD：引出ケース<br><br>

裏面端子部分<br>
<img src="images/moca1.jpg" /><br><br>

電圧引き外し裏面端子 写真<br>
ネジが小さいので落とさないように注意（<a href="https://link.amazon/B0dCVkGiO">ドライバーのマグキャッチ</a>がオススメ）<br><br>

<img src="images/moca2.jpg" style="max-width:600px;" /><br><br>

RUNランプ<br>
入力が２相入力時0.5Ａ前後、単相入力時0.7Ａ前後を下回る時は消灯。<br>
受電中に消灯⇒入力電流値を確認⇒1A以上で消灯していれば故障の可能性あり。<br><br>

整定用スイッチは「スナップアクション」を利用したロータリースイッチ。<br>
整定変更時は中間位置で止めないようスムーズに回転させて整定する。<br><br>

ディップスイッチ<br>
限時電流と周波数の設定<br>
限時設定、周波数設定ができる。<br>
工場出荷時にはすべてOFF（60Hz・超反限時）になっている。<br><br>

周波数設定<br>
SW1 ON/OFF 50Hz/60Hz<br>
OCR本体の周波数とリレー試験器の電源の周波数が違うと試験結果がおかしくなる。<br>
例：OCR本体が50Hz設定、リレー試験器用のバッテリーが60Hz設定の場合など。<br><br>

限時電流設定<br>
（SW3/SW4）<br>
OFF/OFF⇒超EI<br>
OFF/ON⇒強VI<br>
ON/OFF⇒反NI<br>
ON/ON⇒定DT<br><br>

ツマミのLOCK（ロック）機能<br>
限時電流、瞬時電流のツマミには「LOCK」という項目がある。<br>
ここに合わせることで限時、瞬時を不動作にすることができる。<br>
表示復帰レバーを押し上げてロックする代わりにツマミを使うことも可能。<br>

<?php include("footer.php"); ?>