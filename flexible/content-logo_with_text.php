<?php if( have_rows('logo_section')) { ?>
<div class="logo-main">
    <div class="container">
    <div class="logo-container">
         <?php while( have_rows('logo_section') ): the_row(); 
              $heading = get_sub_field('heading');
              $text = get_sub_field('text');
          ?> 
        <div class="logo-group">
            <?php if($heading){ ?><h5 data-aos="fade-in" data-aos-duration="2000" class="title"><?php echo  $heading ?></h5><?php } ?>
            <?php if($text){ ?><div data-aos="fade-in" data-aos-duration="2000" class="text"><?php echo  $text ?></div><?php } ?>
            <?php if( have_rows('logo_list')) { ?>
            <ul data-aos="fade-in" data-aos-duration="2000">
                <?php while( have_rows('logo_list') ): the_row(); 
                    $logo = get_sub_field('logo');
                    $link = get_sub_field('link');
                ?>
                <?php if($logo){ ?><li><a href="<?php echo  $link ?>" target="_blank"><figure><img src="<?php echo $logo ?>"></figure></a></li><?php } ?>
                <?php endwhile; ?>
            </ul>
            <?php } ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</div>
<?php } ?>