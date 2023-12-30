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
    }else if( window.location.hash === '#studio-zero-membership' ){
      $( '[data-action="mmodal--open"]' ).click();
    }
    
    setTimeout(() => {
      $('.page-template-unspan-template .content-text').addClass( 'open' );
      $('.page-template-unspan-template .overlay').on('click tap',function(){
        $content_text = $(this);
        $content_text.animate({
          opacity: 0
        }, 1000,function(){
          $content_text.remove();
        });
        if( $( '#yt-player' ).length ){
          let iFrameDataSrc = $('#yt-player').data('src');
          let iFrameSrc = iFrameDataSrc || $( '#yt-player' ).attr('src');
          console.log(iFrameSrc);
          $('#yt-player').attr( 'src', iFrameSrc + '&autoplay=1' );
        }
        if( $( '#video-player' ).length ){
          $( '#video-player' ).get(0).play();
        }
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

  

  $('[data-tab-toggle]').on( 'click', function(){
    $contentPane = $(this).data('content');
    $(this)
      .addClass('open')
      .siblings('[data-tab-toggle]')
        .removeClass('open');
    $($contentPane)
      .addClass('open')
      .siblings('[tab-content]')
        .removeClass('open');
  } );

  // gform.addFilter( 'gform_datepicker_options_pre_init', function( optionsObj, formId, fieldId ) {
  //     if ( formId == 10 && fieldId == 1 ) {
  //       optionsObj.firstDay = 1;
  //       optionsObj.beforeShowDay = function (date) {
  //           var disabledDays = ['12/25/2023', '12/26/2023', '12/28/2023', '01/01/2024', '01/02/2024', '01/03/2024'],
  //               currentDate = jQuery.datepicker.formatDate('mm/dd/yy', date),
  //               day = date.getDay();
  
  //           return [!(disabledDays.indexOf(currentDate) != -1 || day == 3)];
  //       };
  //     }
  //     return optionsObj;
  // });
})(window.jQuery);
