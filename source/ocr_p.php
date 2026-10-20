<?php include("header.php"); ?>

<style>
    .ocr-calculator {
        max-width: 1000px;
        margin: 0 auto;
    }

    .ocr-notice {
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .ocr-notice ul {
        margin-top: 0.5rem;
    }

    .dial-box {
        background: #f5f7fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0 30px;
    }

    .dial-input {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .dial-input label {
        font-weight: bold;
    }

    .dial-input input {
        width: 120px;
        padding: 8px 10px;
        font-size: 1.1rem;
        box-sizing: border-box;
    }

    .calculate-button {
        padding: 9px 22px;
        border: none;
        border-radius: 5px;
        background: #333;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
    }

    .calculate-button:hover {
        opacity: 0.8;
    }

    .result-table-wrapper {
        overflow-x: auto;
        margin-bottom: 30px;
    }

    .result-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }

    .result-table th,
    .result-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    .result-table th {
        background: #f0f0f0;
        font-weight: bold;
    }

    .result-table .characteristic-name {
        text-align: left;
        font-weight: bold;
        white-space: nowrap;
    }

    .result-cell {
        min-width: 130px;
    }

    .nominal-value {
        display: block;
        font-size: 1.15rem;
        font-weight: bold;
        margin-bottom: 4px;
    }

    .tolerance-value {
        display: block;
        font-size: 0.85rem;
        color: #555;
    }

    .tolerance-label {
        font-size: 0.8rem;
        color: #777;
    }

    .reference-table {
        border-collapse: collapse;
        margin: 10px 0 25px;
    }

    .reference-table th,
    .reference-table td {
        border: 1px solid #ccc;
        padding: 8px 15px;
        text-align: center;
    }

    .reference-table th {
        background: #f0f0f0;
    }

    .formula-box {
        background: #f8f8f8;
        border-left: 4px solid #777;
        padding: 12px 15px;
        margin: 10px 0 25px;
        line-height: 1.8;
        overflow-x: auto;
    }

    .formula-box code {
        font-family: Consolas, Monaco, monospace;
    }

    .warning {
        padding: 12px 15px;
        background: #fff8e1;
        border: 1px solid #f0d98c;
        border-radius: 5px;
        margin-top: 20px;
        line-height: 1.7;
    }

    @media (max-width: 600px) {
        .dial-input {
            display: block;
        }

        .dial-input label {
            display: block;
            margin-bottom: 8px;
        }

        .dial-input input {
            width: 100%;
            margin-bottom: 10px;
        }

        .calculate-button {
            width: 100%;
        }

        .result-table th,
        .result-table td {
            padding: 8px 5px;
        }
    }
</style>


<div class="ocr-calculator">

    <h2>OCR限時要素 動作時間計算</h2>

    <div class="ocr-notice">
        <p>
            計算式はMOC-A1取扱説明書より引用。<br>
            プログラムはWeb上で使用できるようにJavaScriptで作成しています。<br>
            過電流継電器の限時要素について、ダイヤル（整定時間）に合わせて自動で計算します。
        </p>

        <p>
            整定電流値の200%、300%、500%、700%について、
            理論値と許容値を同時に計算します。
        </p>

        <div class="warning">
            ※ あくまで個人利用として作成した計算ツールです。<br>
            ※ 計算結果について、実機での性能・動作を保証するものではありません。
        </div>
    </div>


    <h2>公称値・参考値・許容範囲</h2>

    <h3>公称値・参考値</h3>

    <table class="reference-table">
        <tr>
            <th>区分</th>
            <th>電流値</th>
        </tr>
        <tr>
            <td>公称値</td>
            <td>300%、700%</td>
        </tr>
        <tr>
            <td>参考値</td>
            <td>200%、500%</td>
        </tr>
    </table>


    <h3>動作時間の許容範囲</h3>

    <table class="reference-table">
        <tr>
            <th>電流値</th>
            <th>許容範囲</th>
        </tr>
        <tr>
            <td>200%、300%</td>
            <td>±17%</td>
        </tr>
        <tr>
            <td>500%、700%</td>
            <td>±12%</td>
        </tr>
    </table>


    <h2>OCR 限時特性 計算フォーム</h2>

    <div class="dial-box">

        <form id="dialForm">

            <div class="dial-input">

                <label for="dialValue">
                    ダイヤル：
                </label>

                <input
                    type="number"
                    id="dialValue"
                    name="D"
                    min="0"
                    step="any"
                    inputmode="decimal"
                    required
                    placeholder="例：1.0"
                >

                <button
                    type="submit"
                    class="calculate-button"
                >
                    計算
                </button>

            </div>

        </form>

    </div>


    <h2>計算結果</h2>

    <div class="result-table-wrapper">

        <table class="result-table">

            <thead>
                <tr>
                    <th>特性</th>
                    <th>200%</th>
                    <th>300%</th>
                    <th>500%</th>
                    <th>700%</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="characteristic-name">
                        超反限時 EI
                    </td>

                    <td class="result-cell">
                        <span id="EI_T2" class="nominal-value">---</span>
                        <span id="EI_T2_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="EI_T3" class="nominal-value">---</span>
                        <span id="EI_T3_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="EI_T5" class="nominal-value">---</span>
                        <span id="EI_T5_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>

                    <td class="result-cell">
                        <span id="EI_T7" class="nominal-value">---</span>
                        <span id="EI_T7_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>
                </tr>


                <tr>
                    <td class="characteristic-name">
                        強反限時 VI
                    </td>

                    <td class="result-cell">
                        <span id="VI_T2" class="nominal-value">---</span>
                        <span id="VI_T2_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="VI_T3" class="nominal-value">---</span>
                        <span id="VI_T3_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="VI_T5" class="nominal-value">---</span>
                        <span id="VI_T5_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>

                    <td class="result-cell">
                        <span id="VI_T7" class="nominal-value">---</span>
                        <span id="VI_T7_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>
                </tr>


                <tr>
                    <td class="characteristic-name">
                        反限時 NI
                    </td>

                    <td class="result-cell">
                        <span id="NI_T2" class="nominal-value">---</span>
                        <span id="NI_T2_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="NI_T3" class="nominal-value">---</span>
                        <span id="NI_T3_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±17%</span>
                    </td>

                    <td class="result-cell">
                        <span id="NI_T5" class="nominal-value">---</span>
                        <span id="NI_T5_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>

                    <td class="result-cell">
                        <span id="NI_T7" class="nominal-value">---</span>
                        <span id="NI_T7_RANGE" class="tolerance-value">---</span>
                        <span class="tolerance-label">±12%</span>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>


    <h2>計算式</h2>

    <h3>超反限時 EI</h3>

    <div class="formula-box">
        <code>
            T = (80 × D) / (I² − 1) × 0.1
        </code>
        <br>
        I = 整定電流値倍率（2、3、5、7）
    </div>


    <h3>強反限時 VI</h3>

    <div class="formula-box">
        <code>
            T = (13.5 × D) / ((I − 1) × 10)
        </code>
        <br>
        I = 整定電流値倍率（2、3、5、7）
    </div>


    <h3>反限時 NI</h3>

    <div class="formula-box">
        <code>
            T = (0.14 × D) / ((I<sup>0.02</sup> − 1) × 10)
        </code>
        <br>
        I = 整定電流値倍率（2、3、5、7）
    </div>

</div>


<script>
"use strict";

/*
 * OCR限時要素 動作時間計算
 *
 * D = ダイヤル値
 * I = 整定電流値倍率
 *
 * 200% → I = 2
 * 300% → I = 3
 * 500% → I = 5
 * 700% → I = 7
 */


// 計算対象となる整定電流値
const CURRENT_RATIOS = [2, 3, 5, 7];


// 動作時間の許容差
const TOLERANCE = {
    2: 0.17,
    3: 0.17,
    5: 0.12,
    7: 0.12
};


// 各限時特性の計算式
const CHARACTERISTICS = {

    // 超反限時 EI
    EI: (D, I) => {
        return (80 * D) / (I ** 2 - 1) * 0.1;
    },

    // 強反限時 VI
    VI: (D, I) => {
        return (13.5 * D) / ((I - 1) * 10);
    },

    // 反限時 NI
    NI: (D, I) => {
        return (0.14 * D) / ((I ** 0.02 - 1) * 10);
    }

};


/**
 * 数値を3桁の小数に変換
 */
function formatNumber(value) {
    return value.toFixed(3);
}


/**
 * 1つの計算結果を画面に表示
 */
function displayResult(type, I, time) {

    const tolerance = TOLERANCE[I];

    const lower = time * (1 - tolerance);
    const upper = time * (1 + tolerance);

    const nominalElement =
        document.getElementById(`${type}_T${I}`);

    const rangeElement =
        document.getElementById(`${type}_T${I}_RANGE`);


    nominalElement.textContent =
        formatNumber(time) + " s";

    rangeElement.textContent =
        formatNumber(lower) +
        " ～ " +
        formatNumber(upper) +
        " s";
}


/**
 * 指定された特性を計算
 */
function calculateCharacteristic(type, D) {

    const formula = CHARACTERISTICS[type];

    if (!formula) {
        console.error("未知の特性:", type);
        return;
    }

    CURRENT_RATIOS.forEach(I => {

        const time = formula(D, I);

        displayResult(type, I, time);

    });
}


/**
 * 全ての特性を計算
 */
function calculate() {

    const input =
        document.getElementById("dialValue");

    const D = Number(input.value);


    // 入力チェック
    if (!Number.isFinite(D) || D <= 0) {

        alert("ダイヤル値を0より大きい数値で入力してください。");

        input.focus();

        return;
    }


    // EI、VI、NIを計算
    Object.keys(CHARACTERISTICS).forEach(type => {

        calculateCharacteristic(type, D);

    });

}


// フォーム送信時
document
    .getElementById("dialForm")
    .addEventListener("submit", function(event) {

        // ページの再読み込みを防止
        event.preventDefault();

        calculate();

    });

</script>


<?php include("footer.php"); ?>