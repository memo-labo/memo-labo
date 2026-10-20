<?php
$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  if("/b/" . $line[1] . ".php" == $_SERVER["REQUEST_URI"]){
    $category = $line[0];
    break;
  }
}
fclose($f);
?>

<?php
$f = fopen("data.csv","r");
if($category){
echo <<< eof
<h2>関連ページ</h2>
<ul class="top-links">
eof;
while($line = fgetcsv($f)){
    if($line[0] == $category){
echo <<< eof
<li><a href="{$line[1]}.php">{$line[2]}</a></li>
eof;
    } 
}
echo <<< eof
</ul>
eof;
}
fclose($f);
?>


</main>

<div class="return">
  <a href="index.php">TOPに戻る</a>
</div>

</div>

</body>
</html>