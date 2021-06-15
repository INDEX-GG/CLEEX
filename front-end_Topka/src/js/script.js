"use strict";
import call from './modules/call';
import leavetip from './modules/leavetip';
import login from './modules/login';
import menu from './modules/menu';
import profile from './modules/profile';
import chooseTables from './modules/tables';
import barman from './modules/barman';

document.addEventListener('DOMContentLoaded', function () {
    call();
    menu();
    login();
    profile();
    leavetip('11:00', '16:00', 9999); // Начало / Конец дня / максимальная сумма
    chooseTables();
    barman();
});