<?php include("header.php"); ?>


<h2>三菱 誘導型OCR MOC-2型</h2>

MOC-2TI-R 外観写真<br>
<img src="images/ocr2.jpg" style="max-width:600px;"><br><br>

ダイヤル変更つまみ<br>
<img src="images/ocr3.jpg" style="max-width:800px;"><br><br>

瞬時と限時の変更つまみ<br>
<img src="images/ocr4.jpg" style="max-width:600px;"><br><br>

配線図<br>
<img src="svg/ocr_y.svg" style="max-width:700px;" /><br><br>

周波数：50Hz/60Hz 共用<br>
定格電流：5A<br>
限時：3-4-5-6-8A<br>
瞬時：20-30-40-60-80A<br><br>

記号の意味<br>
Iあり：瞬時要素あり<br />
Tあり：電流引き外し<br>
Tなし：電圧引き外し<br><br>

高圧受電点用（52R）<br />
・MOC-2I-R（電圧引き外し・瞬時あり）<br />
・MOC-2TI-R（電流引き外し・瞬時あり）<br /><br />

分岐フィーダ（52F）<br />
・MOC-2-R（電圧引き外し・瞬時なし）<br />
・MOC-2T-R（電流引き外し・瞬時なし）<br /><br />

瞬時要素あり⇒受電VCB<br>
瞬時要素なし⇒分岐フィーダVCB<br>

<h2>誘導型OCRの限時動作時間</h2>
<img src="images/ocr_2.jpg" alt="" class="img1"><br />

ダイヤル１のとき<br>
MOC-2（誘導型）<br>
200%⇒1.0s<br>
300%⇒0.4s<br>
500%⇒0.2s<br>
700%⇒0.14s<br><br>

<img src="images/20251015-1.png" alt="" style="max-width:600px;"><br><br>

動作時間特性グラフ<br>
<img src="images/20251015-2.jpg" alt="" style="max-width:600px;"><br>

<h2>MOC-A1（静止型）の限時動作時間（ダイヤル１）</h2>

超反限時（EI）<br>
200%⇒2.667s<br>
300%⇒1.0s<br>
500%⇒0.33s<br>
700%⇒0.17s<br><br>

反限時（NI）<br>
200%⇒1.0s<br>
300%⇒0.63s<br>
500%⇒0.43s<br>
700%⇒0.35s<br>


<h2>誘導型の瞬時要素</h2>
入力は整定電流の200%で20ms以下で動作する。<br>
誘導型の瞬時要素の動作時間は静止型よりも速く動作する（3ms～20ms程度）<br>
投入位相によって動作時間に多少のばらつき（7ms前後）が出るらしい。<br>

<h2>誘導型OCR MOCの回路構造</h2>
<img src="images/ocr_3.jpg" alt="" class="img1"><br />

MOC-2-R<br>
端子：C1、C2、T1、T2<br>
電流回路：C1⇒MOC⇒C2<br>
引き外し回路：T1⇒ICE⇒（MOCとICEの並列）⇒T2<br><br>

MOC-2I-R<br>
端子：C1、C2、T1、T2<br>
電流回路：C1⇒IIE⇒MOC⇒C2<br>
引き外し回路：T1⇒ICE⇒（MOCとIIEとICEの並列）⇒T2<br><br>

MOC = 限時要素<br />
IIE = 瞬時要素<br />
IAE = 電流引き外しの動作表示と補助接触器<br />
ICE = 電圧引き外しの動作表示と補助接触器<br /><br />


<h2>OCR誘導型 電流引き外しの試験方法</h2>
<img src="images/ocr_y1.png" style="max-width:600px;"><br />
※R相のT2と、T相のT2をわたり線で渡らせなくても試験はできる。<br>
CTT端子でCTとOCRを切り分けてOCR側（C1-C2端子）に対して電流を流す。<br>
T1とT2端子に信号線を取り付けてOCR内部接点の動作を感知する。<br>
C2とT2が同一の端子であった場合、C2T2端子に対して試験機のcom相を接続。<br>
誘導型OCRは静止型OCRと違い警報接点a1a2端子が無い。<br><br>

電流引き外しは通常、C1->C2に電流が流れている。<br>
C1->T1も導通しており、T1の先にVCBコイルがありインピーダンスがあるのでそちらに流れない。<br>
OCRが動作し内部b接点が開路された瞬間、回路がT1しかなくなるので電流がVCBコイルに流れる。<br>
その切り替わる瞬間に電圧が発生するので、それを検知して試験機のカウンタをストップさせる。<br><br>
それ故に、OCR電流引き外しの場合、トリップ信号は「電圧」で検知する。<br>

<h2>OCR誘導型 試験上の注意</h2>
OCRの試験で接点信号がとれず試験機からの電流が流れ続けた場合<br>
誘導型OCRに電流が流れ続け、誘導コイルが焼き切れて使用不可（円盤が不動作）になる可能性あり。<br>
試験前に特性動作値を把握し、何秒で止まるか想定した上で試験する。<br>
想定以上の時間が経過してもストップしなかった場合、すぐにOFFボタンを押す。<br>

<?php include("footer.php"); ?>