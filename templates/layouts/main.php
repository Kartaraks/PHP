<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/auth/logout/"> [Выход]</a>
<?php else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" id="login" placeholder="Логин">
        <input type="text" name="password" id="password" placeholder="Пароль">
        <input type="submit" name="submit" value="Войти">
        <input type="checkbox" name="save" class="sign">Save
    </form>
<?php endif;?> <br>
<?=$menu?>
<?=$content?>
</body>
</html>



<!--<!doctype html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Document</title>-->
<!--    <link rel="stylesheet" href="/css/style.css">-->
<!--</head>-->
<!--<body>-->
<?php //if ($auth):?>
<!--    Добро пожаловать --><?//=$username?><!-- <a href="/auth/logout/"> [Выход]</a>-->
<?php //else:?>
<!--    <form action="/" method="post">-->
<!--        <input type="text"  id="login" placeholder="Логин">-->
<!--        <input type="text"  id="password" placeholder="Пароль">-->
<!--        <input type="submit"  class="sign" value="Войти">-->
<!--        <input type="checkbox"  class="check">Save-->
<!--    </form>-->
<?php //endif;?><!-- <br>-->
<?//=$menu?>
<?//=$content?>
<!---->
<!--<script>-->
<!--let button = document.querySelector('.sign');-->
<!---->
<!--button.addEventListener('click', () => {-->
<!--    let login = document.getElementById('login').value;-->
<!--    let password = document.getElementById('password').value;-->
<!--    let check = document.getElementsByClassName('.check').value;-->
<!--    console.log(password);-->
<!--    (-->
<!--        async () => {-->
<!--            const response = await fetch('/auth/login/', {-->
<!--                method: 'POST',-->
<!--                headers: new Headers({-->
<!--                    'Content-Type': 'application/json'-->
<!--                }),-->
<!--                body: JSON.stringify({-->
<!--                    login:login,-->
<!--                    password:password,-->
<!--                    check:check,-->
<!--                })-->
<!---->
<!--            });-->
<!---->
<!--            const answer = await response.json();-->
<!--            console.log(answer.response);-->
<!---->
<!--        }-->
<!--    )()-->
<!--})-->
<!---->
<!--</script>-->
<!---->
<!--</body>-->
<!--</html>-->
