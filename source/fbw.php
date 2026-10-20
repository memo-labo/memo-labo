<?php include("header.php"); ?>

<h2>直流電源装置 FBW1207C 富士電工</h2>
システム構成図（取扱説明書 参考）<br>
AC停電時でも無瞬断にて内蔵蓄電池より負荷に給電することができる。<br>
<img src="images/fbw1.svg" style="max-width:800px;" /><br><br>
図では省略したが、交流入力とスイッチング整流回路の間にTF（温度ヒューズ）⇒THS⇒FANがある。<br>
THSは蓄電池の温度上昇を検出するセンサーで、その動作に合わせてFANを回して熱を逃がす。<br><br>

パイロットランプのRL（故障）の詳細<br>
・MCBトリップ<br>
・スイッチング異常<br>
・蓄電池不足電圧<br>
・ヒューズ断<br>
RL点灯だが故障の内容までは表示されない。<br><br>

出力MCBの上流にはMC（マグネットコンタクタ）がある。<br>
常時ON、停電時ON、蓄電池不足電圧時だけOFFとなる。<br>
過放電を防止するMCらしい。<br><br>

FBW1207C<br>
標準品・自冷・防塵壁かけ型<br><br>

FBW1207C-O<br>
屋外タイプ・風冷・壁かけ型<br><br>

FBW1207C-P<br>
盤組込タイプ・自冷・オープンケース<br><br>

参考・引用<br>
⇒<a href="https://www.fa-mart.co.jp/fuji-denko/01.html">DC100V系 汎用型直流電源装置「FBW1207Cシリーズ」</a><br>

<?php include("footer.php"); ?>