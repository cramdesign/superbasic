<?php get_header(); ?>

<div class="primary">
	
	<!-- start The Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="post">
		<header>
			<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<p class="date">March 14, 2014</p>
				<p class="categories">Categor A, Category B, Etcetera</p>
				<p class="comments">There are 4 comments.</p>
			</div>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- entry-content -->
	</article><!-- post -->

	<!-- end The Loop -->
	<?php endwhile; endif; ?>

	<nav><?php posts_nav_link(); ?></nav>
	
</div><!-- primary -->

<div class="secondary">
	
	<aside class="widget">
		<h3>Widget title</h3>
		<p>My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme.</p>
	</aside>
	
	<aside class="widget">
		<h3>Widget title</h3>
		<p>My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme.</p>
	</aside>
	
</div><!-- secondary -->
	
<?php get_footer(); ?>