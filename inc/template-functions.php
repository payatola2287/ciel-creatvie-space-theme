<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ciel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ciel_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ciel_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ciel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ciel_pingback_header' );



function custom_post_type() {

	$postTypes = array(
		'event' => 'Event',
		'studios' => 'Studio',
		'coworks' => 'Coworking',
		'teams' => 'Team',
	);

	$categoryPostTypes = array();

	$sortOrder = 5;
	foreach($postTypes as $postTypeSlug=>$postType){

		if( $postTypeSlug == 'coworks' ){
			$name = _x( $postType, 'Post Type General Name', 'tbwdf' );
			$menu_name = __( $postType, 'tbwdf' );
			$all_items = __( 'All '.$postType, 'tbwdf' );
		}else{
			$name = _x( $postType.'s', 'Post Type General Name', 'tbwdf' );
			$menu_name = __( $postType.'s', 'tbwdf' );
			$all_items = __( 'All '.$postType.'s', 'tbwdf' );
		}
		

		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => $name,
			'singular_name'       => _x( $postType, 'Post Type Singular Name', 'tbwdf' ),
			'menu_name'           => $menu_name,
			'parent_item_colon'   => __( 'Parent '.$postType, 'tbwdf' ),
			'all_items'           => $all_items,
			'view_item'           => __( 'View '.$postType, 'tbwdf' ),
			'add_new_item'        => __( 'Add New '.$postType, 'tbwdf' ),
			'add_new'             => __( 'Add New', 'tbwdf' ),
			'edit_item'           => __( 'Edit '.$postType, 'tbwdf' ),
			'update_item'         => __( 'Update '.$postType, 'tbwdf' ),
			'search_items'        => __( 'Search '.$postType, 'tbwdf' ),
			'not_found'           => __( 'Not Found', 'tbwdf' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'tbwdf' ),
		);

		// Set other options for Custom Post Type

		$args = array(
			'label'               => __( $postType, 'tbwdf' ),
			'description'         => __( $postType, 'tbwdf' ),
			'labels'              => $labels,
			'taxonomies'          => array( $postTypeSlug.'_category' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_rest'        => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => $sortOrder++,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			"rewrite" => array( "slug" => $postTypeSlug, "with_front" => true ),
			"query_var" => true,
			'supports'            => array( 'title',  'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
			"rest_controller_class" => "WP_REST_Posts_Controller",
		);

		if(in_array($postTypeSlug,$categoryPostTypes)){
			register_taxonomy(
				$postTypeSlug.'_category',
				$postTypeSlug,
				array(
					'label' => __( 'Category' ),
					"public" => true,
					"publicly_queryable" => true,
					"hierarchical" => true,
					"show_ui" => true,
					"show_in_menu" => true,
					"show_in_nav_menus" => true,
					"query_var" => true,
					'rewrite' => array( 'slug' => $postTypeSlug.'_category', 'with_front' => true ),
					"show_in_rest" => true,
					"rest_base" => $postTypeSlug.'_category',
					"rest_controller_class" => "WP_REST_Terms_Controller",
					"show_in_quick_edit" => false,
				)
			);
		}

		// Registering your Custom Post Type
		register_post_type( $postTypeSlug, $args );
	}

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );

add_filter('acf/settings/save_json', 'my_acf_json_save_point'); 
function my_acf_json_save_point( $path ) {    
    // update path
    $path = get_stylesheet_directory() . '/inc/acf_json';    
    
    // return
    return $path;    
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {    
    // remove original path (optional)
    unset($paths[0]);    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf_json';    
    
    // return
    return $paths;    
}
