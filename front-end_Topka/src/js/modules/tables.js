import {showNav} from '../services/services';
import axios from 'axios';
import {notif} from '../services/services';

function chooseTables() {
    const form = document.querySelector('.tables'),
        btn = document.querySelectorAll('.tables__button');
    if (form) {
        let tablesCount = 0,
        tablesBusy = [],
        tablesSelf = [],
        waiterName ='';

    axios.get('/GetProfileDate')
    .then(response => waiterName = response.data.name);
    
     function showReset(arr) {
        if (arr && arr.length > 0) {
            btn[1].classList.remove('hide');
        } else {
            btn[1].classList.add('hide');
        }
     }
     function reset(e) {
        e.preventDefault();
        let reset = JSON.stringify({reset: true});
        axios.post('/unsetTables', reset)
        .then(() => {
            loadData();
            btn[0].disabled = true;
        })
     }
     btn[1].addEventListener('click', reset);

function loadData() {
     axios.get('/tablesCount')
     .then (response => {
         console.log(response.data)
        tablesCount = +response.data.count;
        tablesBusy = response.data.busy;
        tablesSelf = response.data.selfTables;
        renderTables(tablesCount, tablesBusy, tablesSelf);
        showReset(tablesSelf);
     })
}     
  
function renderTables(count, busy, self) {
    const tableBox = document.querySelector('.tables__container');
    let tables = '';
    for (let i = 1; i <= count; i++) {     
        tables += `
        <label class="table">
            <input ${disCheck(i, busy)} type="checkbox" name="${i}"/>
            <div class="table__check ${selfCheck(i, self)}">${i}</div>
        </label>    
        `
    };
    function disCheck(n, arr) {
        if (arr) {
            if (arr.some(el => el == n)) {
                return 'disabled=true';
            };
        } else {
            return '';
        }
    }
    function selfCheck(n, arr) {
        if (arr) {
            if (arr.some(el => el == n)) {
                return 'self';
            };
        } else {
            return '';
        }
    }
    tableBox.innerHTML = tables;
}

function tables() {

    function showChoosenTables (formData, arrBox) {
        let ChoosenTables = [];
        if (!arrBox) {
            return ChoosenTables = [...Object.keys(Object.fromEntries(formData.entries()))].sort().join(', ');
        } else {
            return ChoosenTables = [...Object.keys(Object.fromEntries(formData.entries())), ...arrBox].sort().join(', ');
        }
    }

    function validForm() {
        let tables = form.querySelectorAll('.table input:checked');
        if (tables.length === 0) {
            btn[0].disabled = true;
        } else {
            btn[0].disabled = false;
        }
    }
    form.addEventListener('input', validForm);

    function sendForm(e) {
        e.preventDefault();
            const formData = new FormData(form);
            axios.post('/usedTables', formData)
            .then(response => {
                console.log(response);
                if (response && response.data.error === 'true') {
                    notif('Столик уже кем-то выбран', '.wrapper', 1500);
                    form.reset();
                    btn[0].disabled = true;
                } else {
                    notif(`Вы выбрали столик: ${showChoosenTables(formData, tablesSelf)}`, '.wrapper', 1500);
                    form.reset();
                    btn[0].disabled = true;
                }
            })
            .then(() => loadData())
    }
    form.addEventListener('submit', sendForm);
}

function crutch() {
    const btnBox = document.querySelector('.tables__btnBlock'),
        buttons = btnBox.querySelectorAll('button');
    buttons[buttons.length - 1].style.display = 'none';
}

loadData();
showNav();
tables();

crutch();
    }
};

export default chooseTables;