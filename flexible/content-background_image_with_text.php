<?php 
    $image = get_sub_field('image');
    $logo = get_sub_field('logo');
    $link = get_sub_field('link');
    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
?>
<div class="background-image-seciton" <?php if($image) ?> style="background-image:url('<?php echo $image ?>')">
    <div class="text-box">
        <?php if($logo){ ?>
        <div class="logo" data-aos="fade-in" data-aos-duration="2000"> 
            <a href="<?php echo $link['url']; ?>" target="_blank">
                <img src="<?php echo  $logo ?>" alt="<?php echo $link['alt']; ?>"/>
            </a>
        </div>
        <?php } ?>
        <?php if($heading){ ?><h5 class="title" data-aos="fade-in" data-aos-duration="2000"><?php echo $heading ?></h5><?php } ?>
        <div class="text" ley="1" data-aos="fade-in" data-aos-duration="2000">
            <?php echo $text ?>
        </div>
    </div>

</div>