<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<div id="site-content" role="main">

	<div class="error404-content">
		<div class="container">
			<div class="error404-content-inner">
				<h1><?php _e( '4<span>0</span>4', 'twentytwenty' ); ?></h1>
				<div class="sub-text">
					<h3><?php _e("Oops! That page can't be found.", 'twentytwenty'); ?></h3>
				<p><?php _e('It looks like nothing was found at this location.', 'twentytwenty'); ?></p>
				</div>
			</div>
		</div>
	</div><!-- .section-inner -->

</div><!-- #site-content -->


<?php
get_footer();
