  <?php include("header.php"); ?>
  
<h2>LIG-2（光商工）</h2>

LIG-2：Igr・I0r 切替形絶縁状態監視装置<br>
LNV-1B：絶縁監視電圧装置<br><br>

負荷設備の稼働で強いノイズが発生するとIgr方式の重畳信号や検出信号に影響を与える。<br>
正常に絶縁監視を行えなくなる場合がある。<br><br>

Igr方式からI0r方式へ切替えると絶縁監視の空白状態をなくすことができる。<br><br>

検出方式の切替え方法<br>
・動作時間切替えスイッチをIgr方式側からI0r方式側へ。<br>
・その後、復帰スイッチを押す。<br><br>

<img src="images/igr_lig2_1.png" style="max-width:300px;"><br>
※つまみ切替後は必ず復帰スイッチを押す。<br><br>

「表示切替」スイッチ<br>
Igr、I0r、I0の現在値、最大値を表示できる。<br>
Igr方式 切替時［AUTO］→［Igr］→［IgrMAX］→［I0］→［I0MAX］<br>
I0r方式 切替時［AUTO］→［I0r］→［I0rMAX］→［I0］→［I0MAX］<br><br>

「試験」スイッチ<br>
絶縁、漏電機能の動作確認を行う。<br>
動作表示灯が点灯されるまで押し続ける。<br>
異常の場合はエラー番号を表示する。<br>
<img src="images/igr_lig2_2.jpg" style="max-width:600px;"><br><br>

「試験トリップ」有／無<br>
無⇒試験スイッチを押しても警報接点は動作しない。<br>



<h2>LIG-2 裏面端子</h2>
<img src="images/igr_lig2_3.png" style="max-width:200px;"><br><br>
P1-P2：制御電源（AC100V）<br>
a1-c12：異常警報接点<br>
a2-c12：絶縁警報接点<br>
a3-c3：漏電警報接点<br>
Z1-Z2：ZCTのk-l<br>
S1-S2：ZCTのkt-lt<br><br>

LIG-2は微少なIgr電流検出を行う。<br>
ZCT一次側に一定の大きさの信号を常時印加している。<br>
ZCT二次出力をIgr値の補正のための比較値として使用している。<br>
S1-S2端子はその補正信号を常時ZCTに出力する端子である。<br>
補正信号は、位相補正にも使用されている。<br>
なので極性を間違えると正常に動作しない。<br>
配線の極性：S1→kt、S2→lt<br><br>


<?php include("footer.php"); ?>