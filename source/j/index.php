<?php include("header.php"); ?>

<?php
function cat_prev($cat){
echo '<ul class="top-links">';
  $f = fopen("data.csv","r");
  while($line = fgetcsv($f)){
    if($line[0] == $cat){
echo <<< eof
  <li><a href="{$line[1]}.php">{$line[2]}</a></li>
eof;
    }
  }
fclose($f);
echo "</ul>";
}
?>

<h2>圧着端子・接続</h2>
<?php cat_prev("tanshi");?>

<h2>ネジ・ボルト・ナット</h2>
<?php cat_prev("neji");?>

<h2>アンカー</h2>
<?php cat_prev("ank");?>

<h2>コンセント</h2>
<?php cat_prev("con");?>

<h2>配管</h2>
<?php cat_prev("haikan");?>

<h2>電材・支持部材</h2>
<?php cat_prev("1");?>

<h2>電灯・照明</h2>
<?php cat_prev("light");?>

<h2>電気器具</h2>
<?php cat_prev("4");?>

<h2>配線・ケーブル・コード</h2>
<?php cat_prev("5");?>

<h2>工具</h2>
<?php cat_prev("kougu");?>

<h2>技術・ノウハウ・体験談</h2>
<?php cat_prev("skill");?>

<h2>その他</h2>
<?php cat_prev("3");?>

<?php include("../link.php"); ?>

<?php include("footer.php"); ?>