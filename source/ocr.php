<?php include("header.php"); ?>

<h2>OCR（51）過電流継電器とは</h2>

<img src="images/ocr8.png" style="max-width:200px;" alt="OCR 過電流継電器の図記号"><br>

OCR（Over Current Relay：過電流継電器）は、CT（計器用変流器）で高圧回路の電流を取り込み、過負荷や短絡などの過電流を検出して遮断器を動作させる保護継電器。<br>
一般に限時要素「51」と瞬時要素「50」を組み合わせ、過電流の大きさと継続時間に応じて保護する。<br><br>

<a href="ct.php">CT（計器用変流器）</a> → OCR → <a href="vcb.php">VCB（真空遮断器）</a>という流れで保護回路を構成することが多い。<br><br>

OCRの引外し方式は主に次の2種類。<br>
・<a href="ocr_i.php">電流引外し方式</a><br>
・<a href="ocr_v.php">電圧引外し方式</a><br><br>

継電器によってはR相・T相、限時・瞬時などの動作表示が残るため、事故後は復帰させる前に表示内容を確認・記録する。<br>

<h2>限時要素（51）</h2>

限時要素は、電流が整定値を超えたときに一定時間または反限時特性で動作する要素。<br>
主に過負荷領域の保護を担当するが、事故電流の大きさや保護協調によっては短絡事故の後備保護としても働く。<br><br>

「限時＝過負荷だけ」「瞬時＝短絡だけ」と完全に分けるのではなく、実際はOCR・PF・MCCB・上位配電線OCRなどの動作特性曲線を重ねて保護協調を確認する。<br>

<h2>限時特性の種類</h2>

OCRには機種により次のような動作時間特性がある。<br><br>

<strong>超反限時（EI：Extremely Inverse）</strong><br>
電流が大きくなるほど非常に速く動作する特性。ヒューズや熱特性を持つ機器との協調に使われることがある。<br><br>

<strong>強反限時（VI：Very Inverse）</strong><br>
超反限時と反限時の中間的な特性。配電線や変圧器保護などで使用される。<br><br>

<strong>反限時（NI：Normal Inverse）</strong><br>
電流が大きいほど動作時間が短くなる一般的な反限時特性。<br><br>

<strong>定限時（DT：Definite Time）</strong><br>
設定値を超えると、電流の大きさにかかわらず設定した時間で動作する特性。<br><br>

使用できる特性、ダイヤル範囲、動作時間は機種ごとに異なるため、必ず取扱説明書・特性曲線を確認する。<br>

<h2>限時電流の整定</h2>

限時整定は、通常の負荷変動では動作せず、過負荷時には設備を保護できる値にする。<br>
高圧自家用受電設備では、契約電力から求めた負荷電流の120～150%程度を一つの目安とする例があるが、最終的には負荷実態、CT比、変圧器容量、PF・MCCB、上位系統との保護協調で決定する。<br><br>

三相回路の負荷電流は、力率を考慮する場合、次式で求める。<br><br>

<strong>I = P ÷（√3 × V × cosφ）</strong><br><br>

OCR二次側の整定計算値<br><br>
<strong>Iset = I ×（CT二次 / CT一次）× 整定倍率</strong><br><br>

例：契約電力200kW、6.6kV、力率90%、CT比30/5A、整定倍率150%<br><br>
200 ÷（√3 × 6.6 × 0.9）≒19.4A<br>
19.4 ×（5/30）×1.5 ≒4.9A<br><br>

使用する継電器の整定目盛から適切な値を選ぶ。5Aタップがある機種なら5Aが候補になる。<br><br>

<h3>限時タップ計算</h3>
<form name="ocr">
契約電力 <input type="number" name="kw" value="200"> kW<br>
力率 <input type="number" name="pf" value="0.9" step="0.01" min="0.1" max="1"> cosφ<br>
CT一次 <input type="number" name="Ict1" value="30"> A<br>
整定倍率 <input type="number" name="rate" value="1.5" step="0.1"> 倍<br>
<input type="button" value="計算" onclick="Add()">
<input type="number" name="Itap" step="0.1"> A（二次側計算値）<br>
</form>

<script>
function Add(){
  var kw = parseFloat(document.ocr.kw.value);
  var pf = parseFloat(document.ocr.pf.value);
  var Ict1 = parseFloat(document.ocr.Ict1.value);
  var rate = parseFloat(document.ocr.rate.value);
  if(!kw || !pf || !Ict1 || !rate){ return; }
  document.ocr.Itap.value = ((kw / (1.732 * 6.6 * pf)) * (5 / Ict1) * rate).toFixed(1);
}
</script>

<h2>ダイヤル整定（動作時間）</h2>

電流タップだけでなく、ダイヤル（レバー・時間整定）も保護協調上重要。<br>
受電OCRは、変圧器一次PF・低圧側保護装置・上位の配電線OCRなどと動作時間が重ならないように整定する。<br><br>

単純に「電力会社より速ければよい」ではなく、事故電流ごとに動作特性曲線を重ね、必要な協調時間差を確保できているか確認する。<br>

<h2>瞬時要素（50）</h2>

瞬時要素は、短絡などの大電流を高速に検出する要素。<br>
整定が低すぎると<a href="inrush.php">変圧器の励磁突入電流</a>や電動機始動電流で不要動作し、高すぎると構内短絡時に上位保護が先に動作する可能性がある。<br><br>

高圧受電設備では、契約負荷電流の1000～1500%程度を一つの目安とする例がある。これはあくまで出発点で、次を確認して最終決定する。<br>
・変圧器の励磁突入電流<br>
・電動機の始動電流<br>
・構内最小短絡電流<br>
・CT比とOCRの整定範囲<br>
・上位配電線OCRとの協調<br><br>

変圧器合計容量から「定格電流×10倍」で概算する方法もあるが、すべての設備にそのまま適用できる整定式ではない。<br>

<h2>瞬時整定の概算例</h2>

例：変圧器合計800kVA、6.6kV、CT比100/5Aで、仮に一次定格電流の10倍を確認する場合。<br><br>

一次定格電流<br>
800 ÷（√3 × 6.6）≒70A<br><br>

10倍と仮定した一次電流<br>
70 × 10 = 700A<br><br>

OCR二次側<br>
700 ×（5/100）= 35A<br><br>

継電器の整定目盛が10、15、20、25、30、35、40A…なら35Aまたは協調条件を満たす上位値を検討する。<br>
<strong>実際の整定は、この計算だけで決めず保護協調曲線で確認する。</strong><br>

<h3>瞬時要素 概算計算（定格電流×倍率）</h3>
<form name="I50">
設備容量 <input type="number" name="kva" value="800"> kVA<br>
CT一次 <input type="number" name="Ict1" value="100"> A<br>
倍率 <input type="number" name="rate" value="10" step="1"> 倍<br>
<input type="button" value="計算" onclick="Add2()">
<input type="number" name="Itap" step="0.1"> A（二次側計算値）<br>
</form>

<script>
function Add2(){
  var kva = parseFloat(document.I50.kva.value);
  var Ict1 = parseFloat(document.I50.Ict1.value);
  var rate = parseFloat(document.I50.rate.value);
  if(!kva || !Ict1 || !rate){ return; }
  document.I50.Itap.value = ((kva / (1.732 * 6.6)) * (5 / Ict1) * rate).toFixed(1);
}
</script>

<h2>OCRとVCBの遮断時間</h2>

事故除去時間はOCRの動作時間だけではなく、VCBの遮断時間も含めて考える。<br><br>

例：瞬時要素50ms、VCBが50Hzで3サイクル定格の場合<br>
VCB遮断時間 = 3 ÷ 50 = 0.06s<br>
合計の目安 = 0.05 + 0.06 = 0.11s<br><br>

ただし、VCBの定格遮断時間やOCRの実動作時間は機種により異なる。上位OCRとの協調確認では、対象機器の特性曲線と遮断器仕様を使用する。<br>

<h2>瞬時要素の試験</h2>

瞬時試験の試験電流・判定時間は、OCRの機種・規格・設定特性に従う。<br>
例えば三菱MOC系の一部機種では、瞬時整定値の200%入力時に50ms以下という仕様があるが、これを全OCR共通の判定基準として扱わない。<br><br>

MOC-A3シリーズでは瞬時要素の動作時間特性は整定値に対する電流倍率で変化し、概ね130%以上の領域では約50msとなる特性が示されている。試験時はメーカーの試験方法・取扱説明書を優先する。<br><br>

<img src="https://blog.memo-labo.com/wp-content/uploads/2023/04/image.png" style="max-width:500px;" alt="OCR瞬時要素の特性"><br>
<img src="https://blog.memo-labo.com/wp-content/uploads/2023/04/image-1.png" style="max-width:500px;" alt="OCR瞬時要素の特性"><br>

<h2>瞬時試験で整定値を下げる場合の注意</h2>

試験器の出力容量の都合で、瞬時整定を一時的に低い値へ変更して試験する方法が用いられることがある。<br>
ただし、設定変更を行う場合はメーカー手順と保安規程・試験要領に従い、試験前後の設定値を記録する。<br><br>

特に注意する設定<br>
・限時電流タップ<br>
・ダイヤル（時間整定）<br>
・瞬時電流整定<br>
・瞬時LOCK／不動作設定<br>
・周波数設定<br><br>

<strong>試験後の戻し忘れは保護協調を崩す重大な原因になる。</strong><br>
試験前設定を写真・記録表などに残し、復旧時に指差し確認するのが安全。<br>

<h2>大電流試験時の注意</h2>

瞬時要素は数十Aの二次電流が必要になる場合があり、試験器や電源側の容量不足で設定電流まで上がらないことがある。<br>
試験器の出力レンジ・内部インピーダンス・電源容量を確認し、試験器メーカーの取扱説明書に従う。<br><br>

電流引外し方式では、試験電流がトリップ回路にも関係するため、異常に長時間通電するとトリップコイルや試験回路へ熱的負担を与える可能性がある。動作しない場合に大電流を流し続けない。<br>

<h2>復電時にVCB投入直後、OCR瞬時で開放する場合</h2>

復電時には変圧器の励磁突入電流、電動機・コンデンサなどの負荷条件により大きな過渡電流が流れることがある。<br>
ただし、VCB投入直後にOCR瞬時が動作した場合、実際の短絡事故との区別が必要。<br><br>

<strong>原因確認なしに繰り返し投入しない。</strong><br>
まずOCRの動作表示、事故電流記録、絶縁状態、下位回路の異常、整定値を確認する。<br><br>

設備の健全性が確認でき、励磁突入が原因と判断できる場合は、負荷を区分して段階的に復電する方法を検討する。LBSなどを開放して変圧器・負荷を分割投入する場合も、設備構成と操作手順を確認して行う。<br><br>

同様の不要動作を繰り返す場合は、瞬時整定値を安易に上げるのではなく、励磁突入電流、最小短絡電流、上位OCRとの協調を再検討する。<br>

<h2 id="r1">OCRとVCBの連動遮断試験</h2>

連動試験では、OCRが動作してからVCBが実際に開極するまでを含め、保護回路全体が正常に動作するか確認する。<br>
確認項目の例<br>
・OCRの動作<br>
・トリップ回路<br>
・VCBの引外しコイル<br>
・VCBの開極<br>
・警報、表示、インターロック<br><br>

VCBが3サイクル定格なら、50Hzでは3/50=0.06s、60Hzでは3/60=0.05sが一つの目安になる。<br>
ただし連動試験の合否判定は、OCR単体特性・VCB仕様・メーカー基準・保安規程などに基づいて行う。<br>

<h2>試験時にダイヤルを変更するか</h2>

OCR試験では、ダイヤル1・10など特定の値へ変更して試験する方法と、運用整定のまま確認する方法がある。どの方法を採用するかはOCRの機種、メーカー推奨、試験要領による。<br><br>

メーカー基準がJISの許容範囲より厳しい場合もあるため、機種ごとの取扱説明書に記載された試験条件・許容値を優先して確認する。<br><br>

設定を変更した場合の代表的な事故例<br>
・ダイヤルを遅い側へ変更したまま戻し忘れ、上位OCRが先に動作する<br>
・ダイヤルを速い側へ変更したまま戻し忘れ、通常負荷で不要動作する<br>
・瞬時要素をLOCKまたは最大値に変更したまま戻し忘れ、短絡保護が期待どおり働かない<br><br>

<strong>試験前設定の記録 → 試験 → 復旧 → 設定値照合</strong>までを一連の作業として扱う。<br>

<h2>現場で最低限確認するポイント</h2>

・CT比とCT二次定格<br>
・限時電流タップ<br>
・限時特性（EI・VI・NI・DTなど）<br>
・ダイヤル／時間整定<br>
・瞬時電流整定とLOCK状態<br>
・引外し方式（電流／電圧）<br>
・OCRとVCBの連動<br>
・上位OCR、PF、MCCBとの保護協調<br>
・試験後に全設定値が元へ戻っているか<br><br>

関連：<a href="ctt.php">CTT</a> / <a href="ocr_i.php">OCR電流引外し</a> / <a href="ocr_v.php">OCR電圧引外し</a> / <a href="inrush.php">励磁突入電流</a> / <a href="vcb.php">VCB</a><br>

<?php include("footer.php"); ?>