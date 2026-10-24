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

    // 記事タイトル・本文の主題と商品を対応付ける。該当しないページは表示しない。
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
    if (!main) return;

    const candidates = [...main.querySelectorAll('h2, img')].filter(el =>
        !el.closest('.related-pages, .ad1')
    );
    if (!candidates.length || !amazonAds.length) return;
    // トップ・一覧ページには表示せず、個別記事の主題で判定する。
    const path = window.location.pathname;
    if (path === '/' || /\\/(index|random|search)\\.php$/i.test(path)) return;
    const heading = document.title + ' ' + (main.querySelector('h1')?.textContent || '') + ' ' + (main.querySelector('h2')?.textContent || '');
    const matched = topicRules.find(rule => rule.pattern.test(heading));
    if (!matched) return;

    // Amazon広告だけを本文中ほどに1枠表示する。
    // AdSenseの配置はGoogleの自動広告に任せる。
    const position = candidates[Math.floor(candidates.length / 2)];
    const ad = amazonAds[matched.index];
    position.insertAdjacentElement('afterend', createAmazonAd(ad));
});
</script>