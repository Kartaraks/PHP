<h2>
    Catalog
</h2>

<?php //var_dump($catalog)?>

<?php foreach ($catalog as $key => $value):?>

<h3><?=$value['name']?></h3>
    <a href="/product/card/?id=<?=$value['id']?>"><img width="200" src="/img/<?=$value['nameImg']?>" alt=""></a>
<p><?=$value['price']?></p>
<p><?=$value['description']?></p>
    <a href="/basket/add/?id=<?=$value['id']?>" class="buttonBuy">Buy</a>
    <a class="buttonBuy" href="/product/update/?id=<?=$value['id']?>">Update</a>

<?php endforeach;?>



