<?php include("header.php"); ?>

<h2>展開接続図（シーケンス図）の記号</h2>

84：電圧継電器（商用復電）<br>
27：不足電圧継電器（商用停電）<br>
T：Trip<br>
C：Crose<br>
X：補助リレー<br>
R：受電盤<br>
F：フィーダー<br>
43：切替スイッチ<br>
COS：切替スイッチ（自動・手動の切替）<br>
CS：切替スイッチ（引いて操作）<br>
BS：押釦スイッチ<br>
5T：切タイマ<br>
5X：切信号<br>
6T：入タイマ<br>
6X：入信号<br>
30X：機器状態表示・故障表示装置<br>

<h2>OCRとリセットスイッチの構成</h2>
<img src="images/se2_2.png" style="max-width:500px;"><br>

①P(+) ⇒ OCRa接点 ⇒ 51X ⇒ N(-)<br>
②P(+) ⇒ RESET SW b接点 ⇒ 51X a接点 ⇒ 51X ⇒ N(-)<br>
③P(+) ⇒ RESET SW b接点 ⇒ 51X a接点 ⇒ OL ⇒ N(-)<br><br>

リセットスイッチONの時<br>
RESET SW b接点をボタンを押して開路した事により②の自己保持回路が開路され51Xのリレーが停止、OL消灯。<br><br>


<h2>OCRとリセットスイッチの構成</h2>
30X（機器状態表示・故障表示装置）がリレーON状態ではVCBの投入ができない。<br>
リセットボタンONで自己保持解除、30XをOFFにしたあと、CS入操作にてVCB投入可能。<br>
89Xリレーがあることで、DS入状態でなければVCBの投入操作ができない（インターロック）<br>
逆にVCB切には何も制限がないのでCS切操作でVCB遮断可能。<br>
<img src="images/se2_3.png" style="max-width:700px;"><br>
<img src="images/se2_4.png" style="max-width:700px;"><br>


<h2>シーケンス図とは？</h2>
シーケンス図は、制御動作を表現し、かつ機器間の接続状況を明示している。<br>
「展開接続図」とも呼ばれる。<br><br>

シーケンスの描き方は、目的に応じて２つある。<br>
・EWD方式（Elementary Wiring Diagram）<br>
・CWD方式（Control Wiring Diagram）<br><br>

また、２つの方式の利点を取り入れた、ECWD方式がある。

<h2>シーケンス図 EWD方式</h2>
制御動作を理解しやすいように機器の機構や配置関係を無視して、自動制御関係の動作順序に従い、上から下へ、または、左から右へと順に、シーケンス図を記載したもの。<br><br>

■メリット<br>
機器の位置関係を無視できるので作図が簡単。<br>
動作の順序や制御関係が見やすい。<br>

<h2>シーケンス図の書き方・ソフト</h2>

「draw.io」という無料WEBサービスがオススメ。<br>
ソフトをインストールではなく、インターネット上で操作できる。<br>
⇒<a href="draw.php">draw.ioの詳細はこちら</a><br>


<h2>シーケンス制御配線の圧着端子</h2>
<img src="images/se2/5.jpg" alt="" style="max-width:550px;"><br>
端子は筒部が上方になるように取り付ける。<br>
端子が２本ある場合、背合わせにして取り付ける。<br>

<h2>過電流継電器の警報回路シーケンス図</h2>
51RはOCRの警報a接点。<br>
b接点押し釦が自己保持回路のリセットスイッチ。<br>
過電流継電器が動作した時、オレンジランプで知らせる。<br>
自己保持がかかり、リセットスイッチが押されるまでランプが消えない。<br>
<img src="images/se2_1.jpg" alt="" style="max-width:500px;"><br>

<h2>ダイオードを入れる理由</h2>
<img src="images/se2/1.png" alt="" style="max-width:400px;"><br>
DC24Vの警報回路において、ダイオードを入れる理由とは？<br>
電流の逆流を防ぐため？だとすれば、なぜ３つも入れる必要があるのか？<br>
予想：順方向電圧降下で電圧調整。ダイオード1個でVfが0.7ボルトとすると、約2ボルト落としてるなど。

<h2>警報回路用電源の100V/20V変圧器</h2>
<img src="images/se2/2.png" alt="" style="max-width:500px;"><br>
AC100V⇒AC20Vへ変換する。<br>
変圧器の中には、100V/100V、5VA変圧器というのも存在する。<br>
変圧器を挟むことで、電源側と負荷側を絶縁を保つ効果がある。<br>
また、ノイズ除去ができるシールドトランス、ノイズ遮断トランスというのもある。<br>
<h2>シリコン整流器 GBPC1506警報回路用電源</h2>
<img src="images/se2/4.png" alt="" style="max-width:400px;"><br>
交流電圧を直流電圧に変換する。

<h2>カドニカ（バッテリー）</h2>
<img src="images/se2/3.png" alt="" style="max-width:500px;"><br>
Ah = Ampare Hour の略。<br>
バッテリーの容量の単位。<br><br>

HR = Hour Rate（時間 率）<br>
満タンに充電したバッテリーが規定の電圧に下がるまでに取り出せる電流を示す値。<br>
バッテリーが規定の電圧に下がる = バッテリーが上がる。<br><br>

容量 1.2Ah/5HR とは？<br>
1.2[Ah] ÷ 5[h] = 0.24[A]<br>
0.24Aで5時間使うとバッテリー上がりになりますよ、という目安。<br><br>

<?php include("footer.php"); ?>