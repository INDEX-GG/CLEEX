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
    <div class="wrapper theme">
        <nav class="nav">
           <a href='/account' class='nav__back'></a>
           <div class='nav__pos'>Вывод средств</div>
        </nav>
        <div class="barman">
          <div class = "barman__waiter">
             <div class="barman__pic avatar"></div>
             <div class="barman__name">Имя</div>
             <div class="barman__count">
                 <span class="barman__total"></span>
                 <span class="barman__current"> + 300 ₽ за сегодня</span>
            </div>
          </div>
          <div class="barman__wrapper">
              <input class="barman__sum" name="summ" type="text"/>
              <div class="barman__choiseSum">
              </div>
              <div class="barman__about">
                  <p class="barman__minsum"></p>
                  <p>20 ₽ - комиссия с одного вывода средств</p>
              </div>
              <div class="barman__buttons">
			  		<button class="button_pay hold"><div>Расхолдировать</div><img src="./topkatpl/img/credit-card.svg"/></button>
                  	<button class="button_pay"><div>Вывести на карту</div><img src="./topkatpl/img/credit-card.svg"/></button>
              </div>
              <div class="barman__checks">
                   <label class="checkbox">
                      <input type="checkbox" checked/>
                      <div class="checkbox__text">Я согласен с условиями Пользовательского соглашения и Политики обработки персональных данных</div>
                   </label>
              </div>
            </div>
       </div>
     </div>
</body>
<script src="./topkatpl/js/bundle.js"></script>
</html>