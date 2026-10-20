<?php include("header.php"); ?>

<h2>MDP-4R 避雷器（RS-485/422用）</h2>

⇒<a href="https://www.m-system.co.jp/mssjapanese/PDF/NS/M/nsmdp4r.pdf">MDP-4R 取扱説明書</a><br><br>

外観<br>
<img src="images/mdp1.jpg" style="max-width:200px;" /><br><br>

用途<br>
RS-485／422用避雷器。<br>
通信ネットワークに侵入する雷サージから接続されている機器を保護。<br>
<br>
端子<br>
上段：3-2-1<br>
下段：C-B-A<br>
最下段：G（アース端子）<br>
<br>

LINE<br>
・被保護機器[LINE+]⇒MDP[3]⇒MDP[C]⇒ケーブル⇒MDP[C]⇒MDP[3]⇒被保護機器[LINE+]<br>
・被保護機器[LINE-]⇒MDP[2]⇒MDP[B]⇒ケーブル⇒MDP[B]⇒MDP[2]⇒被保護機器[LINE-]<br><br>

３芯ケーブルで各SG間をつなぐ場合<br>
被保護機器[SG]⇒MDP[1]⇒MDP[A]⇒ケーブル⇒MDP[A]⇒MDP[1]⇒被保護機器[SG]<br><br>

被保護機器にSGがない場合<br>
被保護機器[SG]⇒MDP[1]⇒MDP[A]⇒ケーブル[シールド]⇒ケーブル[シールド]⇒MDP[G]⇒被保護機器[G]<br>
※接地は100Ω以下<br>

<?php include("footer.php"); ?>