<?php 
   /**
     * Flexible content: Two Line Text
     * @field text_1 | Text
     * @field text_2 | Text
     * @field text_1_tag | Select
     * @field text_2_tag | Select
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $text_1 = get_sub_field('text_1');
    $text_2 = get_sub_field('text_2');
    $text_1_tag = get_sub_field( 'text_1_tag' );
    $text_2_tag = get_sub_field( 'text_2_tag' );
    $text_1_class = 'text-1';
    $text_2_class = 'text-2';
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<div class="flexible_two_line_text flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <<?php echo $text_1_tag; ?> class="<?php echo $text_1_class; ?>">
        <?php echo $text_1; ?>
    </<?php echo $text_1_tag; ?>>
    <<?php echo $text_2_tag; ?> class="<?php echo $text_2_class; ?>">
        <?php echo $text_2; ?>
    </<?php echo $text_2_tag; ?>>
</div>