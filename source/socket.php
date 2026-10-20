<?php include("header.php"); ?>


<h2>パワーリレーとソケットの端子番号</h2>

⇒<a href="https://docs.rs-online.com/285a/A700000007807882.pdf">omron 取扱説明書</a><br><br>

■PYFZ-08<br>
○④①<br>
⑧○⑤<br>
⑫○⑨<br>
⑭⑬○<br><br>

b-a-c<br>
①-⑤-⑨<br>
④-⑧-⑫<br><br>

コイル<br>
⑬-⑭<br><br>

■PYF11A（リレー：MY4N）<br>
<img src="images/my4n.jpg" style="max-width:300px;"><br><br>

○③②①<br>
⑥○⑤④<br>
⑨○⑧⑦<br>
○⑪⑩○<br><br>

b-a-c<br>
①-④-⑦<br>
②-⑤-⑧<br>
③-⑥-⑨<br><br>
コイル
⑩-⑪<br><br>


■PYFZ-14<br>
使用例：omron MY2Vタイマー<br>
○③②①<br>
⑧⑦⑥⑤<br>
⑫⑪⑩⑨<br>
④⑭⑬○<br><br>

b-a-c<br>
①-⑤-⑨<br>
②-⑥-⑩<br>
③-⑦-⑪<br>
④-⑧-⑫<br>
コイル：⑬-⑭<br><br>


■MY2V（omronタイマー）<br>
<img src="images/socket_5.png" style="max-width:200px;"><br>

<h2>番号を覚えておくメリット</h2>

パワーリレーと保護継電器の関係<br>
・RPRやUVRなど、保護継電器のa接点が閉路<br>
・パワーリレーのコイルに電圧印加<br>
・パワーリレーの接点が動作<br><br>

この場合、保護継電器の配線を外さずにパワーリレーの動作で信号をとる。<br>
また保護継電器の配線を外さずに動作させ、どのパワーリレーが動作したかでチェックもできる。<br>

<?php include("footer.php"); ?>