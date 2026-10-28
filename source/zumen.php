<?php include("header.php"); ?>

<h2>単線結線図の書き方</h2>

<p><strong>単線結線図は、電源から負荷までを「どの機器が、どの順番で接続されているか」が分かるように簡略化して描く図面です。</strong></p>

<p>高圧受電設備なら、責任分界点からPAS・UGS、VCT、DS、VCB、CT・VT、変圧器、低圧主幹へ順番に追えるようにすると見やすくなります。</p>

<h2>まず描く順番</h2>

<ol>
  <li>受電点・責任分界点</li>
  <li>PAS・UGSなど区分開閉器</li>
  <li>VCT・計器用変成器</li>
  <li>DS・LBS・VCBなど高圧開閉器</li>
  <li>CT・VT・ZCT・ZPDなど検出機器</li>
  <li>OCR・DGR・UVRなど保護継電器</li>
  <li>変圧器・コンデンサ・リアクトル</li>
  <li>低圧主幹・分岐回路</li>
</ol>

<p>最初から細かい制御配線まで書かず、まず主回路を完成させてから保護・計測情報を追加すると整理しやすくなります。</p>

<h2>Inkscapeで作る方法</h2>

<p>Inkscapeは無料で利用できるベクター編集ソフトです。線・文字・図記号を自由に配置でき、SVGやPDFなどで保存できるため、単線結線図や説明図の作成にも使えます。</p>

<p>ベクターデータは拡大しても線や文字が荒れにくく、Web掲載用のSVGにも向いています。</p>

<h2>高圧受電設備の単線結線図の例</h2>
<img src="images/zumen2.svg" alt="高圧受電設備の単線結線図"><br>

<h2>複線図との違い</h2>

<p><strong>単線結線図</strong>は三相回路などを1本の線で簡略化し、設備全体を把握するための図面です。</p>

<p><strong>複線図</strong>は各相・各配線を個別に描き、実際の結線や電流経路を確認するときに使います。</p>

<img src="svg/fukusenzu1.svg" alt="高圧受電設備の複線図"><br>

<h2>図面に入れておくと便利な情報</h2>

<ul>
  <li>機器番号（27、51、52、64、67、89など）</li>
  <li>機器形式・定格</li>
  <li>CT比・VT比</li>
  <li>OCR・DGRなどの整定値</li>
  <li>変圧器容量・結線</li>
  <li>ケーブル種類・サイズ</li>
  <li>接地種別</li>
  <li>責任分界点</li>
</ul>

<p>⇒<a href="number.php">制御機器番号一覧</a></p>

<h2>保護継電器の図記号</h2>

<img src="images/ocr8.png" style="max-width:150px;" alt="OCR 過電流継電器の記号"><br>
<img src="images/gr10.png" style="max-width:150px;" alt="GR 地絡継電器の記号"><br>
<img src="images/dgr_4.png" style="max-width:150px;" alt="DGR 地絡方向継電器の記号"><br>
<img src="images/uvr2.png" style="max-width:150px;" alt="UVR 不足電圧継電器の図記号"><br>
<img src="images/ovr2.png" style="max-width:150px;" alt="OVR 過電圧継電器の図記号"><br>
<img src="images/ovgr11.png" style="max-width:150px;" alt="OVGR 地絡過電圧継電器の記号"><br>

<p>⇒<a href="svg/hogozu.svg">保護継電器の図記号（SVG）</a></p>

<h2>保護具の耐電圧試験図の例</h2>
<img src="svg/protect1.svg" alt="絶縁用保護具の耐電圧試験図"><br>
<p>⇒<a href="svg/protect1.svg">保護具の耐電圧試験図（SVG）</a></p>

<h2>図面を見やすくするコツ</h2>

<ul>
  <li>主回路は太め、制御・注記は細めにする</li>
  <li>文字サイズを統一する</li>
  <li>同じ機器記号は同じ大きさにする</li>
  <li>線の交差をできるだけ減らす</li>
  <li>電源側を上または左、負荷側を下または右に統一する</li>
  <li>色だけに頼らず線種・文字でも区別する</li>
</ul>

<h2>PDFの建築図を下絵にする</h2>

<p>建築図PDFを読み込み、必要な部分を下絵として電気設備・配線・記号を重ねる方法もあります。</p>

<p>PDFがベクターデータなら編集しやすい場合がありますが、スキャンPDFは画像なのでそのまま線編集できません。必要に応じてトレースします。</p>

<img src="images/20211102-1.png" style="max-width:500px;" alt="PDF図面をInkscapeで編集する例"><br>
<video src="images/20211102-2.mp4" style="width:100%;max-width:500px;" controls></video>

<h2>図面データを扱うときの注意</h2>

<p>建築図・受変電設備図には、施設名・設備配置・セキュリティ情報が含まれる場合があります。外部のオンライン変換サービスへアップロードする場合は、機密性や利用規約を確認します。</p>

<?php include("footer.php"); ?>