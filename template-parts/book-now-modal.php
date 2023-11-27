<?php
$book_now_modal = get_field('book_now_modal', 'option');
extract(array_replace_recursive(array(
  'title' => '',
  'space_list' => [],
  'modal_footer' => [],
), $book_now_modal));
?>

<div class="_ciel__modal">
  <div class="_ciel__modal__overlay" data-action="modal--close"></div>
  <div class="_ciel__modal__inner">
    <div class="_ciel__modal__header">
      <span class="_ciel__modal__logo" data-action="modal--close">
        <img src="<?php echo get_template_directory_uri(); ?>/bb/assets/logo.png" alt="Ciel Creative Space" height="45" width="45">
      </span>
      <!-- /._ciel__modal__logo -->
      <?php if ($title): ?>
        <span class="_ciel__modal__title">
          <?php echo $title; ?>
        </span>
      <?php endif; ?>
      <!-- /._ciel__modal__title -->
      <span class="_ciel__modal__close" data-action="modal--close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z"/></svg>
      </span>
      <!-- /._ciel__modal__close -->
    </div><!-- /._ciel__modal__header -->
    <div class="_ciel__modal__body">
      <?php if ($space_list) : ?>
      <ul class="_ciel__bookNowCtaList">
        <?php
        foreach ($space_list as $space) {
          extract(array_replace_recursive(array(
            'space_image' => '',
            'space_title' => '',
            'space_subtitle' => [],
            'space_link' => '',
          ), $space));
          ?>
          <li class="_ciel__bookNowCtaList__item">
            <a href="<?php echo $space_link; ?>" class="_ciel__bookNowCtaList__item__link">
              <?php if($space_image) : ?>
              <span class="_ciel__bookNowCtaList__item__link__image">
                <img src="<?php echo $space_image; ?>" alt="Book <?php echo $space_title; ?>">
              </span>
              <?php endif; ?>
              <!-- /.__ciel__bookNowCtaList__item__link__image -->
              <strong class="_ciel__bookNowCtaList__item__link__title _ciel__bookNowCtaList__item__link__title--withArrow">
                <span class="_ciel__bookNowCtaList__item__link__title__text">
                <?php echo $space_title; ?>
                </span>
                <span class="_ciel__bookNowCtaList__item__link__title__arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M363.3 100.7l144 144C510.4 247.8 512 251.9 512 255.1s-1.562 8.188-4.688 11.31l-144 144c-6.25 6.25-16.38 6.25-22.62 0s-6.25-16.38 0-22.62l116.7-116.7H16c-8.844 0-16-7.156-16-15.1c0-8.844 7.156-16 16-16h441.4l-116.7-116.7c-6.25-6.25-6.25-16.38 0-22.62S357.1 94.44 363.3 100.7z"/></svg>
                </span>
              </strong>
              <!-- /.__ciel__bookNowCtaList__item__link__title -->
              <span class="_ciel__bookNowCtaList__item__link__description">
              <?php echo $space_subtitle; ?>
              </span>
              <!-- /.__ciel__bookNowCtaList__item__link__description -->
            </a>
            <!-- /.__ciel__bookNowCtaList__item__link -->
          </li>
        <?php } ?>
       
        <!-- /.__ciel__bookNowCtaList__item -->
      </ul>
      <?php endif; ?>
      <!-- /.__bookNowCtaList -->
    </div>
    <!-- /.__ciel__modal__body -->
    <?php
    extract(array_replace_recursive([
      'footer_title' => '',
      'footer_email' => '',
      'footer_phone' => '',
    ], $modal_footer))
    ?>
    <div class="_ciel__modal__footer">
      <?php if ($footer_title) : ?>
      <span class="_ciel__modal__footer__title">
        <?php echo $footer_title; ?>
      </span>
      <?php endif; ?>
      <!-- /._ciel__modal__footer__title -->
      <?php if ($footer_email) : ?>
      <span class="_ciel__modal__footer__link">
        <a href="mailto:<?php echo $footer_email ?>" class="_ciel__modal__footer__link__a">
          <strong class="_ciel__modal__footer__link__title">
            Email
          </strong>
          <!-- /._ciel__modal__footer__link__title -->
          <em class="_ciel__modal__footer__link__text">
            <?php echo $footer_email; ?>
          </em>
          <!-- /._ciel__modal__footer__link__text -->
        </a>
        <!-- /._ciel__modal__footer__link__wrap -->
      </span>
      <!-- /._ciel__modal__footer__link -->
      <?php endif; ?>
      <?php if ($footer_phone) : ?>
      <span class="_ciel__modal__footer__link">
        <a href="tel:<?php echo $footer_phone; ?>" class="_ciel__modal__footer__link__a">
          <strong class="_ciel__modal__footer__link__title">
            Call / Text
          </strong>
          <!-- /._ciel__modal__footer__link__title -->
          <em class="_ciel__modal__footer__link__text">
            <?php echo $footer_phone; ?>
          </em>
          <!-- /._ciel__modal__footer__link__text -->
        </a>
        <!-- /._ciel__modal__footer__link__wrap -->
      </span>
      <!-- /._ciel__modal__footer__link -->
      <?php endif; ?>
    </div>
    <!-- /._ciel__modal__footer -->
  </div>
  <!-- /._ciel__modal__inner -->
</div>
<!-- /._ciel__modal -->