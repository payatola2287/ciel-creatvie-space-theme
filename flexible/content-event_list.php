<?php
$select_event = get_sub_field('select_event');
$heading = get_sub_field('heading');
?>
<?php if (count($select_event) > 0) : ?>
    <div class="event_list">
        <div class="container">
            <div class="event_list__inner">
                <?php if ($heading) : ?><h5 class="heading _sectionTitle _sectionTitle--repeated" data-title="<?php echo $heading; ?>" style="text-align: left; font-weight: bold;"><?php echo $heading; ?></h5><?php endif; ?>
                <div class="event_list__list">
                    <?php foreach ($select_event as $key => $postId) {
                        $title = get_the_title($postId);
                        $img_url = get_the_post_thumbnail_url($postId, 'full');

                        $postLink = get_post_permalink($postId);
                        $short_description = get_field('short_description', $postId);
                        $date_time = get_field('date_time', $postId);
                        if (empty($date_time)) {
                            $date_time = get_field('date_picker', $postId);
                        }

                        $newDate = "";
                        if ($date_time) {
                            $newDate = date("m.d.y", strtotime($date_time));
                        }

                        $start_time = get_field('start_time', $postId);
                        $end_time = get_field('end_time', $postId);

                        $google_join_link = get_field('google_join_link', $postId);
                        $ciel_join_link = get_field('ciel_join_link', $postId);
                        $event_link = get_field('event_link', $postId);
                        
                        $show_as_upcoming = get_field('show_as_upcoming', $postId);
                        
                    ?>
                        <div class="event_list__item <?php if($show_as_upcoming) echo "--upcoming" ?>" data-aos="fade-in" data-aos-duration="2000">
                            <div class="event_image">
                                <?php if($show_as_upcoming) { ?>
                                    <div class="section-title section-title--repeated ">
                                        <strong class="_sectionTitle _sectionTitle--repeated" data-title="Upcoming">
                                            Coming Soon
                                        </strong>
                                    </div>
                                <?php } ?>
                                <div class="event_image_bg" style="background-image: url('<?php echo $img_url; ?>'); ">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/525x525.png" alt="<?php echo $title; ?>" />
                                    <a href="<?php echo $postLink; ?>" class="box_link"></a>
                                </div>
                            </div>
                            <div class="event_details">
                                <?php if ($newDate) { ?>
                                    <h2 class="date"><?php echo $newDate; ?></h2>
                                <?php } ?>
                                <h4 class="title"><?php echo $title; ?></h4>
                                <div class="text"><?php echo $short_description; ?></div>
                                <ul class="time_details">
                                    <li><?php echo $date_time; ?></li>
                                    <li><?php echo $start_time; ?> - <?php echo $end_time; ?></li>
                                </ul>
                                <?php if($google_join_link || $ciel_join_link) { ?>
                                    <ul class="link_list">
                                        <?php if($google_join_link) { ?>
                                            <li class="link"><a class="btn-underline" href="<?php echo ($google_join_link) ?: '#'; ?>"><?php echo esc_html__('Google Calendar', 'ciel'); ?></a></li>
                                        <?php } ?>

                                        <?php if($ciel_join_link) { ?>
                                            <li class="link"><a class="btn-underline" href="<?php echo ($ciel_join_link) ?: '#'; ?>"><?php echo esc_html__('Apple Calendar', 'ciel'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <?php $has_event_link = false; ?>
                                <?php if( $event_link && $event_link['title'] && $event_link['url'] && $event_link['target']) { ?>
                                    <?php $has_event_link = true; ?>
                                    <div class="event_link">
                                        <a href="<?php echo $event_link['url']; ?>" target="<?php echo $event_link['target']; ?>" class="btn btn--outline btn--thin"><?php echo $event_link['title'] ?></a>
                                    </div>
                                <?php } ?>
                                <div class="event_cta">
                                    <a href="<?php echo $postLink; ?>" <?php if(!$has_event_link) { ?> class="btn btn--outline btn--thin" <?php } else { ?>class="link--secondary" <? } ?>><?php echo esc_html__('Event Details', 'ciel'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>