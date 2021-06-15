import axios from 'axios';
import {notif} from '../services/services';

function call() {
    if (document.querySelector('[data-waitbtn]')) {
    const callBtn = document.querySelector('[data-waitbtn]'),
        payBtn = document.querySelector('[data-tipbtn]');
        payBtn.href = `./topkatpl/leavetip.html${window.location.search}`;

    function callWaiter() {
        let urlGet = window.
        location
        .search
        .replace('?', '')
        .split('&')
        .reduce (
            function(p,e){
                var a = e.split('=');
                p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                return p;
            },
            {}
        );
        if (urlGet.table) {
            console.log(urlGet)
            axios.post('/call', urlGet)
            .then(response => {
               
                if (response.data.error) {
                    callBtn.textContent = `${response.data.name} уже спешит к Вам`;
                    callBtn.classList.add('call_a');
                    notif('Официант уже летит к Вам', '.wrapper', 2500);
                    console.log(response)
                } else if (response.data.length > 20) {
                    notif('Вас скоро обслужат', '.wrapper', 2500);
                    console.log(response)
                } else {
                    callBtn.textContent = `${response.data.name} уже спешит к Вам`;
                    callBtn.classList.add('call_a');
                    notif('Официант спешит к вам', '.wrapper', 2500);
                    console.log(response)
                    
                }
            })
        } else {
            notif('Приложите смартфон к NFC метке, или отсканируйте QR код', '.wrapper', 2500);
        }
    }
    callBtn.addEventListener('click', callWaiter);
    }
}
export default call;