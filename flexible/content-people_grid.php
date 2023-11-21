<?php
    /**
     * Flexible content: People Grid
     * @field section_title | Text
     * @field people | Repeater
     *      @field portrait | Image
     *      @field first_name | Text
     *      @field last_name | Text
     *      @field position_handle | Text
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $section_title = get_sub_field( 'section_title' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<section class="flexible_people_grid flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <?php if( $section_title && $section_title != '' ): ?>
        <h2 class="section-title _sectionTitle--repeated" data-title="<?php echo $section_title; ?>">
            <?php echo $section_title; ?>
        </h2>
    <?php endif; ?>
    <?php if( have_rows( 'people' ) ): ?>
        <div class="people_grid grid">
            <?php 
                while( have_rows( 'people' ) ): 
                    the_row();
                    $first_name = get_sub_field( 'first_name' );
                    $last_name = get_sub_field( 'last_name' );
                    $portrait = get_sub_field( 'portrait' );
                    $position_handle = get_sub_field( 'position_handle' );
            ?>
                <div class="person-box">
                    <figure class="portrait-wrapper">
                        <img src="<?php echo $portrait['url']; ?>" alt="<?php echo $portrait['alt']; ?>" class="portrait">
                    </figure>
                    <p class="name">
                        <span class="first_name"><?php echo $first_name; ?></span>
                        <span class="last_name"><?php echo $last_name; ?></span>
                    </p>
                    <p class="position_handle">
                        <?php echo $position_handle; ?>
                    </p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>