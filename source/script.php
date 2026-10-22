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

    function createAmazonAd(ad) {
        const div = document.createElement('aside');
        div.className = 'ad1 amazon-random-ad';
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

    // Amazon広告だけを本文中ほどに1枠表示する。
    // AdSenseの配置はGoogleの自動広告に任せる。
    const position = candidates[Math.floor(candidates.length / 2)];
    const ad = amazonAds[Math.floor(Math.random() * amazonAds.length)];
    position.insertAdjacentElement('afterend', createAmazonAd(ad));
});
</script>