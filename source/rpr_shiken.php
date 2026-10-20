<?php include("header.php"); ?>

<h2>三菱RPR CRV1-A01 機能</h2>

<img src="images/rpr1.jpg" style="max-width:500px;"><br><br>
<img src="images/rpr2.jpg" style="max-width:500px;"><br><br>

⇒<a href="https://www.mitsubishielectric.co.jp/fa/products/faspec/download.do?kisyu=/pror&formNm=CRV_CRV1-A01S1_1&category=ex&id=spec" target="_blank">三菱RPR CRV1-A01 取扱説明書</a><br><br>

ＲＵＮ表示ＬＥＤ（左上）<br>
常時監視結果を表示。正常で点灯、異常で消灯。<br>
「r.d」表示⇒電力の向きが逆電力方向。<br>
「r.P.」表示⇒RPR始動時<br><br>

監視異常設定スイッチと周波数切替スイッチ（左上）<br><br>

監視異常保持<br>
ディップスイッチでON・OFF<br>
監視異常接点を保持するか、保持しないかを選択。<br><br>

周波数の設定<br>
ディップスイッチで50Hz・60Hz<br>
工場出荷時の設定は 60Hz設定になっている。<br>
※RPRが60Hz設定で50Hzの電源で試験してしまうと最小動作電流値が小さい値になる。<br><br>

極性（P←）ツマミ<br>
n.d = Normal Direction（電力の向きが受電方向）<br>
r.d = Reverse Direction（電力の向きが逆電力方向）<br>

<h2>強制動作</h2>
強制動作<br>
・選択スイッチ（回すタイプの表示つまみ）で「強制動作」を選択。<br>
・「動作時間整定」より長い時間、強制動作ボタンを押しつづける。<br>
・すると各要素を個別に強制動作させることができる。<br>
（強制動作ボタンを押している間は動作し続ける）<br><br>

※注意<br>
以下の場合は強制動作ボタンを押してもリレーは動作しない。<br>
・動作電圧（OVGR）、動作電力（RPR）整定を「ロック」に設定している場合。<br>
・リレーロックＤ／Ｉを入力している場合。<br>
・選択スイッチで強制動作以外を設定している場合<br>


<h2>検出例</h2>
A相検出：1CT（A相）V(AC)<br>
<img src="images/rpr_shiken1.png" style="max-width:700px;" /><br>


裏面端子<br>
<table border=1>
<tr><td>02</td><td>01　制御電源＋</td></tr>
<tr><td>04</td><td>03　制御電源－</td></tr>
<tr><td>06</td><td>05</td></tr>
<tr><td>08</td><td>07</td></tr>
<tr><td>10　監視異常接点</td><td>09　監視異常接点</td></tr>
<tr><td>12　OVGR a接点</td><td>11　OVGR a接点</td></tr>
<tr><td>14　RPR a接点</td><td>13　RPR a接点</td></tr>
<tr><td>16　Vo入力</td><td>15　Vo入力</td></tr>
<tr><td>18　Vac入力（c相）</td><td>17　Vac入力（a相）</td></tr>
<tr><td>20　Ia入力（R相）</td><td>19　Ia入力（com相）</td></tr>
<tr><td>22</td><td>21</td></tr>
</table>

<h2>RPR 逆電力継電器 試験方法</h2>

※正しい情報はメーカー取扱説明書を参照下さい<br><br>

三菱RPR CRV1-A01<br>
17(+)・18端子に電圧を印加（定格AC110V）<br>
19(+)・20端子に電圧と同位相で電流を流す<br>
13・14端子に信号線を取り付ける。<br><br>

A相検出の場合の試験配線<br>
V⇒VTT P1<br>
E⇒VTT P3<br>
Kt⇒CTT R相<br>
Lt⇒CTT com相<br><br>

商用電源⇒CT⇒OCR⇒RPRの電流配線は20⇒19となっている。<br>
CTT2次R相⇒OCR⇒メーター⇒RPR[20]⇒RPR[19]⇒CTT2次側com相<br>
RPRは19⇒20に向かって電圧と同位相の電流が流れたときに動作する。<br><br>

電圧印加はVTT２次側から<br>
V(R相-T相) = 110V<br><br>

最小動作電流値の計測<br>
・動作時間=0.1s<br>
・V=110V固定<br>
・位相⇒最大感度角（進み30）<br>
・電流を0Aから徐々に上げる。<br><br>

動作時間測定<br>
・V=110V固定<br>
・動作時間=整定値<br>
・位相=最大感度角（進み30）<br>
・電流を整定値200%⇒0A<br><br>

位相試験<br>
・V=110V固定<br>
・動作時間=0.1s<br>
・電流=整定値200%<br>
・位相 0⇒進み方向<br>
・位相 0⇒遅れ方向<br><br>

整定値と電流値<br>
<img src="images/rpr-hantei1.jpg" style="max-width:800px;"><br>

<h2>判定値</h2>
動作電流値<br>
・0.2%整定時、整定値±１０％<br>
・その他整定時、整定値±５％<br><br>

動作時間<br>
・0.1～0.4s整定時 整定値±２０ｍｓ以内<br>
・0.5～5s整定時 整定値±５％以内<br><br>

位相試験<br>
・遅れ30°±5°<br>
・進み90°±5°<br>
・同位相の入力電圧Vに対して <br><br>

注意点<br>
・動作時間の戻し忘れ<br>
・動作表示LEDの復帰忘れ<br><br>

<?php include("footer.php"); ?>