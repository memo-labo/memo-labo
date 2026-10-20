<?php include("header.php"); ?>

<h2>OCRとリセットスイッチのシーケンス</h2>
<img src="images/se2_2.png" style="max-width:700px;"><br>

OCR動作時<br>
OCR a接点が閉路によりOL点灯 AND 51Xリレー動作により51X閉路で自己保持回路形成<br><br>

リセットボタンON時<br>
RESET SW b接点をボタンを押して開路<br>
51Xリレー停止により51X接点が開路、自己保持終了、OL消灯。<br>

<h2>OCRとリセットスイッチの構成</h2>
30X（機器状態表示・故障表示装置）がリレーON状態ではVCBの投入ができない。<br>
リセットボタンONで自己保持解除、30XをOFFにしたあと、CS入操作にてVCB投入可能。<br>
89Xリレーがあることで、DS入状態でなければVCBの投入操作ができない（インターロック）<br>
逆にVCB切には何も制限がないのでCS切操作でVCB遮断可能。<br>
<img src="images/se2_3.png" style="max-width:700px;"><br>
<img src="images/se2_4.png" style="max-width:700px;"><br>


<h2>30X（機器状態表示・故障表示装置）</h2>
30X（機器状態表示・故障表示装置）リレーON状態ではVCBの投入ができない。<br>
リセットボタンで自己保持解除、30XをOFF、CSを入操作でVCB投入可能。<br>
<img src="images/se3_1.jpg" style="max-width:700px;"><br>
<img src="images/se3_2.jpg" style="max-width:700px;"><br>


<h2>OCRやDGRとVCBシーケンス制御</h2>
<img src="images/se3_3.jpg" style="max-width:700px;"><br>
<img src="images/se3_4.jpg" style="max-width:700px;"><br>
VCB切回路はOCRやDGRが動作することでもVCBが遮断される。<br><br>

ただし、<br>
・制御電源がOFF<br>
・直流電源盤よりDC電圧が正しく供給されていない<br>
・保護継電器の内部接点端子に動作不具合<br>
・保護継電器の端子から離線された状態<br><br>

この場合は継電器が動作してもVCBは遮断されない。<br>


<h2>VCBフィーダーと受電盤UVRのシーケンス制御</h2>
VCBフィーダーF1と受電盤UVR動作によるF1 51遮断までの展開図<br>

<img src="images/se3_6.jpg" style="max-width:700px;"><br>
<img src="images/se3_5.jpg" style="max-width:700px;"><br>

①受電盤27Rが停電にて27XRリレー動作<br>
②F1のCOSが「自動」選択状態かつF1の52が入状態でF1の5Tリレー動作<br>
③5Tタイマー設定時間経過によりF1 5Xリレーが動作<br>
④F1 5Xリレー動作によりF1 52 開放<br>

<?php include("footer.php"); ?>