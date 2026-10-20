<?php

require_once __DIR__ . '/config.php';

$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';

$results = [];

/*
 * 検索対象から除外するPHPファイル
 */
$exclude_files = [
    'index.php',
    'search.php',
    '404.php',
    'header.php',
    'footer.php',
    'config.php',
];

/*
 * data.csvから
 * 「ファイル名 → ページタイトル」
 * の対応表を作る
 */
$page_titles = [];

if (($f = fopen(__DIR__ . '/data.csv', 'r')) !== false) {

    while (($line = fgetcsv($f)) !== false) {

        if (isset($line[1]) && isset($line[3])) {

            $filename = $line[1] . '.php';
            $title = trim($line[3]);

            if ($title !== '') {
                $page_titles[$filename] = $title;
            }
        }
    }

    fclose($f);
}

/*
 * キーワード検索
 */
if ($keyword !== '') {

    $files = glob(__DIR__ . '/*.php');

    foreach ($files as $file) {

        $filename = basename($file);

        if (in_array($filename, $exclude_files, true)) {
            continue;
        }

        /*
         * PHPファイルの中身を取得
         */
        $content = file_get_contents($file);

        if ($content === false) {
            continue;
        }

        /*
         * 検索用テキストを作成
         */
        $search_text = preg_replace(
            '/<script\b[^>]*>.*?<\/script>/is',
            '',
            $content
        );

        $search_text = preg_replace(
            '/<style\b[^>]*>.*?<\/style>/is',
            '',
            $search_text
        );

        $search_text = strip_tags($search_text);

        $search_text = preg_replace(
            '/<\?php.*?\?>/s',
            '',
            $search_text
        );

        /*
         * キーワードが含まれているか
         */
        if (mb_stripos($search_text, $keyword) === false) {
            continue;
        }

        /*
         * ページタイトル
         *
         * data.csvの4列目を使用
         */
        if (isset($page_titles[$filename])) {
            $title = $page_titles[$filename];
        } else {
            $title = $filename;
        }

        /*
         * 検索結果の抜粋
         */
        $plain_text = trim(
            preg_replace('/\s+/u', ' ', $search_text)
        );

        $position = mb_stripos($plain_text, $keyword);

        if ($position !== false) {

            $start = max(0, $position - 70);

            $excerpt = mb_substr(
                $plain_text,
                $start,
                180
            );

            if ($start > 0) {
                $excerpt = '…' . $excerpt;
            }

            if (mb_strlen($plain_text) > $start + 180) {
                $excerpt .= '…';
            }

        } else {

            $excerpt = mb_substr(
                $plain_text,
                0,
                180
            ) . '…';
        }

        /*
         * 検索結果に追加
         */
        $results[] = [
            'filename' => $filename,
            'title' => $title,
            'excerpt' => $excerpt,
        ];
    }
}

$page_title = 'サイト内検索 - でんきメモ';
$page_description = 'でんきメモの記事をキーワードで検索できます。';

require_once __DIR__ . '/header.php';
?>

<main class="search-page">
<!--
    <h1>サイト内検索</h1>

    <form class="search-page-form" action="search.php" method="get">

        <input
            type="search"
            name="q"
            value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>"
            placeholder="検索キーワードを入力"
            aria-label="検索キーワード"
        >

        <button type="submit">
            検索
        </button>

    </form>
-->
    <?php if ($keyword === ''): ?>

        <p class="search-guide">
            調べたいキーワードを入力してください。
        </p>

    <?php else: ?>

        <p class="search-result-count">
            「<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>」
            の検索結果：<?= count($results) ?>件
        </p>

        <?php if (!empty($results)): ?>

            <div class="search-results">

                <?php foreach ($results as $result): ?>

                    <article class="search-result-item">

                        <h2>
                            <a href="<?= htmlspecialchars($result['filename'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </h2>

                        <p>
                            <?= htmlspecialchars($result['excerpt'], ENT_QUOTES, 'UTF-8') ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <p class="search-no-result">
                該当する記事が見つかりませんでした。
            </p>

        <?php endif; ?>

    <?php endif; ?>

</main>

<?php require_once __DIR__ . '/footer.php'; ?>