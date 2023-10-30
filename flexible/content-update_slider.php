<?php
$heading = get_sub_field('heading');
 if( have_rows('image_slider')) { 
?>
    <div class="update_slider">
    <div class="upcoming_event">
        <div class="container">
            <div class="upcoming_event__inner">
                    <?php if($heading){ ?><h5 class="title-heading"><?php echo $heading ?></h5><?php } ?>
                <div class="upcoming_event__slider">
                <?php while( have_rows('image_slider') ): the_row(); 
                        $title = get_sub_field('title',false,false);
                        $img_url = get_sub_field('slide');
                        $short_description = get_sub_field('text');
                        $link = get_sub_field('link');
                    ?>
                    <div>
                        <div class="upcoming_event__item">
                            <div class="upcoming_event__item__image">
                                <div class="image"  style="background-image: url('<?php echo $img_url; ?>'); " ><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/525x525.png" alt="<?php echo $title; ?>" /></div>
                            </div>
                            <div class="upcoming_event__item__details">
                            <?php if($title){ ?><div class="new-title"><?php echo $title; ?></div><?php } ?>
                                <?php if($short_description){ ?><div class="text"><?php echo $short_description; ?></div><?php } ?>
                             <?php if($link){
                                        $url = $link['url']; 
                                        $title = $link['title'];
                                        $target = ($link['target'] ? 'target=_blank' : '');
                                    ?>
                                    <div class="link"><a class="underline" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></div>
                                 <?php } ?>   
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
    </div>
<?php } ?>