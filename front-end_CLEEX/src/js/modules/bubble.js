import {isPartVis} from '../services/services';

function bubble() {
    function bubbleScroll() {
        let bubblesUp = document.querySelectorAll('.downslide'),
            bubbleDown = document.querySelectorAll('.upslide'),
            card = document.querySelector('.cleex__card'),
            boxes = document.querySelectorAll('.features__box'),
            titles = document.querySelectorAll('.title'),
            texts = document.querySelectorAll('.text'),
            contacts = document.querySelector('.contacts__form');
        bubblesUp.forEach(bubble => {
            if (isPartVis(bubble)) {
                bubble.classList.add('active');
            } else {
                //  bubble.classList.remove('active');
            }
        });
        bubbleDown.forEach(bubble => {
            if (isPartVis(bubble)) {
            bubble.classList.add('active');
            } else {
            //    bubble.classList.remove('active');
            }
            });
            if (isPartVis(card)) {
                card.classList.add('shake');
            } else {
                // card.classList.remove('shake');
            }
        //Aнимация всплытия на мобильной версии
        if (window.innerWidth <= 768) {
            boxes.forEach(box => {
                if (isPartVis(box)) {
                    box.classList.add('active');
                } else {
                    // box.classList.remove('active');
                }
            });
            titles.forEach(title => {
                if (isPartVis(title)) {
                    title.classList.add('active');
                } else {
                    // title.classList.remove('active');
                }
            });
            texts.forEach(text => {
                if (isPartVis(text)) {
                    text.classList.add('active');
                } else {
                    // text.classList.remove('active');
                }
            });
            if (isPartVis(contacts)) {
                contacts.classList.add('active');
            } else {
                // contacts.classList.remove('active');
            }
        }
    }
    window.addEventListener('scroll', bubbleScroll);
};

export default bubble;