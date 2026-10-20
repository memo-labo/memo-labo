<?php include("header.php"); ?>

<h2>RPR 逆電力継電器 ロック機能</h2>

リレーロックD/I機能を使用する場合は端子間に電圧を印加する。<br>
<img src="images/rpr_mi1.png" alt=""><br>

<!--
<img src="images/rpr_mi2.png" alt=""><br><br>
-->

ロック解除時間の設定<br>
リレーロック機能を使用しない場合はロック解除時間を「0」にしておく。<br>
<img src="images/rpr_lock1.jpg" style="max-width:400px;" /><br>


<h2>リレーロックＤ／Ｉ機能の試験方法</h2>

逆電力要素が動作する入力を印加した状態にする。<br>
スイッチを閉から開にする。<br>
ロック解除時間の設定値まではリレーがロックし、その後リレーが動作する。<br><br>

地絡過電圧要素<br>
＋０７－０５<br><br>

逆電力要素<br>
＋０８－０５<br><br>

逆電力継電器にリレーロックＤ／Ｉ機能を設定する場合の配線図<br>
<img src="images/20211226-2.png" style="max-width:300px;" alt=""><br><br>

<?php include("footer.php"); ?>