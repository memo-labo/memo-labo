<?php include("header.php"); ?>
  
<h2>SHG-M10 泰和</h2>
<img src="images/20240629-1.jpg" style="max-width:600px;" /><br>

SHG-M10：受電用DGR<br>
SHG-M20：分岐用DGR<br><br>

電流引き外しOCRとVCBの組み合わせにDGRを併用したい場合に用いる。<br>
これは保護継電器内に「<a href="mgx.php">電流引き外し用補助継電器</a>」が内蔵されているタイプ。<br><br>

<h2>端子</h2>
<img src="images/20240629-2.jpg" style="max-width:700px;" /><br>
・P1/P2⇒VT２次側 AC100V<br>
・S1/S2⇒MCCB２次側 AC100V<br>
・S0⇒配線なし<br>
・o1⇒OCR[T1T]<br>
・o2⇒OCR[C2T2T]<br>
・T1⇒VCB[TC]<br>
・T2⇒VCB[TC]<br>
・M⇒SHG-M20[M]<br>
・N⇒SHG-M20[N]<br>

<h2>ZPD-1</h2>
<img src="images/shg1.jpg" style="max-width:500px;" /><br>

①高圧側の３相短絡させて高圧側とアース間にV0を印加した場合<br>
・整定値5%⇒190V±20%で動作<br>
<br>
②エポキシ碍子「ZPD-1」の試験端子TにV0を印加した場合<br>
・整定値5%⇒570V±20%で動作する<br>
・①の試験電圧の３倍となる<br>
・T端子から試験する場合、整定5%のみとする（印加する電圧が大きくなるため）<br>
・T端子には10%整定x130%以上（=1143✕1.30=1485V）の電圧は印加してはならない。<br>

<h2>注意点</h2>

停電前に試験押ボタンを押した後の反応でわかること<br>
・動作表示（ターゲット）が動いた⇒制御電源P1P2に電圧は印加されておりDGRも正常に動作<br>
・VCBが開放⇒S1S2に電圧は印加されておりVCB引き外しも正常に動作<br><br>


<?php include("footer.php"); ?>