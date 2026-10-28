<?php
$request_path = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH);
if(!$request_path){
  $request_path = "/";
}

$current_slug = "";
$category = "";
$category_items = [];

$f = fopen("data.csv","r");
while($line = fgetcsv($f)){
  $slug = $line[1] ?? "";
  if("/" . $slug . ".php" === $request_path){
    $current_slug = $slug;
    $category = $line[0] ?? "";
    break;
  }
}
fclose($f);

if($category){
  $f = fopen("data.csv","r");
  while($line = fgetcsv($f)){
    if(($line[0] ?? "") === $category){
      $category_items[] = [
        "slug" => $line[1] ?? "",
        "title" => $line[2] ?? ($line[3] ?? "")
      ];
    }
  }
  fclose($f);
}

$related_items = [];
if($category_items){
  $current_index = null;
  foreach($category_items as $i => $item){
    if($item["slug"] === $current_slug){
      $current_index = $i;
      break;
    }
  }

  // カテゴリ先頭の親記事を優先して内部リンクを集約する。
  if(isset($category_items[0]) && $category_items[0]["slug"] !== $current_slug){
    $related_items[] = $category_items[0];
  }

  // 現在の記事の前後から近い記事を優先する。
  if($current_index !== null){
    for($distance = 1; $distance < count($category_items) && count($related_items) < 8; $distance++){
      foreach([$current_index - $distance, $current_index + $distance] as $idx){
        if($idx < 0 || $idx >= count($category_items)) continue;
        $item = $category_items[$idx];
        if($item["slug"] === $current_slug) continue;

        $exists = false;
        foreach($related_items as $related){
          if($related["slug"] === $item["slug"]){
            $exists = true;
            break;
          }
        }
        if(!$exists){
          $related_items[] = $item;
        }
        if(count($related_items) >= 8) break;
      }
    }
  }

  // 念のため8件に満たない場合はカテゴリ先頭から補完する。
  foreach($category_items as $item){
    if(count($related_items) >= 8) break;
    if($item["slug"] === $current_slug) continue;

    $exists = false;
    foreach($related_items as $related){
      if($related["slug"] === $item["slug"]){
        $exists = true;
        break;
      }
    }
    if(!$exists){
      $related_items[] = $item;
    }
  }
}

// GA4直近30日で流入の多い代表記事。
// カテゴリ外への回遊入口として少数だけ表示する。
$popular_items = [
  ["slug" => "number", "title" => "制御機器番号一覧"],
  ["slug" => "b_sq", "title" => "B種接地線の太さ計算"],
  ["slug" => "dt", "title" => "ダブルスロー（DT）の仕組み"],
  ["slug" => "ctt", "title" => "CTT 電流試験端子"],
  ["slug" => "ocr", "title" => "OCR 過電流継電器"],
  ["slug" => "v0", "title" => "V0 零相電圧"],
];

$popular_items = array_values(array_filter($popular_items, function($item) use ($current_slug){
  return ($item["slug"] ?? "") !== $current_slug;
}));
?>

<?php if($related_items): ?>
<h2>関連ページ</h2>
<ul class="top-links related-links">
<?php foreach($related_items as $item): ?>
<li><a href="<?= htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>.php"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></a></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if($popular_items && !$should_noindex): ?>
<h2>よく読まれているページ</h2>
<ul class="top-links related-links">
<?php foreach(array_slice($popular_items, 0, 5) as $item): ?>
<li><a href="<?= htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>.php"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></a></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

</main>

<div class="return">
  <a href="index.php">TOPに戻る</a>
</div>

</div>

</body>
</html>