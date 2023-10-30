<?php  $delay = 0 ?>
<?php if( have_rows('list') ): ?>
<div class="studios_list">
    <div class="container">
        <div class="studios_list__inner">
        <?php while( have_rows('list') ): the_row(); 
        $heading = get_sub_field('heading');
        $image = get_sub_field('image');
        $short_description = get_sub_field('short_description');
        $more_link = get_sub_field('more_link');
        $book_link = get_sub_field('book_link');
        ?>
            <div class="studios_list__item"  data-aos="fade-zoom-in"      data-aos-easing="ease-in-back"      data-aos-delay="<?php echo $delay = 150; ?>"      data-aos-offset="0">
                <div class="image">
                    <a href="<?php echo ($more_link['url'])?:$book_link['url']; ?>" style="background-image: url('<?php echo $image['url']; ?>'); " target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/620x600.png" alt="<?php echo $image['alt']; ?>" /></a>
                </div>
                <h2 class="heading"><?php echo $heading; ?></h2>
                <?php if( $short_description ): ?><div class="text"><?php echo $short_description; ?></div><?php endif; ?>
                <?php if( $more_link || $book_link ): ?><ul>
                    <?php if($more_link && $more_link['title']): ?><li><a class="btn-underline" href="<?php echo $more_link['url']; ?>" <?php echo ($more_link['target'])?'target="_blank"':''; ?> ><?php echo $more_link['title']; ?></a></li><?php endif; ?>                        
                    <?php if($book_link && $book_link['title']): ?><li><a class="btn-underline" href="<?php echo $book_link['url']; ?>" <?php echo ($book_link['target'])?'target="_blank"':''; ?> ><?php echo $book_link['title']; ?></a></li><?php endif; ?>                        
                </ul>
                <?php endif; ?>
                
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>