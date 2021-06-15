import {showNav, imageToShow, avatar, notif} from '../services/services';
import axios from 'axios';
import Croppie from 'croppie';

function profile () {
    showNav();
    function profilePrefs() {
        const form = document.querySelector('.profile');
        if (form) {
        const upload = form.querySelector('.profile__file input'),
            nick = form.querySelector('.profile__name'),
            nickFld = form.querySelector('.profile__nameFld'),
            credo = form.querySelector('.profile__credo'),
            credoFld = form.querySelector('.profile__credoFld'),
            btn = form.querySelector('.profile__button'),
            modal = document.querySelector('.profile__modal'),
            modalBox = modal.querySelector('.profile__modal__image'),
            modalBtn = modal.querySelector('.profile__modal__button');

    function renderGetData() {
        axios.get('/GetProfileDate')
        .then(response => {
            avatar('.profile__img', response.data.img);
            nickFld.textContent = response.data.name;
            credoFld.textContent = response.data.motto;
            console.log(response);
        })
    }
    renderGetData();

    function modalOpen() {
        modal.classList.add('showM');
    }

    function modalClose() {
        modal.classList.remove('showM');
    }

    function validForm() {
        console.log('validation');
        btn.disabled = false;
        if (!nick.value && !credo.value) {
            btn.disabled = true;
        }
    }

    form.addEventListener('input', validForm);

    let res = '';
    async function getFile(e) {
        e.preventDefault();
        const reader = new FileReader();
            if (e.target.files.length > 0) {
                btn.disabled = false;
                reader.readAsDataURL(e.target.files[0]);
            }
            reader.onloadend = e => {
                let cropImg = new Croppie(modalBox, {
                    viewport: {width: 200, height: 200, type: 'circle'},
                    showZoomer: false
                });
                cropImg.bind({
                    url: e.target.result
                });
                window.addEventListener('click', e => {
                    if (e.target === modal) {
                        cropImg.destroy();
                        modalClose();
                    }
                });
                modalBtn.addEventListener('click', () => {
                    cropImg.result({
                        type: 'blob',
                        format: 'webp'
                    })
                    .then(function(blob) {
                        imageToShow(blob, avatar);
                        res = blob;
                        cropImg.destroy();
                        modalClose();
                    })
                })
            }
        await modalOpen();
        
    }
    function sendForm(e) {
        e.preventDefault();

            const formData = new FormData(form);
            formData.append('imgUs', res);
            if (!nick.value) {
                formData.append('nickname', nickFld.textContent);
            }
            if (!credo.value) {
                formData.append('motto', credoFld.textContent);
            }
            const data = Object.fromEntries(formData.entries());
            const json_data = JSON.stringify(Object.fromEntries(formData.entries()));
            console.log(data);
            axios.post('/updateProfile', formData)
            .then(() => {
                form.reset();
                btn.disabled = true;
                notif('Настройки изменены', '.wrapper', 1500);
            })
            .then(() => renderGetData())
    }

    form.addEventListener('submit', sendForm);
    upload.addEventListener('change', getFile);
}}
profilePrefs();
};

export default profile;