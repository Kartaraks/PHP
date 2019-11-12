<h2>
    Catalog
</h2>

<?php //var_dump($catalog)?>

<?php foreach ($catalog as $key => $value):?>

<div class="div_catalog">
    <h3><?=$value['name']?></h3>
    <a href="/product/card/?id=<?=$value['id']?>"><img width="200" src="/img/<?=$value['nameImg']?>" alt=""></a>
    <p><?=$value['price']?></p>
    <p class="description"><?=$value['description']?></p>

    <a class="buttonBuy" href="/product/update/?id=<?=$value['id']?>">Update</a>
    <button data-id="<?=$value['id']?>" class="buy">Купить</button>
</div>

<?php endforeach;?>


<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/addToBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id:id,
                        })

                    });

                    const answer = await response.json();
                    console.log(answer.id);
                }
            )()
        })
    })

</script>



<!--// <a href="/basket/add/?id=--><?//=$value['id']?><!--" class="buttonBuy">Buy</a>-->