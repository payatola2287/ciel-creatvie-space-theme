<?php
    /**
     * Flexible content: Shortcode
     * @field shortcode | Text
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $lead_text = get_sub_field( 'shortcode' );
    $section_title = get_sub_field( 'section_title' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<div class="flexible_shortcode flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <?php if( $section_title ): ?>
    <h2 class="section-title _sectionTitle--repeated" data-title="<?php echo $section_title; ?>">
        <?php echo $section_title; ?>
    </h2>
    <?php endif; ?>
    <?php echo apply_filters( 'the_content', $lead_text ); ?>
</div>