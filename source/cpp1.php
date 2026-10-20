  <?php include("header.php"); ?>

<h2>CPP1-A マルチリレー</h2>

ユニット引出できて、別の場所に持っていって単体試験が可能。<br>
ユニット引出時にＣＴ回路を短絡する機構を内蔵している。<br><br>

操作<br>
・制御電源を入れる<br>
・整定／中止スイッチを押すと整定モードに<br>
・その状態でUPまたはDOWNで整定番号を選択<br>
・例えばOVGRの動作電圧の整定値を確認したい場合、511に合わせるとVoの%が表示される。<br>
・変更したい場合、選択/書込ボタンを押してUP・DOWNで値を変更し、再度選択/書込ボタンを押す。<br>
・最後に運用/実行ボタンを押して値を決定する。<br><br>

試験終了後<br>
・復帰ボタンを押して表示をリセットさせる<br>
・整定値をすべて確認し試験前の状態と間違いがないかチェック<br><br>

<h2>配線</h2>

<img src="images/dsr3.png" style="max-width:800px;"><br>

A列<br>
制御電源 = A-01,A-03<br>
IA = A-17(l),A-18(k)<br>
IB = A-19(l),A-20(k)<br>
IC = A-21(l),A-22(k)<br>
VA = A-13<br>
VB = A-14<br>
VC = A-15<br>
V0 = A-11,A-12<br><br>

B列C列は主に出力接点<br><br>


<h2>UFR周波数低下、OFR周波数上昇</h2>

VA（A-13）とVB（A-14）に35V以上の電圧を印加する。<br>
接点⇒C-17とC-18またはC-19とC-20<br>
⇒<a href="fr.php">UFRとOFRの試験方法はこちら</a><br>

<h2>DSR試験方法</h2>
<img src="images/dsr5.png" style="max-width:800px;"><br>
通常状態はA-18（k）⇒A-17（l）に電流が流れる。<br>
DSR動作時（単相試験時）は、VA⇒V、VB=Eのとき、A-17⇒Lt、A-18⇒Ktを接続する<br><br>

R相試験時の配線<br>
・VB(A-14)⇒V<br>
・VC(A-15)⇒E<br>
・CTのl（A-17）⇒Lt<br>
・CTのk（A-18）⇒Kt<br><br>

S相試験時の配線<br>
・VC(A-15)⇒V<br>
・VA(A-13)⇒E<br>
・CTのl（A-19）⇒Lt<br>
・CTのk（A-20）⇒Kt<br><br>

T相試験時の配線<br>
・VC(A-13)⇒V<br>
・VA(A-14)⇒E<br>
・CTのl（A-20）⇒Lt<br>
・CTのk（A-18）⇒Kt<br><br>

動作電流値<br>
動作時間整定値：最小<br>
UV 要素をNO USE に設定<br>
電圧入力：定格電圧<br>
電流位相：最高感度角方向（0°）<br>
電流を0から徐々に上げていく<br>
判定方法：動作電流整定値±５％<br><br>

動作時間<br>
DS 用UV 整定：NO USE<br>
電圧入力：定格電圧<br>
電流入力：０→整定値×200％<br>
電流位相：最高感度角方向<br>
判定方法：整定値±２０ms 又は±５％の大きい方<br><br>

位相試験<br>
DS 用UV 整定：NO USE<br>
電圧入力：定格電圧<br>
電流入力：整定値×200％<br>
判定方法：VとIは同位相を基準0°にして動作域が進み55±5～遅れ55±5の範囲内であれば良<br>

<img src="images/dsr6.png" style="max-width:400px;"><br>

<h2>OVGR試験方法</h2>

Vo印加<br>
①T-E間⇒100%で381V<br>
②高圧母線３相短絡一括とアース間⇒100%で3810V<br>
③A-12とA-11の間⇒100%で7V<br>
※①②③で動作電圧の値が違うことに注意<br>
③を選択する理由はユニットを引き抜いて継電器に直接電圧を印加するため<br>


<?php include("footer.php"); ?>