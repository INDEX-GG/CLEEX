!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=3)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.EmailJSResponseStatus=t.sendForm=t.send=t.init=void 0;var r=n(1);Object.defineProperty(t,"EmailJSResponseStatus",{enumerable:!0,get:function(){return r.EmailJSResponseStatus}});var o=n(2),s=null,a="https://api.emailjs.com";function i(e,t,n){return void 0===n&&(n={}),new Promise((function(o,s){var a=new XMLHttpRequest;for(var i in a.addEventListener("load",(function(e){var t=new r.EmailJSResponseStatus(e.target);200===t.status||"OK"===t.text?o(t):s(t)})),a.addEventListener("error",(function(e){s(new r.EmailJSResponseStatus(e.target))})),a.open("POST",e,!0),n)a.setRequestHeader(i,n[i]);a.send(t)}))}function c(e){var t=document&&document.getElementById("g-recaptcha-response");return t&&t.value&&(e["g-recaptcha-response"]=t.value),t=null,e}function l(e,t){s=e,a=t||"https://api.emailjs.com"}function u(e,t,n,r){var o={lib_version:"2.6.4",user_id:r||s,service_id:e,template_id:t,template_params:c(n)};return i(a+"/api/v1.0/email/send",JSON.stringify(o),{"Content-type":"application/json"})}function d(e,t,n,r){var c;if("string"==typeof n&&(n=document.querySelector("#"!==(c=n)[0]&&"."!==c[0]?"#"+c:c)),!n||"FORM"!==n.nodeName)throw"Expected the HTML form element or the style selector of form";o.UI.progressState(n);var l=new FormData(n);return l.append("lib_version","2.6.4"),l.append("service_id",e),l.append("template_id",t),l.append("user_id",r||s),i(a+"/api/v1.0/email/send-form",l).then((function(e){return o.UI.successState(n),e}),(function(e){return o.UI.errorState(n),Promise.reject(e)}))}t.init=l,t.send=u,t.sendForm=d,t.default={init:l,send:u,sendForm:d}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.EmailJSResponseStatus=void 0;var r=function(e){this.status=e.status,this.text=e.responseText};t.EmailJSResponseStatus=r},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.UI=void 0;var r=function(){function e(){}return e.clearAll=function(e){e.classList.remove(this.PROGRESS),e.classList.remove(this.DONE),e.classList.remove(this.ERROR)},e.progressState=function(e){this.clearAll(e),e.classList.add(this.PROGRESS)},e.successState=function(e){e.classList.remove(this.PROGRESS),e.classList.add(this.DONE)},e.errorState=function(e){e.classList.remove(this.PROGRESS),e.classList.add(this.ERROR)},e.PROGRESS="emailjs-sending",e.DONE="emailjs-success",e.ERROR="emailjs-error",e}();t.UI=r},function(e,t,n){"use strict";n.r(t);var r=function(){const e=document.querySelector(".header");window.addEventListener("scroll",()=>{0===window.scrollY?e.classList.remove("fixed"):e.classList.add("fixed")})};var o=function(e){setInterval((function(){let e;const t=document.querySelectorAll(".tabs");if(t.forEach((t,n)=>{if(t.classList.contains("show"))return e=n}),t[e].classList.remove("show","fade"),e===t.length-1)return e=0,t[e].classList.add("show","fade"),e;t[e+1].classList.add("show","fade")}),1e3*e)};function s(e){let t=e.getBoundingClientRect(),n=t.top,r=t.bottom,o=t.height;return n+o>=0&&o+window.innerHeight>=r}var a=function(){window.addEventListener("scroll",(function(){let e=document.querySelectorAll(".downslide"),t=document.querySelectorAll(".upslide"),n=document.querySelector(".cleex__card"),r=document.querySelectorAll(".features__box"),o=document.querySelectorAll(".title"),a=document.querySelectorAll(".text"),i=document.querySelector(".contacts__form");e.forEach(e=>{s(e)&&e.classList.add("active")}),t.forEach(e=>{s(e)&&e.classList.add("active")}),s(n)&&n.classList.add("shake"),window.innerWidth<=768&&(r.forEach(e=>{s(e)&&e.classList.add("active")}),o.forEach(e=>{s(e)&&e.classList.add("active")}),a.forEach(e=>{s(e)&&e.classList.add("active")}),s(i)&&i.classList.add("active"))}))};var i=function(){let e=document.querySelectorAll(".title"),t=document.querySelectorAll(".text");window.innerWidth<=768&&(e.forEach(e=>{s(e)&&e.classList.add("active")}),t.forEach(e=>{s(e)&&e.classList.add("active")}))},c=n(0),l=n.n(c);var u=function(){const e=document.querySelector(".contacts__form"),t=e.querySelector(".contacts__title"),n=e.querySelector(".contacts__subtitle"),r=e.querySelector(".contacts__form__input"),o=e.querySelector(".contacts__name"),s=e.querySelector(".contacts__phone"),a=e.querySelector(".contacts__org"),i=e.querySelector(".contacts__name__error"),c=e.querySelector(".contacts__phone__error"),u=e.querySelector(".contacts__org__error"),d=e.querySelector(".button");let f,v,m,p=!0;d.disabled=!0,e.addEventListener("input",(function(){o.addEventListener("input",(function(e){e.target.value?(p=!0,i.textContent=""):(p=!1,i.textContent="Введите имя")})),s.addEventListener("input",(function(e){let t,n=e.target.value;n=n.replace(/[^0-9]/g,"");let r=n.substr(1,3),o=n.substr(4,3),a=n.substr(7,4);0===r.length?t="+7":r.length<3||0===o.length?t="+7 ("+r:3===r.length&&o.length<3||0===a.length?t="+7 ("+r+") "+o:3===r.length&&3===o.length&&(t="+7 ("+r+") "+o+" - "+a);s.value=t,t.length<19?(c.textContent="Введите номер",v=!1):(c.textContent="",v=!0)})),a.addEventListener("input",(function(e){e.target.value?(m=!0,u.textContent=""):(m=!1,u.textContent="Введите название")})),f=p&&v&&m,f?(d.disabled=!1,d.textContent="Отправить заявку"):(d.disabled=!0,d.textContent="Заполните форму")})),e.addEventListener("submit",(function(e){e.preventDefault(),l.a.sendForm("gmail","template_sh9ipba",e.target,"user_gA4mJT01dIZlfSXzraUHT").then(e=>{e.text&&(t.textContent="Запрос отправлен",n.textContent="Мы скоро с вами свяжемся",r.classList.add("fadeOut"),o.disabled=!0,s.disabled=!0,a.disabled=!0)},e=>{t.textContent="Что-то пошло не так",n.textContent=e.text})})),o.addEventListener("blur",e=>{e.target.value?i.textContent="":i.textContent="Введите имя"}),s.addEventListener("blur",e=>{e.target.value?c.textContent="":c.textContent="Введите номер"}),a.addEventListener("blur",e=>{e.target.value?u.textContent="":u.textContent="Введите название"})};document.addEventListener("DOMContentLoaded",(function(){r(),o(6),a(),i(),u()}))}]);
//# sourceMappingURL=bundle.js.map