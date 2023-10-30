<?php
    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
?>

<div class="testimonial-main">
    <div class="container-box">
        <div class="text-box">
            <?php if($heading){ ?><h5 data-aos="fade-in" data-aos-duration="2000"><?php echo $heading ?></h5><?php } ?>
            <div class="text" data-aos="fade-in" data-aos-duration="2000"><?php echo $text ?></div>
        </div>
    </div>
</div>
