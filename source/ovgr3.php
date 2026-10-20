<?php include("header.php"); ?>

<h2>KP-PRRV-CPC（RPR 三相不平衡）</h2>
<a href="https://socialsolution.omron.com/jp/ja/products_service/energy/product/pm/kp-prrv.html">KP-PRRV-CPC 地絡過電圧 + 逆電力継電器 取扱説明書</a><br><br>

<img src="images/cpc1.jpg" style="max-width:600px;"><br><br>

特徴<br>
接続端子は裏ではなく表面の下側に２段で配置されている。<br>
表面左上LED：地絡過電圧または逆電力が動作整定値以上になった場合に点灯。<br>
RPRは高圧CT２次側配線に対し、さらに専用CTを取り付けて電流を検出する。<br>

<h2>配線</h2>
VT2次側のR・S・T ⇒ RPRのP1・P2・P3<br>
RPR専用CTはR相とT相の２つに設置する。<br>
専用CT（R相）のK⇒C1+<br>
専用CT（R相）のL⇒C1-<br>
専用CT（T相）のK⇒C2+<br>
専用CT（T相）のL⇒C2-<br>
電源⇒S1・S2（AC/DC110V）<br>

<h2>動作接点</h2>
<img src="images/ovgr31.png" /><br>

a1：OVGR（自動）<br>
a2：OVGR（手動）<br>
C1-2：OVGRコモン<br>
a3-c3：RPR用トリップ接点<br><br>


■トランジスタ出力<br>
TRPR：RPR 警報用Tr 出力<br>
TSELF：異常監視用Tr 出力<br>
Tcom：RPR Tr コモン（RPR警報・異常監視）<br><br>


<h2>KP-PRRV-CPC 試験方法</h2>

■試験前の設定<br>
CT比定率ツマミを0（TEST）に設定する<br><br>

■配線方法（単相試験）<br>
S1-S2⇒制御電源<br>
P1 and P3⇒V（P1とP3を短絡）<br>
P2⇒E<br>
専用CTのL側⇒Lt（Vと同位相の電流要素）<br>
専用CTのK側⇒Kt（Eと同位相の電流要素）<br>
電流はCT２次側回路に接続された専用CTに通して流す。<br>
CTTから電流を流す場合、com相にLt、R相にKtを接続。<br><br>

３相電力P3＝√３VIcosΦで、１相回路で試験すると√3倍の電流を流すことになる。<br>
表から試験時の動作電流値を見る。<br><br>

１相回路試験の例<br>
逆電力整定値１０％の場合<br>
３相回路（通常時）⇒95.3Wで動作⇒ 95.3÷（√3✕110）= 0.50Aで動作<br>
１相回路（試験時）⇒0.50A✕√3 = 0.866Aで動作<br><br>

逆相：0.866Aで動作（最大感度位相角）<br>
進み 30°= 1.15×I = 0.996[A]<br>
遅れ 30°= 1.15×I = 0.996[A]<br><br>

動作逆電力：± 5%以内（0.2%整定の場合、± 10%以内）<br>
動作時間：整定値の± 5%（最小誤差± 50ms）<br>
例：2秒整定の場合：1.9～2.1s<br><br>

■試験終了後の注意<br>
・制御電源を入れた状態で復帰スイッチを押す<br>
・CT比定率ツマミを0（TEST）から通常の状態に戻す<br>

<h2>１相試験時の動作電流値と許容範囲</h2>

<table border="1">
<tr><td>整定値[%]</td><td>動作電流[mA]</td><td>下限</td><td>上限</td></tr>
<tr><td>0.2</td><td>17</td><td>15.3</td><td>18.7</td></tr>
<tr><td>0.4</td><td>35</td><td>33.25</td><td>36.75</td></tr>
<tr><td>0.6</td><td>52</td><td>49.4</td><td>54.6</td></tr>
<tr><td>0.8</td><td>69</td><td>65.55</td><td>72.45</td></tr>
<tr><td>1</td><td>87</td><td>82.65</td><td>91.35</td></tr>
<tr><td>1.5</td><td>130</td><td>123.5</td><td>136.5</td></tr>
<tr><td>2</td><td>173</td><td>164.35</td><td>181.65</td></tr>
<tr><td>3</td><td>260</td><td>247</td><td>273</td></tr>
<tr><td>4</td><td>346</td><td>328.7</td><td>363.3</td></tr>
<tr><td>5</td><td>433</td><td>411.35</td><td>454.65</td></tr>
<tr><td>6</td><td>520</td><td>494</td><td>546</td></tr>
<tr><td>7</td><td>606</td><td>575.7</td><td>636.3</td></tr>
<tr><td>8</td><td>693</td><td>658.35</td><td>727.65</td></tr>
<tr><td>9</td><td>779</td><td>740.05</td><td>817.95</td></tr>
<tr><td>10</td><td>866</td><td>822.7</td><td>909.3</td></tr>
</table>

<h2>位相試験の動作電流値と許容範囲</h2>

電流：試験電流 ✕（2/√3）<br>
位相：進み30、遅れ30の２つ<br>

<table border="1">
<tr><td>整定値[%]</td><td>位相試験（2/√3倍）</td><td>下限</td><td>上限</td></tr>
<tr><td>0.2</td><td>19.63 </td><td>17.67 </td><td>21.59 </td></tr>
<tr><td>0.4</td><td>40.41 </td><td>38.39 </td><td>42.44 </td></tr>
<tr><td>0.6</td><td>60.04 </td><td>57.04 </td><td>63.05 </td></tr>
<tr><td>0.8</td><td>79.67 </td><td>75.69 </td><td>83.66 </td></tr>
<tr><td>1</td><td>100.46 </td><td>95.44 </td><td>105.48 </td></tr>
<tr><td>1.5</td><td>150.11 </td><td>142.61 </td><td>157.62 </td></tr>
<tr><td>2</td><td>199.76 </td><td>189.78 </td><td>209.75 </td></tr>
<tr><td>3</td><td>300.22 </td><td>285.21 </td><td>315.23 </td></tr>
<tr><td>4</td><td>399.53 </td><td>379.55 </td><td>419.50 </td></tr>
<tr><td>5</td><td>499.99 </td><td>474.99 </td><td>524.98 </td></tr>
<tr><td>6</td><td>600.44 </td><td>570.42 </td><td>630.47 </td></tr>
<tr><td>7</td><td>699.75 </td><td>664.76 </td><td>734.74 </td></tr>
<tr><td>8</td><td>800.21 </td><td>760.20 </td><td>840.22 </td></tr>
<tr><td>9</td><td>899.51 </td><td>854.54 </td><td>944.49 </td></tr>
<tr><td>10</td><td>999.97 </td><td>949.97 </td><td>1049.97</td></tr>
</table>

<h2>各種設定</h2>

■ディップスイッチ<br>
１：周波数設定 50Hz/60Hz<br>
２：OVGRロック解除時間（1s or 瞬時）<br>
３：RPRロック解除時間（1s or 瞬時）<br>
４＆５：CT比倍率<br><br>

※ロック解除<br>
整定値をロック以外の値に設定した場合、ロックを解除するまでの時間を設定できる。<br><br>

■CT比倍率<br>
高圧CT比が60/5Aだった場合<br>
倍率は12倍なのでスイッチで12倍になるように設定<br>
CT比定率ツマミを1.2に設定<br>
CT比倍率スイッチを10倍に設定（4をOFF、5をON）<br><br>

■ロック機能<br>
L ovgr<br>
L rpr<br>
L com<br>
AC/DC110vを印加することで各要素が動作しなくなる。<br>


<h2>エラーコード</h2>

E0・E1<br>
CPU 異常、メモリ異常。<br>
制御電源を 5 秒以上 OFF して、再投入。<br>
まだエラーコードが表示される場合、メーカーに相談。<br>
<br>
E2<br>
周波数の設定が異なる。<br>
<br>
E3<br>
内部回路異常。<br>
制御電源を 15 秒以上印加したうえで動作確認。<br>
<br>
E4<br>
内部回路異常。<br>
再度 Vo 点検、P 点検を確認。<br>
<br>
E20<br>
P1、P2、P3 の入力電圧に異常があると判定。<br>
P1-P2-P3 の相順が正しく配線できていることを確認する。<br>


<h2>専用CT「KP-CT-C09AC005」</h2>

ケーブルは全長20m以下とする。<br>
推奨ケーブルは CVV-S 1.25mm2（静電遮へい付制御用ビニル絶縁ビニルシースケーブル）<br><br>

CVV-Sの構造（中心から）<br>
・導体<br>
・絶縁体<br>
・介在物（または押えテープ）<br>
・何銅テープ<br>
・シース<br><br>


<h2>CT比倍率・CT比定率を設定する理由</h2>
RPR専用CTとVTから算出した電力値をCAN通信、RS-485通信を用いて送信する。<br>
電力計測するうえでCT比の設定が必要となる。<br>

<?php include("footer.php"); ?>