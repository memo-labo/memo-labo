document.addEventListener('DOMContentLoaded', function () {
    const path = location.pathname;
    const main = document.querySelector('main');
    if (!main) return;

    const excluded = new Set(['/', '/index.php', '/search.php']);
    if (!excluded.has(path)) {
        main.classList.add('article-enhanced');
    }

    // 記事画像は先頭だけ即時表示し、2枚目以降を遅延読み込みにする。
    // 古い記事側のHTMLを一括修正せず、表示速度を改善する。
    const contentImages = Array.from(main.querySelectorAll('img')).filter(function (img) {
        return !img.closest('.amazon-related-ad, .ad1');
    });
    contentImages.forEach(function (img, index) {
        img.decoding = 'async';
        if (index === 0) {
            img.loading = 'eager';
            img.fetchPriority = 'high';
        } else if (!img.hasAttribute('loading')) {
            img.loading = 'lazy';
        }
    });

    // 埋め込みコンテンツは画面に近づくまで読み込ませない。
    Array.from(main.querySelectorAll('iframe')).forEach(function (frame) {
        if (!frame.hasAttribute('loading')) frame.loading = 'lazy';
    });

    // 長い記事は見出しから自動目次を作る。本文そのものは変更しない。
    if (main.classList.contains('article-enhanced')) {
        const headings = Array.from(main.querySelectorAll(':scope > h2'));
        if (headings.length >= 3) {
            headings.forEach(function (heading, index) {
                if (!heading.id) heading.id = 'section-' + (index + 1);
            });

            // 既にページ専用目次がある場合は重複させない。
            if (!main.querySelector('.article-toc, .sozai-guide, .number-guide')) {
                const toc = document.createElement('nav');
                toc.className = 'article-toc';
                toc.setAttribute('aria-label', 'このページの内容');

                const title = document.createElement('div');
                title.className = 'article-toc-title';
                title.textContent = 'このページの内容';
                toc.appendChild(title);

                const ul = document.createElement('ul');
                headings.slice(1).forEach(function (heading) {
                    const li = document.createElement('li');
                    const a = document.createElement('a');
                    a.href = '#' + heading.id;
                    a.textContent = heading.textContent.trim();
                    li.appendChild(a);
                    ul.appendChild(li);
                });
                toc.appendChild(ul);

                // 導入文の後、最初の小見出しの直前に置く。
                headings[1].insertAdjacentElement('beforebegin', toc);
            }
        }

        // 横長テーブルはスマホでページ全体を崩さず横スクロールさせる。
        Array.from(main.querySelectorAll('table')).forEach(function (table) {
            if (table.closest('.table-scroll, .table-container')) return;
            const wrapper = document.createElement('div');
            wrapper.className = 'table-scroll';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        });

        // 各章の区切りを視覚的に明確にする。
        Array.from(main.querySelectorAll(':scope > h2')).slice(1).forEach(function (heading) {
            heading.classList.add('article-section-gap');
        });
    }

    // 既存の関連商品枠は、長い記事では導入文直後に寄せる。
    // ナビや操作ボタンと隣接させず、広告・本文を明確に分離する。
    window.setTimeout(function () {
        const ad = main.querySelector('.amazon-related-ad');
        if (!ad || path === '/number.php' || path === '/sozai.php') return;

        const headings = Array.from(main.querySelectorAll(':scope > h2'));
        const toc = main.querySelector('.article-toc');

        if (toc) {
            const separator = document.createElement('div');
            separator.className = 'article-ad-separator';
            toc.insertAdjacentElement('afterend', separator);
            separator.insertAdjacentElement('afterend', ad);
        } else if (headings.length >= 2) {
            const separator = document.createElement('div');
            separator.className = 'article-ad-separator';
            headings[1].insertAdjacentElement('beforebegin', separator);
            separator.insertAdjacentElement('beforebegin', ad);
        }
    }, 0);
});
