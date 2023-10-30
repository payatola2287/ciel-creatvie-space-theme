<?php
$select_event = get_sub_field('select_event');
$heading = get_sub_field('heading');
$heading_style = get_sub_field('heading_style');
?>
<?php if (count($select_event) > 0) : ?>
    <div class="event_grid">
      <div class="event_grid__inner">
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
          <div class="event_grid__list">
              <?php foreach ($select_event as $key => $postId) {
                  $title = get_the_title($postId);
                  $img_url = get_the_post_thumbnail_url($postId, 'full');

                  $postLink = get_post_permalink($postId);
                  ?>
                  <div class="event_grid__item">
                      <div class="event_grid__item__image">
                        <a href="<?php echo $postLink; ?>" class="box_link">
                          <img src="<?php echo $img_url; ?>" alt="<?php echo $title; ?>" />
                        </a>
                      </div>
                  </div>
              <?php } ?>
          </div>
      </div>
  </div>
<?php endif; ?>