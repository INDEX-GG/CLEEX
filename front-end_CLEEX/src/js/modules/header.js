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

export default headerScroll;