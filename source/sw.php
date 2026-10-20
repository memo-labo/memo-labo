<?php include("header.php"); ?>

<h2>片切スイッチ</h2>
ぱっと見の外観は両切スイッチと区別がつかない。<br>
側面の緑色の部分に「B」と書かれている。<br>
<img src="images/sw1.jpg" style="max-width:300px;"><br>
<img src="images/sw1.svg" style="max-width:300px;"><br><br>

壁付き片切スイッチの配線図<br>
天井から内壁にVVF1.6-2Cを１本垂らす。<br>
<img src="images/sw3.jpg" style="max-width:600px;"><br>

製品例<br>
パナソニック(Panasonic)<br>
埋込スイッチB（片切）<br><br>

回路方式B（片切）<br>
型番：WN5001<br>
価格：375円（Amazon）<br>
定格電圧(V)：300<br>
定格電流(A)：15<br><br>

開閉可能回数<br>
流れている負荷電流に応じて連続開閉可能回数が変化する。<br><br>

片切スイッチのデメリット<br>
コンセントプラグを反対にして差し込むと、電源のL側が負荷側のN側となる。<br>
その場合、スイッチをOFFにしても負荷に常に電圧が印加された状態となる。<br>
その場合、常時負荷に漏れ電流が流れる可能性や器具交換の際に感電するおそれ。<br>

<h2>ほたるスイッチとパイロットスイッチの違い</h2>
ほたるスイッチ<br>
スイッチをOFFにすると緑色のLEDランプが点灯して暗闇でもスイッチ位置がわかる。<br>
スイッチをONにすると緑色のLEDランプが消灯する。<br><br>
<img src="images/sw2.svg" style="max-width:300px;"><br><br>

パイロットスイッチ<br>
スイッチがONの時に赤のLEDが点灯する。<br>
スイッチがOFFの時にはLEDは消灯する。<br><br>
<img src="images/sw3.svg" style="max-width:300px;"><br>

<h2>両切スイッチ</h2>
ぱっと見の外観は片切スイッチと区別がつかない。<br>
側面の緑色の部分に「D 両切」と書かれている。<br>
<img src="images/sw5.jpg" style="max-width:300px;"><br><br>
<img src="images/sw4.svg" style="max-width:300px;"><br><br>

壁付き両切りスイッチの配線図<br>
<img src="images/sw4.jpg" style="max-width:600px;"><br>

天井から内壁にVVF1.6-2Cを２本垂らす。<br>
値段はざっくりVVF1.6-2Cの場合、1m150円。<br>
天井からコンセントの高さまで約1m。<br>
するとコンセント１個につきVVFケーブル代が片切と両切で300円ほど差がある。<br>
スイッチ本体の値段も300円ほど差がある。<br><br>

回路方式D（両切）<br>
型番：WN5003<br>
価格：672円（Amazon）<br>
定格電圧(V)：300<br>
定格電流(A)：15<br>
適合法規：電気用品安全法（特定電気用品）<br>
結線方式：ねじなし端子式（電線差し込み方式）<br><br>

開閉性能<br>
<ul>
	<li>15 A 300 V 負荷の力率約0.6 開閉の割合約20 回／分 連続10000 回
	<li>22.5 A 300 V 負荷の力率約0.6 開閉の割合6 回～10 回／分 連続 100 回
	<li>15 A 100 V～105 V 白熱電球負荷 2 秒間点灯20 秒間以上消灯 連続 100 回
</ul>

<h2>両切スイッチを使う理由</h2>
200V系は接地相がない場合があり、スイッチを切っても負荷に高電圧が印可される可能性。<br>
そのため200V系では両切りスイッチを使うことになっている。<br>
スイッチを切れば負荷は完全に絶縁されるので片切スイッチより安全。<br>
コンセントプラグを反対にして差しても両切なので片切のような心配がない。<br><br>

両切スイッチの相間短絡事故<br>
200V回路の照明で使うものなのでSW端子間の線間絶縁抵抗が低下すると短絡のおそれ。<br>

<h2>スイッチ取り付け位置の注意</h2>
スイッチは接地されていない相に接続する。<br>
日本の場合、ニュートラル(N)が接地されているので、ライブ(L)の方にスイッチを接続する。<br>

<h2>参考資料</h2>
<a href="https://www2.panasonic.biz/scdw/a2A/Viewer?HINB=WN5003&MEI_SYUBETU=%E5%95%86%E5%93%81%E4%BB%95%E6%A7%98%E6%9B%B8&MEI_CTS_SYUBETU=shiyosyo&MEI_SIRYO=%E3%83%95%E3%83%AB%E3%82%AB%E3%83%A9%E3%83%BC%E5%9F%8B%E8%BE%BC%E3%82%B9%E3%82%A4%E3%83%83%E3%83%81%EF%BC%A4&URL_SITEI=%2Fideacontout%2F2014%2F08%2F05%2F2014080500030357.PDF&EDIT_FLG=0&INTER_OPEN_FLG=0">商品仕様書[PDF]</a><br>

<?php include("footer.php"); ?>