<?php

declare(strict_types=1);

// ========================================
// 設定
// ========================================

$baseUrl = 'https://memo-labo.com/';

$csvFile = __DIR__ . '/data.csv';

$sitemapFile = __DIR__ . '/sitemap.xml';


// ========================================
// CSVファイル確認
// ========================================

if (!file_exists($csvFile)) {
    http_response_code(500);
    exit('pages.csv が見つかりません。');
}


// ========================================
// URL格納
// ========================================

$urls = [];

// トップページ
$urls[] = $baseUrl;


// ========================================
// CSV読み込み
// ========================================

$fp = fopen($csvFile, 'r');

if ($fp === false) {
    http_response_code(500);
    exit('pages.csv を開けません。');
}

while (($row = fgetcsv($fp)) !== false) {

    // category, slug, title, seo_title
    if (count($row) < 2) {
        continue;
    }

    $category = trim($row[0]);
    $slug     = trim($row[1]);

    // 空データ
    if ($category === '' || $slug === '') {
        continue;
    }


    // ====================================
    // 404ページはサイトマップから除外
    // ====================================

    if ($category === 'other' && $slug === '404') {
        continue;
    }


    // ====================================
    // slug.php のURLを作成
    // ====================================

    $url = $baseUrl . rawurlencode($slug) . '.php';

    $urls[] = $url;
}

fclose($fp);


// ========================================
// 重複URLを削除
// ========================================

$urls = array_values(array_unique($urls));


// ========================================
// XML生成
// ========================================

$xml = new XMLWriter();

if (!$xml->openURI($sitemapFile)) {
    http_response_code(500);
    exit('sitemap.xml を作成できません。');
}

$xml->startDocument('1.0', 'UTF-8');

$xml->setIndent(true);

$xml->startElement('urlset');

$xml->writeAttribute(
    'xmlns',
    'http://www.sitemaps.org/schemas/sitemap/0.9'
);


// ========================================
// URLを書き込む
// ========================================

foreach ($urls as $url) {

    $xml->startElement('url');

    $xml->startElement('loc');
    $xml->text($url);
    $xml->endElement();

    $xml->endElement();
}


// ========================================
// XML終了
// ========================================

$xml->endElement();

$xml->endDocument();

$xml->flush();


// ========================================
// 完了画面
// ========================================

$count = count($urls);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Sitemap生成完了</title>
</head>

<body>

<h1>Sitemap生成完了</h1>

<p>
生成URL数：
<strong><?= htmlspecialchars((string)$count, ENT_QUOTES, 'UTF-8') ?></strong>
</p>

<p>
<a href="/sitemap.xml" target="_blank">
sitemap.xmlを確認する
</a>
</p>

</body>
</html>