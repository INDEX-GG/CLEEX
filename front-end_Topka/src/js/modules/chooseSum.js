

function chooseSum(amount, commission, fixedComm, fixedMinSumm, cmmssnChsn, start, end, min, max) {
	const paytip = document.querySelector('.paytip');
	if (paytip) {

		//Элементы
		const amounts = paytip.querySelectorAll('.button_mini'),
			  inputSum = paytip.querySelector('.paytip__sum'),
			  inputRes = paytip.querySelector('.paytip__sum_result'),
			  cmmssnChck = paytip.querySelector('#comission'),
			  cmmssnTxt = paytip.querySelector('#comText');

		//Предопределение активности чекбокса комиссии
		cmmssnChck.checked = cmmssnChsn;

		//Предопределение размера комиссии
		function commissionRender(str) {
			str = str + ' ';
			str = str.replace(/\D+/g,"");
			str = Math.round(+str);
			if (cmmssnChck.checked) {
				if (str < fixedMinSumm) {
					str = +str + fixedComm;
				} else {
					str = str * (1 + commission);
				}
			} 
			console.log(str)
			let str1 = str.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
			cmmssnTxt.textContent = `Я хочу взять на себя комиссию сотрудника (${str1})`;
			inputRes.value = str * 100;
			console.log(inputRes.value);
		}

		function commissionUnCheckRender() {
			let a = inputSum.value;
			a = a.replace(/\D+/g,"");
			if (a < fixedMinSumm) {
				a = +a + fixedComm;
			} else {
				a = a * (1 + commission);
			}
			inputRes.value = a * 100;
			console.log(inputRes.value);
		}

		function commissionCheckRender() {
			let a = inputSum.value;
			a = a.replace(/\D+/g,"");
			inputRes.value = a * 100;
			console.log(inputRes.value);
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
			commissionRender(inputSum.value);
			//Выбор по нажатию
			amounts.forEach((sum, i) => {
				sum.addEventListener('click', () => {
					amounts.forEach((itm, n) => {
						if (n === i) {
							sum.className = 'button_mini button_mini_blue';
							commissionRender(sum.textContent);
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
					commissionUnCheckRender();
					highlightSumms(...amount);
				} else {
					commissionCheckRender();
					highlightSumms(...amount);
				}
			})
		}

		//Обработка ввода в поле с минимальной и максимальной суммой
		function enterSum(min = 100, max = 15000) {
			function minMaxCheck(num) {
				if (num < min) {
					return num = min;
				} else if (num > max) {
					return num = max;
				} else {
					return num;
				}
			};
			inputSum.addEventListener('input', (e) => {
				let paySumm = e.target.value;
				
				paySumm = minMaxCheck(+paySumm.replace(/[^0-9]/g, ''));
				highlightSumms(...amount);
				e.target.value = paySumm.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
				commissionRender(paySumm);
			});
			inputSum.addEventListener('keydown', (e) => {
				if (e.key === 'Backspace') {
					e.preventDefault();
					let paySumm = e.target.value;
					
					paySumm = minMaxCheck(+paySumm.replace(/[^0-9]/g, '').slice(0, -1));
					
					e.target.value = paySumm.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
					commissionRender(paySumm);
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