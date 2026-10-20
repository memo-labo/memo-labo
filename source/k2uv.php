  <?php include("header.php"); ?>

<h2>omron K2UV</h2>

<a href="https://www.fa.omron.co.jp/data_pdf/cat/k2ov_k2uv_ds_j_1_12.pdf?id=3663">取扱説明書</a><br><br>

■制御電源の違い<br>
・K2UV-AVN（入力と共用）<br>
・K2UV-AV2（DC24V）<br>
・K2UV-AV3（DC100/110V）<br><br>

Ta-Tb-Tc接点<br>
・トリップ用接点<br>
<br>
a-b-c<br>
・警報用接点<br><br>

■制御電源が必要なタイプ<br>
制御電源を印加しないとP1P2に電圧を入れて試験しても反応しない。<br>
制御電源はDC24とDC100があり、直流ブレーカーから来ている。<br><br>

<img src="images/k2uv-1.png" style="max-width:600px;" /><br><br>

■制御電源をP1P2とは別に直流でS1S2からとるメリットとは？<br>
停電してP1P2が無電圧になっても直流電源盤からS1S2に電源供給することで、自己診断機能や事故履歴の表示が確認できる。<br>

<?php include("footer.php"); ?>