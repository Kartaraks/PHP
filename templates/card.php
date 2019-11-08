<?php
/** @var \app\models\Product $product */
?>

<h2><?=$product->name?></h2>
<img width="200" src="/img/<?=$product->nameImg?>" alt=""> <br>
<p><?=$product->price?> руб.</p>
<p><?=$product->description?></p>
