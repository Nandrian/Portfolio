<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    
    <ul class="single-comment ">
			<?php wp_list_comments('callback=talos_theme_comment'); ?>
		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<nav class="navigation comment-navigation" role="navigation">		   
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'talos' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'talos' ) ); ?></div>
                <div class="clearfix"></div>
			</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'talos' ); ?></p>
		<?php endif; ?>	
    </ul>
    		
<?php endif; ?>		

<div class="comments" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => '',                                
                'title_reply'=> ''.__('','talos'),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<p><input id="author" name="author" id="name" type="text" value="" placeholder="'. esc_html__( 'Name *', 'talos' ) .'" /></p>',
                    'email' => '<p><input value="" id="email" name="email" type="text" placeholder="'. esc_html__( 'Email *', 'talos' ) .'" /></p>', 
                ) ),                                
                 'comment_field' => '<p><textarea name="comment"'.$aria_req.' id="comment" placeholder="'. esc_html__( 'Comment *', 'talos' ) .'" ></textarea></p>',                                                   
                 'label_submit' => esc_html__( 'submit', 'talos' ),
                 'class_submit' =>  'button-contact send_message button-effect button--moema button--text-thick button--text-upper button--size-s',
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',               
        )
    ?>
    <?php comment_form($comment_args); ?>
</div><!-- //LEAVE A COMMENT -->
                