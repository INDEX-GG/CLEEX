import {isPartVis, isFullVis, logoResize} from '../services/services';

function menu() { 
    const bg = document.querySelector('.wrapper'),
        menuBtn = bg.querySelector('[data-menubtn]'),
        tipBtn = bg.querySelector('[data-tipbtn]'),
        waiterBtn = bg.querySelector('[data-waitbtn]'),
        logo = bg.querySelector('.logo'),
        topNav = bg.querySelector('.nav'),
        backNav = topNav.querySelector('.nav__back'),
        posNav = topNav.querySelector('.nav__pos');
     let logoh = 250;
   if (logo && menuBtn) {
      logoResize(logo, logoh);

      menuBtn.addEventListener('click', subMenu);
  
      function subMenu() {
         const kitchenBtn = bg.querySelector('[data-kitchen]'),
               barBtn = bg.querySelector('[data-bar]'),
               cocktailsBtn = bg.querySelector('[data-cocktails]'),
               kitchen = bg.querySelector('.kitchen'),
               bar = bg.querySelector('.bar'),
               cocktails = bg.querySelector('.cocktails');
      
         console.log('subMenu');
      
         menuBtn.className = 'button button_grey hide';
         tipBtn.className = 'button button_grey hide';
         waiterBtn.className = 'button button_grey hide';
         topNav.classList.add('navShow');
         kitchenBtn.className = 'button button_grey';
         barBtn.className = 'button button_grey';
         cocktailsBtn.className = 'button button_grey';
         posNav.textContent = 'Меню';
      
         backNav.addEventListener('click', backToMain);
      
         function backToMain() {
            backNav.removeEventListener('click', backToMain);
            kitchenBtn.removeEventListener('click', openKitchenMenu);
            barBtn.removeEventListener('click', openBarMenu);
            cocktailsBtn.removeEventListener('click', openCoctailsMenu);
            menuBtn.className = 'button button_grey';
            tipBtn.className = 'button button_grey';
            waiterBtn.className = 'button button_grey';
            topNav.classList.remove('navShow');
            posNav.textContent = '';
            kitchenBtn.className = 'button button_grey hide';
            barBtn.className = 'button button_grey hide';
            cocktailsBtn.className = 'button button_grey hide';
            console.log('backToMain');
         }
      
         function backToSubMenu() {
            window.removeEventListener('scroll', menuAnim);
      
            document.removeEventListener('scroll', () => logoResize(logo, logoh));
            logo.classList.remove('logoStaffPage');
            logo.classList.add('smooth');
            logo.style.height = `${logoh}px`;
            logo.firstElementChild.style.opacity = '1';
      
            bg.classList.remove('bg');
            backNav.addEventListener('click', backToMain);
            backNav.removeEventListener('click', backToSubMenu, false);
      
            preHide();
      
            kitchen.classList.add('hide');
            bar.classList.add('hide');
            cocktails.classList.add('hide');
      
            posNav.textContent = 'Меню';
            kitchenBtn.className = 'button button_grey';
            barBtn.className = 'button button_grey';
            cocktailsBtn.className = 'button button_grey';
            console.log('backToSubMenu');
         }
      
         kitchenBtn.addEventListener('click', openKitchenMenu);
         barBtn.addEventListener('click', openBarMenu);
         cocktailsBtn.addEventListener('click', openCoctailsMenu);
      
         function menuPage() {
            backNav.removeEventListener('click', backToMain);
            backNav.addEventListener('click', backToSubMenu, false);
            bg.classList.add('bg');
            kitchenBtn.className = 'button button_grey hide';
            barBtn.className = 'button button_grey hide';
            cocktailsBtn.className = 'button button_grey hide';
      
            document.addEventListener('scroll', () => logoResize(logo, logoh));
            logo.className = 'logo logoStaffPage show';
            logo.style.height = `${logoh - Math.floor(window.scrollY)}px`;
            logo.firstElementChild.style.opacity = '1';
         }
      
         //Анимация всплытия пунктов меню
      function preHide() {
         let menuTitles = document.querySelectorAll('.menu__title'),
         menuRows = document.querySelectorAll('.menu__row');
         menuTitles.forEach(title => {
            title.classList.remove('activeVis');
         });
         menuRows.forEach(row => {
            row.classList.remove('activeVis');
         });
      }
      
      function preShow() {
         let menuTitles = document.querySelectorAll('.menu__title'),
         menuRows = document.querySelectorAll('.menu__row');
         menuTitles.forEach(title => {
            if (isFullVis(title)) {
               title.classList.add('activeVis');
            } else {
               title.classList.remove('activeVis');
            }
         });
         menuRows.forEach(row => {
            if (isFullVis(row)) {
               row.classList.add('activeVis');
            } else {
               row.classList.remove('activeVis');
            }
         });
      }
      
      function menuAnim() {
         let menuTitles = document.querySelectorAll('.menu__title'),
             menuRows = document.querySelectorAll('.menu__row');
            menuTitles.forEach(title => {
               if (isPartVis(title)) {
                  title.classList.add('activeVis');
               } else {
                  title.classList.remove('activeVis');
               }
            });
            menuRows.forEach(row => {
               if (isPartVis(row)) {
                  row.classList.add('activeVis');
               } else {
                  row.classList.remove('activeVis');
               }
            });
      }
      
         function openKitchenMenu() {
            
            window.addEventListener('scroll', menuAnim);
            
            kitchen.style.marginTop = `${logoh+48}px`;
            kitchen.classList.remove('hide');
            menuPage();
            posNav.textContent = 'Кухня';
            preShow();
         }
      
         function openBarMenu() {
      
            window.addEventListener('scroll', menuAnim);
      
            bar.style.marginTop = `${logoh+48}px`;
            bar.classList.remove('hide');
      
            menuPage();
            posNav.textContent = 'Бар';
            preShow();
         }
      
         function openCoctailsMenu() {
      
            window.addEventListener('scroll', menuAnim);
      
            cocktails.style.marginTop = `${logoh+48}px`;
            cocktails.classList.remove('hide');
      
            menuPage();
            posNav.textContent = 'Коктейльная карта';
            preShow();
         }
      
      }
   }

};
export default menu;