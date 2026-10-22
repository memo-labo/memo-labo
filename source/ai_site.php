<?php include("header.php"); ?>

<h2>でんきメモ AI化の流れ</h2>

<h3>現状（旧環境）</h3>
<ul>
<li>ロリポップで公開</li>
<li>各記事は <code>.php</code></li>
<li><code>header.php</code>、<code>footer.php</code> などを <code>include</code> して共通化</li>
<li><code>data.csv</code> にカテゴリ・ファイル名・タイトルなどを保存して簡易DBとして利用</li>
</ul>

<h3>移行後</h3>
<ul>
<li>GitHubでソースを管理</li>
<li>GitHub Actionsで静的サイトを生成</li>
<li>Cloudflare Workers + Static Assetsで公開</li>
<li>PHPそのものは実行せず、PHPで行っていた処理を静的サイト生成時に処理</li>
<li>PHPの <code>include</code> や <code>data.csv</code> の処理は、公開時ではなくビルド時に処理して完成したHTMLを生成</li>
<li>Cloudflareは生成済みHTML・CSS・画像などを静的アセットとして配信</li>
</ul>

<h3>ポイント</h3>
<p>元のPHPを材料に静的HTMLを生成する。ただし、ユーザーやGoogleから見えるURLは従来の <code>.php</code> のまま維持する。</p>
<div class="box1"><strong>例：</strong><br><code>ocr.php</code> → 内部では <code>ocr.html</code> を生成 → Cloudflare Workerが <code>ocr.php</code> へのアクセスに対して <code>ocr.html</code> を返す。</div>
<p>既存のURLを変えないことで、これまで蓄積してきた検索評価・被リンク・ブックマークなどへの影響をできるだけ抑えながら、静的サイトへ移行する。</p>

<h2>AI化するメリット</h2>

<h3>ロリポップ側の管理が不要になる</h3>
<p>Webサーバー、PHP環境、FTPなどを日常的に管理する必要がなくなる。</p>

<h3>レンタルサーバー会社への依存をなくせる</h3>
<p>サイト本体をGitHub＋Cloudflareへ移すため、ロリポップ側で障害が起きても memo-labo.com 本体には影響しなくなる。</p>
<p>※別サービスでロリポップを使い続ける場合は、その部分だけ別。</p>

<h3>サイト修正をAI中心にできる</h3>
<p>「このページのSEOを強くして」「関連記事を追加して」「表示がおかしいから直して」のように、基本的にテキストで指示すれば、GitHub上のコード修正までAI中心で進められる。</p>

<h3>SEO改善も継続的に任せられる</h3>
<p><code>title</code>、<code>description</code>、canonical、構造化データ、サイトマップ、内部リンク、記事構成などをまとめて改善できる。</p>

<h3>収益化もサイト設計と一緒に改善できる</h3>
<p>AdSense配置、Amazonアソシエイト導線、関連記事、収益につながりやすい記事のSEO強化などを、アクセス増加だけではなく収益増加を目的として調整できる。</p>

<h3>不具合修正もAI中心にできる</h3>
<p>GitHub上のコードやGitHub Actionsの実行状況などを確認して原因を追えるため、以前のようにPHPやHTMLを一つずつ自分で調べる作業をかなり減らせる。</p>

<?php include("footer.php"); ?>