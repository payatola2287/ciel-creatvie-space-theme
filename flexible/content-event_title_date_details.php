<?php
    /**
     * Flexible content: Event with Title and Date details
     * @field title_1 | Text
     * @field title_2 | Text
     * @field date | Text
     * @field address | WYSIWYG
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $text_1 = get_sub_field( 'title_1' );
    $text_2 = get_sub_field( 'title_2' );
    $date = get_sub_field( 'date' );
    $address = get_sub_field( 'address' );
    $text_1_tag = 'h2';
    $text_2_tag = 'h2';
    $text_1_class = 'text-1';
    $text_2_class = 'text-2';
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<div class="flexible_event_title_date_details flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    
    <div class="event_dets">
        <date>
            <?php echo $date; ?>
        </date>
        <div class="flexible_two_line_text">
            <<?php echo $text_1_tag; ?> class="<?php echo $text_1_class; ?>">
                <?php echo $text_1; ?><?php if( $text_2 && $text_2 != '' ): ?> <?php echo $text_2; ?><?php endif; ?>
            </<?php echo $text_1_tag; ?>>
        </div>
        <address>
            <?php echo apply_filters( 'the_content', $address ); ?>
        </address>
    </div>
</div>