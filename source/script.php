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

    if (location.pathname === '/number.php') {
        const main = document.querySelector('main');
        const heading = main && main.querySelector('h2');
        const table = main && main.querySelector('table');
        const tableContainer = table && (table.closest('.table-container') || table.parentElement);

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
                <p><strong>制御機器番号を番号・名称・略称から検索できます。</strong><br>現場でよく見る番号は、下のショートカットからすぐ確認できます。</p>
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

            const aliases = {
                '27': 'uvr 不足電圧',
                '51': 'ocr gr 過電流 地絡過電流',
                '52': 'vcb 遮断器 しゃ断器',
                '59': 'ovr 過電圧',
                '64': 'ovgr 地絡過電圧',
                '67': 'rpr dgr 逆電力 電力方向 地絡方向',
                '79': 'reclose 再閉路',
                '87': '差動 差動継電器',
                '89': 'ds lbs 断路器 負荷開閉器',
                '90': 'avr 自動電圧調整器'
            };

            const rows = Array.from(table.querySelectorAll('tbody tr'));
            rows.forEach(row => {
                const first = row.querySelector('td');
                const no = first ? first.textContent.trim() : '';
                if (/^\d+$/.test(no)) row.id = `device-${no}`;

                const hrefText = Array.from(row.querySelectorAll('a'))
                    .map(a => (a.getAttribute('href') || '').replace('.php', '').replace(/[^a-zA-Z0-9_-]/g, ' '))
                    .join(' ');

                row.dataset.search = [
                    row.textContent,
                    hrefText,
                    aliases[no] || ''
                ].join(' ').toLowerCase();
            });

            const noResult = document.createElement('div');
            noResult.className = 'number-no-result';
            noResult.textContent = '一致する制御機器番号が見つかりませんでした。';
            guide.insertAdjacentElement('afterend', noResult);

            const input = guide.querySelector('#number-filter');
            const clear = guide.querySelector('#number-clear');

            const normalize = value => String(value || '')
                .toLowerCase()
                .replace(/\s+/g, ' ')
                .trim();

            const filterRows = () => {
                const q = normalize(input.value);
                const words = q ? q.split(' ') : [];
                let visible = 0;

                rows.forEach(row => {
                    const haystack = row.dataset.search || normalize(row.textContent);
                    const hit = words.length === 0 || words.every(word => haystack.includes(word));
                    row.style.display = hit ? '' : 'none';
                    row.classList.toggle('number-hit', !!q && hit);
                    if (hit) visible++;
                });

                noResult.style.display = visible ? 'none' : 'block';
            };

            input.addEventListener('input', filterRows);
            input.addEventListener('search', filterRows);
            clear.addEventListener('click', () => {
                input.value = '';
                filterRows();
                input.focus();
            });

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

    if (location.pathname === '/sozai.php') {
        const main = document.querySelector('main');
        const firstHeading = main && main.querySelector('h2');
        if (main && firstHeading) {
            const style = document.createElement('style');
            style.textContent = `
                .sozai-guide,.sozai-related{background:#fff;border:1px solid #d8e1e8;border-radius:10px;padding:18px 20px;margin:0 0 26px;box-shadow:0 2px 8px rgba(0,0,0,.04)}
                .sozai-guide p,.sozai-related p{margin:0 0 12px}
                .sozai-nav{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
                .sozai-nav a{display:inline-block;padding:8px 12px;border:1px solid #bbdefb;border-radius:999px;background:#f7fbff;font-weight:700;text-decoration:none}
                .sozai-separator{margin:34px 0 26px;padding:16px 18px;background:#fff;border-top:3px solid #e3eef7;border-bottom:1px solid #e3e8ec;color:#455a64}
                .sozai-related-links{display:flex;flex-wrap:wrap;gap:10px;margin-top:10px}
                .sozai-related-links a{display:inline-block;padding:8px 12px;background:#f7fbff;border:1px solid #d8e8f5;border-radius:7px;font-weight:700}
                @media(min-width:768px){
                    main>img:not(.amazon-api-image),main img:not(.amazon-related-ad img){max-width:420px!important}
                    main img[src*="ocr8"],main img[src*="gr10"],main img[src*="dgr_4"],main img[src*="uvr2"],main img[src*="ovr2"],main img[src*="ovgr11"]{max-width:150px!important}
                    main img[src*="kendenki.svg"]{max-width:40px!important}
                    main img[src*="clamp.png"]{max-width:220px!important}
                    main img[src*="20211010-5"],main img[src*="20211010-6"],main img[src*="20211010-8"],main img[src*="20211010-9"],main img[src*="musk.png"],main img[src*="metabo"]{max-width:220px!important}
                    .amazon-related-ad img{width:200px!important;max-width:200px!important}
                }
                @media(max-width:767px){.sozai-guide,.sozai-related{padding:14px}.sozai-nav a,.sozai-related-links a{font-size:15px}}
            `;
            document.head.appendChild(style);

            const headings = Array.from(main.querySelectorAll('h2'));
            headings.forEach((h, index) => {
                if (!h.id) h.id = `sozai-section-${index + 1}`;
            });

            const guide = document.createElement('section');
            guide.className = 'sozai-guide';
            guide.innerHTML = `
                <p><strong>現場・電気設備で使える無料イラスト素材をまとめています。</strong><br>画像は保存して利用してください。サーバー負荷防止のため直リンクはご遠慮ください。</p>
                <div class="sozai-nav">
                    <a href="#sozai-section-1">猫・ネタ素材</a>
                    <a href="#sozai-section-2">高圧検電器</a>
                    <a href="#sozai-section-3">保護継電器</a>
                    <a href="#sozai-section-4">PAS</a>
                    <a href="#sozai-section-5">UGS</a>
                    <a href="#sozai-section-6">MDS</a>
                    <a href="#sozai-section-7">クランプメーター</a>
                    <a href="#sozai-section-9">OCR試験機</a>
                </div>
            `;
            firstHeading.insertAdjacentElement('afterend', guide);

            const technicalHeading = headings.find(h => /高圧検電器/.test(h.textContent));
            if (technicalHeading) {
                const separator = document.createElement('div');
                separator.className = 'sozai-separator';
                separator.innerHTML = '<strong>ここから電気設備・保安業務向けの素材</strong><br>高圧検電器、保護継電器、PAS・UGSなど、設備資料や教育資料に使いやすいイラストを掲載しています。';
                technicalHeading.insertAdjacentElement('beforebegin', separator);
            }

            const related = document.createElement('section');
            related.className = 'sozai-related';
            related.innerHTML = `
                <p><strong>素材とあわせて確認したい技術ページ</strong><br>イラストの機器について詳しく確認したい場合はこちら。</p>
                <div class="sozai-related-links">
                    <a href="kenden.php">検電器</a>
                    <a href="ocr.php">OCR</a>
                    <a href="dgr.php">DGR</a>
                    <a href="ovgr.php">OVGR</a>
                    <a href="pas.php">PAS</a>
                    <a href="ugs.php">UGS</a>
                    <a href="lbs.php">LBS</a>
                </div>
            `;
            main.appendChild(related);
        }
    }

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

    const heading = document.title + ' ' + ((main && main.querySelector('h1')) ? main.querySelector('h1').textContent : '') + ' ' + ((main && main.querySelector('h2')) ? main.querySelector('h2').textContent : '');
    const matched = topicRules.find(rule => rule.pattern.test(heading));
    const primaryIndex = matched ? matched.index : 1;
    let ad = amazonAds[primaryIndex];
    if (location.pathname === '/sozai.php') ad = amazonAds[0];

    const candidates = Array.from(container.querySelectorAll('h2, img')).filter(el =>
        !el.closest('.related-pages, .ad1, .amazon-related-ad, header, nav, footer')
    );
    const position = candidates[Math.floor(candidates.length / 2)];
    const element = createAmazonAd(ad);

    if (location.pathname === '/number.php') {
        const guide = container.querySelector('.number-guide');
        if (guide) guide.insertAdjacentElement('afterend', element);
        else container.appendChild(element);
    } else if (location.pathname === '/sozai.php') {
        const guide = container.querySelector('.sozai-guide');
        if (guide) guide.insertAdjacentElement('afterend', element);
        else container.appendChild(element);
    } else if (position) {
        position.insertAdjacentElement('afterend', element);
    } else {
        container.appendChild(element);
    }

    // 長文の技術記事だけ、後半に別の関連商品を1件追加する。
    // 短い記事や検索・トップ・素材ページでは広告密度を増やさない。
    const excludedForSecondAd = new Set(['/number.php', '/sozai.php', '/', '/index.php', '/search.php', '/404.php']);
    const textLength = (container.innerText || '').replace(/\s+/g, '').length;
    const isLongArticle = candidates.length >= 12 && textLength >= 4500;

    if (!excludedForSecondAd.has(location.pathname) && isLongArticle) {
        const secondaryMap = { 0: 1, 1: 0, 2: 3, 3: 2, 4: 2, 5: 4 };
        const secondaryIndex = secondaryMap[primaryIndex] ?? 0;
        const secondaryAd = amazonAds[secondaryIndex];
        const secondaryPosition = candidates[Math.min(candidates.length - 1, Math.floor(candidates.length * 0.8))];

        if (secondaryAd && secondaryPosition && secondaryAd !== ad && secondaryPosition !== position) {
            secondaryPosition.insertAdjacentElement('afterend', createAmazonAd(secondaryAd));
        }
    }
});
</script>
