<?php

declare(strict_types=1);

$baseUrl = 'https://memo-labo.com/';
$csvFile = __DIR__ . '/data.csv';

header('Content-Type: application/xml; charset=UTF-8');

if (!file_exists($csvFile)) {
    http_response_code(500);
    echo '<?xml version="1.0" encoding="UTF-8"?><error>data.csv not found</error>';
    exit;
}

$urls = [$baseUrl];

// 301転送済みの旧URLはサイトマップへ載せない。
$legacyRedirectSlugs = [
    'ocr_gimon2',
    'ocr3',
    'ocr_shiken2',
    'ocr_shiken',
    'j2',
    'uvr-ocr',
    'dgr2',
    'vt-tr',
    'qa9',
];

$fp = fopen($csvFile, 'r');
if ($fp === false) {
    http_response_code(500);
    echo '<?xml version="1.0" encoding="UTF-8"?><error>data.csv open failed</error>';
    exit;
}

while (($row = fgetcsv($fp)) !== false) {
    if (count($row) < 2) {
        continue;
    }

    $category = trim((string)$row[0]);
    $slug = trim((string)$row[1]);

    if ($category === '' || $slug === '') {
        continue;
    }

    if ($category === 'other' && $slug === '404') {
        continue;
    }

    if (in_array($slug, $legacyRedirectSlugs, true)) {
        continue;
    }

    // 実ファイルが存在しないURLをサイトマップに混ぜない。
    $pageFile = __DIR__ . '/' . $slug . '.php';
    if (!is_file($pageFile)) {
        continue;
    }

    $urls[] = $baseUrl . rawurlencode($slug) . '.php';
}

fclose($fp);
$urls = array_values(array_unique($urls));

$xml = new XMLWriter();
$xml->openMemory();
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);
$xml->startElement('urlset');
$xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

foreach ($urls as $url) {
    $xml->startElement('url');
    $xml->writeElement('loc', $url);
    $xml->endElement();
}

$xml->endElement();
$xml->endDocument();

echo $xml->outputMemory();
