const _e = (e) => {
  e.preventDefault();
  e.stopPropagation();
}

// Modal Open
const modal__open = (e) => {
  _e(e);
  document.querySelector('body').classList.add('--modal--open');
}

// Modal Close
const modal__close = (e) => {
  _e(e);
  document.querySelector('body').classList.remove('--modal--open');
}

// Modal Toggle
const modal__toggle = (e) => {
  _e(e);
  document.querySelector('body').classList.toggle('--modal--open');
}

// Set Hero Height
const setHeroHeight = () => {
  const heroText = document.querySelector('#heroBanner + .section_1');
  if(heroText) {
    document.querySelector(':root').style.setProperty('--heroOffset', heroText.offsetHeight + 'px');
  }
}

// Fix Modal Transition
const fixModalTransition = () => {
  setTimeout(() => {
    const modalInner = document.querySelector('._ciel__modal__inner');
    if(modalInner) {
      modalInner.classList.add('--ready');
    }
  }, 250);
}

// Click on the first link found in it's child elements
const clickFirstLink = (e) => {
  e.stopPropagation();
  e.preventDefault();
  const link = e.currentTarget.querySelector('a');
  if(link) {
    window.location = link.href;
  }
}


(($) => {
  $(document).ready(() => {
    // Bind Events
    $('[data-action="modal--open"]').on('click', modal__open);
    $('[data-action="modal--close"]').on('click', modal__close);
    $('[data-action="modal--toggle"]').on('click', modal__toggle);
    $('.--click-link').on('click', clickFirstLink);
    $('._e').on('click', _e);

    setHeroHeight();
    fixModalTransition();
    $(window).on('resize', setHeroHeight);

    if(window.location.hash === '#book') {
      $('[data-action="modal--open"]')[0].click();
    }
  });
})(window.jQuery);
