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

    const AMAZON_AD_COUNT = 1;
    const ADSENSE_AD_COUNT = 3;
    const TOTAL_AD_COUNT = AMAZON_AD_COUNT + ADSENSE_AD_COUNT;

    function shuffle(array) {
        const result = [...array];
        for (let i = result.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [result[i], result[j]] = [result[j], result[i]];
        }
        return result;
    }

    function createAmazonAd(ad) {
        const div = document.createElement('aside');
        div.className = 'ad1 amazon-random-ad';
        div.setAttribute('aria-label', '関連商品');
        div.innerHTML = `<a href="${ad.url}" target="_blank" rel="nofollow sponsored noopener">${ad.title}<br><img src="${ad.image}" width="200" height="auto" loading="lazy" alt="${ad.title.replace(/<br\s*\/?\s*>/gi, ' ')}"></a>`;
        return div;
    }

    function createAdSenseAd() {
        const div = document.createElement('div');
        div.className = 'adsense-random-ad';
        div.innerHTML = `<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-8063230043817903" data-ad-slot="8493440321"></ins>`;
        return div;
    }

    // 本文だけを対象にし、関連記事・ヘッダー・広告内画像は候補から除外する。
    const main = document.querySelector('main');
    if (!main) return;
    let candidates = [...main.querySelectorAll('h2, img')].filter(el =>
        !el.closest('.related-pages, .ad1, .adsense-random-ad')
    );
    candidates = [...new Set(candidates)];
    if (!candidates.length) return;

    const adCount = Math.min(TOTAL_AD_COUNT, candidates.length);
    const selectedPositions = [];
    const usedIndexes = new Set();

    // ページ全体へ均等に配置し、広告同士が固まるのを避ける。
    for (let i = 0; i < adCount; i++) {
        const target = (i + 0.5) / adCount;
        let index = Math.round(target * (candidates.length - 1));
        if (usedIndexes.has(index)) {
            for (let d = 1; d < candidates.length; d++) {
                if (index - d >= 0 && !usedIndexes.has(index - d)) { index -= d; break; }
                if (index + d < candidates.length && !usedIndexes.has(index + d)) { index += d; break; }
            }
        }
        usedIndexes.add(index);
        selectedPositions.push(candidates[index]);
    }

    const selectedAmazonAds = shuffle(amazonAds).slice(0, Math.min(AMAZON_AD_COUNT, amazonAds.length));
    const adTypes = shuffle([
        ...Array(AMAZON_AD_COUNT).fill('amazon'),
        ...Array(ADSENSE_AD_COUNT).fill('adsense')
    ]).slice(0, adCount);

    let amazonIndex = 0;
    selectedPositions.forEach((element, index) => {
        const type = adTypes[index];
        if (type === 'amazon' && amazonIndex < selectedAmazonAds.length) {
            element.insertAdjacentElement('afterend', createAmazonAd(selectedAmazonAds[amazonIndex++]));
        } else if (type === 'adsense') {
            const ad = createAdSenseAd();
            element.insertAdjacentElement('afterend', ad);
            try { (adsbygoogle = window.adsbygoogle || []).push({}); } catch (e) {}
        }
    });
});
</script>