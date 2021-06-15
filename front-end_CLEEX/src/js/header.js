"use strict";
document.addEventListener('DOMContentLoaded', function () {

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
//Aнимация всплытия на мобильной версии
function mobileBubble() {
    if (window.innerWidth <= 768) {
    let titles = document.querySelectorAll('.title'),
        texts = document.querySelectorAll('.text');

        titles.forEach(title => {
            if (isPartVis(title)) {
                title.classList.add('active');
            } else {
                title.classList.remove('active');
            }
        });
        texts.forEach(text => {
            if (isPartVis(text)) {
                text.classList.add('active');
            } else {
                text.classList.remove('active');
            }
        });
    }
}
//Отрисовка
function mobilePreBubble() {
    if (window.innerWidth <= 768) {
    let titles = document.querySelectorAll('.title'),
        texts = document.querySelectorAll('.text');
        titles.forEach(title => {
            if (isPartVis(title)) {
                title.classList.add('active');
            } else {
                title.classList.remove('active');
            }
        });
        texts.forEach(text => {
            if (isPartVis(text)) {
                text.classList.add('active');
            } else {
                text.classList.remove('active');
            }
        });
    }
}

function headerScroll() {
    const header = document.querySelector('.header'),
        listenScroll = () => {
            if (window.scrollY === 0) {
                header.classList.remove('fixed');
            } else {
                header.classList.add('fixed');
            }
        };
    window.addEventListener('scroll', listenScroll);
}
headerScroll();
mobilePreBubble();
window.addEventListener('scroll', mobileBubble);
});