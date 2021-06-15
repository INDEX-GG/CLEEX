import {isPartVis} from '../services/services';
   function bubbleRender() {
    //Отрисовка
    let titles = document.querySelectorAll('.title'),
    texts = document.querySelectorAll('.text');
    if (window.innerWidth <= 768) {
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
    }
} 

export default bubbleRender;