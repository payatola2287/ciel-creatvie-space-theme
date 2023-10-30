<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ciel
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php // get_template_part( 'template-parts/content', 'banner' ); ?>

    
<?php

    $studios_page_id = get_field( "studios_page", 'option' ); 

 $show_banner = get_field( "show_banner", $studios_page_id); 
if( $show_banner == true ):
	$show_logo = get_field( "show_logo" ); 
?>

<div class="section section_heroBanner" id="heroBanner">
	<div class="heroBanner__main">
	
	<?php while( have_rows('hero_banner', $studios_page_id) ): the_row(); 

$banner_size = get_sub_field('banner_size');
$image_video = get_sub_field('image_video');

if( $image_video == 'Image' ){
	$imageUrl = get_sub_field('image');
}else{
	$video = get_sub_field('video');
	$video_poster = get_sub_field('video_poster');
}

$text_color = get_sub_field('text_color', $studios_page_id);
$text_line_1 = get_sub_field('text_line_1');
$text_line_2 = get_sub_field('text_line_2');
$text_box = get_sub_field('text_box');

$logo = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $logo , 'full' );
$image_url = $image[0];

$cta_button = get_sub_field('cta_button', $studios_page_id);
$cta_button__open_modal = false;

if($cta_button && $cta_button['url'] && str_contains($cta_button['url'], '/book-now')) {
	$cta_button__open_modal = true;
}

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
			<?php echo wp_video_shortcode(  $attr, '' ); ?>			
		<?php } ?>
		<?php if( $text_line_1 || $text_line_2 ): ?>
		<div class="text-layer">
			<div class="text-layer-inner" data-aos="fade-left" data-aos-duration="2000" >
				<?php if( $text_line_1 ): ?> <h1 class="title"><?php echo $text_line_1; ?></h1><?php endif; ?>
				<?php if( $text_line_2 ): ?><h2 class="subtitle"><?php echo $text_line_2; ?></h2><?php endif; ?>
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
		<div class="text_box"><?php echo $text_box; ?></div>
		<?php endif; ?>

		<?php if( $show_logo == true ): ?>
		<div class="banner_logo">
			<img src="<?php echo $image_url; ?>" alt="" />
		</div>
		<?php endif; ?>
	</div>
	
</div>
<?php endwhile; ?>
	
	</div>
</div>
<?php endif; ?>

	<?php
if( have_rows('flexible_content', $studios_page_id) ):
	
	while ( have_rows('flexible_content', $studios_page_id) ) : the_row(); 
	set_query_var( 'section_id', get_row_index() );

	?>

		<div class="section section_<?php echo get_row_index(); ?> " id="<?php echo get_row_layout(); ?>_<?php echo get_row_index(); ?>">
			<?php get_template_part('flexible/content', get_row_layout()); ?>
		</div>

		<?php 
	endwhile;

else:

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}
endif;
	?>

	</main><!-- #main -->

<?php
get_footer();