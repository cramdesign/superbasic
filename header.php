<!DOCTYPE html>
<html>
<head>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php /* Note: All stylesheets are loaded with wp_enqueue_style in functions.php */ ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	
<header id="header" class="clear">
	<div class="row">
	
		<div id="masthead">
			<h1 class="site-title"><a href="<?php echo home_url( "/" ); ?>"><?php bloginfo( "name" ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( "description" ); ?></h2>
		</div>
			
		<nav id="menu">
			<input type="checkbox" id="toggle"><label for="toggle">Menu</label>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'dropmenu target' )); ?>
		</nav>
		
	</div><!-- row -->
</header>



<main id="content">
<div class="row">
