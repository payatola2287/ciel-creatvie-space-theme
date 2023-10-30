<?php
    $background_image = get_sub_field('background_image');
    $heading = get_sub_field('heading');
    $link = get_sub_field('link');
    $top_left_text = get_sub_field('top_left_text');
    $top_right_text = get_sub_field('top_right_text');
    $bottom_left_text = get_sub_field('bottom_left_text');
    $bottom_right_text = get_sub_field('bottom_right_text');
?>
<div class="ciel-section" data-aos="fade-in" data-aos-duration="2000">
    <div class="container">
        <div class="bg-section" <?php if($background_image){ ?> style="background-image:url('<?php echo $background_image ?>')" <?php } ?>>
            <?php if($top_left_text){ ?><div class="text-box top"><h2><?php echo $top_left_text ?></h2></div><?php } ?>
            <?php if($top_right_text){ ?><div class="text-box right"><h2><?php echo $top_right_text ?></h2></div><?php } ?>
            <?php if($bottom_left_text){ ?><div class="text-box left"><h2><?php echo $bottom_left_text ?></h2></div><?php } ?>
            <?php if($bottom_right_text){ ?><div class="text-box bottom"><h2><?php echo $bottom_right_text ?></h2></div><?php } ?>
            <div class="text-section">
                <?php if($heading){ ?><h3><?php echo $heading ?></h3><?php } ?>
                    <?php if($link){
                            $url = $link['url']; 
                            $title = $link['title'];
                            $target = ($link['target'] ? 'target=_blank' : '');
                    ?>
                        <div class="link-div"><a class="btn" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>