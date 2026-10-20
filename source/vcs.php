<?php include("header.php"); ?>

<h2>VCSとは？VMCとは？</h2>
VCS：高圧真空コンタクタ<br />
VMC：高圧真空コンビネーションユニット<br />

<h2>VCSとVMC 外観の違い</h2>
左がVCS、右がVMC<br />
右のVMCにはヒューズがついている<br />
<img src="images/vcs1.jpg" alt=""><br />
<img src="images/vcs3.jpg" alt=""><br />

<h2>VCSの外観特徴</h2>
真空バルブが特徴的<br />
<img src="images/vcs4.jpg" alt=""><br />

<h2>VCS 高圧真空コンタクタ</h2>
VCSとは、英語でVacuum circuit switch<br />
頻繁な開閉を行う高圧機器の開閉器として使用される<br />
負荷開閉回数の耐久性が非常に高い（約100,000回～250,000回の開閉に耐えられる）<br />
進相コンデンサの投入・遮断など、限られた負荷に対する多頻度開閉に使用する<br />
自動力率調整装置「APFC」の信号を受けて自動制御を行う。<br />
VCS（PFヒューズなし）の場合、VCSの上流にLBSの設置が必要。<br>

<h2>VMC 高圧真空コンビネーションユニット</h2>
VMCとは、英語でVacuum electromagnetic Contactor<br />
VCSに、高圧限流ヒューズを組み合わせ、回路の短絡保護を可能にしたもの。<br />
固定形と引出形があり、引出型は本体を高圧系統から切り離し可能、VMC一次側の断路器（LBS）が省略可能。<br />


<h2>引き出し型・固定型などの書き方</h2>
<img src="images/vcs2.jpg" alt="">

<h2>VCSとVMCの違い</h2>
VCSは、遮断電流が小さいため、短絡（ショート）電流の遮断は出来ない。<br />
VMCは、VCSに高圧限流ヒューズを組み合わせ、回路の短絡保護まで出来るようにしたもの。<br />

<h2 id="vmc_reiji">常時励磁式</h2>
投入コイルが励磁されている間だけ、投入状態を維持する。<br />
常に動作信号を与えて動作させなければ、その状態をキープできない。<br />
投入コイルの励磁が解けると、開放状態になる。<br />
多頻度開閉を行う系統に適する。<br />

<h2>ラッチ式</h2>
動作信号を与えて動作させると、動作信号を切ってもその状態をキープできる。<br />
励磁して投入した後は、機械的に投入状態を保持する。<br />
励磁が解かれても閉回路を維持する方式。<br />
電路の開放には引外しコイル励磁で開放するため、多頻度開閉には適さない。<br />
製品例⇒<a href="https://dl.mitsubishielectric.co.jp/dl/fa/members/document/manual/vcbvmc/jnec-si-0854/SI0854H.pdf">三菱 VZ-Eシリーズ</a><br>

<h2>VMC 配線図</h2>
<img src="images/vcs/1.png" alt=""><br>
<img src="images/vcs/2.png" alt="" style="max-width:500px;"><br>

<?php include("footer.php"); ?>