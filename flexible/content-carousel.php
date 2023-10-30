<?php
$button = get_sub_field('button');
$gallery = get_sub_field('gallery');
?>

<div class="page_content_carousel">
<?php if($gallery) { ?>
  <div class="_carousel">
    <div class="_carousel__inner">
      <?php
      for ($x = 1; $x <= 2; $x++) {
        foreach($gallery as $image) {
          ?>
            <div class="_carousel__item">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
<?php } ?>

<?php if($button) { ?>
  <div class="_carousel__btn">
    <a
      class="btn"
      href="<?php echo $button['url'] ?>"
      target="<?php echo $button['target'] ?>"
      >
      <?php echo $button['title']; ?>
    </a>
  </div>
<?php } ?>
</div>
