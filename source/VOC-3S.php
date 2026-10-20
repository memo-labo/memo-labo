<?php include("header.php"); ?>


<h2>零相電圧検出装置（据え置き型・出力部一体型）</h2>

<img src="images/20260906-1.jpg" style="max-width:600px;width:100%;" alt=""><br><br>

<img src="images/20260906-2.jpg" style="max-width:800px;width:100%;" alt=""><br><br>

製品名：omron VOC-3S（2012/03 受注終了）<br>
ボックス型ではなく高圧受電部と出力部が一体となった据え置き型<br>
外観が「高圧進相コンデンサ」と非常によく似ている。<br><br>

メリット<br>
高圧回路に実際に電圧を印加する事でしか試験を行えない仕組み。<br>
試験端子ではなく実際の運用状態と同じ条件にて正確な試験が行える。<br><br>

デメリット<br>
高圧母線からZPDへの回路を切り離すためPCカットアウトなどの設置が必要。<br>
床への据え置き型で、かつ高圧母線を床まで伸ばす必要があるためスペースが必要。<br>
がいし型に比べて材料費、工数がかかり、割高。<br><br>


<h2>試験方法</h2>

<img src="images/20260906.svg" style="max-width:800px;width:100%;" alt=""><br><br>

VOC-3Sに接続された高圧端子部分を３相短絡させる。<br>
VOC-3Sの上位にあるPCやLBS等の断路器で回路を断路させる。<br>
VOC-3Sの高圧部に試験機の電圧Vを接続する。<br>
VOC-3Sのアース端子に試験機の電圧Eを接続する。<br>
試験機から電圧を印加するとVOC-3SのY15とY2から電圧が出力される。<br>
VOC-3SのY15-Y2はOVGRやDGRのY1-Y2端子に接続されている。<br>
保護継電器はその電圧を感知して高圧回路の零相電圧を検出する。<br><br>

VOC-3S 低圧側出力端子<br>
・Y15<br>
・Y16<br>
・Y2<br><br>

50Hz出力の場合<br>
・Y15⇒継電器のY1端子へ<br>
・Y2⇒継電器のY2端子へ<br><br>

60Hz出力の場合<br>
・Y16⇒継電器のY1端子へ<br>
・Y2⇒継電器のY2端子へ<br><br>

出力電圧<br>
AC7.6V（AC6600V系完全地絡時）<br>

<?php include("footer.php"); ?>