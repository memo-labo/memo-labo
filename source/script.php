<script>
document.addEventListener('DOMContentLoaded', () => {

    /* ==================================================
       Amazon広告一覧
       
       新しい広告を追加するときは、
       この中に追加するだけ
       ================================================== */

    const amazonAds = [
        {
            url: 'https://amzn.to/4fJ2QUA',
            title: 'オススメ本「大写解 高圧受電設備」',
            image: 'https://memo-labo.com/images/hon1.jpg'
        },
        {
            url: 'https://amzn.to/4fyfztj',
            title: '電気管理技術者必携',
            image: 'https://memo-labo.com/images/dk1.jpg'
        },
        {
            url: 'https://amzn.to/4eMcTqR',
            title: '電気Q&A 電気設備のトラブル事例',
            image: 'https://memo-labo.com/images/trouble1.jpg'
        },
        {
            url: 'https://amzn.to/40RFJTd',
            title: '電気技術者のための失敗100選',
            image: 'https://memo-labo.com/images/sp1.jpg'
        },
        {
            url: 'https://amzn.to/3KlX2WB',
            title: '電気技術者の実務理論<br>短絡・地絡現象の解析から保護協調の整定まで',
            image: 'https://memo-labo.com/images/jitumu.jpg'
        },
        {
            url: 'https://link.amazon/B05rQUKdL',
            title: '電験三種受験テキスト 理論',
            image: 'https://memo-labo.com/images/20261008-1.jpg'
        }
    ];


    /* ==================================================
       広告数
       ================================================== */

    const AMAZON_AD_COUNT = 1;
    const ADSENSE_AD_COUNT = 3;

    const TOTAL_AD_COUNT =
        AMAZON_AD_COUNT + ADSENSE_AD_COUNT;


    /* ==================================================
       配列をシャッフル
       ================================================== */

    function shuffle(array) {

        const result = [...array];

        for (let i = result.length - 1; i > 0; i--) {

            const j =
                Math.floor(Math.random() * (i + 1));

            [result[i], result[j]] =
            [result[j], result[i]];
        }

        return result;
    }


    /* ==================================================
       Amazon広告を作成
       ================================================== */

    function createAmazonAd(ad) {

        const div =
            document.createElement('div');

        div.className =
            'ad1 amazon-random-ad';

        div.innerHTML = `
            <a href="${ad.url}"
               target="_blank"
               rel="nofollow noopener">

                ${ad.title}<br>

                <img src="${ad.image}"
                     style="width:200px;"
                     alt="">

            </a>
        `;

        return div;
    }


    /* ==================================================
       AdSense広告を作成
       ================================================== */

    function createAdSenseAd() {

        const div =
            document.createElement('div');

        div.className =
            'adsense-random-ad';

        div.innerHTML = `
            <ins class="adsbygoogle"
                 style="display:block; text-align:center;"
                 data-ad-layout="in-article"
                 data-ad-format="fluid"
                 data-ad-client="ca-pub-8063230043817903"
                 data-ad-slot="8493440321">
            </ins>
        `;

        return div;
    }


    /* ==================================================
       広告候補を取得
       
       全ページ共通
       h2 と img の直後を候補にする
       
       br / li は使用しない
       ================================================== */

    let candidates = [
        ...document.querySelectorAll('h2'),
        ...document.querySelectorAll('img')
    ];


    /* ==================================================
       候補がなければ終了
       ================================================== */

    if (candidates.length === 0) {

        console.log(
            '広告候補（h2 / img）がありません。'
        );

        return;
    }


    /* ==================================================
       重複削除
       ================================================== */

    candidates =
        [...new Set(candidates)];


    /* ==================================================
       広告を入れられる数
       
       候補数が4未満なら、
       入れられるだけ配置
       ================================================== */

    const adCount =
        Math.min(
            TOTAL_AD_COUNT,
            candidates.length
        );


    /* ==================================================
       広告候補をシャッフル
       ================================================== */

    const shuffledCandidates =
        shuffle(candidates);


    /* ==================================================
       「なるべく離す」ための位置を決める
       
       ページ全体を均等に4分割するイメージ
       
       例：
       
       1/8付近
       3/8付近
       5/8付近
       7/8付近
       
       ただし完全固定ではなく、
       その周辺からランダムに選ぶ
       ================================================== */

    const selectedPositions = [];

    const usedIndexes = new Set();


    for (let i = 0; i < adCount; i++) {

        /*
         * ページ全体を均等に分割した中心位置
         */
        const idealPosition =
            (i + 0.5) / adCount;

        /*
         * 少しランダムにずらす
         */
        const randomOffset =
            (Math.random() - 0.5) *
            (0.35 / adCount);

        let target =
            idealPosition + randomOffset;

        /*
         * 0～1の範囲に収める
         */
        target =
            Math.max(0, Math.min(1, target));


        /*
         * 候補配列上の位置に変換
         */
        let index =
            Math.round(
                target *
                (candidates.length - 1)
            );


        /*
         * すでに使われている場所なら、
         * 一番近い未使用位置を探す
         */
        if (usedIndexes.has(index)) {

            let found = false;

            for (let distance = 1;
                 distance < candidates.length;
                 distance++) {

                const left =
                    index - distance;

                const right =
                    index + distance;


                if (
                    left >= 0 &&
                    !usedIndexes.has(left)
                ) {

                    index = left;
                    found = true;
                    break;
                }


                if (
                    right < candidates.length &&
                    !usedIndexes.has(right)
                ) {

                    index = right;
                    found = true;
                    break;
                }
            }

            if (!found) {
                continue;
            }
        }


        usedIndexes.add(index);

        selectedPositions.push(
            candidates[index]
        );
    }


    /* ==================================================
       Amazon広告を2個選択
       
       同じ本が2回出ない
       ================================================== */

    const selectedAmazonAds =
        shuffle(amazonAds).slice(
            0,
            Math.min(
                AMAZON_AD_COUNT,
                amazonAds.length
            )
        );


    /* ==================================================
       広告の種類を決定
       
       Amazon
       Amazon
       AdSense
       AdSense
       
       ↓
       
       その後シャッフル
       ================================================== */

    const adTypes = shuffle([
        'amazon',
        'amazon',
        'adsense',
        'adsense'
    ]).slice(0, adCount);


    /* ==================================================
       実際に広告を配置
       ================================================== */

    let amazonIndex = 0;

    selectedPositions.forEach(
        (element, index) => {

            const type =
                adTypes[index];


            /* ------------------------------------------
               Amazon
               ------------------------------------------ */

            if (
                type === 'amazon' &&
                amazonIndex < selectedAmazonAds.length
            ) {

                const ad =
                    createAmazonAd(
                        selectedAmazonAds[amazonIndex]
                    );

                element.insertAdjacentElement(
                    'afterend',
                    ad
                );

                amazonIndex++;

            }


            /* ------------------------------------------
               AdSense
               ------------------------------------------ */

            else if (type === 'adsense') {

                const ad =
                    createAdSenseAd();

                element.insertAdjacentElement(
                    'afterend',
                    ad
                );


                /*
                 * AdSenseを実行
                 */
                const pushScript =
                    document.createElement('script');

                pushScript.textContent = `
                    (adsbygoogle =
                        window.adsbygoogle || []
                    ).push({});
                `;

                ad.appendChild(pushScript);
            }

        }
    );

});
</script>


<!-- ==================================================
     AdSense本体
     ページ内で1回だけ読み込む
     ================================================== -->

<script async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8063230043817903"
    crossorigin="anonymous">
</script>