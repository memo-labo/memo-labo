<?php include("header.php"); ?>
  
<h2>三菱 マルチリレー「MP11A」</h2>

<img src="images/20260904-1.jpg" style="max-width:800px;" alt=""><br>
<img src="images/20260904-3.jpg" style="max-width:800px;" alt=""><br>

メリット<br>
・省スペース化<br>
・保護機能、メータなどの計測、遮断器の制御などを１台に集約<br>
・設計、施工などの工数を減らせる<br><br>

機種記号（機種により保護機能が異なる）<br>
・AR<br>
・AF<br>
・BR<br>
・BF<br>
・CB<br>
・FR<br>
・FF<br><br>


<h2>裏面の端子配置</h2>
<img src="images/20260904-2.jpg" style="max-width:800px;" alt=""><br>
<img src="images/mp11a-1.png" alt=""><br>

VT２次側（R相・接地相・T相）⇒MP11A（P1-P2-P3）<br>
CT２次側 R相k⇒C1+<br>
CT２次側 T相k⇒C3+<br>
CT２次側 接地相⇒C1,C3<br><br>

ZCT k⇒Z1+<br>
ZCT l⇒Z2<br>
MP11A のZ2端子とY2端子は内部で短絡されている。<br>
ZPDのY2端子側で接地するのでZCTの二次側のZ2端子は接地しない。<br><br>

ZPD/EVT(V0)⇒Y1(a),Y2+(f) ※Y2が接地側<br>
（EVTの時はG-T1にて7Vに降圧）<br>
G-T1：EVT変換拡張ユニット<br>
Y1-Y2、a-f配線⇒ツイストシールド線のシールドは接地する。<br><br>

A0 入力がない場合はZ1,Z2 間を短絡する。<br>
V0 入力がない場合はY1,Y2 間を短絡する。<br><br>

<h2 id="seitei">整定値の確認と変更（設定確認モード）</h2>

■確認方法<br>
通常モード状態で[SET]を2秒押すと設定確認モードへ<br>
設定確認モード状態で▲▼ボタンで項目切り替え<br>
設定確認モード状態で[SET]を2秒押すと通常モードへ戻る<br><br>

■変更方法<br>
通常モード状態で[SET]を2秒押すと設定確認モードへ<br>
設定確認モード状態で▲▼ボタンで項目切り替え<br>
変更したい項目で＜ ＞ボタンで整定値を変更<br>
[SET]を2秒押すと確定され通常モードに戻る<br>

<h2>OCR 試験方法</h2>

制御電源<br>
・DC75～260V<br>
・AC85～250V<br><br>

TRIP接点<br>
TRIP接点番号はMP11Aの側部にある3A3と3B3。<br>
TRIP接点の出力部はコネクタ方式となっている。<br>
設定変更モードでLOCK、UNLOCKが選択可能。<br>
LOCK：TRIP接点が動作しない。<br>
UNLOCK:TRIP接点が動作する。<br><br>

50（OCR 瞬時要素）<br>
動作電流整定：100%=5Aとして整定<br>
200%[10A]～1600%[80A]の間で整定可能<br><br>

例<br>
瞬時40Aの時、800%と表示されている。<br>
瞬時要素の試験をする際、40A⇒10A[200%]に変更して試験を行う。<br>
瞬時要素の試験を終了したら、10A⇒40A[800%]に戻す。<br>

<img src="images/mp11a4.png" style="max-width:400px;" alt=""><br>

51（OCR 限時要素）<br>
動作電流整定：100%=5Aとして整定<br>
20%[1A]～240%[12A]で整定可能<br>
（例：限時電流タップを4Aにしたい場合⇒80%）<br><br>

ロック機能<br>
計測モードで[RESET]と[TEST]を同時に押している間は保護機能が働かない。<br>
これはOCRの試験電流整定の際、CTTに電流を流して整定する場合に使う？<br>

<?php include("footer.php"); ?>