<?php include("header.php"); ?>

<h2>低圧LCユニットとは？</h2>

⇒<a href="https://www.nichicon.co.jp/wp-content/uploads/069.pdf">取扱説明書（乾式タイプ低圧LCユニット）</a><br><br>

低圧リアクトルと低圧コンデンサをセットにしたもの。<br>
<img src="images/lc2.jpg" style="max-width:350px;" /><br>
<img src="images/lc1.jpg" style="max-width:350px;" /><br><br>

乾式タイプ低圧LCユニットとは？<br>
・火災に対しても安全性が高い<br>
・乾式モールド形コンデンサ<br>
・H種乾式品の直列リアクトル<br>

<h2>低圧LCユニットの配置・単線結線図・内部回路</h2>
<img src="images/lc3.png" style="max-width:450px;" /><br>
動力負荷と並列に接続されブレーカーで切り分けることが出来る。<br><br>

<h2>内部回路</h2>
<img src="images/lc5.png" style="max-width:350px;" /><br>
RS間、ST間は放電抵抗で繋がっている。<br>
なので絶縁抵抗を測定する際は１相だけ測定すればOK。<br>

<h2>コンデンサを低圧側に設置した場合</h2>

低圧側の力率が改善されて皮相電流が減る。<br>
変圧器容量に余力が生じ、配電線路での損失が減る。<br>
自構内で発生する高調波電流を低圧進相コンデンサ設備が吸収する。<br>
そのため配電系統への高調波電流の流出を抑制できる。<br>
各変圧器毎に設けなければならないので高圧側設置に比べて費用がかかる。<br>
高圧側の配電系統から流入する高調波電流を、受電用変圧器の漏れインピーダンスが防波堤となり、高調波電流の流入を防ぎ、低圧進相コンデンサ設備を高調波障害から守る。<br>

<h2>コンデンサを高圧側に設置した場合</h2>
変圧器容量の低減効果は無い。<br>
損失の低減効果も微々たるものしか無い。<br>

<h2>LCユニットと警報回路</h2>

LC異常<br>
↓<br>
LC内部a接点動作<br>
↓<br>
リレーX1動作<br>
↓<br>
RS（b接点ボタンのリセットスイッチ）とX1のa接点を介してX1自己保持<br>
↓<br>
RS押すと開路で自己保持解除<br>
↓<br>
X1が自己保持<br>
↓<br>
回路：AC105V⇒X1のa接点⇒X2とOLにパラ⇒AC105V<br>
↓<br>
X2動作＋OL点灯<br>
↓<br>
X2のa接点を介してLC用MCCBのSHT（電圧引き外し装置）が動作しMCCB開放<br>
↓<br>
BZ回路：AC105V⇒X2のa接点⇒BZ⇒AC105V<br>
↓<br>
ブザー音が鳴る（X1の自己保持がRSによって解除されるまで）<br>

<?php include("footer.php"); ?>