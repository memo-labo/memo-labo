<?php include("header.php"); ?>

<h2>K2ZC-K2WR-NR</h2>

配線図（R相T相のCT設置）<br>
<img src="images/rpr-nr1.png" style="max-width:900px;" /><br>

配線図（S相のCT設置）<br>
<img src="images/rpr-nr2.png" style="max-width:900px;" /><br><br>

表面・裏面<br>
<img src="images/rpr_nr1.png" style="max-width:600px;" /><br>

端子<br>
・S1(-)<br>
・S2(+)<br>
・L1<br>
・L2<br>
・C1S⇒CTT２次側のcom相<br>
・C2S⇒電流計またはASのS相<br>
・P1⇒VTT２次側のP1<br>
・P2⇒VTT２次側のP2<br>
・P3⇒VTT２次側のP3<br>
・Xa<br>
・Xb<br>
・Xc<br>
・a<br>
・a<br><br>

S1S2⇒DC24V（制御電源）<br>
L1とL2を短絡させると継電器が不動作となる。<br>
<br>
定格電力：953W（√3×110V×5A）<br>
動作逆電力は整定値の95％動作<br><br>


通常配線例<br>
CT２次側 R相k ⇒ AのS相 ⇒ RPR C2S<br>
CT２次側 R相l ⇒ RPR C1S<br><br>



<h2>CTの設置場所と個数</h2>

CT1個（S相設置）<br>
CTのk側がC1S、l側がC2S<br>
S相CT(k)⇒C1S⇒C2S⇒S相CT(l)<br><br>

CT2個（R相とT相に設置）<br>
R相とT相の逆相をとってS相電流を検出する配線<br>
OCR等のCTと共用する場合に便利な配線 <br>
R相CT(k)⇒A(R)⇒A(S)⇒C2S⇒C1S⇒R相CT(l)<br>
T相CT(k)⇒A(T)⇒A(S)⇒C2S⇒C1S⇒T相CT(l)<br><br>

系統側停電後、逆潮流があり充電による危険性を考えた場合、１秒以下が望ましい。<br><br>

パワースイングとは？<br>
発電機を並列投入した時に発生する電力動揺のこと。<br>
これでRPRが不必要動作しない時間の整定が必要。<br>
系統、容量、回転制御の応答時間によって変化するが0.5秒～数秒間らしい。<br><br>

変圧器の励磁突入電流でRPR動作<br>
・構内の変圧器を無負荷で投入<br>
・過渡的な大きな励磁突入電流が発生<br>
・電流位相が極端に遅れ、逆電力として検出してしまう場合がある<br>
・励磁突入電流の影響が想定される場合、0.5 秒以上の整定で誤動作を避ける<br>

<h2>RPR K2ZC-K2WR-NR 試験方法</h2>

RPRの動作条件<br>
電流がC1S⇒C2Sに流れる時にRPRが動作<br><br>

電圧<br>
P1とP3をジャンパー線で短絡<br>
P1P3にV、P2にEを接続して試験電圧110Vを印加<br><br>

電流<br>
RPR端子のC1SとC2Sに電流を流す<br>
位相は（P1-P3）に対してC1S、P2に対してC2Sが同位相となるように<br><br>

CT2個タイプ（R相・T相設置）<br>
・CTT2次側のS相⇒Lt<br>
・CTT2次側のR相⇒Kt<br><br>

試験方法<br>
印加電圧は一定のまま電流を徐々に流したりすることでRPR動作値を読む。<br><br>

逆電力整定値から試験電流を求める表<br />
<img src="images/rpr8.png" alt=""><br /><br />

例：整定電力値 1%<br>
5A ✕ 1% = 50mA（3相回路・通常時）<br>
3相動作電流 = 50mA ✕ 0.95 = 47.5mA<br>
1相動作電流 = 47.5mA ✕（√3÷2）= 41.13mA<br><br>

1%の動作電流 = 41.13[mA]<br>
これをメモしておけば電力整定に合わせて計算で求められる。<br><br>

最小動作電流試験<br />
動作時間タップ値を最小に変更⇒ 0.1s<br />
電圧⇒110V　電流⇒0mA　位相⇒0度に整定。<br />
電流を徐々に上昇させるとRPRが動作する、その時の電流値。<br />
判定基準：表から動作電流(A)(×0.95)を取得して、その±5%以内<br><br>

位相特性電流試験<br>
電圧⇒110V　電流⇒0mA　時間タップ値⇒0.1s<br>
進み：位相⇒進み（LEAD）30度で整定し徐々に電流を上昇し測定。<br>
遅れ：位相⇒遅れ（LEAD）30度で整定し徐々に電流を上昇し測定。<br>
判定基準：表から取得した動作電流(A)(×0.95)の±30％以内<br><br>

動作時間試験<br>
動作時間タップを元に戻す。<br>
電圧⇒110V　位相⇒0度に整定。<br>
電流を0%から105%に急変して測定する。<br>
（表から取得した動作電流(A)(×0.95) × 105%）<br>
判定基準は、整定値の±10％（最少誤差±50ms）<br><br>

<h2>注意点・その他</h2>
P1とP3を短絡せずP1とP2だけ電圧を印加して試験した場合。<br>
動作電流値は２倍になる？（P2-P3の電圧が110V⇒0Vとなり電力の検出ができないため）<br><br>

参考：<a href="https://www.fa.omron.co.jp/data_pdf/mnu/sgte-704e-1_k2zc-n.pdf?id=840">omron ユーザーズマニュアル</a><br><br>

<?php include("footer.php"); ?>