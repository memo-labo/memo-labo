<?php include("header.php"); ?>

<h2>DGR-1000KDと5000KDの比較</h2>

1000KD<br>
<img src="images/1000kd.jpg" style="max-width:800px;"><br><br>

5000KD<br>
<img src="images/5000kd.jpg" style="max-width:800px;"><br><br>

■値段の違い<br>
5000KD：448,000円（税別）<br>
1000KD：247,500円（税別）<br>
5000KDが１つで1000KDを２つ買えてしまう程の価格差。<br>

<h2>試験可能項目の違い</h2>
5000KD<br>
・DGR<br>
・GR<br>
・OVGR<br>
・OVR<br>
・UVR<br>
・RPR<br>
・UPR<br>
・DSR<br><br>

1000KD<br>
・DGR<br>
・GR<br>
・OVGR<br><br>

1000KDでは出来ないもの<br>
OVR、UVR、RPR、UPR、DSR<br>


<h2>補助電源</h2>
5000KD：AC100V/DC24,48,110V 切替可能。<br>
1000KD：AC100V出力しか無い。<br>
※「スイッチング電源 DC24V（約1500円）」などを買えば代用可能。<br>

<h2>電流出力</h2>
5000KD<br>
レンジ：30 / 300mA / 1 / 3 / 5A<br>
分解能：0.01 / 0.1mA / 0.001 / 0.001 / 0.001A<br><br>

1000KD<br>
レンジ：1/2.5A<br>
分解能：0.001/0.01A<br><br>

1000KDでは微小な電流（10mA～100mA）を扱えない。<br>
なので微小な電流を扱うRPR試験、DSR試験、UPR試験が行えない。<br>
※omron RPR整定値が0.25%の時、0.0103A=10.3mA±5%だから、0.01mAの精度が必要。<br><br>

■1000KDでRPRの試験をする方法（Twitterフォロワー様より情報提供頂きました）<br>
<img src="images/1000kd-1.svg" style="max-width:700px;" /><br>
DMM：デジタルマルチメーター？<br>
DMMに流れる電流値がRPRに流れる電流値となる。<br>


<h2>切替試験</h2>
5000KDには切替試験ボタンがついており、電圧・電流調整つまみも２段になっている。<br>
試験ON・OFFボタンと２段になっているつまみを使い、試験電圧・基準電圧の２つを作れる。<br>
この２つの電圧を作れて試験ができるので、OVR、UVR試験が行える。<br>
しかし1000KDにはこの電圧切替機能がないので、UVR、OVR試験が行えない。<br><br>

UVRやOVR試験はA電圧からB電圧に切り替え、そのタイミングでカウンターをスタートさせる試験がある。<br>
これは保護継電器の動作時間を測定する試験である。<br>
0Vから110Vのような、0Vをスタートとする試験であれば、1000KDでも試験が可能。<br>
なので1000KDではOVGRの試験は可能。<br>



<h2>電圧出力・電圧常時出力</h2>
5000KD特有のスイッチ<br>
<img src="images/202206202.jpg" style="max-width:300px;"><br>

電圧出力スイッチ<br>
OFFでも電圧は内部で発生している為、電圧計は発生電圧を表示する。<br><br>

電圧常時出力スイッチ<br>
電力継電器等の動作時間測定で、電圧だけ印加した状態で、電流のみ突印加して時間を計測する場合など<br>


<?php include("footer.php"); ?>