<?php 
    $banner_image = get_sub_field('banner_image');
    $heading = get_sub_field('heading');
    $select_heading_color = get_sub_field('select_heading_color');
?>

<div class="heroBanner__main">
	<div class="heroBanner__inner bannerSmall">
	    <div class="heroBanner__inner__image" style="background-image: url('<?php echo $banner_image['url']; ?>'); ">
            <?php if($heading){ ?>
                <div class="text-layer <?php echo $select_heading_color; ?>">
                    <div class="text-layer-inner" data-aos="fade-left" data-aos-duration="2000">
                        <h2 class="_title">
                            <?php echo $heading; ?>
                        </h2>
                    </div>
                </div>
            <?php } ?>
		</div>
    </div>
</div>