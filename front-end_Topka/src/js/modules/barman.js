import {avatar, notif, stringToRubles, toRubles} from '../services/services';
import axios from 'axios';

function barman() {
    if (document.querySelector('.barman')) {
        const barman = document.querySelector('.barman'),
                name = barman.querySelector('.barman__name');
        function renderGetData() {
            axios.get('/GetProfileDate')
            .then(res => {
                avatar('.barman__pic', res.data.img); //заработает, когда перенесем во views
                name.textContent = res.data.name;
                console.log(res);
            })
        }
        
        function renderTotalSum(totalSum, minSum) {
            const total = barman.querySelector('.barman__total'),
                  sum = barman.querySelector('.barman__sum'),
                  min = barman.querySelector('.barman__minsum');
                  console.log(min.textContent)
                    total.textContent = toRubles(totalSum);
                    min.textContent = `${toRubles(minSum)} - минимальная сумма для вывода средств`;
                    sum.value = total.textContent;
                    sum.addEventListener('input', (e) => {
                        let val = e.target.value;4
                        if (val < minSum) {
                            e.target.value = minSum;
                            notif( `Минимальная сумма, которую можно снять - ${toRubles(minSum)}`,'.wrapper', 2500)
                        };
                        if (val > totalSum) {
                            console.log('okeyy')
                            e.target.value = totalSum;
                            notif(`Вы не можете снять больше, чем у вас есть (${toRubles(totalSum)})`, '.wrapper', 2500 );
                        }
                    });
                  stringToRubles('.barman__sum');
        };

        
        
        renderGetData();
        renderTotalSum(1350, 200);
    }
}
export default barman;