"use strict";
import headerScroll from './modules/header';
import tabs from './modules/tabs';
import bubble from './modules/bubble';
import bubbleRender from './modules/bubbleRender';
import contacts from './modules/formsend';

document.addEventListener('DOMContentLoaded', function () {
    headerScroll();
    tabs(6); //время задержки слайдов в секундах
    bubble();
    bubbleRender();
    contacts();
});