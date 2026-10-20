  <?php include("header.php"); ?>

<h2>RDF 比率差動継電器 87</h2>

事前知識<br>
⇒変圧比・変流比・巻数比<a href="henatu.pdf">変圧比・変流比・巻数比</a><br><br>

機能と目的<br>
変圧器の1次側と2次側に適正な電流比が出ているかを調べる。<br>
変圧器内部に異常がないかを監視する。<br>
変圧器の事故につながる異常を検出して電力系統から切り離す。<br><br>

回転機の短絡故障の保護。<br>
RDF発電機保護用は交流発電機などの回転機の短絡保護に適している。<br>
主に発電機電機子巻線の短絡故障を検出し、保護する。<br><br>

変圧器の事故例<br>
・送電線への雷撃など外部事故に起因する短絡電流で変圧器内部の機械的衝撃や振動で絶縁破壊<br>
・変圧器の絶縁物の劣化等に起因する絶縁破壊<br>
・過負荷による事故<br>
・巻線間の短絡（層間短絡）<br>
・巻線と鉄心間の絶縁破壊による地絡<br>
・高圧側巻線と低圧側巻線の混触<br><br>

変圧器保護の種類<br>
①事故電流から判断する方式（電気式リレー）<br>
②変圧器タンク内の分解ガスから判断する方式（機械式リレー）<br>

<h2>TOSHIBA VBR51D</h2>
⇒<a href="https://www.toshiba-tips.co.jp/download/catalog/trs/v_series.pdf">取扱説明書（TOSHIBA VBR51D）</a><br><br>

外部接続図<br>
<img src="images/rdf1.png" style="max-width:600px;" /><br>
（<a href="https://www.toshiba-tips.co.jp/download/catalog/trs/v_series.pdf">画像引用元</a>）<br><br>

<h2>試験方法</h2>
①動作値<br>
0.2A±10%（入力条件：一端流入時）<br><br>

②復帰値<br>
動作値の９０％以上<br><br>

③動作時間<br>
過渡電流対策無し設定：50ms以下<br>
過渡電流対策付き設定：第14−18−2図を参照ください。<br><br>

④復帰時間<br>
100ms以下<br>

<?php include("footer.php"); ?>