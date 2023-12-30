<?php
/**
 * Template Name: Unspan Event Template
 */
    $video_url = get_field( 'video_url' );
    $button = get_field( 'button' );
get_header();
?>
	<main id="primary" class="site-main">
        <section class="scattered-banner">
            <?php 
                if( have_rows( 'scattered_text' ) ):
                    while( have_rows( 'scattered_text' ) ):
                        the_row();
                        $top_text = get_sub_field( 'top' );
                        $mid_text = get_sub_field( 'middle' );
                        $bottom_text = get_sub_field( 'bottom' );
                    ?>
                        <span class="text-span text-top"><?php echo $top_text; ?></span>
                        <span class="text-span text-mid"><?php echo $mid_text; ?></span>
                        <span class="text-span text-bottom"><?php echo $bottom_text; ?></span>
                    <?php
                    endwhile;
                else:
            ?>
                    <span class="text-span text-top">Ciel</span>
                    <span class="text-span text-mid">Creative</span>
                    <span class="text-span text-bottom">Space</span>
            <?php
                endif;
                //https://www.youtube-nocookie.com/embed/p5hNxBxnzdw?si=5R-sdn9_MgEQ59Mv&amp;controls=0
            ?>
            <?php if( $native_video_file = get_field( 'native_video' ) ): ?>
                <?php
                    //bb_print_r( $native_video_file );
                ?>
                <video id="video-player" controls>
                    <source src="<?php echo $native_video_file['url']; ?>" type="<?php echo $native_video_file['mime_type']; ?>">
                    Your browser does not support the video tag.
                </video>
            <?php else: ?>
                <iframe id="yt-player" src="<?php echo $video_url . '&enablejsapi=1'; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <?php endif; ?>

            <a href="<?php echo $button['url']; ?>" class="expand-text btn btn--transparent"><?php echo $button['title']; ?><i></i></a>
        </section>
        <?php
            if( have_rows('flexible_content') ):
                while ( have_rows('flexible_content') ) : the_row(); 
                set_query_var( 'section_id', get_row_index() );
                ?>
                    <div class="section section_<?php echo get_row_index(); ?> " id="<?php echo get_row_layout(); ?>_<?php echo get_row_index(); ?>">
                        <?php get_template_part('flexible/content', get_row_layout()); ?>
                    </div>
                    <?php 
                endwhile;
            endif
        ?>
	</main><!-- #main -->
    <section class="overlay">
        <div class="content-text">
        <img src="https://cielcreativespace.com/wp-content/uploads/2023/12/ciel-logo-white.png" alt="CIEL" class="brand-logo"/>
            <?php 
                if( have_rows( 'overlay_text' ) ):
                    while( have_rows( 'overlay_text' ) ):
                        the_row();
                        $copy_text = get_sub_field( 'l_text' );
                        ?>
                           <div class="l-item">
                                <?php echo apply_filters( 'the_content', $copy_text ); ?>
                            </div> 
                        <?php
                    endwhile;
                else:
            ?>
                <div class="l-item">
                    <p>Lorem ipsum dolor</p>
                </div>
                <div class="l-item">
                    <p>sit <mark>amet</mark> consectetur</p>
                </div>
                <div class="l-item">
                    <p>adipisicing elit.</p>
                </div>
                <div class="l-item">
                    <p>Id nostrum voluptatem</p>
                </div>
                <div class="l-item">
                    <p>error iste, <mark>doloribus</mark></p>
                </div>
            <?php
                endif;
            ?>
            
            <span class="expand-text l-text">Click anywhere to watch video</span>
        </div>
        
    </section>
    <?php
    var_dump( is_page_template( 'unspan-template.php' ) );
    ?>
<?php

get_footer();
