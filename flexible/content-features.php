
<?php 
$heading = get_sub_field('heading');
$more_text = get_sub_field('more_text');
if( have_rows('icon_list')) {
    
?>
<div class="featured-section">
    <div class="container">
        <?php if($heading){ ?><h5 class="title"><?php echo $heading ?></h5><?php } ?>
        <div class="icon_grid">
          <?php while( have_rows('icon_list') ): the_row(); 
              $icon = get_sub_field('icon');
              $title = get_sub_field('title');
          ?> 
            <div class="item">
                <?php if($icon){ ?><div class="icon"><img src="<?php echo $icon ?>" alt="<?php echo $title ?>"/></div><?php } ?>
                <p><?php echo $title ?></p>
            </div>
            <?php endwhile; ?>

        </div>
        <div class="btn-link"><a class="btn-underline" href="javascript:void(0)"><?php echo $more_text ?> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="17" viewBox="0 0 33 17"><g transform="translate(33 17) rotate(180)"><path d="M16.5,0,15.461.922,0,14.713,2.078,17,16.5,4.13,30.922,17,33,14.713,17.539.922Z"/></g></svg></span></a></div>
    </div>
</div>
<?php } ?>

