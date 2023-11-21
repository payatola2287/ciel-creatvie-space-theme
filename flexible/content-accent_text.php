<?php
    /** 
     * Flexible content: Accent Text
     * @field content | WYSIWYG
     * @field x_css | Text
     * @field section_id | Text
    */
    $lead_text = get_sub_field( 'content' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<div class="flexible_accent_text flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <?php echo apply_filters( 'the_content', $lead_text ); ?>
</div>