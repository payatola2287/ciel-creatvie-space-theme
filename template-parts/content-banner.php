<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ciel
 */

?>

<?php $show_banner = get_field( "show_banner" ); 
if( $show_banner == true ):

	$show_logo = get_field( "show_logo" ); 

?>

<div class="section section_heroBanner" id="heroBanner">
	<div class="heroBanner__main">
	
	<?php while( have_rows('hero_banner') ): the_row(); 

		$banner_size = get_sub_field('banner_size');
		$image_video = get_sub_field('image_video');

		if( $image_video == 'Image' ){
			$imageUrl = get_sub_field('image');
		}else{
			$video = get_sub_field('video');
			$video_poster = get_sub_field('video_poster');
		}

		$text_color = get_sub_field('text_color');
		$text_line_1 = get_sub_field('text_line_1');
		$text_line_2 = get_sub_field('text_line_2');
		$text_box = get_sub_field('text_box');

		$cta_button = get_sub_field('cta_button');
		$cta_button__open_modal = false;

		if($cta_button && $cta_button['url'] && str_contains($cta_button['url'], '/book-now')) {
			$cta_button__open_modal = true;
		}

		// Preserving Backwards Compatibility
		$only_one_text_line = false;

		if($text_line_1 && !$text_line_2){
			$text_line_2 = $text_line_1;
			$only_one_text_line = true;
		}

		$logo = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $logo , 'full' );
		$image_url = $image[0];

	?>
<div class="heroBanner__inner banner<?php echo $banner_size; ?> --color-<?php echo $text_color ?>">
	<div class="heroBanner__inner__image" <?php if( $image_video == 'Image' ){ ?> style="background-image: url('<?php echo $imageUrl; ?>'); " <?php } ?> >
		<?php if( $image_video == 'Video' ){
			$attr = array(
				'src' => $video,
				'preload' => 'true',
				'autoplay' => 'true',
				'playsinline' => 'true',
				'loop' => 'true',
				'poster' => $video_poster,
			);
			?>
			<div class="wp-video">
				<video class="wp-video-shortcode" autoplay="true" playsinline="true" loop muted poster="<?php echo $video_poster; ?>">
					<source src="<?php echo $video; ?>" type="video/mp4">
				</video>
			</div>
			<?php 
			// 	echo wp_video_shortcode(  $attr, '' ); ?>			
		<?php } ?>
		<?php if( $text_line_1 || $text_line_2 ): ?>
		<div class="text-layer <?php echo $text_color ?>" >
			<div class="text-layer-inner">
				<?php if($only_one_text_line) { ?>
					<h1 class="_title" data-aos="fade-up" data-aos-duration="500">
						<?php echo $text_line_1; ?>
					</h1>
				<?php } else { ?>
					<?php if($text_line_1) { ?>
						<h1 class="_subtitle" data-aos="fade-up" data-aos-duration="500">
							<?php echo $text_line_1; ?>
						</h1>
					<?php } ?>
					<?php if($text_line_2) { ?>
						<h2 class="_title" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
							<?php echo $text_line_2; ?>
						</h2>
					<?php } ?>
				<?php } ?>
			</div>
			<?php if( $cta_button && $cta_button['url'] && $cta_button['title'] ): ?>
				<div class="text-layer-button" data-aos="fade-up" data-aos-duration="500" data-aos-delay="250">
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
		<?php endif; ?>
		<?php if( $text_box ): ?>
		<div class="text_box"><?php echo $text_box; ?><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="17" viewBox="0 0 33 17"><g transform="translate(33 17) rotate(180)"><path d="M16.5,0,15.461.922,0,14.713,2.078,17,16.5,4.13,30.922,17,33,14.713,17.539.922Z"/></g></svg></span></div>
		<?php endif; ?>
		
		<?php if( $show_logo == true ): ?>
		<div class="banner_logo">
			<img src="<?php echo $image_url; ?>" alt="Ciel Creative Space Logo"  height="116" width="116"/>
		</div>
		<?php endif; ?>
	</div>
	
</div>
<?php endwhile; ?>
	
	</div>
</div>
<?php endif; ?>