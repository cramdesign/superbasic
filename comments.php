<?php

/*
 * This function creates the actual comment 
 */
 
function superbasic_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	// Display trackbacks differently than normal comments.
	switch ( $comment->comment_type ) :


	// pingback or trackback
	case 'pingback' :
	case 'trackback' :
	?>
	
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			
			
	// normal comments
	default :
	global $post;
	?>
	
	<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>	
		<article id="comment-<?php comment_ID(); ?>" class="comment row">
		
			<section class="comment-content comment primary">
			
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation">Your comment is awaiting moderation.</p>
				<?php endif; ?>

				<?php comment_text(); ?>
				
			</section><!-- .comment-content -->


			<header class="comment-author vcard secondary">
				
				<figure><?php echo get_avatar( $comment, 60 ); ?></figure>
				
				<div class="meta comment-meta">

					<p class="name"><?php 
					
						printf( '<b class="fn">%1$s</b> %2$s', get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>Post author</span>' : '' );
						
					?></p>

					<p class="time"><?php
						
						printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() ) );
						
					?></p>

					<p class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</p>
					
					<?php edit_comment_link( 'Edit', '<p class="edit-link">', '</p>' ); ?>
				
				</div><!-- meta -->
			</header><!-- comment-author -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}



/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) return;


?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentytwelve' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'superbasic_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading">Comment navigation</h1>
			<div class="nav-previous">&larr; Older Comments</div>
			<div class="nav-next">Newer Comments &rarr;</div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments">Comments are closed.</p>
		<?php endif; ?>

	<?php endif; // end if have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->

