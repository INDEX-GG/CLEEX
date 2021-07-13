import {showNav, avatar} from '../services/services';
import axios from 'axios';

function leavetip() { 
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
}};

export default leavetip;