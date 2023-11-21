<?php
    /**
     * Flexible content: Lead Text
     * @field content | WYSIWYG
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $lead_text = get_sub_field( 'content' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<div class="flexible_lead_text flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <?php echo apply_filters( 'the_content', $lead_text ); ?>
</div>