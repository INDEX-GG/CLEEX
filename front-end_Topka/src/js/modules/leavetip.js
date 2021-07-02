import {showNav, avatar} from '../services/services';
import { notif } from '../services/services';
import axios from 'axios';

function leavetip(start, end, maxSumm) { 
    const paytip = document.querySelector('.paytip');
   
if (paytip) {
   showNav('yes');
   const name = paytip.querySelector('.paytip__name'),
   credo = paytip.querySelector('.paytip__credo');
   
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
   axios.post('/call', urlGet)
   .then(response => {
    //   console.log(response);
      avatar('.paytip__pic', `../images/${response.data.img}`)
      name.textContent = response.data.name;
      credo.textContent = response.data.motto;
   })
     
   //Выбор суммы чаевых
   function chooseSum() {
       const paytipBtns = paytip.querySelectorAll('.button_mini'),
       paytipFld = paytip.querySelector('.paytip__sum');
       let sum = 0;
   
      function tipsDefaultByTime(start = '7:30', end = '19:00') {
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
               sum = 100;
               for (let n = 0; n < paytipBtns.length; n++) {
                  paytipBtns[n].className = 'button_mini button_mini_grey';
                  paytipBtns[0].className = 'button_mini button_mini_blue';
               }
            } else {
               sum = 500;
               for (let n = 0; n < paytipBtns.length; n++) {
                  paytipBtns[n].className = 'button_mini button_mini_grey';
                  paytipBtns[3].className = 'button_mini button_mini_blue';
               }
            }
      }
      tipsDefaultByTime(start, end);
      
      paytipFld.addEventListener('input', (e) => {
         let paySumm = e.target.value;
            paySumm = +paySumm.replace(/[^0-9]/g, '');
            if (paySumm > maxSumm) {
               paySumm = maxSumm;
            }
            function hlSumms(st,nd,rd,th) {
               for (let n = 0; n < paytipBtns.length; n++) {
                  paytipBtns[n].className = 'button_mini button_mini_grey';
               }
               if (paySumm == st) {
                  paytipBtns[0].className = 'button_mini button_mini_blue';
               } else if (paySumm == nd) {
                  paytipBtns[1].className = 'button_mini button_mini_blue';
               } else if (paySumm == rd) {
                  paytipBtns[2].className = 'button_mini button_mini_blue';
               } else if (paySumm == th) {
                  paytipBtns[3].className = 'button_mini button_mini_blue';
               }
            }
            hlSumms(100, 200, 300, 500);
            let paySumm2 =  paySumm.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
   console.log(paySumm2);
            paytipFld.value = paySumm2;
         
       });
       paytipFld.value = sum.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
       paytipBtns.forEach((btn, i) => {
          btn.addEventListener('click', () => {         
             let val = +btn.textContent;
             let val2 = val.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
             paytipFld.value = val2;
             btn.className = 'button_mini button_mini_blue';
             for (let n = 0; n < paytipBtns.length; n++) {
                if (paytipBtns[n] === paytipBtns[i]) continue;
                paytipBtns[n].className = 'button_mini button_mini_grey';
             }
          });
       });
   
       const gpayBtn = paytip.querySelector('.gpay'),
            cardBtn = paytip.querySelector('.credit'),
            comission = paytip.querySelectorAll('[type="checkbox"]')[0],
            policy = paytip.querySelectorAll('[type="checkbox"]')[1];
   
            policy.addEventListener('input', (e) => {
               if (e.target.checked) {
                  gpayBtn.disabled = false;
                  cardBtn.disabled = false;
               } else {
                  gpayBtn.disabled = true;
                  cardBtn.disabled = true;
               }
             })
    }
    
    //Блок Отзывы
    function reviews() {
       const review = paytip.querySelector('.paytip__review'),
       reviewStar = review.querySelector('.paytip__starRating'),
       reviewBtn = review.querySelector('.review_button'),
       reviewTitle = review.querySelector('.paytip__review__title');
       function showReview() {
          review.className = 'paytip__review openReview';
       }
       function closeReview() {
          review.className = 'paytip__review';
       }
       reviewStar.addEventListener('click', showReview);
       
       const stars = reviewStar.querySelectorAll('.star');
       let rating = 0;
          stars.forEach((star, i) => {
             star.addEventListener('click', () => {
                rating = i + 1;
                console.log(rating);
                for (let n = 0; n <= i; n++) {
                   stars[n].classList.add('rate');
                   for (let m = 1; m <= 4-i; m++) {
                      stars[n+m].classList.remove('rate');
                   }
                }
             });
          }); 
       const inputReview = review.querySelector('.paytip__review__input');
       
       const reviewSend = (e) => {
         e.preventDefault();
         console.log(inputReview.value);
         const reviewData = new FormData();
         reviewData.append('rate', rating);
         reviewData.append('review', inputReview.value)
         axios.post('/call', reviewData)  //Вставить роут для отзывов!
         .then(() => {
            inputReview.value = '';
            closeReview();
            notif('Спасибо Вам за отзыв', '.wrapper', 2000);
         })
       };
       reviewBtn.addEventListener('click', reviewSend);
    }

	function sendOpenPost() {
		const page = document.querySelector('.paytip'),
			  form = page.querySelector('.paytip__wrapper'),
			  submitBtn = page.querySelector('#payCardButton');
				const fields = [
					'AMOUNT', 'CURRENCY', 'ORDER',
					'DESC', 'MERCH_NAME', 'MERCH_URL',
					'MERCHANT', 'TERMINAL', 'EMAIL',
					'TRTYPE', 'COUNTRY', 'MERCH_GMT',
					'TIMESTAMP', 'NONCE', 'BACKREF'
				];

			  function sendForm(e) {
				// e.preventDefault();
				const data = new FormData(form);
				const data2 = (Object.fromEntries(data.entries()));
				console.log(data2)
				const data3 = fields.map(field => (data2[field].length === 0) ? '-' :`${data2[field].length}${data2[field]}`);
				console.log(data3);
				const data4 = data3.join('');
				console.log(data4);
				console.log(data4.length);
				const a = '8c91c58960dc71665760526376d226de3a4b55da'
				form.setAttribute('action', 'https://3dstest.mdmbank.ru/cgi-bin/cgi_link')
			  }


			  submitBtn.addEventListener('click', sendForm);

	}

	sendOpenPost();
    chooseSum();
    reviews();
}
};

export default leavetip;