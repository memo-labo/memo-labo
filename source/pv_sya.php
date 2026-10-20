  <?php include("header.php"); ?>

<h2>太陽光の使用前自己確認「負荷遮断試験」</h2>

参考：<a href="https://www.hioki.co.jp/file/cmw/userguides/4745/pdf/?action=browser&log=0&lang=jp">HIOKI 太陽光使⽤前⾃⼰確認の⽅法 負荷遮断試験</a><br><br>

設置者による技術基準適合性確認の義務。<br>
発電設備出力の1/4、2/4、3/4、4/4、合計４つの負荷運転状態から負荷遮断。<br>
異常ないことを確認する。<br><br>

使用機器の例<br>
HIOKI PQ3100 電源品質アナライザ <a href="https://www.hioki.co.jp/file/cmw/hdInstructionManual/94694/pdf/?action=browser&log=1">取扱説明書</a><br>
価格：楽天市場で約33万円<br><br>

発電電圧について過渡変化を記録できる測定器が必要。<br>
電圧が負荷遮断前の値の5%を下回るまでの時間を計測。<br><br>
■負荷遮断試験でPASが爆発（<a href="https://twitter.com/ELECTRICDADDY/status/1631285366727606273">Twitterより引用</a>）<br><br>

太陽光発電中、PAS開放によりPASが爆発、又はPAS主回路の開極部が溶損する事故が各地で多発。<br><br>

条件<br>
①約1MW以上の出力<br>
②分散型PCS(一定機種)の多台数設置<br>
③晴天日の10時頃～14時頃<br>
①②③合致の場合、手動開放操作でもSOGのGR動作でも事故発生の可能性。<br><br>

事故理由の推察<br>
PCSのFRT機能、パワー半導体特有の振動電圧が原因かも？<br>
PAS開放時、線間電圧の波形が１万4000ボルト近くまで上がっていたらしい。<br><br>

Twitterフォロワー様情報より<br>
関東東北産業保安監督部電力安全課に確認。<br>
負荷遮断試験はVCBで開放して構わない、とのこと。<br>
⇒<a href="https://twitter.com/ELECTRICDADDY/status/1644445245118251008">引用元</a><br>


<?php include("footer.php"); ?>