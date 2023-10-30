<?php
    $left_side_big_image = get_sub_field('left_side_big_image');
    $right_side_small_image = get_sub_field('right_side_small_image');
    $heading = get_sub_field('heading');
    $description = get_sub_field('description');
    $link = get_sub_field('link');
?>

<div class="join-section">
   <div class="join-section-inner">
      <div class="colmn-text">
        <?php if($left_side_big_image){ 
            $left_side_big_image_url = $left_side_big_image['url'];
            $left_side_big_image_alt = $left_side_big_image['alt'];
        ?>
            <figure>
                <img src="<?php echo $left_side_big_image_url; ?>" alt="<?php echo $left_side_big_image_alt; ?>">
            </figure>
        <?php } ?>
         <div class="text-box" data-aos="fade-in" data-aos-duration="2000">
            <?php if($heading){ ?>
                <h2 class="heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if($description){ ?>
                <div>
                    <?php echo $description; ?>
                </div>
            <?php } ?>
            <?php if($link){ 
                $url = $link['url']; 
                $title = $link['title'];
                $target = ($link['target'] ? 'target=_blank' : '');
            ?>  
                <a href="<?php echo $url; ?>" class="btn-underline" <?php echo $target; ?>>
                    <?php echo $title; ?>
                </a>
            <?php } ?>
         </div>
      </div>
      <div class="colmn-heading">
        <?php if($heading){ ?>
            <h2 class="heading"><?php echo $heading; ?></h2>
        <?php } ?>
        <?php if($right_side_small_image){ 
            $right_side_small_image_url = $right_side_small_image['url'];
            $right_side_small_image_alt = $right_side_small_image['alt'];
        ?>
            <figure>
                <img src="<?php echo $right_side_small_image_url; ?>" alt="<?php echo $right_side_small_image_alt; ?>">
            </figure>
        <?php } ?>
      </div>
   </div>
</div>
