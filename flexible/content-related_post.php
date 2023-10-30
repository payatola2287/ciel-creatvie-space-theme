<?php
    $select_post = get_sub_field('select_post');
?>
 <?php if ( count( $select_post ) > 0 ){ ?>
<div class="other-studios">

    <div class="box-grid">
        <?php foreach ($select_post as $key => $post_id) {         
            $postlink = get_the_permalink($post_id);
            $imgUrl = get_the_post_thumbnail_url( $post_id, 'post-thumbnail' );
            $title = get_the_title( $post_id );
        ?>
            <?php if($imgUrl){ ?>
                
                <a class="colmn-box" href="<?php echo $postlink ?>">
                    <div class="image"><img src="<?php echo $imgUrl ?>"></div>
                    <h2 class="title"><?php echo $title  ?></h2>
                </a>
            
            <?php } ?>

        <?php } ?>

    </div>

</div>
<?php } ?>
