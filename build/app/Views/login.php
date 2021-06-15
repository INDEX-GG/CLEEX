<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />
   <meta name="theme-color" content="#192021" />
   <link rel="icon" href="./topkatpl/favicon.ico" />
   <link href="./topkatpl/css/style.min.css" rel="stylesheet">
   <link rel="apple-touch-icon" href="./topkatpl/logo192.png" />
   <link rel="manifest" href="./topkatpl/manifest.json" />
   <title>Topka Reborn</title>
</head>

<body>
   <div class="wrapper theme hauto">
      <nav class="nav">
         <button class='nav__back'></button>
         <div class='nav__pos'></div>
      </nav>
      <div class='logo'>
        <img src="./topkatpl/img/logo.svg" alt='Лого'/>
     </div>
     <form class="login" >
         <div class="login__wrapper">
            <input class="login__name" name="login" placeholder="логин" type="text" maxlength="25"/>
            <div class="login__password">
                <input class="login__pass" name="pass" placeholder="пароль" type="password" maxlength="25"/>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <button class="login__pass__vis"><img src="./topkatpl/img/invis.svg" /></button>
            </div>
            <button disabled=true class="login__button button button_blue" type="submit">Вход</button>
        </div>
      </form>
   </div>
</body>
<script src="./topkatpl/js/bundle.js"></script>
</html>