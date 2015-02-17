<?php


// Remove ugly inline css in gallery shortcode
add_filter( 'use_default_gallery_style', '__return_false' );

// sets max image width inserted into a post
if ( ! isset( $content_width ) ) $content_width = 800;

// add support for html5 markup where available
add_theme_support( 'html5', array( 'gallery', 'comment-list', 'comment-form', 'search-form' ) );



/* Register widget areas
-------------------------------------------------------------- */
register_sidebar(array(
	'name'			=> 'Sidebar Widgets',
	'id'			=> 'sidebar',
	'description'	=> 'These are widgets for all sidebars.',
	'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
	'after_widget'	=> '</div><!-- widget -->',
	'before_title'	=> '<h3 class="title">',
	'after_title'	=> '</h3>'
));



/* Register javascript and stylesheets
-------------------------------------------------------------- */
if (!function_exists('theme_scripts')) : function theme_scripts() {


	// Scripts
	if ( is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );


	// Styles
	wp_enqueue_style( 'norm-style', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'html-style', get_template_directory_uri() . '/css/html.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css' );


} endif;
add_action('wp_enqueue_scripts', 'theme_scripts', 5);



/* Register Theme Features 
-------------------------------------------------------------- */
function custom_theme_features()  {


	// Menus
	register_nav_menu( 'primary', 'Primary menu' );


	// Editor stylesheet
	add_editor_style ( 'css/html.css' );


	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );


}
add_action( 'after_setup_theme', 'custom_theme_features' );




?>