<?php
/**
 * Template Name: Member Portal
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

if( have_rows( 'flexible_tabs' ) ): ?>
<div class="tabbed-content">
	<ul class="tabs-toggles">
		<?php
			while( have_rows( 'flexible_tabs' ) ): // Loop for the tab buttons
				the_row();
				set_query_var( 'section_id', get_row_index() );
		?>
			<li class="tab-item <?php echo get_row_index() == 1 ? 'open':''; ?>" data-content= "#tab-<?php echo get_row_layout(); ?>_<?php echo get_row_index(); ?>" data-tab-toggle>
				<?php echo the_sub_field( 'tab_name' ); ?>
			</li>
		<?php endwhile; ?> 
		<li class="tab-item">
			<a href="<?php echo site_url(); ?>/wp-login.php?action=logout"><?php _e( 'Logout', 'ciel' ); ?></a>
		</li>
	</ul><?php // end of .tabs ?>
	<div class="tab-contents">
	<?php
	while( have_rows( 'flexible_tabs' ) ): // Loop for the tab content
		the_row();
		set_query_var( 'section_id', get_row_index() );
	?>
		<div class="tab-content section_<?php echo get_row_index(); ?> <?php echo get_row_index() == 1 ? 'open':''; ?>" id="tab-<?php echo get_row_layout(); ?>_<?php echo get_row_index(); ?>" tab-content>
			<?php get_template_part('flexible/content', get_row_layout()); ?>
		</div>
		<?php 
	endwhile;
	?>
	</div><?php // end of .contents ?>
<?php
endif;
	?>
</div><!-- .tabbed-content -->
	</main><!-- #main -->

<?php
get_footer();
