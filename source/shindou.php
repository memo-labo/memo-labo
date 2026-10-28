<?php include("header.php"); ?>

<h2>VCB連動試験で使う振動センサーとは？</h2>

<p>VCBが開放したときの機械的な衝撃・振動を検出し、試験器へ接点信号を返す補助器具です。</p>

<p><strong>振動センサーが確認できるのは「VCB付近で衝撃が発生したこと」であり、OCR・DGRなどの接点動作やトリップ回路そのものを直接確認しているわけではありません。</strong></p>

<h2>市販の振動センサー</h2>

<img src="images/shindou1.jpg" style="max-width:200px;" alt="VCB連動試験用振動センサー"><br>

<p>メーカー販売品「G・TRIP」など、VCB連動動作時の衝撃を接点信号として取り出す製品があります。</p>

<ul>
  <li>VCBが実際に機械動作したことを補助的に検出できる</li>
  <li>リレー単体の接点動作だけでは反応しない</li>
  <li>設置位置や感度によって反応が変わるため、事前確認が必要</li>
</ul>

<h2>振動・傾斜スイッチを使った簡易センサー</h2>

<img src="images/shindou2.jpg" style="max-width:300px;" alt="簡易振動センサー"><br>
<img src="images/shindou1.png" style="max-width:400px;" alt="振動スイッチの構造例"><br>

<p>機械式の振動・傾斜スイッチは、内部の金属球などが動くことで接点状態が変化します。</p>

<p>安価な部品でも振動検出自体は可能ですが、衝撃時に接点が細かくON/OFFする<strong>チャタリング</strong>が発生することがあります。</p>

<p>また、端子強度・絶縁・ケース固定・接点容量・試験器との適合などを確認せず使用すると、誤検出や接触不良の原因になります。</p>

<h2>正式な連動試験との違い</h2>

<p>OCR・DGRなどの連動試験では、本来は次の一連の動作を確認します。</p>

<ol>
  <li>保護継電器が動作する</li>
  <li>出力接点が切り替わる</li>
  <li>トリップ回路が成立する</li>
  <li>VCBの引き外しコイルが動作する</li>
  <li>VCBが実際に開放する</li>
</ol>

<p>振動センサーは最後の「VCBが動いた」という確認を取りやすくする補助器具です。<strong>振動センサーだけを根拠に、保護回路全体が正常と判定しない</strong>ようにします。</p>

<h2>使用時の確認ポイント</h2>

<ul>
  <li>試験前にセンサー単体の動作を確認する</li>
  <li>VCBの振動を確実に拾える位置へ固定する</li>
  <li>周囲機器の振動で誤検出しないか確認する</li>
  <li>接点チャタリングで試験器が誤停止しないか確認する</li>
  <li>可能ならVCB補助接点や正式なトリップ信号と併用する</li>
</ul>

<h2>参考例</h2>

<p>振動・傾斜スイッチを利用した自作例もありますが、現場で使用する場合は試験器・対象設備への影響を確認し、あくまで補助的な確認器具として扱います。</p>

<ul>
  <li><a href="https://akizukidenshi.com/catalog/g/gP-02349/" rel="noopener">振動（傾斜）スイッチの例</a></li>
  <li><a href="https://x.com/mf06bike/status/1878043840608972936" rel="noopener">自作例①</a></li>
  <li><a href="https://x.com/kddenki/status/1859146016030855451" rel="noopener">自作例②</a></li>
  <li><a href="https://x.com/hiyokkodenki/status/1926828571231727850" rel="noopener">自作例③</a></li>
</ul>

<?php include("footer.php"); ?>