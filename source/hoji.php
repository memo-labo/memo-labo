  <?php include("header.php"); ?>

<h2>警報回路と自己保持回路</h2>

<img src="images/hoji1.png" style="max-width:500px;" /><br>

地絡継電器の自己保持回路。B1-B2の無電圧接点を使用する。<br>
AC100/110Vは、VT２次側から供給される。<br>
変圧器２次側から供給した場合、高圧交流遮断器が開放されると、警報回路への電源が停止してしまう。<br><br>

回路１<br>
電源⇒B1⇒B2⇒リレー(Y)⇒b接点押釦（自己保持解除）⇒電源<br><br>

回路２<br>
電源⇒a接点(Y)⇒リレー(Y)⇒b接点押釦（自己保持解除）⇒電源<br><br>

回路３<br>
電源⇒a接点(Y)⇒BZ（ブザー）⇒電源<br>

<?php include("footer.php"); ?>