<?php
    $lead_text = get_sub_field( 'lead_text' );
    $lead_title = get_sub_field( 'lead_title' );
    $heading = get_sub_field( 'heading' );
    $link = get_sub_field( 'button' );
    $banner = get_sub_field( 'banner' );
    $form_shortcode = get_sub_field( 'form_shortcode' );
?>
<div class="flexible_logo_carousel_content">
    <div class="left-panel backdrop"></div>
    <div class="right-panel backdrop"></div>
    <section class="front-panel">
        <p class="lead-text" data-aos="fade-up"><?php echo $lead_text; ?></p>
        <h2 class="lead-title" data-aos="fade-up" data-aos-delay="300"><?php echo $lead_title; ?></h2>
    </section>
    <section class="back-panel">
        <div class="content">
            <h2 class="heading"><?php echo $heading; ?></h2>
            <?php the_sub_field( 'content' ); ?>
            <a href="#" class="btn btn--transparent" data-action="mmodal--open"><?php echo $link['title']; ?></a>
        </div>
        <figure class="graphic">
            <?php echo wp_get_attachment_image( $banner['ID'], 'large' ); ?>
        </figure>
    </section>
    
</div>
<div class="_ciel__mmodal _ciel__modal">
  <div class="_ciel__modal__overlay" data-action="mmodal--close"></div>
  <div class="_ciel__mmodal__inner _ciel__modal__inner">
    <div class="_ciel__modal__header">
      <span class="_ciel__modal__logo" data-action="mmodal--close">
        <img src="<?php echo get_template_directory_uri(); ?>/bb/assets/logo.png" alt="Ciel Creative Space" height="90" width="90">
      </span>
      <!-- /._ciel__modal__logo -->
      <!-- /._ciel__modal__title -->
      <span class="_ciel__modal__close" data-action="mmodal--close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z"/></svg>
      </span>
      <!-- /._ciel__modal__close -->
    </div><!-- /._ciel__modal__header -->
    <div class="_ciel__modal__body">
        <div class="gravirty_form_section">
            <?php echo do_shortcode( $form_shortcode ); ?>
        </div>
    </div>
    <!-- /.__ciel__modal__body -->
    <div class="_ciel__mmodal__footer _ciel__modal__footer">
      
    </div>
    <!-- /._ciel__modal__footer -->
  </div>
  <!-- /._ciel__modal__inner -->
</div>
<!-- /._ciel__modal -->