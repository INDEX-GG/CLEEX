
function tabs(time) {
    function tabsTimeSwitcher() {
        let n;
        const tabs = document.querySelectorAll('.tabs');
            tabs.forEach((tab, i) => {
                if (tab.classList.contains('show')) {
                    return  n = i;
                }
            });
            tabs[n].classList.remove('show', 'fade');
            
            if (n === tabs.length - 1) {
                n = 0;
                tabs[n].classList.add('show', 'fade');
                return n;
            }
            tabs[n+1].classList.add('show', 'fade');
    }
    let timerTab = setInterval(tabsTimeSwitcher, time*1000);
}
export default tabs;