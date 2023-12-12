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
            <iframe src="<?php echo $video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            
            <a href="<?php echo $button['url']; ?>" class="expand-text btn btn--transparent"><?php echo $button['title']; ?><i></i></a>
        </section>
	</main><!-- #main -->
    <section class="overlay">
        <div class="content-text">
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
            <img src="https://cielcreativespace.com/wp-content/uploads/2021/05/logo.svg" alt="CIEL" width="116" height="116" />
            <span class="expand-text l-text">Click anywhere to watch video</span>
        </div>
        
    </section>
<?php
get_footer();
