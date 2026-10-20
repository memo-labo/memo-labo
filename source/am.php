<?php include("header.php"); ?>

<h2>電流計 外観</h2>

赤い針があるタイプ<br>
<img src="images/am2.jpg" alt="" style="max-width:400px;"><br><br>

電流計と切替スイッチの一体型<br>
<img src="svg/am2.svg" alt="" style="max-width:500px;"><br><br>
<img src="images/am5.jpg" alt="" style="max-width:500px;"><br><br>

<span style="color:green;">■</span>最低値残針（緑色）<br>
<span style="color:black;">■</span>駆動指針（黒色）<br>
<span style="color:red;">■</span>最高値残針（赤色）<br>
零調整ボタン<br>
手動残針復帰ボタン<br>

<h2>CTTから電流計までの配線図</h2>
CTT⇒OCR⇒APFC⇒WH⇒AS⇒A<br>
<img src="images/am1.jpg" style="max-width:700px;"><br>

<h2>カムスイッチ</h2>
参考<br>
・<a href="https://www.seiko-denki.co.jp/wp/wp-content/uploads/2018/08/SEIKO_H-type_cs_all_ed.2.pdf" target="_blank">AS・VSスイッチ 取扱説明書</a><br>
・<a href="http://www.todensha.co.jp/camswitch_overview/" target="_blank">接点構成の表し方</a><br><br>


電流計スイッチの配線図と接点<br>
ノッチが黒い横棒太線の位置に来ると左右の接点同士が導通（メイク）<br>
例：ノッチが⑦の位置⇒5-6が導通、7-8が導通、電流計に電流は流れずCTのlに戻る。<br>
<img src="svg/as.svg" style="max-width:700px;" /><br>

ASの端子番号（裏側から見た場合）<br>
上段奥右 1<br>
上段奥左 2<br>
下段奥右 3<br>
下段奥左 4<br>
上段前右 5<br>
上段前左 6<br>
下段前右 7<br>
下段前左 8<br>

<img src="images/am3.jpg" style="max-width:500px;" /><br><br>

接続図の拡大<br>
<img src="images/am4.jpg" style="max-width:320px;" /><br><br>

<h2>電流計の針が正確に振れるか確認する方法</h2>
CT比が100/5の場合、電流計の最大値は100Aの製品を使用する。<br>
受電設備内の電流計の正確性を判定したい場合、CT２次側に電流を流して確認。<br>
その際、CTTを利用してCT側と電流計側の回路を電気的に切り分ける。<br>
CTTから電流計に2.5Aの電流を流して電流計の針が中央を指すことを確認する。<br>
R-Sに2.5Aの電流を流して、メーター切替スイッチ「R」と「S」で針が中央値であることを確認。<br>
S-Tに2.5Aの電流を流して、メーター切替スイッチ「S」と「T」で針が中央値であることを確認。<br><br>

<h2>OCR試験をする際の電流計の注意</h2>
電流計のメーターはOFFにしておく。<br>
OCR試験電流5AでメーターがMAXに触れてしまう。<br>
なので例えばメーターR相のまま40Aで瞬時試験を行えば8倍まで電流を流してしまう。<br>
OCR限時200%や500%の試験中でR相とT相の動作時間が妙に違うところで気がつく場合も。<br>
事前に気ずく方法⇒最小動作電流の際にメーターを目視⇒針が動いてないことを確認。<br>


<h2>故障の判定 電流計 or カムスイッチ</h2>

症状１<br>
・カムスイッチを特定の相に合わせたときだけ電流が流れない。<br>
・OCRのLEDランプが点灯しない。<br>
カムスイッチに問題があり、回路がオープン状態になっている可能性あり。<br><br>

症状２<br>
・カムスイッチをどの相に合わせても電流計が振れない。<br>
・OCRのRUNランプも点灯しない。<br>
電流計、カムスイッチ、OCRの誤配線、すべて疑う余地あり。<br><br>

電流計単体試験<br>
電流計に対して直接電流を流して確認する。<br><br>

OCR試験と電流計<br>
カムスイッチ部分を短絡させてメーターOFF状態を人工的に作り出す。<br>
この状態でOCRが問題なく動作すれば、カムスイッチまたはメーターに問題がある。<br><br>

電流計切替スイッチの故障による危険性<br>
もし仮にカムスイッチが故障したことで電流計が振れない場合、ノッチの操作位置によってはCT２次側が開放状態になる可能性があり、すると高電圧が発生する可能性がある。<br><br>
ノッチがOFFの状態で電流が問題なく流れることが確認できたら、その位置で動かさないように固定しておいた方が良いかもしれない（受電状態で動かすとCT2次側回路が開放状態になる可能性）<br>
もしOCRのRUNランプが点灯しない状態であれば、OCR保護が働いていない状態なので、早急に修理する必要がある。<br>



<h2>MDA</h2>
Maximum Demand Ammeters<br>
最大需要電流計<br>
設定した値以上の電流が流れた場合に無電圧接点が動作<br><br>

針と機能<br>
・需要計指針<br>
・最大値残針<br>
・メーターリレーの上限設定指針<br>
・最小値残針<br>
・瞬時計指針<br>
・中央のボタン（手動残針復帰用押しボタン）<br>


<h2>低圧電流計の配線間違いを確認する方法</h2>
まず電流クランプで電灯L1-N-L2、動力R-S-Tの各相の電流を実測する。<br>
対応する電流計と見比べ、明らかにおかしいようであれば配線ミスの可能性あり。<br>
停電時、低圧用CT２次側のR-com、T-comそれぞれにOCR試験機から電流を流し、電流計を確認する。<br>
OCRからの試験電流と低圧盤の電流計の値が一致しないようであれば配線ミス。

<?php include("footer.php"); ?>