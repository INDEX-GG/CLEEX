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
         <a href="/barman" class='nav__back'></a>
         <div class='nav__pos'>Выпустить карту</div>
      </nav>
	<div class='regCard'>
		<form class='regCard__wrapper'>
			<div class="regCard__title">Заполните форму</div>
			<div class="regCard__fields">
				<div class="regCard__field">
					<div class="regCard__label">Имя</div>
					<input class="regCard__input" placeholder="Введите ваше имя"/> 
					<div class="regCard__error">ошибка</div>
				</div>
			</div>
			<input type='hidden' name=staff_id id='staff_id' />
			<button class="button button_blue">Отправить</button>
		</form>
	</div>
   </div>
</body>
<script src="./topkatpl/js/bundle.js"></script>
</html>