<?php include("header.php"); ?>

<h2>対地静電容量から充電電流を計算</h2>

■充電電流の計算式<br>
対地静電容量C[µF] = C*10^-6[F]<br />
充電電流I0[A] = 2πfCV = 3.25*C[μF]<br />


<h2>静電容量から充電電流を計算する</h2>

例：テスターで対地静電容量Cを測定した結果<br>
C = 0.032[µF]<br><br>

絶縁耐力試験時の充電電流の計算<br>
I = 2πfCV[A]<br>
= 3.25*C[µF]<br>
= 0.032 ✕ 3.25 = 0.104[A]<br>

<h2>なぜ充電電流I0cは2πfCVなのか？</h2>
電流は I = V ÷ Ω として表すことができる。<br>
ここで抵抗Ωにあたる部分は容量性リアクタンス XCのみ。<br><br>

容量性リアクタンスは XC = 1/ωC で表すことができる。<br>
⇒<a href="imp.php">容量性リアクタンスとは？</a><br><br>

Ω = XC = 1/ωCを代入する。<br>
I = V ÷ Ω = V × ωC<br><br>

ここで ω[オメガ] は角速度のこと。<br>
これはω = 2πf で表すことができる。<br>
⇒<a href="math.php">角速度とは？</a><br><br>

すると電流は以下の式で表すことができる。<br>
I = V × ωC = V × 2πfC = 2πfCV<br><br>

I = [A]<br>
π = 3.14<br>
f = 50[Hz]<br>
V = 10350[V]<br>
C = [F] = 10^6[μF]<br><br>

2πfV = 2*3.14*50*10350*10^-6 = 3.25<br>
I[A] = 3.25 * C[μF]<br>


<!--
<form name="form3">
2πfV：<input type="text" name="init"><br>
静電容量：<input type="text" name="C">[µF]<br>
<input type="button" value="計算" onclick="I0()"><br />
充電電流：<input type="text" name="A">[mA]<br />
</form>
-->

<h2>静電容量の単位</h2>
<ul>
  <li>ミリ mF 10^-3
  <li>マイクロ µF 10^-6
  <li>ナノ nF 10^-9
  <li>ピコ pF 10^-12
</ul>


<h2>CVケーブルの充電電流（10350V 三相一括）</h2>

<!--
<form name="form1">
  CVケーブル長さ：<input type="number" name="cv_m">m<br />
  CVケーブル太さ
  <select name="sq">
    <option value="2.04">38sq</option>
    <option value="2.46">60sq</option>
  </select>
  <br />
<INPUT type="button" value="計算" onclick="cv()"><br />
CVケーブルの充電電流：<input type="number" name="cv_a" readonly>mA<br />
</form>
-->

CVケーブル充電電流一覧（50Hz）<br>
（試験機メーカー取説より引用）<br>
38[sq]：2.04[mA/m]<br>
60[sq]：2.46[mA/m]<br>
100[sq]：3.03[mA/m]<br>
150[sq]：3.60[mA/m]<br><br>

引込高圧CVケーブル充電電流の例<br>
60[sq] 50m = 123[mA]<br>

<h2>変圧器、コンデンサ、開閉器の充電電流の例</h2>
※あくまで目安です。<br>
・Tr 100kVA 10mA<br>
・SC 100KVA 5mA<br>
・PAS 5mA<br>
・UGS 5mA<br>

<!--
■油入変圧器の対地間静電容量<br />
1Φ3W 300kVA：4.0[nF]<br />
3Φ3W 300kVA：4.8[nF]<br /><br />

■高圧進相コンデンサ<br />
200kvar：1.2[nF]<br /><br />
-->

<h2>変圧器 静電容量表</h2>
<img src="images/tr.png" alt="">

<!--
<SCRIPT language="JavaScript">


  var init = Math.round(2 * Math.PI * 50 * 10350 * Math.pow(10,-6) * 100) / 100;
  document.form3.init.value = init;

  function I0(){
      document.form3.A.value = document.form3.C.value * init * 1000;
    }

  function orgRound(value, base) {
    return Math.round(value * base) / base;
}

    function cv(){
      var sq = document.form1.sq.value;
      var cv_m = document.form1.cv_m.value;
      var cv_a = cv_m * sq;
      document.form1.cv_a.value = orgRound(cv_a,100);
    }

    function setubi(){
     var tr1 = document.form2.tr1.value;
     var tr2 = document.form2.tr2.value;
     var CH = document.form2.CH.value;
     var tr1_C = 4.0 * tr1;
     var tr2_C = 4.8 * tr2;
     var CH_C  = 1.2 * CH;
     var C_SETUBI = tr1_C + tr2_C + CH_C;
     var A_SETUBI = 3.25 * C_SETUBI;
     document.form2.C_SETUBI.value = orgRound(C_SETUBI,100);
     document.form2.A_SETUBI.value = orgRound(A_SETUBI,100);
    }

</SCRIPT>
-->


<?php include("footer.php"); ?>