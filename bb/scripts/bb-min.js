const _e=e=>{e.preventDefault(),e.stopPropagation()},modal__open=e=>{_e(e),document.querySelector("body").classList.add("--modal--open")},modal__close=e=>{_e(e),document.querySelector("body").classList.remove("--modal--open")},modal__toggle=e=>{_e(e),document.querySelector("body").classList.toggle("--modal--open")},setHeroHeight=()=>{const e=document.querySelector("#heroBanner + .section_1");e&&document.querySelector(":root").style.setProperty("--heroOffset",e.offsetHeight+"px")},fixModalTransition=()=>{setTimeout((()=>{const e=document.querySelector("._ciel__modal__inner");e&&e.classList.add("--ready")}),250)},clickFirstLink=e=>{e.stopPropagation(),e.preventDefault();const o=e.currentTarget.querySelector("a");o&&(window.location=o.href)};($=>{$(document).ready((()=>{$('[data-action="modal--open"]').on("click",modal__open),$('[data-action="modal--close"]').on("click",modal__close),$('[data-action="modal--toggle"]').on("click",modal__toggle),$(".--click-link").on("click",clickFirstLink),$("._e").on("click",_e),setHeroHeight(),setTimeout((()=>{const e=document.querySelector("._ciel__modal__inner");e&&e.classList.add("--ready")}),250),$(window).on("resize",setHeroHeight),"#book"===window.location.hash&&$('[data-action="modal--open"]')[0].click()}))})(window.jQuery);
//# sourceMappingURL=bb-min.js.map