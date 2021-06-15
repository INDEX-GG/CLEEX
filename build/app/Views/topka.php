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
 <button data-menubtn class="button button_grey">Меню</button>
 <a data-tipbtn href="./topkatpl/leavetip.html" class="button button_grey">Оставить чаевые</a>
 <button data-waitbtn class="button button_grey">Вызвать официанта</button>
 <button data-kitchen class="button button_grey hide">Кухня</button>
 <button data-bar class="button button_grey hide">Бар</button>
 <button data-cocktails class="button button_grey hide">Коктейльная карта</button>
      <div class="kitchen hide">
    <div class="menu__title">
        Холодные закуски
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">Сельдь с оливками, луком и картофелем<span>(250г)</span></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЛОСОСЬ СЛАБОЙ СОЛИ<span>(200г)</span></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КОПЧЕНЫЙ АРАХИС<span>(100г)</span></div>
            <div class="menu__price">270</div>
        </div>
    </div>
    <div class="menu__title">
        Горячие закуски
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">ПОП-КОРН ИЗ ЦЫПЛЕНКА<span>(200г)</span></div>
            <div class="menu__price">240</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КРЫЛЫШКИ БАФФАЛО С ДОМАШНИМ ЧИЛИ<span>(250г)</span></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">СЕРДЕЧКИ ПО-АЗИАТСКИ С КУНЖУТОМ<span>(150г)</span></div>
            <div class="menu__price">250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КОРН-ДОГИ С МЕДОВОЙ ГОРЧИЦЕЙ<span>(200г)</span></div>
            <div class="menu__price">230</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЖАРЕНЫЕ КОКТЕЙЛЬНЫЕ КРЕВЕТКИ С ЧЕСНОКОМ<span>(200г)</span></div>
            <div class="menu__price">330</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">СЫРНЫЕ ТРЕУГОЛЬНИКИ ИЗ МОЦАРЕЛЛЫ<span>(180г)</span></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Кольца кальмара<span>(200г)</span></div>
            <div class="menu__price">350</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Луковые кольца<span>(150г)</span></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Картофель фри<span>(180г)</span></div>
            <div class="menu__price">200</div>
        </div>
    </div>
        <div class="menu__title">
            Супы
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">СЫРНЫЙ СУП С КУРИЦЕЙ И СУХАРИКАМИ<span>(300г)</span></div>
                <div class="menu__price">220</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">КРЕМ-СУП ИЗ ТЫКВЫ С ТИГРОВЫМИ КРЕВЕТКАМИ<span>(300г)</span></div>
                <div class="menu__price">330</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">СБОРНАЯ СОЛЯНКА<span>(350г)</span></div>
                <div class="menu__price">250</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">Грибной суп<span>(350г)</span></div>
                <div class="menu__price">250</div>
            </div>
        </div>
        <div class="menu__title">
            Паста
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">ПАСТА С КУРИЦЕЙ И ГРИБАМИ В СЛИВОЧНОМ СОУСЕ<span>(250г)</span></div>
                <div class="menu__price">320</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПАСТА КАРБОНАРА С БЕКОНОМ И ЯЙЦОМ<span>(250г)</span></div>
                <div class="menu__price">320</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПАСТА С ТИГРОВЫМИ КРЕВЕТКАМИ И СОУСОМ БИСК<span>(250г)</span></div>
                <div class="menu__price">450</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПАСТА С ЛОСОСЕМ И ЦУКИНИ В СЛИВОЧНОМ СОУСЕ<span>(250г)</span></div>
                <div class="menu__price">420</div>
            </div>
        </div>
        <div class="menu__title">
            Основные блюда
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">ШАШЛЫЧКИ ИЗ КУРИНОГО БЕДРА С ОВОЩНЫМ ГАРНИРОМ<span>(350г)</span></div>
                <div class="menu__price">370</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">СВИНАЯ ВЫРЕЗКА С ГАРНИРОМ ИЗ КАРТОФЕЛЯ И ГРИБОВ<span>(350г)</span></div>
                <div class="menu__price">550</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">МИНЬОН ИЗ ГОВЯДИНЫ С ОВОЩАМИ ГРИЛЬ<span>(320г)</span></div>
                <div class="menu__price">780</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">БИФШТЕКС С СЫРОМ ЧЕДДЕР И ЯЙЦОМ ПАШОТ<span>(260г)</span></div>
                <div class="menu__price">600</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПЕЛЬМЕНИ ДОМАШНИЕ СО СВИНИНОИ И ГОВЯДИНОИ<span>(300г)</span></div>
                <div class="menu__price">300</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ТОМЛЕНЫЕ СВИННЫЕ РЕБРА BBQ С АРАХИСОМ<span>(350г)</span></div>
                <div class="menu__price">450</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">СТЕЙК ИЗ ЛОСОСЯ СО СТРУЧКОВОИ ФАСОЛЬЮ<span>(260г)</span></div>
                <div class="menu__price">650</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">Картофель фри<span>(300г)</span></div>
                <div class="menu__price">600</div>
            </div>
        </div>
        <div class="menu__title">
            Салаты
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">САЛАТ СО СЛАБОСОЛЁНЫМ ЛОСОСЕМ И СОУСОМ ПЕСТО<span>(220г)</span></div>
                <div class="menu__price">390</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">САЛАТ С РОСТБИФОМ С МЕДОВО-ЦИТРУСОВОЙ ЗАПРАВКОЙ<span>(200г)</span></div>
                <div class="menu__price">390</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">САЛАТ В СТИЛЕ “ЦЕЗАРЬ” С КУРИНЫМ ФИЛЕ<span>(240г)</span></div>
                <div class="menu__price">350</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">САЛАТ В СТИЛЕ “ЦЕЗАРЬ” С КРЕВЕТКАМИ<span>(240г)</span></div>
                <div class="menu__price">450</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">САЛАТ ГРЕЧЕСКИЙ СО СЛИВОЧНЫМ СЫРОМ<span>(250г)</span></div>
                <div class="menu__price">270</div>
            </div>
        </div>
        <div class="menu__title">
            Бургеры и сендвичи
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">БУРГЕР С КУРИЦЕЙ И ХРУСТЯЩИМ ЛУКОМ<span>(450г)</span></div>
                <div class="menu__price">380</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">БУРГЕР МОНСТР С ДВУМЯ КОТЛЕТАМИ И СОУСОМ ГРИЛЬ<span>(550г)</span></div>
                <div class="menu__price">520</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">БУРГЕР МR.КОРОЛЕВСКИЙ С БЕКОНОМ<span>(450г)</span></div>
                <div class="menu__price">420</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ЧИЗБУРГЕР С ГОВЯЖЬЕЙ КОТЛЕТОЙ<span>(450г)</span></div>
                <div class="menu__price">470</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">БУРГЕР С ГОВЯЖЬЕЙ КОТЛЕТОЙ, ЖАРЕНЫМ ЯЙЦОМ И ХАЛАПЕНЬО<span>(450г)</span></div>
                <div class="menu__price">470</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">СЕНДВИЧ С КУРИНЫМ ФИЛЕ<span>(350г)</span></div>
                <div class="menu__price">370</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">СЕНДВИЧ С ЛОСОСЕМ И СЛИВОЧНЫМ СЫРОМ<span>(330г)</span></div>
                <div class="menu__price">390</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ГИРОС С КУРИНЫМ ФИЛЕ И СЛИВОЧНЫМ СЫРОМ<span>(350г)</span></div>
                <div class="menu__price">370</div>
            </div>
        </div>
        <div class="menu__title">
            Пицца
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА ФУНГИ С КУРИЦЕЙ И ГРИБАМИ НА БЕЛОМ СОУСЕ<span>(500г)</span></div>
                <div class="menu__price">400</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА С ЛОСОСЕМ, ТИГРОВЫМИ КРЕВЕТКАМИ И ПОМИДОРАМИ ЧЕРРИ<span>(450г)</span></div>
                <div class="menu__price">500</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА КАРБОНАРА<span>(450г)</span></div>
                <div class="menu__price">450</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА МАРГАРИТА С ТОМАТАМИ<span>(500г)</span></div>
                <div class="menu__price">370</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА ЧЕТЫРЕ СЫРА<span>(400г)</span></div>
                <div class="menu__price">370</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ПИЦЦА ПЕППЕРОНИ<span>(400г)</span></div>
                <div class="menu__price">450</div>
            </div>
        </div>
        <div class="menu__title">
            Десерты
        </div>
        <div class="menu__content">
            <div class="menu__row">
                <div class="menu__name">ЧИЗКЕЙК В СТИЛЕ NEW YORK КЛАССИЧЕСКИИ<span>(150г)</span></div>
                <div class="menu__price">170</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">ЧИЗКЕЙК ПО-ДОМАШНЕМУ ШОКОЛАДНЫЙ<span>(150г)</span></div>
                <div class="menu__price">200</div>
            </div>
            <div class="menu__row">
                <div class="menu__name">МИЛЬФЕЙ С ДЖЕМОМ ИЗ ЧЕРНОИ СМОРОДИНЫ<span>(250г)</span></div>
                <div class="menu__price">250</div>
            </div>
        </div>
</div>
      <div class="bar hide">
    <div class="menu__title">
        Пиво разливное
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">РYSSY JUICE<span>(0,5л)</span><p>МОЛОДЕНЬКОЕ СВЕЖЕЕ 4,5%</p></div>
            <div class="menu__price">190</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ИЗ-ПОД КОНЯ<span>(0,5л)</span><p>ПРОСТО ХУЕВОЕ, ПШЕНИЧНОЕ</p></div>
            <div class="menu__price">190</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">NUТ ВUTTER<span>(0,5/0,3л)</span><p>БРАУН ЭЛЬ 5,5%</p></div>
            <div class="menu__price">300/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КLASTER<span>(0,5/0,3л)</span><p>ЧЕХИЯ, СВЕТЛОЕ НЕПАСТЕРИЗОВАННОЕ 5%</p></div>
            <div class="menu__price">350/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">IRON WOODS<span>(0,5/0,3л)</span><p>РОССИЯ GLETCHER, КРАФТОВЫЙ АЗОТНЫЙ СТАУТ 4,8%</p></div>
            <div class="menu__price">300/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ВLANCHE DE FLEUR<span>(0,5/0,3л)</span><p>РОССИЯ GLETCHER, БЕЛОЕ ПШЕНИЧНОЕ 4%</p></div>
            <div class="menu__price">280/230</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">FRIDAY AVENUE<span>(0,5/0,3л)</span><p>АМЕRICA PALE ALE, IBU 24 | 4,7%</p></div>
            <div class="menu__price">280/230</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ВOWLER IPA<span>(0,5/0,3л)</span><p>РОССИЯ, GLETCHER, КЛАССИЧЕСКИЙ INDIA PALE ALE, IBU 70 | 6,1%</p></div>
            <div class="menu__price">300/250</div>
        </div>
    </div>
    <div class="menu__title">
        Пиво бутылочное
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">GLETCHER BREWERY<span>(0,5л)</span><p>В АССОРТИМЕНТЕ, РОССИЯ, МОСКВА</p></div>
            <div class="menu__price">280</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">KONIX<span>(0,5/0,3л)</span><p>В АССОРТИМЕНТЕ, РОССИЯ, ПЕНЗА</p></div>
            <div class="menu__price">280/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Jaws<span>(0,5/0,33л)</span><p>В АССОРТИМЕНТЕ, РОССИЯ, ЕКАТЕРИНБУРГ</p></div>
            <div class="menu__price">300/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">PETRUS AGED RED<span>(0,5/0,33л)</span><p>ТЕМНЫЙ ЭЛЬ С ВИШНЕВЫМ СОКОМ, БЕЛЬГИЯ</p></div>
            <div class="menu__price">350/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">MAISELS ORIGINAL/DUNKEL <span>(0,5л)</span><p>СВЕТЛОЕ/ТЕМНОЕ, ПШЕНИЧНОЕ, ГЕРМАНИЯ</p></div>
            <div class="menu__price">310</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">SAMUEL SMITH ORGANIC CHOCOLATE STOUT<span>(0,355л)</span><p>МОЛОЧНЫЙ ШОКОЛАДНЫЙ СТАУТ, ВЕЛИКОБРИТАНИЯ</p></div>
            <div class="menu__price">370</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">BAYREUTHER HELL<span>(0,5л)</span><p>СВЕТЛЫЙ ХЕЛЬ, ГЕРМАНИЯ 4,9%</p></div>
            <div class="menu__price">320</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">MAISELS WEISSE<span>(0,5л)</span><p>СВЕТЛОЕ ПШЕНИЧНОЕ /БЕЗАЛКОГОЛЬНОЕ, ГЕРМАНИЯ</p></div>
            <div class="menu__price">290</div>
        </div>
    </div>
    <div class="menu__title">
        Белые вина
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">BRANCOTT ESTATE SAVIGNON BLANC / БРАНКОТ ИСТЕЙТ САВИНЬЕН БЛАН<span>(0,75/0,15л)</span><p>НОВАЯ ЗЕЛАНДИЯ 11%</p></div>
            <div class="menu__price">1800/360</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФЕСТИВАЛЬ ДЕ ФРАНС<span>(0,7/0,15л)</span><p>СТОЛОВОЕ БЕЛОЕ ПОЛУСЛАДКОЕ, РОССИЯ 11%</p></div>
            <div class="menu__price">900/180</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФЕСТИВАЛЬ ДЕ ФРАНС<span>(0,7/0,15л)</span><p>СТОЛОВОЕ Белое СУХОЕ, РОССИЯ 11%</p></div>
            <div class="menu__price">900/180</div>
        </div>
    </div>
    <div class="menu__title">
        Красные вина
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">BLANCOTT ESTATE PINOT NOIR / БРАНКОТ ИСТЕЙТ ПИНО НУАР<span>(0,75/0,15л)</span><p>НОВАЯ ЗЕЛАНДИЯ 11%</p></div>
            <div class="menu__price">1800/360</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФЕСТИВАЛЬ ДЕ ФРАНС<span>(0,7/0,15л)</span><p>СТОЛОВОЕ красное ПОЛУСЛАДКОЕ, РОССИЯ 11%</p></div>
            <div class="menu__price">900/180</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФЕСТИВАЛЬ ДЕ ФРАНС<span>(0,7/0,15л)</span><p>СТОЛОВОЕ красное СУХОЕ, РОССИЯ 11%</p></div>
            <div class="menu__price">900/180</div>
        </div>
    </div>
    <div class="menu__title">
        Вермуты
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">VERMOUT GANCIA BIANCO / ГАНЧА БЬЯНКО<span>(0,04л)</span><p>Италия 16%</p></div>
            <div class="menu__price">1800/360</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">VERMOUT GANCIA EXTRA DRY / ГАНЧА ЭКСТРА ДРАЙ<span>(0,04л)</span><p>Италия 18%</p></div>
            <div class="menu__price">900/180</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">VERMOUT GANCIA ROSSO / ГАНЧА РОССО<span>(0,04л)</span><p>Италия 16%</p></div>
            <div class="menu__price">900/180</div>
        </div>
    </div>
    <div class="menu__title">
        Игристые вина
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">GANCIA ASTI DOCG / ГАНЧА АСТИ ПОЛУСЛАДКОЕ<span>(0,75л)</span><p>ПОЛУСЛАДКОЕ, Италия 11%</p></div>
            <div class="menu__price">1900</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">GANCIA PROSECCO DOC / ГАНЧА ПРОСЕККО<span>(0,75л)</span><p>СУХОЕ, Италия 11,5%</p></div>
            <div class="menu__price">1900</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">LAMBRUSCO BIANCO<span>(0,75л)</span><p>ПОЛУСЛАДКОЕ, Италия</p></div>
            <div class="menu__price">900</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">LAMBRUSCO ROSSO<span>(0,75л)</span><p>ПОЛУСЛАДКОЕ, Италия</p></div>
            <div class="menu__price">900</div>
        </div>
    </div>
    <div class="menu__title">
        Absolut vodka
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">ABSOLUT<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT KURANT<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT CITRON<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT VANILIA<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT PEARS<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT RASPBERRI<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSOLUT EXTRAKT<span>(0,7/0.04л)</span><p>ШВЕЦИЯ, 40%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
    </div>
    <div class="menu__title">
        ВОДКА ИЗ РОССИИ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">МЯГКОВ СЕРЕБРО<span>(0,5/0,04л)</span><p>Россия, 40%</p></div>
            <div class="menu__price">1560/120</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">МЯГКОВ КЛЮКВА<span>(0,5/0,04л)</span><p>Россия, 40%</p></div>
            <div class="menu__price">1560/120</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">RUSSIAN STANDART ORIGINAL / РУССКИЙ СТАНДАРТ ОРИГИНАЛ<span>(0,5/0,04л)</span><p>Россия, 40%</p></div>
            <div class="menu__price">1950/150</div>
        </div>
    </div>
    <div class="menu__title">
        ЛИКЁРЫ / НАСТОЙКИ / БИТТЕРЫ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">DE KUYPER / ДЕ КАЙПЕР<span>(0,7/0,04л)</span><p>В АССОРТИМЕНТЕ, 17%</p></div>
            <div class="menu__price">3600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">LAMONICA SAMBUCA EXTRA<span>(0,5/0,04л)</span><p>Италия, 40%</p></div>
            <div class="menu__price">2600/200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ABSINTHE ABSOLVENT / АБСЕНТ АБСОЛЬВЕНТ<span>(0,5/0,04л)</span><p>Италия, 70%</p></div>
            <div class="menu__price">4550/350</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">BECHEROVKA<span>(1/0,04л)</span><p>Чехия, 38%</p></div>
            <div class="menu__price">6250/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЛИКЁРЫ MINTTU TWIST<span>(0,5/0,04л)</span><p>В АССОРТИМЕНТЕ (ШОТИКИ)</p></div>
            <div class="menu__price">2990/230</div>
        </div>
    </div>
    <div class="menu__title">
        ICE COLD SHOT
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">JAGERMEISTER (-18°С) / ЯГЕРМАЙСТЕР (-18°С)<span>(1/0,04л)</span><p>ГЕРМАНИЯ, 35%</p></div>
            <div class="menu__price">6250/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">АКЦИЯ JAGERMEISTER (-18°С) 3 ШОТА<span>(1/0,04л)</span><p></p></div>
            <div class="menu__price">750</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">АКЦИЯ JAGERMEISTER (-18°С) 5 ШОТОВ<span>(1/0,04л)</span><p></p></div>
            <div class="menu__price">1000</div>
        </div>
    </div>
    <div class="menu__title">
        ДЖИН
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">BEEFEATER / БИФИТЕР<span>(0,5/0,04л)</span><p>ВЕЛИКОБРИТАНИЯ, 40%</p></div>
            <div class="menu__price">4500/250</div>
        </div>
    </div>
    <div class="menu__title">
        ТЕКИЛА ОЛЬМЕКА
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">OLMECA BLANCO CLASICO<span>(1/0,04л)</span><p></p></div>
            <div class="menu__price">6250/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">OLMECA COLD SUPREME<span>(1/0,04л)</span><p></p></div>
            <div class="menu__price">6750/270</div>
        </div>
    </div>
    <div class="menu__title">
        ВИСКИ ИРЛАНДИЯ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">JAMESON<span>(1/0,04л)</span><p>ИРЛАНДИЯ, 40%</p></div>
            <div class="menu__price">6500/260</div>
        </div>
    </div>
    <div class="menu__title">
        ВИСКИ ШОТЛАНДИЯ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">DARROW / ДЭРРОУ <span>(0,7/0,04л)</span><p>ШОТЛАНДИЯ, 40%</p></div>
            <div class="menu__price">3750/150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">BALLANTINE'S FINEST<span>(0,5/0,04л)</span><p>ШОТЛАНДИЯ, 40%</p></div>
            <div class="menu__price">3250/250</div>
        </div>
    </div>
    <div class="menu__title">
        ЛЕГЕНДАРНЫЙ ШОТЛАНДСКИЙ ВИСКИ CHIVAS REGAL
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">CHIVAS REGAL 12 Y.O.<span>(0,7/0,04л)</span><p>ШОТЛАНДИЯ, 40%</p></div>
            <div class="menu__price">7200/400</div>
        </div>
    </div>
    <div class="menu__title">
        ОДНОСОЛОДОВЫЙ ВИСКИ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">THE GLENLIVET 12 Y.O.<span>(0,7/0,04л)</span><p></p></div>
            <div class="menu__price">9000/500</div>
        </div>
    </div>
    <div class="menu__title">
        БУРБОН
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">JEAM BEAM<span>(0,7/0,04л)</span><p>США, КЕНТУККИ</p></div>
            <div class="menu__price">6300/350</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">JEAM BEAM APPLE<span>(0,7/0,04л)</span><p>США, КЕНТУККИ</p></div>
            <div class="menu__price">6300/350</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">JEAM BEAM REG STAG<span>(0,7/0,04л)</span><p>США, КЕНТУККИ</p></div>
            <div class="menu__price">6300/350</div>
        </div>
    </div>
    <div class="menu__title">
        ТЭННЕССИ ВИСКИ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">JECK DANIEL'S<span>(0,7/0,04л)</span><p>США, ШТАТ ТЭННЕССИ</p></div>
            <div class="menu__price">7200/400</div>
        </div>
    </div>
    <div class="menu__title">
        Ром
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">HAVANA CLUB ANEJO 3 YEAR<span>(0,7/0,04л)</span><p>КУБА</p></div>
            <div class="menu__price">4500/250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">HAVANA CLUB ANEJO ESPECIAL<span>(0,7/0,04л)</span><p>КУБА</p></div>
            <div class="menu__price">4860/270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">HAVANA CLUB ANEJO 7 YEAR<span>(0,7/0,04л)</span><p>КУБА</p></div>
            <div class="menu__price">6300/350</div>
        </div>
    </div>
    <div class="menu__title">
        КОНЬЯК MARTELL COGNAC
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">MARTELL VS<span>(0,7/0,04л)</span><p></p></div>
            <div class="menu__price">6660/370</div>
        </div>
    </div>
    <div class="menu__title">
        АРМЯНСКИЕ КОНЬЯКИ ИЗ ГАММЫ APAPAT
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">APARAT 3 ЗВЕЗДЫ<span>(0,7/0,04л)</span><p></p></div>
            <div class="menu__price">3420/190</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">APARAT 5 ЗВЕЗД<span>(0,7/0,04л)</span><p></p></div>
            <div class="menu__price">4500/250</div>
        </div>
    </div>
    <div class="menu__title">
        КОФЕ / ЧАЙ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">Эспрессо<span>(40мл)</span><p></p></div>
            <div class="menu__price">100</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Американо<span>(100мл)</span><p></p></div>
            <div class="menu__price">100</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Капучино<span>(150мл)</span><p></p></div>
            <div class="menu__price">150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Irish Кофе<span>(150мл)</span><p></p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Латте<span>(150мл)</span><p></p></div>
            <div class="menu__price">150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Чай<span>(0,6л)</span><p>В ассортименте</p></div>
            <div class="menu__price">150</div>
        </div>
    </div>
    <div class="menu__title">
        КОФЕ / ЧАЙ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">Эспрессо<span>(0,33л)</span><p>Стекло</p></div>
            <div class="menu__price">100</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">BONAQUA<span>(0,33л)</span><p>Стекло</p></div>
            <div class="menu__price">100</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">SHWEPPES<span>(0,25л)</span><p>Стекло</p></div>
            <div class="menu__price">150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Sprite<span>(0,33л)</span><p>Стекло</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Red Bull<span>(0,25л)</span><p>Стекло</p></div>
            <div class="menu__price">150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Сок Rich<span>(0,2л)</span><p>Стекло</p></div>
            <div class="menu__price">150</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Сок<span>(0,25л)</span><p>В ассортименте</p></div>
            <div class="menu__price">150</div>
        </div>
    </div>
</div>
      <div class="cocktails hide">
    <div class="menu__title">
        Шоты
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">БОЯРСКИЙ<span>(0,04л)</span><p>ВОДКА, СИРОП ГРЕНАДИН, СОК ЛИМОНА, ТАБАСКО</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Б-52<span>(0,04л)</span><p>ЛИКЕР КОФЕЙНЫЙ, ЛИКЕР СЛИВОЧНЫЙ, ЛИКЕР ТРИПЛ СЕК</p></div>
            <div class="menu__price">250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">Б-53<span>(0,04л)</span><p>ЛИКЕР КОФЕЙНЫЙ, ЛИКЕР СЛИВОЧНЫЙ, АБСЕНТ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФИРМЕННАЯ НАСТОЙКА<span>(0,04л)</span><p>Водка</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ПЕТРОВИЧ<span>(0,04л)</span><p>ВИСКИ, СИРОП КАРАМЕЛЬ, КЛЮКВЕННОЕ ПЮРЕ</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">СКОЛЬЗКИЙ СОСОК<span>(0,04л)</span><p>САМБУКА, ЛИКЕР СЛИВОЧНЫЙ, СИРОП ГРЕНАДИН</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЗРАЧЕК НАЦИСТА<span>(0,04л)</span><p>ЯГЕРМАЙСТЕР, САМБУКА, АБСЕНТ</p></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ИЛЬИЧ<span>(0,04л)</span><p>СИРОП ЯБЛОЧНЫЙ, СОК ЛИМОНА, ВОДКА АБСОЛЮТ ВАНИЛЬ, ВИНОГРАД</p></div>
            <div class="menu__price">200</div>
        </div>
    </div>
    <div class="menu__title">
        КЛАССИКА
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">НЕГРОНИ<span>(0,09л)</span><p>ГАНЧА РОССО, КАМПАРИ БИТТЕР, ДЖИН, АПЕЛЬСИН</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">БЕЛЫЙ РУССКИЙ<span>(0,09л)</span><p>ВОДКА, СЛИВКИ, ЛИКЕР КОФЕЙНЫЙ</p></div>
            <div class="menu__price">250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ОЛД ФЭШН<span>(0,08л)</span><p>ВИСКИ, БИТТЕР АНГОСТУРА, СОДОВАЯ, САХАР</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЛОНГ АЙЛЕНД<span>(0,25л)</span><p>ВОДКА, ЛИКЕР ТРИПЛ СЕК, ТЕКИЛА, ДЖИН, РОМ, СОСА СОА, СОК ЛАЙМА</p></div>
            <div class="menu__price">400</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КОСМОПОЛИТЕН<span>(0,14л)</span><p>ВОДКА, КЛЮКВЕННОЕ ПЮРЕ, ЛИКЕР ТРИПЛ СЕК, СОК ЛИМОНА</p></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">МАРГАРИТА<span>(0,1л)</span><p>ТЕКИЛА, ЛИКЕР ТРИПЛ СЕК, СОК ЛИМОНА, САХАРНЫЙ СИРОП</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">АВИАЦИЯ<span>(0,11л)</span><p>ДЖИН, ЛИКЕР МАРАСКИНО, СОК ЛИМОНА, ЛАЙМ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">КРОВАВАЯ МЕРИ<span>(0,33л)</span><p>ВОДКА, СОК ТОМАТНЫЙ, СОК АПЕЛЬСИНОВЫЙ, СОЛЬ, САХАРНЫЙ СИРОП, СОУС ТАБАСКО, СОУС ВОРЧЕСТЕР, СОК ЛИМОНА</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">НАМАМА МОТО<span>(0,22л)</span><p>НАVANА СLUB ANEJO 3 YEAR, МЯТА, ЛАЙМ, СОДОВАЯ, САХАРНЫЙ СИРОП</p></div>
            <div class="menu__price">350</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">НАVАNА ДАЙКИРИ<span>(0,08л)</span><p>НАVANА СLUB ANEJO 3 YEAR, СОК ЛИМОНА, САХАРНЫЙ СИРОП</p></div>
            <div class="menu__price">270</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">CUBA LIBRE ESPECIAL<span>(0,19л)</span><p>РОМ НАVАМА СLUB АNEJO ESPECIAL, ЛАЙМ, СОСА СОLА</p></div>
            <div class="menu__price">300</div>
        </div>
    </div>
    <div class="menu__title">
        Миксы
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">РОМ КОЛА<span>(0,19л)</span><p>РОМ, СОСА СОLА</p></div>
            <div class="menu__price">250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ДЖИН ТОНИК<span>(0,19л)</span><p>ДЖИН, ТОНИК</p></div>
            <div class="menu__price">250</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЗОМБИ<span>(0,285л)</span><p>РОМ, НАVАNА СLUB ANEJO 3 YEAR, НАVАNА СLUB АNEJO ESPECIAL, СОК АПЕЛЬСИНОВЫЙ, СИРОП ГРЕНАДИН, АБСЕНТ, СОК ЛАЙМА</p></div>
            <div class="menu__price">490</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">MELONY<span>(0,15л)</span><p>ВОДКА АБСОЛЮТ ВАНИЛЬ, ЛИКЕР ДЫНЯ, СОК ЯБЛОКО, СОК ЛИМОНА, СИРОП ЯБЛОКО</p></div>
            <div class="menu__price">360</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">МАЙ ТАЙ<span>(0,22л)</span><p>РОМ, НАVАNА СLUB ANEJO 3 YEAR, ЛИКЕР ТРИПЛ СЕК, СОК АПЕЛЬСИН, СИРОП МИНДАЛЬ, СОК ЛАЙМА</p></div>
            <div class="menu__price">450</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЯБЛОЧНЫЙ САУЭР<span>(0,095л)</span><p>JEAM BEAM APPLE, ЯИЧНЫЙ БЕЛОК, СОК ЛИМОНА, СИРОП ЯБЛОЧНЫЙ, ГАНЧА РОССО</p></div>
            <div class="menu__price">400</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">WILDBERRY LEMONADE<span>(0,28л)</span><p>ВОДКА АБСОЛЮТ МАЛИНА, ЛИКЕР МАРАСКИНО, СИРОП МАРАКУЯ, КЛЮКВЕННОЕ ПЮРЕ, СОДОВАЯ, СОК ЛИМОНА, СОК ВИШНЕВЫЙ</p></div>
            <div class="menu__price">400</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ГАНЧА ТОNIС<span>(0,19л)</span><p>ТОНИК, ГАНЧА ЭКСТРА ДРАЙ, ЛАЙМ</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">БАУНТИ<span>(0,15л)</span><p>ВОДКА, СИРОП КОКОС, СИРОП КАРАМЕЛЬ, СЛИВКИ, ЛИКЕР ТРИПЛ СЕК, КОФЕ В ЗЕРНАХ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">НЬЮ ЙОРК САУЕР<span>(0,135л)</span><p>ВИНО ФЕСТИВАЛЬ ДЕ ФРАНС КР/СУХОЕ, ВИСКИ, СОК ЛИМОНА, САХАРНЫЙ СИРОП, ЯИЧНЫЙ БЕЛОК</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ФАЙРВОЛ<span>(0,1л)</span><p>ВОДКА АБСОЛЮТ МАЛИНА, КАМПАРИ БИТТЕР, СОК АПЕЛЬСИНОВЫЙ, СОК АНАНАСОВЫЙ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">АБСОЛЮТ САУЕР<span>(0,09л)</span><p>ВОДКА АБСОЛЮТ КЛАССИКА, СОК ЛИМОНА, САХАРНЫЙ СИРОП, ЯИЧНЫЙ БЕЛОК</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ВИСКИ КОЛА<span>(0,19л)</span><p>ВИСКИ, СОСА СОLА</p></div>
            <div class="menu__price">250</div>
        </div>
    </div>
    <div class="menu__title">
        ХОТ ЛОНГ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">ГЛИНТВЕЙН КРАСНЫЙ<span>(0,15л)</span><p>ВИНО ФЕСТИВАЛЬ ДЕ ФРАНС КРАСНОЕ, ЛИМОН, АПЕЛЬСИН, ЯБЛОКО, КОРИЦА, ГВОЗДИКА, СИРОП КОКОСОВЫЙ, СИРОП ВАНИЛЬНЫЙ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ГЛИНТВЕЙН БЕЛЫЙ<span>(0,15л)</span><p>ВИНО ФЕСТИВАЛЬ ДЕ ФРАНС БЕЛОЕ, ЛИМОН, АПЕЛЬСИН, ЯБЛОКО ‚КОРИЦА, ГВОЗДИКА, СИРОП КОКОСОВЫЙ, СИРОП ВАНИЛЬНЫЙ</p></div>
            <div class="menu__price">300</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ТЕХИТОС<span>(0,13л)</span><p>ТЕКИЛА, СИРОП МЯТА, СИРОП МАРАКУЯ, СОК АПЕЛЬСИНОВЫЙ, СОК ЛИМОНА, ЛИМОН, АПЕЛЬСИН</p></div>
            <div class="menu__price">350</div>
        </div>
    </div>
    <div class="menu__title">
        БЕЗАЛКОГОЛЬНЫЕ
    </div>
    <div class="menu__content">
        <div class="menu__row">
            <div class="menu__name">ЦИТРУСОВЫЙ ЛИМОНАД<span>(0,25л)</span><p>СОДОВАЯ, СОК ЛИМОНА, СИРОП АПЕЛЬСИНОВЫЙ, ЛАЙМ, ЛИМОН, АПЕЛЬСИН</p></div>
            <div class="menu__price">200</div>
        </div>
        <div class="menu__row">
            <div class="menu__name">ЯГОДНЫЙ ЛИМОНАД<span>(0,25л)</span><p>СОДОВАЯ, СОК ЛИМОНА, СИРОП ГРЕНАДИН, СОК ВИШНЯ, КЛЮКВЕННОЕ ПЮРЕ, АПЕЛЬСИН</p></div>
            <div class="menu__price">300</div>
        </div>
    </div>
</div>
   </div>
</body>
<script defer src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.6.5/firebase-messaging.js"></script>
<script defer src="./topkatpl/js/bundle.js"></script>
</html>