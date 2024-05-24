<?php

/* Enqueue pico styles */
add_action( 'wp_enqueue_scripts', 'pico_enqueue_styles' );
function pico_enqueue_styles() {
	wp_enqueue_style(
		'pico',
	'https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.sand.min.css'
	);
}

/**
 * Remove bloat
 */

/* WP version */
remove_action( 'wp_head', 'wp_generator' );

/* EditURI link */
remove_action( 'wp_head', 'rsd_link' );

/* Shortlink */
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/* Emoji detection script */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

/* Emoji styles */
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/* REST link */
remove_action( 'wp_head', 'rest_output_link_wp_head' );

/* oEmbed discovery links */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

/* XML-RPC */
add_filter( 'xmlrpc_enabled', '__return_false' );

/* Pingback */
add_filter('pings_open', function() {
    return false;
});

/* Feed links */
remove_action( 'wp_head', 'feed_links', 2 );

/* Feed extra links */
remove_action( 'wp_head', 'feed_links_extra', 3 );

/* Meta robot */
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');

/* Styles */
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 100 );
add_action('wp_footer', function () {
	wp_dequeue_style('core-block-supports');
});

/* Heartbeat */
add_action( 'init', function() {
	wp_deregister_script( 'heartbeat' );
}, 1 );

/* Remove menu item classes */
add_filter( 'nav_menu_css_class', 'pico_remove_menu_item_classes', 10, 2 );
function pico_remove_menu_item_classes( $classes, $item ) {
	return array();
}

/* Remove menu item ids */
add_filter( 'nav_menu_item_id', '__return_null' );

/* Remove menu container div */
add_filter( 'wp_nav_menu_args', 'pico_remove_menu_container' );
function pico_remove_menu_container( $args ) {
	$args['container'] = false;
	return $args;
}

/* Remove menu id and class */
add_filter( 'wp_nav_menu', 'pico_remove_menu_id_class' );
function pico_remove_menu_id_class( $nav_menu ) {
	return preg_replace( array(
		'/id=\"(.*)\"/iU',
		'/class=\"(.*)\"/iU',
	), '', $nav_menu );
}

/**
 * Remove comments
 */

/* Remove the comments admin section */
add_action( 'admin_menu', 'pico_remove_comments_admin_menu' );
function pico_remove_comments_admin_menu() {
	remove_menu_page( 'edit-comments.php' );
}

/* Remove the comments link from the admin bar */
add_action( 'admin_bar_menu', 'pico_remove_comments_admin_bar', 999 );
function pico_remove_comments_admin_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
}

/* Remove comments column from admin */
add_action( 'admin_init', 'pico_remove_comments_column' );
function pico_remove_comments_column() {
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'post', 'comments' );
}

/* Remove dashboard widgets */
add_action( 'wp_dashboard_setup', 'pico_remove_dashboard_widgets' );
function pico_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
	remove_action('welcome_panel', 'wp_welcome_panel');
}

/* Remove admin dropdown help */
add_filter( 'contextual_help', 'pico_remove_admin_help', 999, 3 );
function pico_remove_admin_help( $old_help, $screen_id, $screen ) {
	$screen->remove_help_tabs();
	return $old_help;
}

/* Remove admin bar Wordpress menu */
add_action( 'wp_before_admin_bar_render', 'pico_remove_admin_bar_wp_menu' );
function pico_remove_admin_bar_wp_menu() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}

/* Disable Gutenberg */
add_filter( 'use_block_editor_for_post', '__return_false' );

/* Remove the "post" admin menu */
add_action( 'admin_menu', 'pico_remove_post_menu' );
function pico_remove_post_menu() {
	remove_menu_page('edit.php');
}

/* Remove Category and Tag Taxonomies */
add_action('init', function(){
   global $wp_taxonomies;
   unregister_taxonomy_for_object_type( 'category', 'post' );
   unregister_taxonomy_for_object_type( 'post_tag', 'post' );
});

/* Redirect author and date archives to the home page */
add_action('template_redirect', 'my_custom_disable_author_page');
function my_custom_disable_author_page() {
    global $wp_query;
    if ( is_author() || is_date() ) {
        wp_redirect(get_home_url(), 301);
        exit;
    }
}

/* Remove admin footer text */
add_filter( 'admin_footer_text', '__return_empty_string', 11 );

/* Remove admin footer version */
add_filter( 'update_footer', '__return_empty_string', 11 );

/* Enable webp and svg upload */
add_filter('upload_mimes', 'pico_mime_types');
function pico_mime_types($mimes) {
	$mimes['webp'] = 'image/webp';
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

/* Display webp thumbnail */
add_filter('file_is_displayable_image', function($result, $path) {
    return ($result) ? $result : (empty(@getimagesize($path)) || !in_array(@getimagesize($path)[2], [IMAGETYPE_WEBP]));
}, 10, 2);

/* Display svg thumbnail */
add_filter('file_is_displayable_image', function($result, $path) {
	return ($result) ? $result : (empty(@getimagesize($path)) || !in_array(@getimagesize($path)[2], [IMAGETYPE_SVG]));
}, 10, 2);

/* Disallow theme / plugin editor */
define( 'DISALLOW_FILE_EDIT', true );

/* Security headers */
add_action("send_headers", "pico_add_security_headers");
function pico_add_security_headers() {
 header("X-Frame-Options: SAMEORIGIN");
 header("X-Content-Type-Options: nosniff");
 header("X-XSS-Protection: 1;mode=block");
 header("Referrer-Policy: no-referrer-when-downgrade");
 header("Content-Security-Policy: upgrade-insecure-requests;");
 header('Strict-Transport-Security: "max-age=31536000" env=HTTPS');
}

/* Set number of revisions */
add_filter( 'wp_revisions_to_keep', 'pico_revisions_to_keep', 10, 2 );
function pico_revisions_to_keep( $num, $post ) {
	return 5;
}
