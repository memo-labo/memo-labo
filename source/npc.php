<?php include("header.php"); ?>

<h2>K2ZC-K2RV-NPC</h2>

<img src="images/npc1.jpg" style="max-width:600px;"><br>
<img src="images/npc2.png" style="max-width:800px;"><br>
<img src="images/npc3.jpg" style="max-width:800px;"><br>
<img src="images/npc4.png" style="max-width:600px;"><br>


電圧と電流を同位相

<h2>試験方法の配線方法</h2>

三菱 CRV1-A01と同じ<br>
（正相かつCTがR相検出の場合）<br><br>
V⇒VTT P1<br>
E⇒VTT P3<br>
Kt⇒CTT R相<br>
Lt⇒CTT com相<br><br>

信号線<br>
・OVGR試験時（自動）⇒a1とc1-2<br>
・OVGR試験時（手動）⇒a2とc1-2<br>
・RPR試験時⇒a3とc3<br>

<h2>最小動作電流値と許容値</h2>
<img src="images/npc5.png" style="max-width:500px;"><br>

<h2>動作時間</h2>
進み30度、電流を0→ 200％の電流を流して測定。<br>
許容値は整定値の±5%（最少誤差±50ms）<br>

<h2>位相試験</h2>
<img src="images/npc6.png" style="max-width:500px;"><br>
試験電流：整定値の動作電流値×200%<br><br>

許容値<br>
進み：150±10°<br>
遅れ：90±10°<br>

<?php include("footer.php"); ?>