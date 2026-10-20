  <?php include("header.php"); ?>
  
<h2>接地相の絶縁不良はなぜ漏電しないのか？</h2>  

1Φ3WのN相（接地相）の絶縁不良。<br>
N相は対地電圧が0VなのでN相で絶縁不良があっても漏電しない。<br>
なのでB種接地線にて<a href="clamp.php">Ioクランプメーター</a>で測定しても電流値は出ない。<br><br>

<img src="images/n1.svg" style="max-width:800px;" /><br>

L1相、L2相で絶縁不良があった場合。<br>
対地電圧100Vがかかるので絶縁不良があると漏電が発生する。<br>
電流は地面を通りB種接地線に戻るのでクランプメーターにて測定可能。<br><br>


ELBより下流のN相（接地相）で絶縁不良があった場合<br>
この場合にも対地電圧が0Vなので漏電が発生せずELBは動作しないのか？<br>
もしそうであれば、ELBが動作しないからといって安全とは言えない。<br>
<img src="images/n2.svg" style="max-width:800px;" /><br><br>


⇒<a href="rouden1.php">接地相の絶縁不良を放置したらどうなる？</a>

<?php include("footer.php"); ?>