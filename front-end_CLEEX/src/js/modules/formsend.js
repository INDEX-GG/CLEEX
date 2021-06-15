import emailjs from 'emailjs-com';

function formsend() {
    const form = document.querySelector('.contacts__form'),
          title = form.querySelector('.contacts__title'),
          subtitle = form.querySelector('.contacts__subtitle'),
          formInputs = form.querySelector('.contacts__form__input'),
          name = form.querySelector('.contacts__name'),
          phone = form.querySelector('.contacts__phone'),
          org = form.querySelector('.contacts__org'),
          errorName = form.querySelector('.contacts__name__error'),
          errorPhone = form.querySelector('.contacts__phone__error'),
          errorOrg = form.querySelector('.contacts__org__error'),
          btn = form.querySelector('.button'); 
          
    let error,
        errN = true,
        errPh,
        errO;
    function hideForm() {
        formInputs.classList.add('fadeOut');
        name.disabled = true;
        phone.disabled = true;
        org.disabled = true;
    }
          btn.disabled = true;
          form.addEventListener('input', validForm);
          form.addEventListener('submit', sendForm);
          function sendForm(e) {
            e.preventDefault();
            emailjs.sendForm('gmail', 'template_sh9ipba', e.target, 'user_gA4mJT01dIZlfSXzraUHT')
            .then((result) => {
                if (result.text) {
                    title.textContent = 'Запрос отправлен';
                    subtitle.textContent = 'Мы скоро с вами свяжемся';
                    hideForm();
                } 
            }, (error) => {
                title.textContent = 'Что-то пошло не так';
                subtitle.textContent = error.text;
            });
          }
          name.addEventListener('blur', (e) => {
            if (!e.target.value) {
                errorName.textContent = 'Введите имя';
            } else {
                errorName.textContent = '';
            }
          });
          phone.addEventListener('blur', (e) => {
            if (!e.target.value) {
                errorPhone.textContent = 'Введите номер';
            } else {
                errorPhone.textContent = '';
            }
          });
          org.addEventListener('blur', (e) => {
            if (!e.target.value) {
                errorOrg.textContent = 'Введите название';
            } else {
                errorOrg.textContent = '';
            }
          });
          function validForm() {
              name.addEventListener('input', nE);
              function nE(e) {
                  if (!e.target.value) {
                      errN = false;
                      errorName.textContent = 'Введите имя';
                  } else {
                      errN = true;
                      errorName.textContent = '';
                  }
              }

              phone.addEventListener('input', phE);
              function phE(e) {
                let output,
                    phoneNumber = e.target.value;
                phoneNumber = phoneNumber.replace(/[^0-9]/g, '');
                let code = "+7",
                    area = phoneNumber.substr(1, 3),
                    pre = phoneNumber.substr(4, 3),
                    tel = phoneNumber.substr(7, 4);

                    if (area.length === 0) {
                        output = code;
                    } else if ((area.length < 3) || pre.length === 0) {
                        output = code + " (" + area;
                    } else if ((area.length === 3 && pre.length < 3) || tel.length === 0) {
                        output = code + " (" + area + ") " + pre;
                    } else if (area.length === 3 && pre.length === 3) {
                        output = code + " (" + area + ") " + pre + " - " + tel;
                    }
                    phone.value = output;
                    if (output.length < 19) {
                        errorPhone.textContent = 'Введите номер';
                        errPh = false;
                    } else {
                        errorPhone.textContent = '';
                        errPh = true;
                    } 
              }
              org.addEventListener('input', oE);
              function oE(e) {
                  if (!e.target.value) {
                      errO = false;
                      errorOrg.textContent = 'Введите название';
                  } else {
                      errO = true;
                      errorOrg.textContent = '';
                  }
              }
              error = errN && errPh && errO;
              if (error) {
                  btn.disabled = false;
                  btn.textContent = 'Отправить заявку';
              } else {
                  btn.disabled = true;
                  btn.textContent = 'Заполните форму';
              }
          }   
}

export default formsend;