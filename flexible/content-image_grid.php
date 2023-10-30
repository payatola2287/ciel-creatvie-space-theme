<?php 
    $heading = get_sub_field('heading');
?>
<?php if( have_rows('image_list')) { ?>
<div class="image-main" >
    <div class="container">
        <?php if($heading){ ?><h5 data-aos="fade-in" data-aos-duration="2000"><?php echo $heading ?></h5><?php } ?>
    </div>
     <div class="image_gird" data-aos="fade-in" data-aos-duration="2000">
         <?php while( have_rows('image_list') ): the_row(); 
             $image = get_sub_field('image');
         ?>
            <?php if($image){ ?>
                <div class="item">
                    <div class="item-inner">    
                        <img src="<?php echo $image ?>"/>
                    </div>
                </div>
            <?php } ?>
         <?php endwhile; ?>

     </div>
</div>
<?php } ?>