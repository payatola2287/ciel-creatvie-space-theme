<?php
$show_event = get_sub_field('show_event');
$number_of_event = get_sub_field('number_of_event');
$link_2 = get_sub_field('see_all_event');
$heading = get_sub_field('heading');

?>
<?php if ( $show_event == true ) : 

    $today = date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
    
    $posts = get_posts( array(
        'post_type' => 'event',
        'numberposts' => $number_of_event,        
        'fields' => 'ids',
        'post_status' => 'publish',
        'meta_key' => 'date_time',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'date_time',
                'value' => $today,
                'type' => 'DATE',
                'compare' => '<=',
            )
        )

    ) );
    // echo '<pre>'; print_r($posts); echo '</pre>';
    ?>
    <div class="upcoming_event">
        <div class="container">
            <div class="upcoming_event__inner">
                <?php if ($heading) : ?><h5 class="heading"><?php echo $heading; ?></h5><?php endif; ?>
                <div class="upcoming_event__slider">
                    <?php foreach ($posts as $key => $post_id) {
                        $title = get_the_title( $post_id );
                        $img_url = get_the_post_thumbnail_url( $post_id , 'full' );
                        $postLink = get_post_permalink( $post_id );
                        $short_description = get_field( 'short_description', $post_id );
                        $date_time = get_field( 'date_time', $post_id );
                        $date_time = str_replace('."', '/', $date_time);  
                        $newDate = date("m.d.y", strtotime($date_time));
                    ?>
                    <div>
                        <div class="upcoming_event__item">
                            <div class="upcoming_event__item__image">
                                <a href="<?php echo $postLink; ?>" style="background-image: url('<?php echo $img_url; ?>'); " ><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/525x525.png" alt="<?php echo $title; ?>" /></a>
                            </div>
                            <div class="upcoming_event__item__details">
                                <h2 class="date"><?php echo $newDate; ?></h2>
                                <h4 class="title"><?php echo $title; ?></h4>
                                <div class="text"><?php echo $short_description; ?></div>
                                <ul>
                                    <li class="link">
                                        <a class="btn-underline" href="<?php echo $postLink; ?>">
                                            <?php echo esc_html__( 'learn more', 'ciel' ); ?>
                                        </a>
                                    </li>                                    
                                    <?php if($link_2 && $link_2['title']): ?>
                                        <li class="link">
                                            <a href="<?php echo $link_2['url']; ?>" class="btn-underline" <?php echo ($link_2['target'])?'target="_blank"':''; ?> >
                                                <?php echo $link_2['title']; ?>
                                            </a>
                                        </li>                                    
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>