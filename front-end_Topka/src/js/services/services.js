function notif(message, parent, dur) {
    const box = document.querySelector(`${parent}`),
          notification = document.createElement('div');
    notification.classList.add('notification');
    notification.textContent = message;
    notification.classList.remove('notifClose');
    let timeout = setTimeout(() => {
        notification.classList.add('notifClose');
        let remove = setTimeout(() => {notification.remove()},250)
    }, dur);
    box.append(notification);
}

const postData = async (url, data) => {
    const result = await fetch(url, {
       method: 'POST',
       headers: {
           'Content-Type': 'application/json',
       },
       body: data
    });
    return await result.json();
 };

function showNav(backHistory) {
    const nav = document.querySelector('.nav');
        nav.classList.add('navShow');
    if (backHistory === 'yes') {
        const navBack = nav.querySelector('.nav__back');
        navBack.addEventListener('click', () => {
            window.history.back()
        })
    }
}

//Проверка расположения элемента
function isPartVis(el) {
    let elBound = el.getBoundingClientRect(),
        top = elBound.top,
        bottom = elBound.bottom,
        height = elBound.height;
    return ((top + height >= 0) && (height + window.innerHeight >= bottom));
    }
function isFullVis(el) {
    let elBound = el.getBoundingClientRect(),
        top = elBound.top,
        bottom = elBound.bottom;
    return ((top >= 0) && (bottom <= window.innerHeight));
    }
    
//Анимаия лого
function logoResize(logo, logoheight) {
    if (logoheight - window.scrollY > 0) {
        logo.style.height = `${logoheight - Math.floor(window.scrollY)}px`;   
    } else {
            logo.style.height = `0px`;  
    }
    if (logoheight - window.scrollY < 100) {
            logo.firstElementChild.style.opacity = '0';
    } else {
            logo.firstElementChild.style.opacity = '1';
    }
}

function imageToShow(image, box) {
    if (image && box) {
        const img = document.createElement('img');
        box.append(img);
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onloadend = e => {
            img.src = e.target.result;
        }
    } else {
        console.log('Пришли пустые данные')
    }
}

function avatar(imgSelector, imageSrc) {
    const avatarBox = document.querySelector(imgSelector),
        avatar = document.createElement('img');
        avatarBox.append(avatar);
    avatar.src = imageSrc;
    avatar.addEventListener('error', () => {
        avatar.src = "/topkatpl/img/logo_tr.webp";
    }, {once:true})
}

function stringToRubles(inputSelector) {
    const input = document.querySelector(inputSelector);
    input.addEventListener('input', (e) => {
        let value = +e.target.value.replace(/[^0-9]/g, ''),
            rubles = value.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
            e.target.value = rubles;
    })
} 

function toRubles(num) {
   return num.toLocaleString('ru', { maximumFractionDigits: 0, style: 'currency', currency: 'RUB' });
}

export {notif, showNav, isPartVis, isFullVis, logoResize, imageToShow, postData, avatar, stringToRubles, toRubles};