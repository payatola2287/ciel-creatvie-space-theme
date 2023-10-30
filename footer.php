<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ciel
 */

?>


<?php
	$footer_logo = get_field('footer_logo', 'option');
	$column_1_heading = get_field('column_1_heading', 'option');
	$column_2_heading = get_field('column_2_heading', 'option');
	$column_3_heading = get_field('column_3_heading', 'option');
	
	$promo_image = get_field('promo_image', 'option');
	$logo_tagline = get_field('logo_tagline', 'option');
	$tagline = get_field('tagline', 'option');
	$heading = get_field('heading', 'option');
	$link = get_field('link', 'option');
?>
	
<div class="promo-box">	
	<div class="promo-content">
		<span class="btn-close"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOSIgaGVpZ2h0PSIyOSIgdmlld0JveD0iMCAwIDI5IDI5Ij4KICAgIDxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgZD0iTS42OTYgMEMuNDI5LjAwMi4xOS4xNjYuMDkuNDE0Yy0uMDk5LjI0OC0uMDM4LjUzMS4xNTMuNzE3bDEzLjMzMiAxMy4zNUwuMjQ0IDI3LjgzYy0uMTk1LjE1OC0uMjg0LjQxNC0uMjI3LjY1OS4wNTYuMjQ1LjI0Ny40MzcuNDkyLjQ5My4yNDUuMDU3LjUwMS0uMDMyLjY1OS0uMjI4TDE0LjUgMTUuNDA1bDEzLjMzMiAxMy4zNWMuMTU4LjE5Ni40MTQuMjg1LjY1OS4yMjguMjQ1LS4wNTYuNDM2LS4yNDguNDkyLS40OTMuMDU3LS4yNDUtLjAzMi0uNTAxLS4yMjctLjY2TDE1LjQyNCAxNC40OCAyOC43NTYgMS4xM2MuMTk0LS4xODguMjU0LS40NzYuMTUtLjcyNi0uMTA1LS4yNS0uMzUyLS40MS0uNjIyLS40MDQtLjE3Mi4wMDctLjMzNC4wOC0uNDUyLjIwNkwxNC41IDEzLjU1NiAxLjE2OC4yMDZDMS4wNDUuMDc2Ljg3NS4wMDIuNjk2IDB6Ii8+Cjwvc3ZnPgo="></span>
		<div class="text-box">
			<?php if($tagline){ ?><h5><?php echo $tagline ?></h5><?php } ?>
			<?php if($heading){ ?><h4><?php echo $heading ?></h4><?php } ?>
				<?php if($link){
					$contact_link_url = $link['url']; 
					$contact_link_title = $link['title'];
					$contact_link_target = ($link['target'] ? 'target=_blank' : '');
				?>
				<a href="<?php echo $contact_link_url; ?>" class="btn-underline" <?php echo $contact_link_target; ?>>
							<?php echo $contact_link_title; ?>
				</a>
									
			<?php } ?>
		</div>
	</div>
	<?php if($promo_image){ ?><span class="promo-icon"><img src="<?php echo $promo_image ?>"><p><?php echo $logo_tagline ?></p></span><?php } ?>
</div>	
<footer class="site_footer" id="footer_content">
	<div class="container">
		<div class="site_footer_inner">
			<div class="footer_section section_one">
				<div class="footer_logo">
					<?php if ($footer_logo) {
						$footer_logo_url = $footer_logo['url'];
						$footer_logo_alt = $footer_logo['alt'];
					?>
						<a href="<?php echo site_url(); ?>">
							<img src="<?php echo $footer_logo_url; ?>" alt="<?php echo $footer_logo_alt; ?>">
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="footer_section section_two">
				<?php if($column_1_heading){ ?>
					<div class="heading">
						<div class="heading_text"><?php echo $column_1_heading; ?></div>
					</div>
				<?php } ?>
				<?php if( have_rows('address_links_list', 'option') ){ ?>
					<div class="list_item">
						<?php while ( have_rows('address_links_list', 'option') ) { the_row(); 
							$address_link = get_sub_field('address_link');
						?>
							<?php if($address_link){
								$address_link_url = $address_link['url']; 
								$address_link_title = $address_link['title'];
								$address_link_target = ($address_link['target'] ? 'target=_blank' : '');
							?>
								<div class="item">
									<a href="<?php echo $address_link_url; ?>" <?php echo $address_link_target; ?>>
										<?php echo $address_link_title; ?>
									</a>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
                <?php } ?>
			</div>
			<div class="footer_section section_three">
				<?php if($column_2_heading){ ?>
					<div class="heading">
						<div class="heading_text"><?php echo $column_2_heading; ?></div>
					</div>
				<?php } ?>
				<?php if( have_rows('contact_links_list', 'option') ){ ?>
					<div class="list_item">
						<?php while ( have_rows('contact_links_list', 'option') ) { the_row(); 
							$contact_label = get_sub_field('contact_label');
							$contact_link = get_sub_field('contact_link');
						?>
							<?php if($contact_link){
								$contact_link_url = $contact_link['url']; 
								$contact_link_title = $contact_link['title'];
								$contact_link_target = ($contact_link['target'] ? 'target=_blank' : '');
							?>
								<div class="item">
									<?php if($contact_label){ ?>
										<span class="label">
											<?php echo $contact_label; ?>
									</span>
									<?php } ?>
									<a href="<?php echo $contact_link_url; ?>" <?php echo $contact_link_target; ?>>
										<?php echo $contact_link_title; ?>
									</a>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
                <?php } ?>
			</div>
			<div class="footer_section section_four">
				<?php if($column_3_heading){ ?>
					<div class="heading">
						<div class="heading_text"><?php echo $column_3_heading; ?></div>
					</div>
				<?php } ?>
				<?php if( have_rows('social_links_list', 'option') ){ ?>
					<div class="list_item">
						<?php while ( have_rows('social_links_list', 'option') ) { the_row(); ?>
							<?php if( have_rows('item', 'option') ){ ?>
								<?php while ( have_rows('item', 'option') ) { the_row(); 
									$icon = get_sub_field('icon');
									$social_link = get_sub_field('social_link');
								?>
									<div class="item">
										<?php if($social_link){
											$social_link_url = $social_link['url']; 
											$social_link_title = $social_link['title'];
											$social_link_target = ($social_link['target'] ? 'target=_blank' : '');
											?>
											<a href="<?php echo $social_link_url; ?>" <?php echo $social_link_target; ?>>
										<?php } ?>
											<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
										<?php if($social_link){ ?>
											</a>
										<?php } ?>
									</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

</footer><!-- #site-footer -->


</div><!-- #page -->

<?php wp_footer(); ?>
<script>
jQuery(document).ready(function(){
    // toggle video audio
    jQuery(".btn-audio").on("click", function () {
      let $parent = jQuery(this).closest(".video");
      let $video = $parent.find("video");
      jQuery(this).toggleClass("active");
	  var bool = $video.prop("muted");
		$video.prop("muted",!bool);
    });
});

</script>
</body>
</html>
