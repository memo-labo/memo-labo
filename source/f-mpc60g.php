<?php include("header.php"); ?>
  
<h2>富士電機 F-MPC60G</h2>

外観<br>
<img src="images/1654935253.png" style="max-width:500px;" alt=""><br>

正面画像<br>
<img src="images/f-mpc60g-1.png" style="max-width:500px;" alt=""><br>

POWERランプ [緑] 点灯で制御電源正常<br>
RUNランプ [緑] 点灯で正常運転<br>
ERRORランプ [橙] 点灯で装置故障<br>
TRIPランプ [赤] 保護検出でフリッカ、保護動作で点灯<br><br>

CB-CLOSEランプ [赤] 遮断器投入時に点灯<br>
CB-CLOSEスイッチ [赤] 遮断器投入操作スイッチ<br><br>

CB-OPENランプ [緑] 遮断器開放時に点灯<br>
CB-OPENスイッチ [緑] 遮断器開放操作スイッチ<br><br>

<h2>裏面端子</h2>
<img src="images/1654936718.png" style="max-width:800px;" alt=""><br>

A端子<br>
<img src="images/1654947601.png" style="max-width:200px;" alt=""><br>

B端子<br>
<img src="images/1654947638.png" style="max-width:300px;" alt=""><br>

<h2>CTT端子</h2>
<img src="images/1654948768.png" style="max-width:500px;" alt=""><br>

<h2>ZVT（零相基準入力装置）の配置</h2>
フィーダーにはMNでわたり接続する。<br>
F-MPC60G（受電）<br>
ZPD-1よりの零相電圧信号を受け、整定の67DG電圧整定値のレベル以上だった場合。<br>
即座に位相パルス信号としてMN出力を端子台Aの端子4と6から出力する。<br>

<img src="images/1654993798.png" style="max-width:900px;" alt=""><br>

ZPD-1は2007年6月で生産中止。<br>
しかし、F-MPC60Gに対してZPD-1を使用している設備も存在する。<br>
またZPD-1が製造後15年経過している場合はZPD-2への更新が推奨される（メーカー取説より）<br>
⇒<a href="zpd2.php">富士電機 ZPD-1 詳細</a><br>

<h2>試験方法</h2>

動作値<br>
入力端子に信号を印加して、徐々に変化させる。<br>
LCD画面に「Pick up 表示」または「Trip LED点滅表示」を開始した値が動作値。<br>
短時間動作形の場合、LCD画面に事故表示した値、またはトリップ（警報）出力した値が動作値。<br>



<?php include("footer.php"); ?>