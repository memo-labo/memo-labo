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

<h2>エレベーター・電気設備</h2>
<?php cat_prev("1");?>

<h2>水、給水、原理</h2>
<?php cat_prev("4");?>

<h2>配管</h2>
<?php cat_prev("haikan");?>

<h2>清掃、掃除</h2>
<?php cat_prev("3");?>

<h2>ビルメンの規則・資格・法律</h2>
<?php cat_prev("2");?>

<h2>その他</h2>
<?php cat_prev("5");?>

<?php include("../link.php"); ?>

<?php include("footer.php"); ?>