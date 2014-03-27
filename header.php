<!DOCTYPE html>
<html>
<head>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/normalize.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

<?php wp_head(); ?>

</head>
<body>
	
<header id="header" class="clear">
	<div class="row">
	
		<div id="masthead">
			<h1 class="site-title"><a href="<?php echo home_url( "/" ); ?>"><?php bloginfo( "name" ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( "description" ); ?></h2>
		</div>
			
		<nav id="menu">
			<input type="checkbox" id="toggle"><label for="toggle">Menu</label>
			<div class="target"><?php wp_nav_menu( array( 'menu' => 'primary' )); ?></div>
		</nav>
		
	</div><!-- row -->
</header>



<main id="content">
<div class="row">
