<?php include("header.php"); ?>

<h2>ZCTとケーブルシース接地の考え方</h2>
ZCTで地絡電流を正しく検出するには、ケーブルシースの接地線をどの向きでZCTに通すか、どこで接地するかが重要。<br>
シース接地の位置によって、ケーブル区間の地絡を保護対象に含めるかどうかが変わる。<br>

<h2>シースアースを主変ZCTのkからlへ通して接地</h2>
この場合、主変電所からサブ変電所までのケーブル地絡も、サブ変電所内の設備地絡も保護対象になる。<br>
<img src="images/shield1.png" alt="シースアースをZCTに通す例"><br>

<h2>主変側では非接地、サブ変側でシース接地</h2>
主変側でシースを接地せず、サブ変電所側で接地する構成。<br>
<img src="images/zct_1.svg" style="max-width:800px;" alt="サブ変側シース接地"><br>

<h2>シースアースを主変ZCTに通さない場合</h2>
ZCTが受電盤内にあり、シースアースをZCTへ通さず接地した場合、サブ変電所内設備の地絡は検出できても、送りケーブルの地絡は検出対象外になる場合がある。<br>
ケーブル地絡電流がZCT内を往復し、差し引きゼロになるため。<br>
<img src="images/shield3.png" style="max-width:600px;" alt="シースアースをZCTに通さない例"><br>

<h2>サブ変電所にDGRを設置する場合</h2>
サブ変電所内の地絡でサブ変側CBだけを開放し、主変側UGS・PASなどは開放させたくない場合がある。<br>
このような選択遮断を目的として、ケーブル地絡をサブ変DGRの検出対象から外すようシース接地を構成する例がある。<br><br>

<img src="images/20260327-1.jpg" style="max-width:600px;" alt="サブ変DGRとシース接地"><br>

<h2>ZCTとケーブルシースアースの施工不良</h2>
<img src="images/20210926.jpg" style="max-width:400px;" alt="シースアース施工不良"><br>

送りケーブルのシースをブラケットで接地した後にZCTへ通すなど、多点接地になっている例。<br>
この状態では、ZCTが地絡電流を正しく検出できなかったり、迷走電流の影響を受ける可能性がある。<br>

<h2>正しいまとめ方の例</h2>
<img src="images/shield1.svg" style="max-width:400px;" alt="シースアースの正しいまとめ方"><br>

・3本のシース接地線を1本にまとめる<br>
・接続部は筐体から絶縁する<br>
・まとめた1線をZCTへ通す<br>
・ZCT通過後にブラケットアースへ接地する<br>

<h2>よくある施工ミス</h2>
<strong>ZCTを通さず接地</strong><br>
<img src="images/20210927-1.png" style="max-width:400px;" alt="ZCTを通さず接地"><br>
ケーブルシースアースがZCTを通らず、直接ブラケットへ接地されている。<br><br>

<strong>ZCTを通す向きが逆</strong><br>
<img src="images/20210927-2.png" style="max-width:400px;" alt="ZCTの通し方向が逆"><br>
シース接地線のZCT通過方向が逆になっている。<br><br>

<strong>接地されていない</strong><br>
<img src="images/20210927-3.png" style="max-width:400px;" alt="シース接地未接続"><br>
ZCTの通し方は正しくても、接地点が実際には接地されていない例。<br>

<h2>点検時の確認ポイント</h2>
・シース接地線がZCTを通っているか<br>
・通す方向が設計どおりか<br>
・接地線が途中で筐体へ接触して多点接地になっていないか<br>
・接地点が確実に接地されているか<br>
・どの区間までを地絡保護対象にする設計か<br>

<?php include("footer.php"); ?>