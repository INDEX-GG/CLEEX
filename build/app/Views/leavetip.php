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
   <link rel="preload" href="./topkatpl/fonts/topka_font.woff" as="font" crossorigin="anonymous" />
   <title>Topka Reborn</title>
</head>

<body>
   <div class="wrapper theme">
      <nav class="nav">
         <a class='nav__back'></a>
         <div class='nav__pos'>Оставить чаевые</div>
      </nav>
      <div class="paytip">
        <div class = "paytip__waiter">
           <div class="paytip__pic avatar"></div>
           <div class="paytip__name"></div>
           <div class="paytip__credo"></div>
        </div>
        <form class="paytip__wrapper">
            <input class="paytip__sum" name="summ" type="text"/>
            <div class="paytip__choiseSum">
                 <div class="button_mini button_mini_grey">100</div>
                 <div class="button_mini button_mini_grey">200</div>
                 <div class="button_mini button_mini_grey">300</div>
                 <div class="button_mini button_mini_grey">500</div>
            </div>
            <div class="paytip__review">
                 <div class="paytip__review__title">Вам всё понравилось?</div>
                 <div class="paytip__starRating">
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                 </div>
                 <input class="paytip__review__input" placeholder="Ваш отзыв"/>
                 <button class="button button_blue review_button">Оставить отзыв</button>
               </div>
            <div class="paytip__buttons">
                <button class="button_pay"><div>Оплатить картой</div><img src="./topkatpl/img/credit-card.svg"/></button>
            </div>
            <div class="paytip__checks">
                <label class="checkbox">
                    <input type="checkbox" checked/>
                    <div class="checkbox__text">Я хочу взять на себя комиссию сотрудника (20 ₽)</div>
                 </label>
                 <label class="checkbox">
                    <input type="checkbox" checked/>
                    <div class="checkbox__text">Я согласен с условиями Пользовательского соглашения и Политики обработки персональных данных</div>
                 </label>
            </div>
         </form>
     </div>
   </div>
</body>
<script src="./topkatpl/js/bundle.js"></script>
</html>