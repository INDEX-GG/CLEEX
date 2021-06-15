import {postData} from '../services/services';

function login() {
    function showPass() {
        
        const showBtn = document.querySelector('.login__pass__vis');
        if (showBtn) {
            const  passFld = document.querySelector('.login__pass'),
            btnImg = showBtn.querySelector('img');
        function togglePassFld(e) {
            e.preventDefault();
            if (passFld.type === 'password') {
                passFld.type = 'text';
                btnImg.src = './topkatpl/img/vis.svg';
            } else {
                passFld.type = 'password';
                btnImg.src = './topkatpl/img/invis.svg';
            }
        }
            showBtn.addEventListener('click', togglePassFld);
        }
    }
    function auth() {
        const form = document.querySelector('.login');
            if (form) {
                const login = form.querySelector('.login__name'),
                pass = form.querySelector('.login__pass'),
                btn = form.querySelector('.login__button');
                
                function validForm() {
                    if (login.value && login.value.length > 0 && pass.value && pass.value.length > 0) {
                        btn.disabled = false;
                    } else {
                        btn.disabled = true;
                    }
                }
                form.addEventListener('input', validForm);
    
                function sendForm(e) 
                {
                    e.preventDefault();
                        const formData = new FormData(form),
                        data = JSON.stringify(Object.fromEntries(formData.entries()));
                        console.log(data);
                         postData('/auth', data);
                        btn.disabled = true;
                        form.reset();
                        window.location.replace("/account"); //МОЙ КОСТЫЛЬ)))
                }
                form.addEventListener('submit', sendForm);
            }
    }
    auth();
    showPass();
};

export default login;