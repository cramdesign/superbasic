<?php get_header(); ?>

	<div class="primary">
		
		<!-- start The Loop -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article class="post">
			<header>
				<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="meta">
					<p class="date"><?php the_time( get_option('date_format') ); ?></p>
					<p class="categories"><?php the_category(', ') ?></p>
					<p class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?></p>
				</div>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- entry-content -->
		</article><!-- post -->

		<!-- end The Loop -->
		<?php endwhile; endif; ?>

		<nav><?php posts_nav_link(); ?></nav>
		
		<div id="comments-wrap">		
			<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>
		</div>
		
	</div><!-- primary -->
	
	<div class="secondary">
		
		<?php get_sidebar(); ?>
		
	</div><!-- secondary -->
		
<?php get_footer(); ?>