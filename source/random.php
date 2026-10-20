<?php include("header.php"); ?>

<?php
// CSVファイル名
$csvFile = 'data.csv';

// 配列にデータを格納するための空の配列を作成
$csvData = array();

// CSVファイルを読み取りモードで開く
if (($handle = fopen($csvFile, 'r')) !== false) {
    // ファイルの各行を読み取り、配列に格納する
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $csvData[] = $data;
    }
    fclose($handle);
} else {
    echo "CSVファイルを開けません。";
}

// 配列の中身を表示
shuffle($csvData);
echo <<< eof
{$csvData[0][3]}<br>
https://memo-labo.com/{$csvData[0][1]}.php<br>
eof;
?>

<?php include("footer.php"); ?>