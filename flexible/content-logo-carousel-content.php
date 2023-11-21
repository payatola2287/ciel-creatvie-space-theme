<?php 
    /**
     * Flexible content: Logo Carousel
     * @field section_title | Text
     * @field section_button | Link
     * @field section_content_text | WYSIWYG
     * @field logos | Repeater
     *      @field logo | Image
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $section_title = get_sub_field( 'section_title' );
    $section_button = get_sub_field( 'section_button' );
    $section_content = get_sub_field( 'section_content_text' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<section class="flexible_logo_carousel_content flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <?php if( $section_title ): ?>
        <h2 class="section-title _sectionTitle--repeated" data-title="<?php echo $section_title; ?>">
            <?php echo $section_title; ?>
        </h2>
    <?php endif; ?>
    <?php if( have_rows( 'logos' ) ): ?>
        <div class="logo-carousel">
            <?php 
                while( have_rows( 'logos' ) ): 
                    the_row();
                    $logo = get_sub_field( 'logo' );
            ?>
            <figure class="logo-container">
                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
            </figure>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if( $section_content ): ?>
        <div class="section-content contrained-width">
            <?php echo apply_filters( 'the_content', $section_content ); ?>
        </div>
    <?php endif; ?>
    <?php if( $section_button ): ?>
        <div class="button-wrapper">
            <a href="<?php echo $section_button['url']; ?>" class="btn btn--transparent">
                <?php echo $section_button['title']; ?>
            </a>
        </div>
    <?php endif; ?>
</section>