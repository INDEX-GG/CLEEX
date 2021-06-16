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
     <a data-table href="/tables" class="button button_grey">Выбрать столик на сегодня</a>
     <a data-profile href="/profile" class="button button_grey">Настройка профиля</a>
     <a data-barman href="/barman" class="button button_grey">Вывод средств</a>
     <a data-signout href = "/auth/logOut" class="button button_grey">Выход</a>
   </div>
</body>
</html>