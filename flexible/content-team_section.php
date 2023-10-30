<?php 
    $heading = get_sub_field('heading');
    $show_post_per_page = get_sub_field('show_post_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	

    $args = array(
        'post_type' => 'teams',
        'posts_per_page' => $show_post_per_page,
        'paged'          => $paged,
    );
    $the_query = new WP_Query($args); 
if ($the_query->have_posts()){
?>
<div class="team-main">
    <div class="container">
        <?php if($heading){ ?><h4 class="title"><?php echo $heading ?></h4><?php } ?>
        <div class="team__grid" data-aos="fade-in" data-aos-duration="2000">
            <?php  while ($the_query->have_posts()) : $the_query->the_post();  
                $post_id = get_the_ID();
                $designation = get_field('designation',$post_id);
                $postlink = get_the_permalink($post_id);
                $imgUrl = get_the_post_thumbnail_url( $post_id, 'post-thumbnail' );
                $title = get_the_title( $post_id );
            ?>
            <div class="team__grid__item"> 
                  <a href="<?php echo $postlink ?>">
                      <div class="both">
                      <?php if($imgUrl){ ?><div class="image"><img src="<?php echo $imgUrl ?>" alt=""/><?php } ?></div>
                      <div class="text-both">  
                        <h5 class="team-title"><?php echo  $title ?></h5>
                        <?php if($designation){ ?><p><?php echo $designation ?></p><?php } ?>
                      </div>  
                      </div>
                  </a>  
            </div>
            <?php endwhile;  ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="btn-link"><a class="btn-underline" href="javascript:void(0)"> read more<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="17" viewBox="0 0 33 17"><g transform="translate(33 17) rotate(180)"><path d="M16.5,0,15.461.922,0,14.713,2.078,17,16.5,4.13,30.922,17,33,14.713,17.539.922Z"></path></g></svg></span></a></div>
    </div>
</div>
<?php } ?>