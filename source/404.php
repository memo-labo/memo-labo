<?php
http_response_code(404);
include("header.php");

$requested_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$segments = array_values(array_filter(explode('/', trim($requested_path, '/')), 'strlen'));
$requested_name = $segments ? end($segments) : '';
$requested_slug = strtolower(pathinfo($requested_name, PATHINFO_FILENAME));

// /foo.php/index.php や /foo.php/1000 のような誤URLでも、元ページ名を候補判定に使う。
if (($requested_slug === 'index' || $requested_slug === '1000') && count($segments) >= 2) {
    $requested_slug = strtolower(pathinfo($segments[count($segments) - 2], PATHINFO_FILENAME));
}

$suggestions = [];
if ($requested_slug !== '' && file_exists(__DIR__ . '/data.csv')) {
    $fp = fopen(__DIR__ . '/data.csv', 'r');
    if ($fp) {
        while (($row = fgetcsv($fp)) !== false) {
            $slug = trim((string)($row[1] ?? ''));
            $title = trim((string)($row[2] ?? ($row[3] ?? '')));
            if ($slug === '' || $title === '' || $slug === '404') continue;
            if (!is_file(__DIR__ . '/' . $slug . '.php')) continue;

            $distance = levenshtein($requested_slug, strtolower($slug));
            $suggestions[] = [
                'slug' => $slug,
                'title' => $title,
                'distance' => $distance
            ];
        }
        fclose($fp);
    }
}

usort($suggestions, function($a, $b){
    return $a['distance'] <=> $b['distance'];
});

$max_distance = max(2, min(6, (int)ceil(strlen($requested_slug) * 0.45)));
$suggestions = array_values(array_filter($suggestions, function($item) use ($max_distance){
    return $item['distance'] <= $max_distance;
}));
$suggestions = array_slice($suggestions, 0, 3);
?>

<link rel="stylesheet" href="404.css">

<section class="error-page" aria-labelledby="error-title">
    <div class="error-card">
        <div class="error-number" aria-hidden="true">404</div>
        <h2 id="error-title">ページが見つかりません</h2>

        <p class="error-message">
            URLが変更されたか、入力したアドレスに誤りがある可能性があります。<br>
            記事名や機器名から検索できます。
        </p>

        <form class="error-search" action="/search.php" method="get">
            <input type="search" name="q" placeholder="例：OCR / DGR / 接地 / 耐圧試験" aria-label="記事を検索">
            <button type="submit">検索</button>
        </form>

        <?php if($suggestions): ?>
        <div class="error-suggestions">
            <strong>もしかして</strong>
            <ul>
                <?php foreach($suggestions as $item): ?>
                <li><a href="/<?= htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>.php"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="error-popular">
            <strong>よく読まれているページ</strong>
            <div class="error-popular-links">
                <a href="/number.php">制御機器番号一覧</a>
                <a href="/ocr.php">OCR</a>
                <a href="/v0.php">零相電圧 V0</a>
                <a href="/dgr.php">DGR</a>
                <a href="/rpr.php">RPR</a>
                <a href="/b_sq.php">B種接地線</a>
            </div>
        </div>

        <div class="error-return">
            <a href="/">でんきメモ TOPへ戻る</a>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>