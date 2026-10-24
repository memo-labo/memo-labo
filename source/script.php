<script>
document.addEventListener('DOMContentLoaded', () => {
    const amazonAds = [
        { url: 'https://amzn.to/4fJ2QUA', title: 'オススメ本「大写解 高圧受電設備」', image: 'https://memo-labo.com/images/hon1.jpg' },
        { url: 'https://amzn.to/4fyfztj', title: '電気管理技術者必携', image: 'https://memo-labo.com/images/dk1.jpg' },
        { url: 'https://amzn.to/4eMcTqR', title: '電気Q&A 電気設備のトラブル事例', image: 'https://memo-labo.com/images/trouble1.jpg' },
        { url: 'https://amzn.to/40RFJTd', title: '電気技術者のための失敗100選', image: 'https://memo-labo.com/images/sp1.jpg' },
        { url: 'https://amzn.to/3KlX2WB', title: '電気技術者の実務理論<br>短絡・地絡現象の解析から保護協調の整定まで', image: 'https://memo-labo.com/images/jitumu.jpg' },
        { url: 'https://link.amazon/B05rQUKdL', title: '電験三種受験テキスト 理論', image: 'https://memo-labo.com/images/20261008-1.jpg' }
    ];

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
    if (position) position.insertAdjacentElement('afterend', element);
    else container.appendChild(element);
});
</script>