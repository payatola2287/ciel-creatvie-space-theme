<?php
$image = get_sub_field('image');
$heading = get_sub_field('heading');
$text = get_sub_field('text');
$link_2 = get_sub_field('link');
$top_text = get_sub_field('top_text');
$right_text = get_sub_field('right_text');
$bottom_text = get_sub_field('bottom_text');

$link_2 = array_replace_recursive(array(
    'title' => '',
    'url' => '',
    'target' => ''
), (array) $link_2);

?>
<?php if ($heading || $text) : ?>
    <div class="full_image_heading">
        
        <div class="full_image_heading__inner">
            <div class="full_image_heading__image" style="background-image: url('<?php echo $image['url']; ?>'); ">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/1600x780.png" alt="<?php echo $image['alt']; ?>" width="1600" height="780"/>
            </div>
            <div class="middle_text">
                <div class="middle_text_inner"  data-aos="fade-in" data-aos-duration="2000">
                <?php if ( $heading ) : ?><h3><?php echo $heading; ?></h3><?php endif; ?>
                <div class="text"><?php echo $text; ?></div>
                <a href="<?php echo $link_2['url']; ?>" class="link" <?php echo ($link_2['target']) ? 'target="_blank"':''; ?>>
                    <?php echo $link_2['title']; ?>
                </a>
                </div>
            </div>
            <?php if ( $top_text ) : ?> <div class="top_text"><h2 class="outHeading" data-aos="fade-right" data-aos-duration="1000"><?php echo $top_text; ?></h2></div><?php endif; ?>
            <?php if ( $right_text ) : ?> <div class="right_text"><h2 class="outHeading" data-aos="fade-left" data-aos-duration="1000"><?php echo $right_text; ?></h2></div><?php endif; ?>
            <?php if ( $bottom_text ) : ?> <div class="bottom_text"><h2 class="outHeading" data-aos="fade-in" data-aos-duration="2000"><?php echo $bottom_text; ?></h2></div><?php endif; ?>
        </div>
        
    </div>
<?php endif; ?>