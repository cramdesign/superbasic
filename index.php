<?php get_header(); ?>

<div class="row">

	<div class="primary">
		
		<?php /* Start the Loop */ ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class( 'post' ); ?>>
		
			<header>
			<?php /* if its a single page, it doesn't need a link. */
				if ( is_singular() ) : ?>
				
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
			<?php else : ?>
			
				<h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				
			<?php endif; ?>
				
				
			<?php /* pages don't need meta data */
				if ( !is_page() ) : ?>
				
				<div class="meta">
					<p class="time"><?php the_time( get_option('date_format') ); ?></p>
					<?php if( get_comments_number() != 0 ) : ?>
			        <p class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?></p>
					<?php endif; ?>
					<?php if( has_category() ) : ?>
					<p class="category"><?php the_category(', ') ?></p>
					<?php endif; ?>
				</div><!-- meta -->
				
			<?php endif; ?>
			</header>
			
			<div class="entry-content"><?php the_content(); ?></div><!-- entry-content -->
			
		</article><!-- post -->

		<?php /* end the Loop */ ?>
		<?php endwhile; endif; ?>

		<nav><?php posts_nav_link(); ?></nav>

	</div><!-- primary -->
	
	<div class="secondary">
		
		<?php get_sidebar(); ?>
		
	</div><!-- secondary -->

</div><!-- row -->
		


<?php if ( is_single() && comments_open() ) : ?> 
<div id="comments-wrap">		
<div class="row">
	<?php comments_template(); ?>
</div><!-- row -->
</div><!-- comments-wrap -->
<?php endif; ?>



<?php get_footer(); ?>