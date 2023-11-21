<?php
    /**
     * Flexible content: CTA Banner with badge
     * @field cta_title_1 | Text
     * @field cta_title_2 | Text
     * @field price | Text
     * @field price_period | Text
     * @field content | WYSIWYG
     * @field button | Link
     * @field badge | WYSIWG
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     * 
     */
    $text_1 = get_sub_field( 'cta_title_1' );
    $text_2 = get_sub_field( 'cta_title_2' );
    $price = get_sub_field( 'price' );
    $price_period = get_sub_field( 'price_period' );
    $content = get_sub_field( 'content' );
    $button = get_sub_field( 'button' );
    $banner = get_sub_field( 'banner' );
    $badge = get_sub_field( 'badge' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<section class="flexible_cta_banner_with_badge flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <div class="banner">
        <?php if( $banner ): ?>
            <img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>" />
        <?php endif; ?>
        <?php if( $badge ): ?>
        <div class="badge">
            <?php echo apply_filters( 'the_content', $badge ); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="cta_dets">
        <h2 class="">
            <span class="text-1">
                <?php echo $text_1; ?>
            </span>
            <span class="text-2">
                <?php echo $text_2; ?>
            </span>
        </h2>
        <?php if( $price ): ?>
            <div class="pricing">
                <span class="price">
                    <?php echo $price; ?>
                </span>
                <span class="period">
                    <?php echo $price_period; ?>
                </span>
            </div>
        <?php endif; ?>
        <hr>
        <?php echo apply_filters( 'the_content', $content ); ?>
        <?php if( $button ): ?>
            <a href="<?php echo $button['url']; ?>" target ="<?php echo $button['target']; ?>" class="btn btn--transparent">
                <?php echo $button['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>