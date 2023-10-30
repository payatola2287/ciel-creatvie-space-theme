<?php 
     $heading = get_sub_field('heading');
     $text = get_sub_field('text');
     $button_link = get_sub_field('link');
?>
<div class="artist_section">
    <div class="artist_section_inner">
        <div class="btn-box">
            <?php if($heading){ ?><h5 data-aos="fade-in" data-aos-duration="2000" class="title"><?php echo $heading ?></h5><?php } ?>
            <?php if($text){ ?><div data-aos="fade-in" data-aos-duration="2000" class="small-text"><?php echo $text ?></div><?php } ?>
            <?php if($button_link){
                    $url = $button_link['url']; 
                    $title = $button_link['title'];
                    $target = ($button_link['target'] ? 'target=_blank' : '');
            ?>
                <div class="btn-text"><a class="btn" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></div>
            <?php } ?>
        </div>
        <?php if( have_rows('artist_list')) { ?>
            <div class="art-box">
                <?php while( have_rows('artist_list') ): the_row(); 
                     $image = get_sub_field('image');   
                     $title = get_sub_field('title');
                     $tagline = get_sub_field('tagline');
                     $link = get_sub_field('link');
                ?>     
                    <div class="item" data-aos="fade-in" data-aos-duration="2000">

                        <?php if($image){ ?>
                            <div class="figure">
                                <img src="<?php echo $image; ?>" alt="desktop_img" />
                            </div>
                        <?php } ?>


                        <?php if($title){ ?><h6><?php echo $title ?></h6><?php } ?>
                        <?php if($tagline){ ?><?php ?><p class="tagline"><?php echo $tagline ?></p><?php } ?>
                        <?php if($link){
                                $url = $link['url']; 
                                $title = $link['title'];
                                $target = ($link['target'] ? 'target=_blank' : '');
                    ?>
                        <p class="link-div"><a class="link" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></p>
                        <?php } ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php } ?>
    </div>
</div>