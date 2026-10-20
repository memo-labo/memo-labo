  <?php include("header.php"); ?>
  

<style>
<!--
span{
  font-size:12px;
}

input{width:80px;}
-->
</style>


  

<h2>OCR限時要素 動作時間計算プログラム</h2>
過電流継電器の限時要素について、ダイヤル（整定時間）に合わせて自動で計算。<br />
整定電流値の200%、300%、500%について、理論値と許容値を同時に計算。<br />
※あくまで個人利用として作成。他者にその性能を保証するサービスではない。<br />

  <h2>限時特性 動作時間 計算式</h2>
  <img src="images/ocr1.jpg" style="max-width:500px;" /><br />
  I=電流整定値に対する倍率<br>
  D=ダイヤル整定値<br>
  計算式はOCR取扱説明書より引用<br />

  <h2>公称値、参考値、許容範囲</h2>
  ■許容範囲と公称値<br />
  公称値 300% 700%<br />
  参考値 200% 500%<br /><br />

  ■動作時間の許容範囲<br />
  200% 300% ⇒ ±17%<br />
  500% 700% ⇒ ±12%<br />

  <h2>OCR 限時特性 計算フォーム</h2>

<form name="dial">
  ダイヤル：<input type="number" name="D"> <INPUT type="button" value="計算" onclick="Add()">
</form>

<form name="EI">
  <h2>超反限時 EI</h2>
  200%：<input type="number" name="T2"><br />
  許容値：<input type="number" name="T2_D">〜<input type="number" name="T2_U"><span>（±17%）</span><br /><br />

  300%：<input type="number" name="T3"><br />
  許容値：<input type="number" name="T3_D">〜<input type="number" name="T3_U"><span>（±17%）</span><br /><br />

  500%：<input type="number" name="T5"><br />
  許容値：<input type="number" name="T5_D">〜<input type="number" name="T5_U"><span>（±12%）</span>
</form>


<form name="VI">
  <h2>強反限時 VI</h2>
  200%：<input type="number" name="T2"><br />
  許容値：<input type="number" name="T2_D">〜<input type="number" name="T2_U"><span>（±17%）</span><br /><br />

  300%：<input type="number" name="T3"><br />
  許容値：<input type="number" name="T3_D">〜<input type="number" name="T3_U"><span>（±17%）</span><br /><br />

  500%：<input type="number" name="T5"><br />
  許容値：<input type="number" name="T5_D">〜<input type="number" name="T5_U"><span>（±12%）</span>
</form>


<form name="NI">
  <h2>反限時 NI</h2>
  200%：<input type="number" name="T2"><br />
  許容値：<input type="number" name="T2_D">〜<input type="number" name="T2_U"><span>（±17%）</span><br /><br />

  300%：<input type="number" name="T3"><br />
  許容値：<input type="number" name="T3_D">〜<input type="number" name="T3_U"><span>（±17%）</span><br /><br />

  500%：<input type="number" name="T5"><br />
  許容値：<input type="number" name="T5_D">〜<input type="number" name="T5_U"><span>（±12%）</span>
</form>


<SCRIPT language="JavaScript">

  function orgRound(value, base) {
    return Math.round(value * base) / base;
  }

    function Add(){

     var D = document.dial.D.value;

     //超反限時
     var EI_T2 = (80 * D) / (2 * 2 - 1) * 0.1;
     var EI_T2_D = EI_T2 * (1 - 0.17);
     var EI_T2_U = EI_T2 * (1 + 0.17);

     var EI_T3 = (80 * D) / (3 * 3 - 1) * 0.1;
     var EI_T3_D = EI_T3 * (1 - 0.17);
     var EI_T3_U = EI_T3 * (1 + 0.17);

     var EI_T5 = (80 * D) / (5 * 5 - 1) * 0.1;
     var EI_T5_D = EI_T5 * (1 - 0.12);
     var EI_T5_U = EI_T5 * (1 + 0.12);
    
     document.EI.T2.value   = EI_T2.toFixed(3);
     document.EI.T2_D.value = EI_T2_D.toFixed(3);
     document.EI.T2_U.value = EI_T2_U.toFixed(3);

     document.EI.T3.value = EI_T3.toFixed(3);
     document.EI.T3_D.value = EI_T3_D.toFixed(3);
     document.EI.T3_U.value = EI_T3_U.toFixed(3);

     document.EI.T5.value = EI_T5.toFixed(3);
     document.EI.T5_D.value = EI_T5_D.toFixed(3);
     document.EI.T5_U.value = EI_T5_U.toFixed(3);


     //強反限時
     var VI_T2 = (13.5 * D) / ((2 - 1) * 10);
     var VI_T2_D = VI_T2 * (1 - 0.17);
     var VI_T2_U = VI_T2 * (1 + 0.17);

     var VI_T3 = (13.5 * D) / ((3 - 1) * 10);
     var VI_T3_D = VI_T3 * (1 - 0.17);
     var VI_T3_U = VI_T3 * (1 + 0.17);

     var VI_T5 = (13.5 * D) / ((5 - 1) * 10);
     var VI_T5_D = VI_T5 * (1 - 0.12);
     var VI_T5_U = VI_T5 * (1 + 0.12);
    
     document.VI.T2.value = VI_T2.toFixed(3);
     document.VI.T2_D.value = VI_T2_D.toFixed(3);
     document.VI.T2_U.value = VI_T2_U.toFixed(3);

     document.VI.T3.value = VI_T3.toFixed(3);
     document.VI.T3_D.value = VI_T3_D.toFixed(3);
     document.VI.T3_U.value = VI_T3_U.toFixed(3);

     document.VI.T5.value = VI_T5.toFixed(3);
     document.VI.T5_D.value = VI_T5_D.toFixed(3);
     document.VI.T5_U.value = VI_T5_U.toFixed(3);


     //反限時
     var NI_T2 = (0.14 * D) / ((Math.pow(2,0.02) - 1) * 10);
     var NI_T2_D = NI_T2 * (1 - 0.17);
     var NI_T2_U = NI_T2 * (1 + 0.17);

     var NI_T3 = (0.14 * D) / ((Math.pow(3,0.02) - 1) * 10);
     var NI_T3_D = NI_T3 * (1 - 0.17);
     var NI_T3_U = NI_T3 * (1 + 0.17);

     var NI_T5 = (0.14 * D) / ((Math.pow(5,0.02) - 1) * 10);
     var NI_T5_D = NI_T5 * (1 - 0.12);
     var NI_T5_U = NI_T5 * (1 + 0.12);
    
     document.NI.T2.value = NI_T2.toFixed(3);
     document.NI.T2_D.value = NI_T2_D.toFixed(3);
     document.NI.T2_U.value = NI_T2_U.toFixed(3);

     document.NI.T3.value = NI_T3.toFixed(3);
     document.NI.T3_D.value = NI_T3_D.toFixed(3);
     document.NI.T3_U.value = NI_T3_U.toFixed(3);

     document.NI.T5.value = NI_T5.toFixed(3);
     document.NI.T5_D.value = NI_T5_D.toFixed(3);
     document.NI.T5_U.value = NI_T5_U.toFixed(3);


    }
</SCRIPT>

<?php include("footer.php"); ?>