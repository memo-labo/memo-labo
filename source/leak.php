  <?php include("header.php"); ?>


<h2>I0・I0r・I0cとは？</h2>
I0 ：漏れ電流の合成成分<br>
I0r：有効漏れ電流（抵抗成分の漏れ電流）<br>
I0c：無効漏れ電流（対地静電容量分の漏れ電流。力率=0）<br>
<img src="images/leak/2.png" style="max-width:400px;"><br />


<h2>I0c 対地静電容量分の漏れ電流</h2>
<img src="images/leak/1.png" style="max-width:600px;"><br />


<h2>漏洩電流の計算方法</h2>
I0r = V/R<br>
I0c = ωV*C<br>
I0  = √(I0r^2 + I0c^2)<br>

<img src="images/leak2.gif" class="img1"><br />

<h2>漏電電流を監視・検出する装置</h2>
漏電遮断器<br>
漏電火災警報器<br>
漏電リレー<br>
絶縁監視装置<br><br>

漏電火災警報器や漏電リレーは、IocとIorの合成成分である零相電流Io値を検知することで漏電検出している場合が多い。<br />

<h2>I0では検出できない例</h2>
省エネ機器の普及、インバータの導入、各種フィルターの設置など。<br />
電路に多くの高調波の重畳や、静電容量分の漏電電流 I0c が多い。<br />
この場合、電路の絶縁性能とは関係無く、零相電流値 I0 が大きくなってしまう。<br />
従来のI0漏電検出機では、抵抗成分Iorの漏電監視ができない場合がある。<br />

<h2>I0r測定機器・監視装置</h2>
<ul>
  <li><a href="leaker.php">Iorクランプリーカー</a></li>
  <li><a href="kanshi.php">監視王Ior 絶縁監視装置</a></li>
</ul>


<?php include("footer.php"); ?>