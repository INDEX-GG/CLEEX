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
         <div class='nav__pos'>Настройка профиля</div>
      </nav>
      <form class="profile" enctype="multipart/form-data" method = "post" >
         <div class="profile__waiter">
            <div class="profile__img avatar">
               <label class="profile__file">
                  <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp, image/heic, image/heif"/>
               </label>
               <div class="profile__plus" ></div>
            </div>
            <div class="profile__nameFld"></div>
            <div class="profile__credoFld"></div>
         </div>
        <div class=profile__info>
            <input class="profile__name" name="nickname" type="text" placeholder='Введите имя' maxlength="25"/>

            <textarea class="profile__credo" name="motto" type="text" placeholder="Введите девиз" maxlength="50"></textarea>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <button disabled=true class="profile__button button button_blue">Сохранить</button>
        </div>
      </form>
      <div class="profile__modal">
         <div class="profile__modal__image"></div>
         <button class="profile__modal__button button button_blue">Готово</button>
      </div>
   </div>
</body>
<script src="./topkatpl/js/bundle.js"></script>
</html>