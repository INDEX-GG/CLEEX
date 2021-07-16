"use strict";
import call from './modules/call';
import leavetip from './modules/leavetip';
import login from './modules/login';
import menu from './modules/menu';
import profile from './modules/profile';
import chooseTables from './modules/tables';
import barman from './modules/barman';
import reviews from './modules/reviews';
import chooseSum from './modules/chooseSum';
import regCard from './modules/regCard';

const amount = [100, 200, 300, 500], // Предустановленные суммы чаевых
	commission = 0.055, // 5%
	fixedComm = 6, // Фиксированная комиссия
	fixedMinSumm = 50, // Минимальная сумма для фиксированной комиссии
	cmmssnChsn = true, // Коммиссия начисляется сразу
	start = '9:30', // Начало низкого сезона
	end = '17:00',	// Конец  низкого сезона
	min = 10,	// Минимальная сумма чаевых
	max = 9999; // Максимальная сумма чаевых

document.addEventListener('DOMContentLoaded', function () {
    call();
    menu();
    login();
    profile();
    leavetip();
    chooseTables();
    barman();
	reviews();
	chooseSum(amount, commission, fixedComm, fixedMinSumm, cmmssnChsn, start, end, min, max)
});