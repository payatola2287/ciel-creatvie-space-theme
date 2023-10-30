<?php 
    $heading = get_sub_field('heading');
?>
<?php if( have_rows('image_grid')) { ?>
<div class="about-image">
    <div class="container">
        <div class="image__grid">
            <?php while( have_rows('image_grid') ): the_row(); 
                 $image_position = get_sub_field('image_position');
                 $image = get_sub_field('image');
                 $text = get_sub_field('text');
                 $title = get_sub_field('title');
            ?> 
                <div class="image__grid__item">
                    <?php if($title){ ?><h5 data-aos="fade-in" data-aos-duration="2000" class="title"><?php echo $title ?></h5><?php } ?>
                    <div class="inner inner--<?php echo $image_position ?>">
                        <?php if($image){ ?><div class="colmn-img" data-aos="fade-in" data-aos-duration="2000"><img src="<?php echo $image ?>"/></div><?php } ?>
                        <?php if($text){ ?>
                            <div class="colmn-text" data-aos="fade-in" data-aos-duration="2000">
                                <h5 class="title text-title"><?php echo $heading ?></h5>
                                <div class="text"><?php echo $text ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>
