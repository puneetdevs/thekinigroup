<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Pofo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
$pofo_post_layout_style = pofo_option( 'pofo_post_layout_style', 'post-layout-style-1' );
$pofo_comment_title_class = ( $pofo_post_layout_style == 'post-layout-style-2' || $pofo_post_layout_style == 'post-layout-style-3' ) ? ' margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom' : ' margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb';
?>

	<?php if ( have_comments() ) : ?>
		<div id="comments" class="col-md-12 col-sm-12 col-xs-12">
			<div class="width-100 margin-lr-auto text-center<?php echo esc_attr($pofo_comment_title_class) ?>">
				<div class="position-relative overflow-hidden width-100">
					<span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray comment-title"><?php echo comments_number(); ?></span>
				</div>
			</div>

			<?php the_comments_navigation(); ?>
			<ul class="blog-comment">
			<?php
				wp_list_comments( array(
					'style'       => 'li',
					'short_ping'  => true,
					'avatar_size' => 400,
					'callback' 	  => 'pofo_comment_callback',
				) );
			?>
			</ul>

			<?php the_comments_navigation(); ?>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top">
            <div class="divider-full bg-medium-light-gray"></div>
        </div>
	<?php endif; // Check for have_comments(). ?>

	
	<div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr border-top-mid-gray">
	<?php
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$args = array();
		$args = wp_parse_args( $args );
		if ( ! isset( $args['format'] ) )
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		$req      = get_option( 'require_name_email' );
		$aria_req = '';
		$html_req = '';
		$html5    = 'html5' === $args['format'];
		$fields   =  array(
			'author' => '<div class="col-md-4 col-sm-12 col-xs-12"><input id="author" placeholder="'.esc_html__( 'Name *', 'pofo' ).'" class="input-field medium-input comment-fields" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . $html_req . ' /></div>',
			'email'  => '<div class="col-md-4 col-sm-12 col-xs-12"><input id="email" placeholder="'.esc_html__( 'Email *', 'pofo' ).'" class="input-field medium-input comment-fields" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . $html_req  . ' /></div>',
			'url'    => '<div class="col-md-4 col-sm-12 col-xs-12"><input id="url" placeholder="'.esc_html__( 'Website', 'pofo' ).'" class="input-field medium-input comment-fields" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
		);
		$fields = apply_filters( 'comment_form_default_fields', $fields );
		comment_form( array(
			'fields'               => $fields,
			'comment_field'        => '<div class="col-md-12 col-sm-12 col-xs-12"><textarea id="comment" placeholder="'.esc_html__( 'Enter your comment here...', 'pofo' ).'" rows="8" class="input-field medium-input comment-fields" name="comment" required="required"></textarea></div>',
			'title_reply_before'   => '<div class="width-100 padding-15px-lr margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb"><div class="position-relative overflow-hidden width-100"><span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray comment-title">',
			'title_reply_after'    => '</span></div></div>',
			'class_form'           => 'comment-form blog-comment-form',
			'title_reply'          => esc_html__( 'Write a comment', 'pofo' ),
		  	'title_reply_to'       => esc_html__( 'Write a comment to %s', 'pofo' ),
		  	'cancel_reply_link'    => esc_html__( 'Cancel Comment', 'pofo' ),
		  	'label_submit'         => esc_html__( 'Post Comment', 'pofo' ),
		  	'comment_notes_before' => '',
		  	'comment_notes_after'  => '',
		  	'class_submit'         => 'btn btn-dark-gray btn-small margin-15px-top pofo-comment-button',
		  	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="col-md-12 col-sm-12 col-xs-12 text-center form-submit">%1$s %2$s</div>',
			'logged_in_as'         => '<p class="logged-in-as col-md-12">'.
									  sprintf('<a href="%1$s" aria-label="%2$s">%3$s</a>. <a href="%4$s">%5$s</a>',
		                              get_edit_user_link(),
		                              esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'pofo' ), $user_identity ) ),
		                              esc_attr( sprintf( __( 'Logged in as %s', 'pofo' ), $user_identity ) ) ,
		                              wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ),
		                              sprintf( esc_html__( 'Log Out?', 'pofo' ) )
		                          ) . '</p>',
		) );
	?>
</div>