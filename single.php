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

	<?php get_template_part( 'template-parts/content', 'banner' ); ?>
	<?php
if( have_rows('flexible_content') ):
	
	while ( have_rows('flexible_content') ) : the_row(); 
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
