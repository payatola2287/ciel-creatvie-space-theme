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

// Modal Open
const mmodal__open = (e) => {
  _e(e);
  document.querySelector('body').classList.add('--mmodal--open');
}

// Modal Close
const mmodal__close = (e) => {
  _e(e);
  document.querySelector('body').classList.remove('--mmodal--open');
}

// Modal Toggle
const mmodal__toggle = (e) => {
  _e(e);
  document.querySelector('body').classList.toggle('--mmodal--open');
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
    $('[data-action="mmodal--open"]').on('click', mmodal__open);
    $('[data-action="mmodal--close"]').on('click', mmodal__close);
    $('[data-action="mmodal--toggle"]').on('click', mmodal__toggle);
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
    
    setTimeout(() => {
      $('.page-template-unspan-template .content-text').addClass( 'open' );
      $('.page-template-unspan-template .overlay').click(function(){
        $content_text = $(this);
        $content_text.animate({
          opacity: 0
        }, 1000,function(){
          $content_text.remove();
        });
      });
      
    }, 500);
  });
  $('.flexible_logo_carousel_content .logo-carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      centerMode: true,
      autoplay: true,
      variableWidth: true
  });
  $('.flexible_logo_carousel_content').hover(function(){
    $(this).addClass('open');
  });
})(window.jQuery);
