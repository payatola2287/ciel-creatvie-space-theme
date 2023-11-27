

<?php
$image = get_sub_field('image');
$video = get_sub_field('video');
$background_image = get_sub_field('background_image');
$heading = get_sub_field('heading');
$heading_style = get_sub_field('heading_style');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$cta_button = get_sub_field('cta_button');
$cta_button__open_modal = false;

if($cta_button['url'] && str_contains($cta_button['url'], '/book-now')) {
    $cta_button__open_modal = true;
}

?>
<div class="text-bg-section">
   <div class="container-md">

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
                    <div class="heading_text">
                        <?php echo $heading; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              break;
          } 
        }
        ?>
        <div class="colmn-img">
            <?php if($background_image){ 
                $background_image_url = $background_image['url'];
                $background_image_alt = $background_image['alt'];
                ?>
                <figure>
                    <img src="<?php echo $background_image_url; ?>" alt="<?php echo $background_image_alt; ?>">
                </figure>
            <?php } ?>
            <div class="media">
                <div class="media-inner">
                    <?php if($image){ 
                        $image_url = $image['url'];
                        $image_alt = $image['alt'];
                        ?>
                        <figure class="image">
                            <img src="<?php echo $image_url; ?>"  alt="<?php echo $image_alt; ?>">
                        </figure>
                    <?php } ?>
                    <?php if ($video) { ?>
                        <div class="video">
                            <video src="<?php echo $video; ?>" autoplay playsinline muted loop>
                                <source src="<?php echo $video; ?>" type="video/mp4">
                            </video>
                            <button class="btn-audio">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-volume.svg'; ?>" alt="" height="33" width="33" class="on">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-mute.svg'; ?>" height="33" width="33" alt="" class="off">
                            </button>
                        </div>
                    <?php } ?>
                </div>
        </div>
      </div>
      <div class="section-content__inner">
        <?php if($subheading){ ?>
            <div class="section-content__title">
                <h3 class="_subtitle">
                    <?php echo $subheading; ?>
                </h3>
            </div>
        <?php } ?>
        <?php if($content){ ?>
            <div class="section-content__textarea">
                <?php echo wpautop($content); ?>
            </div>
        <?php } ?>
        <?php if( $cta_button['url'] && $cta_button['title'] ): ?>
            <div class="section-content__cta_button">
                <a
                href="<?php echo $cta_button['url'] ?>"
                class="btn btn--transparent"
                <?php if($cta_button__open_modal) { ?>
                    data-action="modal--open"
                <?php } ?>
                >
                    <?php echo $cta_button['title']; ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
   </div>
</div>