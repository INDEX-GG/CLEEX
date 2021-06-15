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

export {isPartVis, isFullVis};