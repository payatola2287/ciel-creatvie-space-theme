<?php
    $lead_text = get_sub_field( 'lead_text' );
    $lead_title = get_sub_field( 'lead_title' );
    $heading = get_sub_field( 'heading' );
    $link = get_sub_field( 'button' );
    $banner = get_sub_field( 'banner' );
?>
<div class="flexible_logo_carousel_content">
    <div class="left-panel backdrop"></div>
    <div class="right-panel backdrop"></div>
    <section class="front-panel">
        <p class="lead-text" data-aos="fade-up"><?php echo $lead_text; ?></p>
        <h2 class="lead-title" data-aos="fade-up" data-aos-delay="300"><?php echo $lead_title; ?></h2>
        <span class="open-trigger" id="reveal-content"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg></span>
    </section>
    <section class="back-panel">
        <div class="content">
            <h2 class="heading"><?php echo $heading; ?></h2>
            <?php the_sub_field( 'content' ); ?>
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>" class="btn btn--transparent"><?php echo $link['title']; ?></a>
        </div>
        <figure class="graphic">
            <?php echo wp_get_attachment_image( $banner['ID'], 'large' ); ?>
        </figure>
    </section>
</div>