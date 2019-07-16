<?php

/**
 * @package WordPress
 * @subpackage asw_template
 */

// Thumbnails
add_theme_support('post-thumbnails');



//menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'nav1' => __( 'Header Navigation' ),
			'nav2' => __( 'Footer Navigation' )
		)
	);
}



// make sure quotes and single quotes dont end up in the url
add_action( 'title_save_pre', 'do_replace_dashes' );
function do_replace_dashes($string_to_clean) {
    $string_to_clean = str_replace( array('&#8212;', '—', '&#8211;', '–', '‚', '„', '“', '”', '’', '‘', '…'), array(' -- ',' -- ', '--','--', ',', ',,', '"', '"', "'", "'", '...'), $string_to_clean );
    return $string_to_clean;
}

//remove wp version from head
remove_action('wp_head', 'wp_generator');


// Custom Taxonomies (Should be above Custom Post Types)
function asw_register_taxonomies() {
	register_taxonomy("media_role", array("attachment"), 
	array(
		"hierarchical" => true, 
		"label" => __('Media Roles', 'attachment'), 
		"singular_label" => "Media Role",
		"show_in_rest" => "true", 
		"rewrite" => true));
}


// Custom Post Types

function js_init() {
  asw_register_custom_types(); // Register Custom Post Types
  asw_register_taxonomies(); // Register Custom Taxonomies
}

add_action('init', 'js_init');

function asw_register_custom_types() {
	

	// FRONT PAGE HERO
	register_post_type(
		  'examples', array(
			  'labels' => array(
				  'name' => 'Examples', 
				  'singular_name' => 'Example', 
				  'add_new' => 'Add new example', 
				  'add_new_item' => 'Add new example', 
				  'new_item' => 'New example', 
				  'view_item' => 'View examples',
				  'edit_item' => 'Edit example',
				  'not_found' =>  __('No examples found'),
				  'not_found_in_trash' => __('No examples found in Trash')
			  ), 
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => false,
			  'capability_type' => 'post',
			  'has_archive' => true,
			  'menu_icon' => 'dashicons-images-alt',
			  'exclude_from_search' => false, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => true,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail', 'editor'),
			  'show_in_rest' => true
		 )
	  );
	
	flush_rewrite_rules();
 
 	add_action('add_meta_boxes', 'asw_add_meta');
	add_action('save_post', 'asw_save_meta');
 
}



function mytheme_setup() {
    // Add support for Block Styles
	add_theme_support( 'wp-block-styles' );
	// Add Color Palettes
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Black' ),
			'slug' => 'black',
			'color' => '#000',
		),
		array(
			'name' => __( 'White' ),
			'slug' => 'white',
			'color' => '#FFF',
		),
		array(
			'name' => __( 'Blue' ),
			'slug' => 'blue',
			'color' => '#00418C',
		),
		array(
			'name' => __( 'Red' ),
			'slug' => 'red',
			'color' => '#750000',
		),
	) );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support('disable-custom-font-sizes');
}
add_action( 'after_setup_theme', 'mytheme_setup' );

//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Global Custom Fields</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>



	<p><strong>Home Title:</strong><br />
	<input type="text" name="home_title" size="45" value="<?php echo get_option('home_title'); ?>" /></p>

	<p><strong>Email Address:</strong><br />
	<input type="text" name="email" size="45" value="<?php echo get_option('email'); ?>" /></p>

	<p><strong>Phone Number:</strong><br />
	<input type="text" name="phone" size="45" value="<?php echo get_option('phone'); ?>" /></p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="home_title,email,phone" />
	

	</form>
	</div>
	<?php
}

?>