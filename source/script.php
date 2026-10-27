<script>
document.addEventListener('DOMContentLoaded', () => {
    const amazonAds = [
        { url: 'https://amzn.to/4fJ2QUA', title: 'オススメ本「大写解 高圧受電設備」', image: 'https://memo-labo.com/images/hon1.jpg' },
        { url: 'https://amzn.to/4fyfztj', title: '電気管理技術者必携', image: 'https://memo-labo.com/images/dk1.jpg' },
        { url: 'https://amzn.to/4eMcTqR', title: '電気Q&A 電気設備のトラブル事例', image: 'https://memo-labo.com/images/trouble1.jpg' },
        { url: 'https://amzn.to/40RFJTd', title: '電気技術者のための失敗100選', image: 'https://memo-labo.com/images/sp1.jpg' },
        { url: 'https://link.amazon/B05rQUKdL', title: '電気技術者の実務理論<br>短絡・地絡現象の解析から保護協調の整定まで', image: 'https://memo-labo.com/images/jitumu.jpg' },
        { url: 'https://link.amazon/B05rQUKdL', title: '電験三種受験テキスト 理論', image: 'https://memo-labo.com/images/20261008-1.jpg' }
    ];

    // number.php は一覧表だけになりやすいため、検索・よく使う番号・説明を追加して読みやすくする。
    if (location.pathname === '/number.php') {
        const main = document.querySelector('main');
        const heading = main?.querySelector('h2');
        const table = main?.querySelector('table');
        const tableContainer = table?.closest('.table-container') || table?.parentElement;

        if (main && heading && table && tableContainer) {
            const style = document.createElement('style');
            style.textContent = `
                .number-guide{background:#fff;border:1px solid #d8e1e8;border-radius:10px;padding:18px 20px;margin:0 0 24px;box-shadow:0 2px 8px rgba(0,0,0,.04)}
                .number-guide p{margin:0 0 12px}
                .number-search{display:flex;gap:8px;margin:14px 0 16px;flex-wrap:wrap}
                .number-search input{flex:1;min-width:220px;padding:11px 13px;border:1px solid #b0bec5;border-radius:7px;font-size:16px;background:#fff}
                .number-search button{padding:10px 14px;border:1px solid #90a4ae;border-radius:7px;background:#fff;color:#37474f;font-weight:700;cursor:pointer}
                .number-quick-title{font-weight:700;margin:12px 0 8px}
                .number-quick{display:flex;flex-wrap:wrap;gap:8px}
                .number-quick a{display:inline-block;padding:8px 12px;border:1px solid #bbdefb;border-radius:999px;background:#f7fbff;font-weight:700;text-decoration:none}
                .number-note{font-size:14px;color:#546e7a;margin-top:12px!important}
                .number-ad-break{min-height:36px;margin:28px 0;border-top:1px solid #e3e8ec;border-bottom:1px solid #e3e8ec;display:flex;align-items:center;justify-content:center;color:#90a4ae;font-size:12px;letter-spacing:.08em}
                .number-related{background:#fff;border:1px solid #d8e1e8;border-radius:10px;padding:18px 20px;margin:28px 0}
                .number-related strong{display:block;margin-bottom:8px}
                .number-related a{margin-right:14px;white-space:nowrap}
                .number-no-result{display:none;background:#fff3e0;border:1px solid #ffe0b2;border-radius:8px;padding:12px 14px;margin:12px 0}
                .number-hit{background:#fffde7}
                @media(max-width:767px){.number-guide,.number-related{padding:14px}.number-search{display:block}.number-search input{width:100%;min-width:0;margin-bottom:8px}.number-search button{width:100%}.number-quick a{font-size:15px}}
            `;
            document.head.appendChild(style);

            const guide = document.createElement('section');
            guide.className = 'number-guide';
            guide.innerHTML = `
                <p><strong>制御機器番号を番号・名称から検索できます。</strong><br>現場でよく見る番号は、下のショートカットからすぐ確認できます。</p>
                <div class="number-search">
                    <input id="number-filter" type="search" inputmode="search" placeholder="例：51 / OCR / 過電流 / VCB" aria-label="制御機器番号を検索">
                    <button type="button" id="number-clear">検索をクリア</button>
                </div>
                <div class="number-quick-title">よく使う制御機器番号</div>
                <div class="number-quick">
                    <a href="#device-27">27 UVR</a>
                    <a href="#device-51">51 OCR・GR</a>
                    <a href="#device-52">52 VCB</a>
                    <a href="#device-59">59 OVR</a>
                    <a href="#device-64">64 OVGR</a>
                    <a href="#device-67">67 RPR・DGR</a>
                    <a href="#device-87">87 差動継電器</a>
                    <a href="#device-89">89 DS・LBS</a>
                </div>
                <p class="number-note">※ 機器番号は図面・シーケンスを読むときの目印。実際の設備では名称・用途・メーカー仕様も合わせて確認してください。</p>
            `;
            heading.insertAdjacentElement('afterend', guide);

            const rows = [...table.querySelectorAll('tbody tr')];
            rows.forEach(row => {
                const first = row.querySelector('td');
                const no = first?.textContent.trim();
                if (/^\d+$/.test(no || '')) row.id = `device-${no}`;
            });

            const noResult = document.createElement('div');
            noResult.className = 'number-no-result';
            noResult.textContent = '一致する制御機器番号が見つかりませんでした。';
            guide.insertAdjacentElement('afterend', noResult);

            const input = guide.querySelector('#number-filter');
            const clear = guide.querySelector('#number-clear');
            const filterRows = () => {
                const q = (input.value || '').trim().toLowerCase();
                let visible = 0;
                rows.forEach(row => {
                    const hit = !q || row.textContent.toLowerCase().includes(q);
                    row.style.display = hit ? '' : 'none';
                    row.classList.toggle('number-hit', !!q && hit);
                    if (hit) visible++;
                });
                noResult.style.display = visible ? 'none' : 'block';
            };
            input.addEventListener('input', filterRows);
            clear.addEventListener('click', () => {
                input.value = '';
                filterRows();
                input.focus();
            });

            // Auto Ads が本文の区切りを認識しやすいよう、一覧の前後に自然なセクションを用意する。
            const adBreak = document.createElement('div');
            adBreak.className = 'number-ad-break';
            adBreak.setAttribute('aria-hidden', 'true');
            adBreak.textContent = 'CONTENTS';
            tableContainer.insertAdjacentElement('beforebegin', adBreak);

            const related = document.createElement('section');
            related.className = 'number-related';
            related.innerHTML = `
                <strong>よく調べられる関連ページ</strong>
                <a href="ocr.php">51 OCR</a>
                <a href="vcb.php">52 VCB</a>
                <a href="ovgr.php">64 OVGR</a>
                <a href="dgr.php">67 DGR</a>
                <a href="rpr.php">67 RPR</a>
                <a href="lbs.php">89 LBS</a>
            `;
            tableContainer.insertAdjacentElement('afterend', related);
        }
    }

    // 記事の主題に合う商品を優先し、該当しないページも定番書籍を表示する。
    const topicRules = [
        { pattern: /短絡|地絡|保護協調|過電流|OCR|DGR|GR|継電器|整定/i, index: 4 },
        { pattern: /トラブル|事故|故障|不具合|停電|復旧/i, index: 2 },
        { pattern: /失敗|ヒヤリ|安全|感電|災害/i, index: 3 },
        { pattern: /電験|試験勉強|理論|資格|受験/i, index: 5 },
        { pattern: /高圧受電|キュービクル|受電設備|PAS|VCB|LBS|変圧器/i, index: 0 },
        { pattern: /電気管理技術者|保安管理|点検業務|主任技術者/i, index: 1 }
    ];

    function createAmazonAd(ad) {
        const div = document.createElement('aside');
        div.className = 'ad1 amazon-related-ad';
        div.setAttribute('aria-label', '関連商品');
        div.innerHTML = `<a href="${ad.url}" target="_blank" rel="nofollow sponsored noopener">${ad.title}<br><img src="${ad.image}" width="200" height="auto" loading="lazy" alt="${ad.title.replace(/<br\s*\/?\s*>/gi, ' ')}"></a>`;
        return div;
    }

    const main = document.querySelector('main');
    const container = main || document.querySelector('article') || document.body;
    if (!container || !amazonAds.length) return;

    const heading = document.title + ' ' + (main?.querySelector('h1')?.textContent || '') + ' ' + (main?.querySelector('h2')?.textContent || '');
    const matched = topicRules.find(rule => rule.pattern.test(heading));
    // 主題が判定できないページは、電気管理技術者向けの定番書籍を固定表示する。
    const ad = amazonAds[matched ? matched.index : 1];
    const candidates = [...container.querySelectorAll('h2, img')].filter(el =>
        !el.closest('.related-pages, .ad1, .amazon-related-ad, header, nav, footer')
    );
    const position = candidates[Math.floor(candidates.length / 2)];
    const element = createAmazonAd(ad);
    // 見出しや画像がないページでも、コンテンツ末尾に必ず1枠表示する。
    if (location.pathname === '/number.php') {
        const guide = container.querySelector('.number-guide');
        if (guide) guide.insertAdjacentElement('afterend', element);
        else container.appendChild(element);
    } else if (position) position.insertAdjacentElement('afterend', element);
    else container.appendChild(element);
});
</script>