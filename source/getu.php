<?php include("header.php"); ?>

<h2>最大需要電力・使用電力量・一日平均電力量 自動計算</h2>
<p>月次点検時に、需要電力・乗率・今回指針・前回指針を入力すると、最大需要電力と使用電力量を自動計算する。前回点検日と今回実施日を入力すると、点検間隔の日数から一日平均電力量も自動計算する。</p>

<div class="article-summary">
<span class="article-summary-title">計算式</span>
<ul>
<li>最大需要電力 ＝ 需要電力 × 乗率</li>
<li>使用電力量 ＝（今回指針 − 前回指針）× 乗率</li>
<li>一日平均電力量 ＝ 使用電力量 ÷ 前回点検日から今回実施日までの日数</li>
</ul>
</div>

<div id="getu-calc" style="max-width:680px;margin:24px 0;padding:20px;background:#fff;border:1px solid #d8e0e6;border-radius:10px;box-sizing:border-box;">
  <h3 style="margin-top:0;">入力</h3>

  <label for="demandPower"><strong>① 需要電力</strong></label><br>
  <input id="demandPower" type="number" inputmode="decimal" step="any" placeholder="例：12.5" style="width:100%;max-width:320px;padding:10px;margin:6px 0 14px;box-sizing:border-box;"><br>

  <label for="multiplier"><strong>② 乗率</strong></label><br>
  <input id="multiplier" type="number" inputmode="decimal" step="any" placeholder="例：10" style="width:100%;max-width:320px;padding:10px;margin:6px 0 14px;box-sizing:border-box;"><br>

  <label for="currentReading"><strong>③ 今回指針</strong></label><br>
  <input id="currentReading" type="number" inputmode="decimal" step="any" placeholder="例：1250.6" style="width:100%;max-width:320px;padding:10px;margin:6px 0 14px;box-sizing:border-box;"><br>

  <label for="previousReading"><strong>④ 前回指針</strong></label><br>
  <input id="previousReading" type="number" inputmode="decimal" step="any" placeholder="例：1200.4" style="width:100%;max-width:320px;padding:10px;margin:6px 0 18px;box-sizing:border-box;"><br>

  <label for="previousDate"><strong>前回点検日</strong></label><br>
  <input id="previousDate" type="date" style="width:100%;max-width:320px;padding:10px;margin:6px 0 14px;box-sizing:border-box;"><br>

  <label for="currentDate"><strong>今回実施日</strong></label><br>
  <input id="currentDate" type="date" style="width:100%;max-width:320px;padding:10px;margin:6px 0 18px;box-sizing:border-box;">

  <h3>計算結果</h3>
  <table style="width:100%;max-width:620px;">
    <tr><th>項目</th><th>計算結果</th></tr>
    <tr><td>最大需要電力</td><td><strong id="maxDemand">―</strong></td></tr>
    <tr><td>使用電力量</td><td><strong id="usedEnergy">―</strong></td></tr>
    <tr><td>点検間隔</td><td><strong id="daysBetween">―</strong></td></tr>
    <tr><td>一日平均電力量</td><td><strong id="dailyAverage">―</strong></td></tr>
  </table>
  <p id="calcMessage" style="margin-bottom:0;"></p>
</div>

<script>
(function () {
  const ids = ['demandPower','multiplier','currentReading','previousReading','previousDate','currentDate'];
  const el = id => document.getElementById(id);
  const numberText = value => Number.isFinite(value) ? value.toLocaleString('ja-JP', {maximumFractionDigits: 3}) : '―';

  function calculateGetu() {
    const demand = parseFloat(el('demandPower').value);
    const multiplier = parseFloat(el('multiplier').value);
    const current = parseFloat(el('currentReading').value);
    const previous = parseFloat(el('previousReading').value);

    const maxDemand = demand * multiplier;
    const usedEnergy = (current - previous) * multiplier;

    el('maxDemand').textContent = Number.isFinite(maxDemand) ? numberText(maxDemand) + ' kW' : '―';
    el('usedEnergy').textContent = Number.isFinite(usedEnergy) ? numberText(usedEnergy) + ' kWh' : '―';

    let days = NaN;
    if (el('previousDate').value && el('currentDate').value) {
      const d1 = new Date(el('previousDate').value + 'T00:00:00');
      const d2 = new Date(el('currentDate').value + 'T00:00:00');
      days = Math.round((d2 - d1) / 86400000);
    }

    el('daysBetween').textContent = Number.isFinite(days) && days > 0 ? days + '日' : '―';

    if (Number.isFinite(usedEnergy) && Number.isFinite(days) && days > 0) {
      el('dailyAverage').textContent = numberText(usedEnergy / days) + ' kWh/日';
      el('calcMessage').textContent = '';
    } else {
      el('dailyAverage').textContent = '―';
      if (Number.isFinite(days) && days <= 0) {
        el('calcMessage').textContent = '今回実施日は、前回点検日より後の日付を入力してください。';
      } else {
        el('calcMessage').textContent = '';
      }
    }
  }

  ids.forEach(id => el(id).addEventListener('input', calculateGetu));
})();
</script>

<h2>月次点検</h2>

点検頻度<br>
・原則、毎月１回<br>
・絶縁監視装置を設置する場合、隔月に省略可<br>
・小規模高圧需要設備（受電電力50kW未満⇒例：64kVA未満）の場合、３ヶ月に１回に省略可<br><br>

省略上の注意<br>
・保安管理業務を外部委託している場合<br>
・保安規程に書いて必要がある<br><br>

報告書の保存期限は３年間<br>
・それを超えた書類については破棄してもいい？<br>
・電子データで保管している場合、そもそも紙の保管は不要？<br><br>

外観点検（目視点検）<br>
・引込設備<br>
・受電設備<br>
・受・配電盤<br>
・接地工事<br>
・構造物<br>
・発電設備<br>
・蓄電池設備、負荷設備<br><br>

測定点検<br>
・電圧メーターまたはテスターにて電圧値の測定<br>
・電流メーターにて負荷電流の測定<br>
・変圧器２次側Ｂ種接地線に係る漏れ電流の測定<br>
・高圧機器本体及び接続部等の温度測定<br><br>

使用機器<br>
・テスター<br>
・<a href="clamp.php">I0クランプメーター</a><br>
・<a href="leaker.php">I0rクランプリーカー</a><br>
・放射温度計<br>

<h2>端子・金属接合部は異常発熱に要注意</h2>

<p>月次点検・年次点検では、端子部分や母線・ケーブル端子など、金属と金属が接続されている部分を重点的に確認する。</p>

<p>締付け不良、経年劣化、腐食などによって接触抵抗が大きくなると、その部分が局部的に発熱することがある。発熱が続くと接続部の変色や酸化、周囲の絶縁物の劣化・焦げ、黒いすす状の付着物などが現れる場合がある。銅や銅合金の部分では、条件によって緑青のような青緑色の腐食生成物が見られることもある。</p>

<div class="article-warning">
<span class="article-warning-title">注意</span>
充電中の設備へ不用意に接近したり、盤内へ手や測定器を入れたりしない。月次点検の活線状態では、設備の構造・離隔距離・保安規程・作業手順に従い、安全を確保できる範囲で確認する。
</div>

<h3>月次点検ではサーモグラフィーが有効</h3>
<p>月次点検では設備が充電され、実際に負荷電流が流れているため、接触抵抗による異常発熱を発見しやすい。放射温度計に加えてサーモグラフィーを使用すると、接続部の温度分布を画像として確認でき、周囲と比較して高温になっている箇所を視覚的に把握しやすい。</p>

<p>端子台、ブレーカー・開閉器の接続部、母線接続部、ケーブル端末などは、左右相・同種機器・周辺部との温度差も見ながら確認すると異常の手掛かりになる。ただし、温度は負荷電流、周囲温度、放射率、測定距離などでも変化するため、温度だけで良否を断定しない。</p>

<h3>年次点検では盤の裏側・死角まで目視する</h3>
<p>停電を伴う年次点検では、停電・開放・無電圧確認など所定の安全措置を行ったうえで、通常の月次点検では見えにくい場所も確認する。</p>

<div class="article-field-note">
<span class="article-field-note-title">現場メモ：正面だけでは見つからない異常がある</span>
キュービクルや電気室では、正面から見ただけでは配線や接続部の裏側が見えないことがある。安全に立ち入れる状態を確保した年次点検では、高圧・低圧配線の端子部、母線接続部、ケーブル接続部などを裏側や下側からもよく観察する。<br><br>
黒変、すす状の跡、変色、緑青、絶縁物の焦げ・変形、端子周辺の不自然な汚れなど、普段見えない場所から思わぬ異常が見つかることがある。
</div>

<h2>月次点検で漏洩電流発生場所を特定する方法</h2>

■現状の把握<br>
まずは絶縁監視装置にて漏電が出ているトランスを発見する。<br>
そして漏電警報が出たデータを蓄積し、日時、発生時間、漏電値を記録する。<br>
そしてデータ分析し、どの時間帯に漏電が多いのかを把握しておく。<br><br>

■I0rクランプリーカーを使用する<br>
I0クランプメーターではなくI0rクランプリーカーを使用する。<br>
理由はI0クランプだと静電容量成分のI0cも含まれてしまうため正確な値が出ない。<br>
I0rクランプリーカーで抵抗成分I0rのみ測定する。<br><br>

■下流MCCBにて計測<br>
戻り道のトランスB種接地線ではなく下流MCCBにてIor測定をする。<br>
I0rで測定できるスペースがあれば、MCCB個別で測定し、漏電発生箇所の当たりをつける。<br>

<h2>月次点検で非常用発電機は起動試験する？</h2>

保安規程に書かれてあればする。<br>
騒音、排ガスの苦情があり設置者が辞めてくれといったらやらない。<br>
報告書には記入できる部分だけして「目視点検」と書く。<br><br>

小型のガスタービンで、保安規程には運転の記載はない。<br>
メーカー推奨は毎月無負荷10分運転って書いているのでやってる。<br>
潤滑油の関係で必要らしい。<br>

<h2>月次点検 見積もり金額予想（税別）</h2>
・設備内容：300kVA PF-S型 PAS<br>
・月次点検費：8000円<br>
・機器使用代：2000円<br>
・移動交通費：1000円<br>
・月次点検１回分：11000円<br>
・１年契約：11000円 × 12回分 = 132,000円（税別）<br><br>

追加費用<br>
・非常用発電機１台：1500円<br>
・サブ変あり：1500円<br>

<?php include("footer.php"); ?>