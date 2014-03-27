<?php

add_filter( 'use_default_gallery_style', '__return_false' );

register_nav_menu( 'primary', 'Primary menu' );

register_sidebar(array(
	'name' 			=> 'Sidebar Widgets',
	'id'  			=> 'sidebar',
	'description'   => 'These are widgets for all sidebars.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' 	=> '</div><!-- end widget -->',
	'before_title'  => '<h3 class="title">',
	'after_title'   => '</h3>'
));

?>