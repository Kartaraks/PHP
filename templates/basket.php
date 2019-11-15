<?php
//var_dump($basket);
?>

<?php foreach ($basket as $value):?>
<div id="basket_product_<?=$value['id_basket']?>"><p><?=$value['name']?></p>
    <img width="100px" src="/img/<?=$value['nameImg']?>" alt="">
    <p><?=$value['price']?></p>
    <button data-id="<?=$value['id_basket']?>" class="del">Удалить</button>
</div>
<?php endforeach;?>

<script>

    let buttons = document.querySelectorAll('.del');

    buttons.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/DelFromBasket/', {
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
                    if (answer.count === 0){
                        document.getElementById('count').remove();
                    } else {
                        document.getElementById('count').innerText = answer.count;
                    }

                    document.getElementById(`basket_product_${id}`).remove();

                }
            )()
        })
    })
</script>