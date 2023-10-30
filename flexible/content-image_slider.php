
<?php 
// Gatther data
$heading = get_sub_field('heading');
$heading_style = get_sub_field('heading_style');
$slider_aspect_ratio = get_sub_field('slider_aspect_ratio');
// replace '-' with '/' in aspect ratio
$slider_aspect_ratio = str_replace('-', '/', $slider_aspect_ratio);

$content_title = get_sub_field('content_title');
$content_text_area = get_sub_field('content_text_area');
$content_button = get_sub_field('content_button');

?>
<?php if( have_rows('image_list')) { ?>
  <?php /* <!-- <div class="image-section" data-aos="fade-in" data-aos-duration="2000"> --> */ ?>
  <div class="image-section">
    <?php
    if($heading) {
      switch($heading_style) {
        case 'title_repeated' :
          ?>
          <div class="section-title section-title--repeated">
            <h2 class="_sectionTitle _sectionTitle--repeated" data-title="<?php echo $heading; ?>">
              <?php echo $heading; ?>
            </h2>
          </div>
          <?php
          break;
        case 'title' :
          ?>
          <div class="section-title">
            <h2 class="_sectionTitle">
              <?php echo $heading; ?>
            </h2>
          </div>
          <?php
          break;
        case 'subtitle' :
        default :
          ?>
          <div class="heading_section">
            <div class="container">
              <div class="section_inner">
                <?php echo $heading; ?>
              </div>
            </div>
          </div>
          <?php
          break;
      } 
    }
    ?>
    <div class="image-slider --aspect-ratio-<?php echo str_replace('/', '-', $slider_aspect_ratio); ?>">
      <?php while( have_rows('image_list') ): the_row();  ?>
        <?php
        $image = get_sub_field('image');
        $slide_title = get_sub_field('slide_title');
        $slide_link = get_sub_field('slide_link');
        $make_entire_slide_clickable = get_sub_field('make_entire_slide_clickable');
        $hide_link_text = get_sub_field('hide_link_text');
        $hide_link_text = !$make_entire_slide_clickable ? false : $hide_link_text;
        $full_click_only = $make_entire_slide_clickable && $hide_link_text && !$slide_title;
        ?>
        <div class="item">
          <div class="item-inner">
            <div class="image <?php if($make_entire_slide_clickable) echo "--click-link"; ?> --aspect-ratio-<?php echo str_replace('/', '-', $slider_aspect_ratio); ?>" style="aspect-ratio:<?php echo $slider_aspect_ratio; ?>;">
              <!--
                <img class="desktop" src="<?php echo get_template_directory_uri() ?>/dist/images/empty-993x677.png"/>
                <img class="mobile" src="<?php echo get_template_directory_uri() ?>/dist/images/empty-309x210.png"/>
              -->
              <?php if($image){ ?>
                <?php if($make_entire_slide_clickable && $slide_link) { ?>
                  <a href="<?php echo $slide_link['url']; ?>" target="<?php echo $slide_link['target']; ?>">
                <?php } ?>
                <?php if( is_array( $image ) ): ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php else: ?>
                  <img src="<?php echo $image ?>" />
                <?php endif; ?>
                <?php if($make_entire_slide_clickable) { ?>
                  </a>
                <?php } ?>
              <?php } ?>
              <?php if( ($slide_title || $slide_link) && !$full_click_only ){ ?>
                <div class="item-meta <?php if($slide_link) echo '--click-link'; ?>">
                  <?php if($slide_title){ ?>
                    <div class="item-title">
                      <strong><?php echo $slide_title; ?></strong>
                    </div>
                  <?php } ?>
                  <?php if($slide_link && !$hide_link_text){ ?>
                    <div class="item-link">
                      <a href="<?php echo $slide_link['url']; ?>" target="<?php echo $slide_link['target']; ?>">
                        <?php echo $slide_link['title']; ?>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php if( $content_title || $content_text_area || $content_button ) { ?>
      <div class="section-content">
        <div class="container">
          <div class="section-content__inner">
            <?php if( $content_title ) { ?>
              <div class="section-content__title">
                <h3 class="_subtitle"><?php echo $content_title; ?></h3>
              </div>
            <?php } ?>
            <?php if( $content_text_area ) { ?>
              <div class="section-content__textarea">
                <?php echo wpautop($content_text_area); ?>
              </div>
            <?php } ?>
            <?php if( $content_button ) { ?>
              <div class="section-content__button">
                <a href="<?php echo $content_button['url']; ?>" target="<?php echo $content_button['target']; ?>" class="btn">
                  <?php echo $content_button['title']; ?>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php } ?>