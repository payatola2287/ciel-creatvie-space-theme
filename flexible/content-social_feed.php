<?php
$heading = get_sub_field('heading');
$heading_style = get_sub_field('heading_style');
$button = get_sub_field('button');
$social_posts = get_sub_field('posts');
$content_title = get_sub_field('content_title');
$content_text_area = get_sub_field('content_text_area');
$content_button = get_sub_field('content_button');
$show_social_links = get_sub_field('show_social_links');
$gravity_form_shortcode = get_sub_field('gravity_form_shortcode');

if(!$social_posts) {
  $social_posts = get_field('social_posts', 'option');
}
?>

<div class="page_content_social_posts">
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
  <?php if($social_posts) { ?>
    <div class="_carousel">
      <div class="_carousel__inner">
        <?php
        for ($x = 1; $x <= 2; $x++) {
          foreach($social_posts as $social_post) {
            // bb_print_r($social_post);
            $image = $social_post['image'];
            $url = $social_post['url'];
            ?>
              <div class="_carousel__item">
                <?php if($url) { ?>
                  <a href="<?php echo $url; ?>" target="_blank">
                <?php } ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php if($url) { ?>
                  </a>
                <?php } ?>
              </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  <?php } ?>

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
  <?php if($show_social_links) { ?>
    <div class="social_links">
      <?php if( have_rows('social_links_list', 'option') ){ ?>
          <?php while ( have_rows('social_links_list', 'option') ) { the_row(); ?>
            <?php if( have_rows('item', 'option') ){ ?>
              <?php while ( have_rows('item', 'option') ) { the_row(); 
                $icon = get_sub_field('icon');
                $social_link = get_sub_field('social_link');
              ?>
              <div class="item">
                <?php if($social_link){
                  $social_link_url = $social_link['url']; 
                  $social_link_title = $social_link['title'];
                  $social_link_target = ($social_link['target'] ? 'target=_blank' : '');
                  ?>
                  <a href="<?php echo $social_link_url; ?>" <?php echo $social_link_target; ?>>
                <?php } ?>

                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />

                <?php if($social_link){ ?>
                  </a>
                <?php } ?>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </div>
  <?php } ?>
  <?php if($gravity_form_shortcode) { ?>
    <div class="gravirty_form_section">
      <div class="signup_form">
        <?php echo do_shortcode($gravity_form_shortcode); ?>
      </div>
    </div>
  <?php } ?>
</div>
