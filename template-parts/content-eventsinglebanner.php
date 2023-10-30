<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ciel
 */

?>

<?php
	$post_id = get_the_ID();
	$description_heading = get_field( 'description_heading', $post_id );
	$description = get_field( 'description', $post_id );
?>


<div class="section event_single_banner">
	<div class="event_single_banner_main">
		<div class="event_single_banner_inner event_section_item">
			<?php 
				$title = get_the_title( $post_id );
				$img_url = get_the_post_thumbnail_url( $post_id, 'full' );

				$postLink = get_post_permalink( $post_id );
				$short_description = get_field( 'short_description', $post_id );

				$date_time = get_field( 'date_picker', $post_id );
				$date_time_old = str_replace('."', '/', $date_time);  
				$date_time_new = date("m.d.y", strtotime($date_time_old));
				
				$start_time = get_field( 'start_time', $post_id );
				$end_time = get_field( 'end_time', $post_id );

				$google_join_link = get_field( 'google_join_link', $post_id );
				$ciel_join_link = get_field( 'ciel_join_link', $post_id );
				
				$single_page_banner_learn_more_link = get_field( 'single_page_banner_learn_more_link', $post_id );

				$event_link = get_field( 'event_link', $post_id );
				
			?>
			<div class="event_item">
				<div class="event_image">
					<div class="bg_image" style="background-image: url('<?php echo $img_url; ?>')" >
						<img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_1500_1500.png" alt="empty_1500_1500" />
					</div>
				</div>
				<div class="event_details">
					<div class="event_details_inner">
						<h2 class="date"><?php echo $date_time_new; ?></h2>
						<h4 class="title"><?php echo $title; ?></h4>
						<div class="text"><?php echo $short_description; ?></div>
						<ul class="time_details">
							<li><?php echo $date_time; ?></li>
							<li><?php echo $start_time; ?> - <?php echo $end_time; ?></li>
						</ul>

						<?php if( $event_link && $event_link['title'] && $event_link['url'] && $event_link['target']) { ?>
								<div class="event_link">
										<a href="<?php echo $event_link['url']; ?>" target="<?php echo $event_link['target']; ?>" class="btn btn--outline btn--thin"><?php echo $event_link['title'] ?></a>
								</div>
						<?php } ?>
						
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

						<?php if($single_page_banner_learn_more_link){ 
							$btn_url = $single_page_banner_learn_more_link['url']; 
							$btn_title = $single_page_banner_learn_more_link['title'];
							$btn_target = ($single_page_banner_learn_more_link['target'] ? 'target=_blank' : '');
						?>
							<div class="btn_box">
								<a class="btn" href="<?php echo $btn_url; ?>" <?php echo $btn_target; ?>>
									<?php echo $btn_title; ?>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if($description_heading || $description){ ?>
	<div class="single_page_description_section">
		<div class="container">
			<div class="description_section_inner">
				<?php if($description_heading){ ?>
					<div class="description_heading" data-aos="fade-in" data-aos-duration="2000">
						<?php echo $description_heading; ?>
					</div>
				<?php } ?>
				<?php if($description){ ?>
					<div class="description" data-aos="fade-in" data-aos-duration="2000">
						<?php echo $description; ?>
						<?php if( $event_link && $event_link['title'] && $event_link['url'] && $event_link['target']) { ?>
								<div class="event_link">
										<a href="<?php echo $event_link['url']; ?>" target="<?php echo $event_link['target']; ?>" class="btn btn--outline btn--thin"><?php echo $event_link['title'] ?></a>
								</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>