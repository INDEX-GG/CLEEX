

function chooseSum(amount, commission, cmmssnChsn, start, end, min, max) {
	const paytip = document.querySelector('.paytip'),
		  amountBox = amount;
	if (paytip) {

		//Элементы
		const amounts = paytip.querySelectorAll('.button_mini'),
			  inputSum = paytip.querySelector('.paytip__sum'),
			  cmmssnChck = paytip.querySelector('#comission'),
			  cmmssnTxt = paytip.querySelector('#comText');

		//Предопределение активности чекбокса комиссии
		cmmssnChck.checked = cmmssnChsn;

		//Предопределение размера комиссии
		cmmssnTxt.textContent = `Я хочу взять на себя комиссию сотрудника (${commission * 100}%)`;
		function changeSummsByComm(num = 0) {
			if (num == 0) {
				amount = amountBox;
			} else {
				amount = amount.map(sum => Math.round(sum * (1 + num)));
			}
		} 
		if (cmmssnChck.checked) {
			changeSummsByComm(commission);
		}
		
		//Предопределенные суммы - присвоение
		function btnsSumsRender() {
			amounts.forEach((sum, i) => sum.textContent = amount[i]);
		}
		
		//Присвоение значения полю ввода
		function sumRender(str) {
			str = +str;
			inputSum.value = str.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
		}

		//Рендер суммы в поле ввода, в зависмости от нажатой кнопки
		function sumRenderByClckdBtn(){
			amounts.forEach(sum => {
				if (sum.classList.contains('button_mini_blue')) {
					sumRender(sum.textContent);
				} 
			})
		}

		//Подсветка кнопки при совпадении суммы в поле ввода
		function highlightSumms(st,nd,rd,th) {
			let paySumm = inputSum.value.replace(/\D+/g,"");
			for (let n = 0; n < amounts.length; n++) {
				amounts[n].className = 'button_mini button_mini_grey';
			}
			if (paySumm == st) {
			   amounts[0].className = 'button_mini button_mini_blue';
			} else if (paySumm == nd) {
				amounts[1].className = 'button_mini button_mini_blue';
			} else if (paySumm == rd) {
				amounts[2].className = 'button_mini button_mini_blue';
			} else if (paySumm == th) {
				amounts[3].className = 'button_mini button_mini_blue';
			}
		}

		//Выбор суммы чаевых по умолчанию в зависимости от временного промежутка
		function tipsDefaultByTime(start = '7:30', end = '16:55') {
			function setHour(time) {
			   let hours = time.slice(0, time.indexOf(':'));
			   if (hours[0] == 0) {
				  return hours.slice(1);
			   } else {
				  return hours;
			   }
			}
			function setMinute(time) {
			   let mins = time.slice(time.indexOf(':') + 1);
			   if (mins[0] == 0) {
				  return mins.slice(1);
			   } else {
				  return mins;
			   }
			}
			let currentTime = new Date(),
			   startTime = new Date(),
			   endTime = new Date();
			   startTime.setHours(setHour(start));
			   startTime.setMinutes(setMinute(start));
			   startTime.setSeconds(0);
			   endTime.setHours(setHour(end));
			   endTime.setMinutes(setMinute(end));
			   endTime.setSeconds(0);
			   if (currentTime > startTime && currentTime < endTime) {
					return amounts[0];
			   } else {
					return amounts[3];
			   }
		 }

		//Выбор суммы чаевых кнопками со значением по умолчанию
		function chooseSumByBtns(dflt = tipsDefaultByTime(start, end)) {

			//Значение по умолчанию
			dflt.className = 'button_mini button_mini_blue';
			sumRender(dflt.textContent);

			//Выбор по нажатию
			amounts.forEach((sum, i) => {
				sum.addEventListener('click', () => {
					amounts.forEach((itm, n) => {
						if (n === i) {
							sum.className = 'button_mini button_mini_blue';
							sumRender(sum.textContent);
						} else {
							itm.className = 'button_mini button_mini_grey'
						}
					})
				})
			})
		}

		//Выбор оплаты с комиссией или без
		function commissionHandle() {
			cmmssnChck.addEventListener('change', (e) => {
				if (e.target.checked) {
					changeSummsByComm(commission);
					btnsSumsRender();
					sumRenderByClckdBtn();
					highlightSumms(...amount);
				} else {
					changeSummsByComm();
					btnsSumsRender();
					sumRenderByClckdBtn();
					highlightSumms(...amount);
				}
			})
		}

		//Обработка ввода в поле с минимальной и максимальной суммой
		function enterSum(min = 100, max = 15000) {
			inputSum.addEventListener('input', (e) => {
				let paySumm = e.target.value;
				paySumm = +paySumm.replace(/[^0-9]/g, '');
				if (paySumm < min) {
					paySumm = min;
				} else if (paySumm > max) {
					paySumm = max;
				}
				 highlightSumms(...amount);
				e.target.value = paySumm.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
			});
			inputSum.addEventListener('keydown', (e) => {
				if (e.key === 'Backspace') {
					return e.target.selectionEnd = e.target.selectionEnd - 2;
				 }
			})
		}

		//Запуск
		enterSum(min, max);
		btnsSumsRender();
		chooseSumByBtns();
		commissionHandle();
	}
}

export default chooseSum;