<?php include("header.php"); ?>
  
<h2>自動点滅器（EEスイッチ）</h2>
<img src="images/ee2.jpg" style="width:300px;" alt=""><br>
周りが暗くなると自動的にスイッチが「入」になる。<br>
周りが明るくなると自動的にスイッチを「切」にする。<br>
EEは英語でElectric Eye（電気の目）<br>
EEスイッチはパナソニック製品の商品名<br><br>

結線図<br>
<img src="images/ee1.png" style="width:300px;" alt=""><br>

内部回路図<br>
Cdsセルで明るさを検知してスイッチをON・OFFにする。<br>
Cdsセルは周囲の明るさを検出するため常時電源が必要となる。<br>
<img src="images/ee5.png" style="width:300px;" alt=""><br>

<h2>取り付け方法</h2>
ネジ・ビス止め<br>
<img src="images/ee3.jpg" style="width:600px;" alt=""><br><br>

プラスチックの盤にビス止め<br>
<img src="images/ee9.jpg" style="width:400px;" alt=""><br><br>

金具部分を曲げてワイヤーバンドに引っ掛ける<br>
<img src="images/ee4.jpg" style="width:600px;" alt=""><br><br>

ステンバンドに引っ掛ける<br>
<img src="images/ee8.jpg" style="width:400px;" alt=""><br>


<h2>屋外照明の施工例</h2>

店舗用駐車場や有料パーキングの屋外照明でよく見かける施工<br>
ポールに電源を引き込んで盤で受けて自動点滅器を介して屋外照明に配線<br><br>
<img src="images/ee7.png" style="width:250px;" alt=""><br><br>

使用部材<br>
・屋外用照明<br>
・金属ポール<br>
・盤<br>
・EEスイッチ<br>
・VVFケーブル<br>
・VE管<br>
・メーター盤<br><br>


屋外照明と盤の配線図<br>
<img src="images/ee6.png" style="width:500px;" alt=""><br><br>

周囲が暗くなり、かつ特定時刻の間だけ外灯を点灯させたい場合のシーケンス<br><br>

<img src="images/eesw.svg" style="width:600px;" alt=""><br><br>

①電源B⇒EESW（BとWには常にAC印加、明暗でa接点動作、電源がRへ）R⇒TSのa接点⇒試験-切-自動SW⇒MC⇒電源W<br><br>

②電源B⇒TS⇒電源W<br>

<h2>TMU-1（日東工業）</h2>
上記の図「試験-切-自動SW」部分の機能を担当。<br>
EEスイッチ、タイマー、照明への中継点となり、かつ切替スイッチとヒューズがついている中継点。<br>
分電盤内にタイマーとセットでよく付いている。<br>

<?php include("footer.php"); ?>