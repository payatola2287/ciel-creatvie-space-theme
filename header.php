<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ciel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="-_t8dkOqK25uno4Arh8w_yLx-Qlq3hJVs7uYKUIP-4U" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<style type="text/css">
		body.doNot-scroll {
			position: relative !important;
			height: auto;
		}
	</style>

	<?php wp_head(); ?>
</head>

<?php
global $post;
$body_classes = [];

if( $post->post_type === 'page' ) {
	$body_classes[] = 'page-' . $post->post_name;
	if( $post->post_parent ) {
		$parent = get_post( $post->post_parent );
		if( $parent->post_name === 'book-now' || $parent->post_name === 'book' ) {
			$body_classes[] = 'page-form form-' . $parent->post_name;
		}
	}
}

$body_classes = implode(' ', $body_classes);
?>

<body <?php body_class( $body_classes ); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ciel'); ?></a>

		<?php
		$header_link = get_field('header_link', 'option');
		$header_link_secondary = get_field('header_link_secondary', 'option');
		$image_or_video = get_field('image_or_video', 'option');
		$image = get_field('image', 'option');
		$video = get_field('video', 'option');
		$overlay_image = get_field('overlay_image', 'option');
		$overlay_mobile_image = get_field('overlay_mobile_image', 'option');

		if (empty($overlay_image)) {
			$overlay_image = get_template_directory_uri() . "/assets/images/splash_image.png";
		}

		if (empty($overlay_mobile_image)) {
			$overlay_mobile_image = get_template_directory_uri() . "/assets/images/splash_image.png";
		}
		?>
		<?php if (is_front_page()) { ?>
			<? /** 
			<div class="loading-group <?php echo $image_or_video; ?>">
				<div class="background" style="background-image:url(<?php echo $overlay_image; ?>)"></div>
				<div class="background-mobile" style="background-image:url(<?php echo $overlay_mobile_image; ?>)"></div>
				<div class="video-group">
					<?php if ($image_or_video == "video") { ?>
						<?php if ($video) { ?>
							<video autoplay="true" playsinline="true" loop="" muted="">
								<source src="<?php echo $video; ?>" type="video/mp4">
							</video>
						<?php } ?>
					<?php } else { ?>
						<?php if ($image) { ?>
							<div class="spalsh_back_image" style="background-image: url(<?php echo $image; ?>)">
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="btn-box" id="openBtn" style="left: 566px; top: 412px;"><button type="button" class="open-btn">EXPLORE</button></div>
			</div>
			**/ ?>
		<?php } ?>
		<!-- <div class="white-screen" style="display: none;"></div> -->
		<header id="masthead" class="site_header">
			<?php if (is_front_page()) { ?>
				<div class="promobar">
					<div class="container">
						<div class="promo_grid">
							<?php while ( have_rows('promo_bar_list', 'option') ) { the_row(); 
								$title = get_sub_field('title');
								$link = get_sub_field('link');
							?>
							<div class="item">
								<p>
									<span><?php echo $title ?></span>
									<?php if($link){
											$contact_link_url = $link['url']; 
											$contact_link_title = $link['title'];
											$contact_link_target = ($link['target'] ? 'target=_blank' : '');
									?>
									<a href="<?php echo $contact_link_url; ?>" <?php echo $contact_link_target; ?>>
												<?php echo $contact_link_title; ?>
									</a>
									</p>
								<?php } ?>			
							</div>
							<?php } ?>	
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="container big_container">
				<div class="site_header__inner">
					<div class="site_header__toggle__open"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu.svg" alt="Menu Toggle" /></div>
					<div class="site_header__logo"><?php the_custom_logo();  ?> </div>
						<div class="site_cta">
						<?php if ($header_link_secondary && $header_link_secondary['url'] && $header_link_secondary['title'] && $header_link_secondary['target']) :
								$secondary_link_url = $header_link_secondary['url'];
								$secondary_link_title = $header_link_secondary['title'];
								$secondary_link_target = $header_link_secondary['target'];
							?>
							<a href="<?php echo esc_url($secondary_link_url) ?>" target="<?php echo $secondary_link_target ?>" class="link--secondary">
								<span>
									<?php echo esc_html($secondary_link_title) ?>
								</span>
							</a>
							<?php endif; ?>
							<?php if ($header_link) :
								$link_url = $header_link['url'];
								$link_title = $header_link['title'];
								$link_target = $header_link['target'] ? $header_link['target'] : '_self';
								$cta_button__open_modal = false;

								if($link_url && str_contains($link_url, '/book-now')) {
									$cta_button__open_modal = true;
								}

							?>
							<a
								class="btn btn--outline btn--small btn--transparent"
								href="<?php echo esc_url($link_url); ?>"
								target="<?php echo esc_attr($link_target); ?>"
								<?php if($cta_button__open_modal) { ?>
									data-action="modal--open"
								<?php } ?>
							>
								<?php echo esc_html($link_title); ?>
							</a>
							<?php endif; ?>
						</div>
				</div>
			</div>
			<div class="site_header__menu" style="display: none;">
				<div class="container big_container">
					<div class="site_header__toggle__close"><span class="leftright"></span><span class="rightleft"></span></div>
					<?php /*
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
				*/ ?>

					<?php if (have_rows('tab_image_list', 'option')) : ?>
						<div class="tab_image__main">
							<div class="container small_container">
								<div class="tab_image__inner">
									<div class="tab_image__inner__image">
										<div class="tab_image__img">
											<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/620x620.png" alt="Tab Image" /></a>
										</div>
									</div>
									<div class="tab_image__inner__title">
										<ul>
											<?php while (have_rows('tab_image_list', 'option')) : the_row();
												$image = get_sub_field('image');
												$title = get_sub_field('title_link');
												$item_class = get_sub_field('item_class');
											?>
												<li class="title_link <?php echo $item_class; ?> <?php echo ($image) ? '' : 'no_image'; ?>"><a href="<?php echo $title['url']; ?>" data-img="<?php echo $image; ?>"><?php echo $title['title']; ?></a></li>
											<?php endwhile; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</header><!-- #masthead -->