import {avatar, notif, stringToRubles, toRubles, showNav} from '../services/services';
import axios from 'axios';

function barman() {
    if (document.querySelector('.barman')) {
        showNav();
        const barman = document.querySelector('.barman'),
                name = barman.querySelector('.barman__name'),
				sum = barman.querySelector('.barman__sum'),
                currentSum = barman.querySelector('.barman__current'),
				withdraw = barman.querySelector('.withdraw'),
				unHold = barman.querySelector('.hold'),
				issue = barman.querySelector('.issue');
				
			let id = '';

        function renderGetData() {
            axios.get('/GetProfileDate')
            .then(res => {
                avatar('.barman__pic', res.data.img); 
                name.textContent = res.data.name;
				id = res.data.staff_id;
                currentSum.textContent = `+ ${toRubles(445)} за сегодня`
                console.log(res);
				renderBalance();
            });
        }

		function renderBalance() {
			axios.post('/getBalance', {staff_id: id})
			.then(r => {
				let sum = + r.data.balance / 100
				console.log(r)
				renderTotalSum(sum, 200);
			} )
		}
        
        function renderTotalSum(totalSum, minSum) {
            const total = barman.querySelector('.barman__total'),
                  min = barman.querySelector('.barman__minsum');
                  console.log(min.textContent)
                    total.textContent = toRubles(totalSum);
                    min.textContent = `${toRubles(minSum)} - минимальная сумма для вывода средств`;
                    sum.value = total.textContent;
                    sum.addEventListener('change', (e) => {
                        console.log(+e.target.value.replace(/[^0-9]/g, ''))
                        if (+e.target.value.replace(/[^0-9]/g, '') < minSum) {
                            e.target.value = toRubles(minSum);
                            notif( `Минимальная сумма, которую можно снять - ${toRubles(minSum)}`,'.wrapper', 2500)
                        } else if (+e.target.value.replace(/[^0-9]/g, '') > totalSum) {
                            console.log('okeyy')
                            e.target.value = toRubles(totalSum);
                            notif(`Вы не можете снять больше, чем у вас есть (${toRubles(totalSum)})`, '.wrapper', 2500 );
                        }
                    });
                  stringToRubles('.barman__sum');
        };

		unHold.addEventListener('click', (e) => {
			e.preventDefault();
			axios.post('/final', {id: id}).then(() => renderBalance());
		});

		withdraw.addEventListener('click', (e) => {
			e.preventDefault();
			let amount = (sum.value.replace(/\D+/g,"") * 100);
			console.log(amount)
			axios.post('/withdraw', {staff_id: id, superbabki: amount })
			.then(r => console.log(r))
			.catch(e => console.error(e))
		})

        renderGetData();
		
        // renderTotalSum(1350, 200);
    }
}
export default barman;