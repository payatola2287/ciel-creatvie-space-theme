<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php
if( have_rows('flexible_content') ):
	
	while ( have_rows('flexible_content') ) : the_row(); 
	set_query_var( 'section_id', get_row_index() );

	?>

		<div class="section section_<?php echo get_row_index(); ?> <?php echo get_row_layout(); ?>" id="<?php echo get_row_layout(); ?>_<?php echo get_row_index(); ?>">
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

</main><!-- #site-content -->

<?php get_footer(); ?>