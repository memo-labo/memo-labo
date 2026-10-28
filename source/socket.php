<?php include("header.php"); ?>

<h2>パワーリレーとソケットの端子番号</h2>

<p><strong>リレーソケットは、コイル端子と接点端子の位置を先に確認すると配線を追いやすくなります。</strong></p>

<p>ただし、同じシリーズでもリレー本体・ソケット・接点構成によって番号が変わるため、<strong>実機の側面図・ソケット刻印・メーカー配線図を最優先</strong>で確認します。</p>

<p>参考：<a href="https://docs.rs-online.com/285a/A700000007807882.pdf" rel="noopener">OMRON リレー資料</a></p>

<h2>PYFZ-08の例</h2>

<table>
<tr><th>用途</th><th>端子</th></tr>
<tr><td>接点1</td><td>b: 1 / a: 5 / c: 9</td></tr>
<tr><td>接点2</td><td>b: 4 / a: 8 / c: 12</td></tr>
<tr><td>コイル</td><td>13 - 14</td></tr>
</table>

<p>元の端子配置イメージ：</p>
<pre>○ 4 1
8 ○ 5
12 ○ 9
14 13 ○</pre>

<h2>PYF11A（MY4N）の例</h2>
<img src="images/my4n.jpg" style="max-width:300px;" alt="OMRON MY4Nとソケット"><br>

<table>
<tr><th>用途</th><th>端子</th></tr>
<tr><td>接点1</td><td>b: 1 / a: 4 / c: 7</td></tr>
<tr><td>接点2</td><td>b: 2 / a: 5 / c: 8</td></tr>
<tr><td>接点3</td><td>b: 3 / a: 6 / c: 9</td></tr>
<tr><td>コイル</td><td>10 - 11</td></tr>
</table>

<h2>PYFZ-14の例</h2>
<p>4組の切替接点を持つ構成例です。</p>

<table>
<tr><th>用途</th><th>端子</th></tr>
<tr><td>接点1</td><td>b: 1 / a: 5 / c: 9</td></tr>
<tr><td>接点2</td><td>b: 2 / a: 6 / c: 10</td></tr>
<tr><td>接点3</td><td>b: 3 / a: 7 / c: 11</td></tr>
<tr><td>接点4</td><td>b: 4 / a: 8 / c: 12</td></tr>
<tr><td>コイル</td><td>13 - 14</td></tr>
</table>

<p>使用例としてMYシリーズなどがありますが、組み合わせるリレー形式は必ず適合表で確認します。</p>

<h2>MY2Vなどを見るときのポイント</h2>
<img src="images/socket_5.png" style="max-width:200px;" alt="リレー端子配置の例"><br>

<ul>
  <li>まずコイル端子を探す</li>
  <li>次にCOM（共通端子）を確認する</li>
  <li>無励磁時に導通する側がb接点</li>
  <li>励磁時に導通する側がa接点</li>
</ul>

<h2>a・b・c接点の意味</h2>

<ul>
  <li><strong>a接点</strong>：コイル無励磁で開、励磁で閉</li>
  <li><strong>b接点</strong>：コイル無励磁で閉、励磁で開</li>
  <li><strong>c接点</strong>：a接点とb接点を切り替える共通端子を持つ接点</li>
</ul>

<p>端子番号だけ暗記するより、「コイル」「COM」「a」「b」の関係を追った方が、別形式のリレーでも判断しやすくなります。</p>

<h2>保護継電器との組み合わせ</h2>

<p>RPR、UVR、OVGRなどの保護継電器では、出力接点で直接大きな負荷を開閉せず、パワーリレーを介してトリップ回路や警報回路を動かす構成があります。</p>

<p>例：</p>
<ol>
  <li>保護継電器のa接点が閉路</li>
  <li>パワーリレーのコイルへ電圧印加</li>
  <li>パワーリレーの接点が切り替わる</li>
  <li>警報・トリップなどの回路が動作</li>
</ol>

<h2>点検時の注意</h2>

<ul>
  <li>端子番号を推測だけで判断しない</li>
  <li>ソケットとリレー本体の組み合わせを確認する</li>
  <li>コイル定格電圧（AC/DC、24V/100Vなど）を確認する</li>
  <li>無電圧で導通確認できる場合はa・b・COMをテスターで確認する</li>
  <li>運転中の回路では不用意に端子へ触れない</li>
</ul>

<?php include("footer.php"); ?>