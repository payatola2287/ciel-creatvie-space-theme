<?php 
    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $video_upload = get_sub_field('video_upload');
    $container_option = get_sub_field('container_option');


    $select_video_type = get_sub_field('select_video_type'); // fiel_upload & url
    $video_url = get_sub_field('video_url');


    // Load value.
    $iframe = $video_url;

    // Use preg_match to find iframe src.
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = isset($matches[1]) ? $matches[1] : '';

    // Add extra parameters to src and replcae HTML.
    $params = array(
        'controls'  => 1,
        'hd'        => 1,
        'autohide'  => 1,
        'autoplay' => 1,
        'rel' => 0,
        'loop' => 1,
        'responsive' => 1,
        'badge' => 0,
    );
    if (strpos($iframe, "vimeo") > 0) {
        $params['muted'] = 1;
    } else {
        $params['mute'] = 1;
    }
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    // Add extra attributes to iframe HTML.
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

    // Display customized HTML.

?>

<div class="video-section">
    <div class="<?php echo $container_option ?>">
        <?php if($heading){ ?> <h5 data-aos="fade-in" data-aos-duration="2000" class="title"><?php echo $heading ?></h5><?php } ?>
        <?php if($text){ ?>
            <div class="text" data-aos="fade-in" data-aos-duration="2000"><?php echo $text ?></div>
            <div class="btn-link"><a class="btn-underline" href="javascript:void(0)"> read more<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="17" viewBox="0 0 33 17"><g transform="translate(33 17) rotate(180)"><path d="M16.5,0,15.461.922,0,14.713,2.078,17,16.5,4.13,30.922,17,33,14.713,17.539.922Z"></path></g></svg></span></a></div>
            <?php } ?>
        <?php if($select_video_type == 'fiel_upload'){ ?>
            <?php if($video_upload){ ?>
                <video autoplay loop controls>
                    <source src="<?php echo $video_upload ?>" type="video/mp4">
                </video>
            <?php } ?>
        <?php } ?>
        <?php if($select_video_type == 'url'){ ?>
            <?php if($video_url){ ?>
                <div class="embed-container">
                    <?php echo $iframe; ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>