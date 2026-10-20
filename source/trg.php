<?php include("header.php"); ?>
  
<h2>TRG-DV30（RPR・OVGR）</h2>
<a href="http://www.taiwadenki.co.jp/product/product_search.php">取扱説明書</a><br><br>

外観<br>
<img src="images/trg1.jpg" style="max-width:500px;" /><br>

裏面端子配列<br>
C1 C2 V1 V2 Y1 Y2 a1 a2<br>
P1 P2 To T1 T2 Do D1 D2<br><br>

<img src="images/trg30-1.png" style="max-width:700px;" /><br><br>

Do D1 D2：リレーロック（不動作）<br>
・D0-D1にACまたはDC入力でOVGR不動作<br>
・D0-D2にACまたはDC入力でRPR不動作<br>
T0-T1：OVGRのa接点<br>
T0-T2：RPRのa接点<br>
a1-a2：警報用のb接点<br>

<h2>試験方法</h2>

TRG-DV30の試験方法は<a href="rpr_shiken.php">三菱RPR CRV1-A01</a>と同じ。<br>
試験機メーカーにより電流と電圧の極性が異なるので試験機により試験管理値も異なる。<br>
試験管理値：公式HP⇒TRG-DV30⇒「試験管理値ダウンロード」から資料DL。<br>


<h2>その他機能</h2>
動作ＬＥＤ<br>
赤色。ＯＶＧＲ、ＲＰＲ動作時に点灯して自己保持する。<br>
制御電源オフで消灯するが、復電で再点灯する。<br>
復帰レバー操作することで自己保持を解除する。<br><br>

強制動作<br>
表示選択つまみで「ＯＶＧＲ強制動作」又は「ＲＰＲ強制動作」を選択する。<br>
強制動作ＳＷをリレー整定した動作時間以上押すことでリレー出力接点が強制動作する。<br>
OVGR、RPRのリレー整定が「ロック」の場合や「リレーロックＤＩ入力」がある場合は強制動作なし。<br>
また、装置異常警報出力接点（a1-a2/b接点）は動作しない。<br><br>

ＡＣ制御電源の停電補償<br>
内蔵したバックアップコンデンサで５秒間以上（動作時間整定値の最大値は5s）の動作が可能。<br>
外部に電源補償装置等を別置しなくとも単独で系統連系規定を満足できる。<br>
制御電源オフ時は、内蔵バックアップコンデンサの容量チェック自己診断機能がある。<br>
運転ＬＥＤ表示でバックアップ時間が目視で確認可能。<br>

<?php include("footer.php"); ?>