  <?php include("header.php"); ?>
  
<h2>無効電力とは？</h2>

製品例：YP-10NVAR<br>
<img src="images/mukou1.jpg" style="max-width:300px;"><br>
LEAD：進み<br>
LAG：遅れ<br><br>

無効電力は記号の「Q」で表す。<br>
単位は var（バール）<br><br>

電源と負荷を往復するだけで消費されない電力のこと。<br>
無効電力は誘導負荷（インダクタンス）と容量負荷（静電容量）から生じる。<br>
誘導負荷に由来する無効電力を「遅れ無効電力」と呼ぶ。<br>
容量負荷に由来する無効電力を「進み無効電力」と呼ぶ。<br><br>

<!--
力率（cosθ）= 有効電流 ÷ 皮相電流<br>
電力 = 電圧 ✕ 有効電流<br>
　　 = 電圧 ✕ 皮相電流 ✕ 力率<br><br>
-->

無効電力が与える影響<br>
・力率の悪化（皮相電力の増加）<br>
・電圧変動<br><br>

<h2>皮相電力・有効電力・無効電力</h2>
<img src="images/mukou1.svg" style="max-width:700px;" /><br>
皮相電力S = VI[VA]<br>
有効電力P = VIcosθ[W]<br>
無効電力Q = VIsinθ[var]<br>
力率cosθ = 有効電力P ÷ 皮相電力S<br>

<?php include("footer.php"); ?>