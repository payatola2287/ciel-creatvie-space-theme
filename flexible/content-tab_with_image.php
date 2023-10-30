<?php
    // $tab_image_list = get_sub_field('tab_image_list');
?>
<?php if( have_rows('tab_image_list') ): ?>
    <div class="tab_image__main">
        <div class="container">
            <div class="tab_image__inner">
            <div class="tab_image__inner__image">            
                <div class="tab_image__img">
                   <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/620x620.png" alt="Tab Image" /></a> 
                </div>
            </div>
            <div class="tab_image__inner__title">
                <ul>
            <?php while( have_rows('tab_image_list') ): the_row(); 
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            ?>
                <li class="title_link"><a href="<?php echo $title['url']; ?>" data-img="<?php echo $image; ?>"><?php echo $title['title']; ?></a></li>
            <?php endwhile; ?>
            </ul>
            </div>
            </div>
        </div>
    </div>
<?php endif; ?>