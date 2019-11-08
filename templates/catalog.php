<h2>
    Catalog
</h2>



<?php foreach ($catalog as $key => $value):?>

<h3><?=$value['name']?></h3>
    <a href="/product/card/?id=<?=$value['id']?>"><img width="200" src="/img/<?=$value['nameImg']?>" alt=""></a>
<p><?=$value['price']?></p>
<p><?=$value['description']?></p>
    <a href="/basket/add/?id=<?=$value['id']?>" class="buttonBuy">Buy</a>

<?php endforeach;?>

<a href="/product/up/">Update</a>

