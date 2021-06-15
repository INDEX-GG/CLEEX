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
         <a href="/account" class='nav__back'></a>
         <div class='nav__pos'>Выбор столиков</div>
      </nav>
      <form class="tables">
         <div class="tables__wrapper">
               <div class="tables__barcontainer">
                  <div class="tables__bar">
                     Бар
                  </div>
               </div>
         <div class="tables__tabcontainer">
            <div class="tables__container">
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            <div class="lds-circle"><div></div></div>
            </div>
         </div>
         </div>
         <div class="tables__btnBlock">
            <button disabled=true class="tables__button button button_blue">Выбрать</button>
            <button class="tables__button button button_outlined hide" >Сброс<button>
         </div>
         </form>
         <button class="button button_outlined" id="push-subscription-button">Разрешить</button>
         <button class="button button_outlined" id="send-push-button">Тест Push</button>
   </div>

   <script src="app.js"></script>
   <script src="sendapp.js"></script>
   <script defer src="./topkatpl/js/bundle.js"></script>
</body>
</html>