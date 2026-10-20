<?php include("header.php"); ?>


<h2>VCBチェッカーとは？</h2>
⇒<a href="http://www.soukou.co.jp/pdf/0152.pdf" target="_blank">VCBチェッカー取扱説明書</a><br>
VCB（真空遮断器）は、電路の電流を真空バルブによって遮断する。<br>
真空度が大気圧に近づくと、絶縁破壊する電圧が下がり、電気事故時に十分な遮断ができない。<br>
また、遮断器そのものが絶縁破壊する可能性もある。<br>

<h2>VCBチェッカー 操作部分</h2>
<img src="images/vcbc2.jpg" alt="" style="max-width:500px;"><br>
<img src="images/vcbc1.png" alt="" style="max-width:500px;"><br>

<h2>VCBの真空度チェック方法</h2>
真空バルブの極間を開いた状態で、固定接点と可動接点間に電圧を印加する。<br>
漏れ電流の量が、判定基準を上回れば不良、下回れば遮断器は健全であると判定する。<br>
３相同時に試験するのではなく、１相ずつ試験を行う。<br>

<h2>判定基準</h2>

不良ランプ<br>
タイマーで設定した時間中に電流が10mAを越えた場合に点灯する。<br><br>

良ランプ<br>
タイマーで設定した時間中に電流が10mAを越えなかった場合に点灯する。<br><br>

印加時間<br>
１分間（三菱VCB取扱説明書によれば22kVを10s）<br>
⇒<a href="https://dl.mitsubishielectric.co.jp/dl/fa/members/document/manual/vcbvmc/jnec-si-0747/jnec-si0747-p.pdf" target="_blank">三菱VCB 取扱説明書</a><br><br>

印加電圧<br>
一般的に22kVを印加、漏れ電流の目安は4～5mA以下<br>
（メーカーにより基準が違う場合あり、試験前に調査）<br><br>


※下記は三菱VCB-02 VCBチェッカーによる真空度試験条件（表 10-7）より引用<br>
適用機種：3.6/7.2kV<br>
形名：VCB-02<br>
一次側入力電圧：AC100V<br>
出力端子：U-V接続<br>
出力電圧：AC22kV<br>
適用可能な真空バルブの開極距離：7～13mm<br>
電圧印加時間（タイマー設定値）：10s <br>


<h2>その他</h2>

定格容量は100VAと、容量は少ない。<br>
VCBを他回路から切り離し「切」の状態にする。<br><br>

最大11kV出力したい場合<br>
U端子とE端子をVCBの１次側と２次側に接続する。<br><br>

最大22kV出力したい場合<br>
U端子とV端子をVCBの１次側と２次側に接続する。<br>

<?php include("footer.php"); ?>