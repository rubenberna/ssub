<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package stframework
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="mb-comment-post blog-comment-detail">
    <?php if ( have_comments() ) : ?>
        <h2 class="title18 text-uppercase font-bold">
            <?php
            printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'shb' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-above" class="comment-navigation" >
                <h2 class="title18 text-uppercase font-bold"><?php esc_html_e( 'Comment navigation', 'shb' ); ?></h2>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'shb' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'shb' ) ); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>
        <?php
        wp_list_comments( array(
            'walker' => new s7upf_Comment_Walker,
            'callback' => null,
            'end-callback' => null,
            'type' => 'all',
            'page' => null,
            'avatar_size' => 70
        ) );
        ?>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="comment-navigation" >
                <h2 class="title18 text-uppercase font-bold"><?php esc_html_e( 'Comment navigation', 'shb' ); ?></h2>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'shb' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'shb' ) ); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'shb' ); ?></p>
    <?php endif; ?>
</div><!-- #comments -->
<?php
$commenter = wp_get_current_commenter();
$comment_form = array(
    'title_reply'          => have_comments() ? esc_html__( 'LEAVE A COMMENT', 'shb' ) : esc_html__( 'Be the first to comment', 'shb' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'shb' ),

    'fields'               => array(
        'author' => '<p class="contact-name"><input class="border" id="author"  name="author" type="text" placeholder="'.esc_html__('User name*','shb').'" value="' . esc_attr( $commenter['comment_author'] ) . '"  aria-required="true" /></p>',
        'email'  => '<p class="contact-mail"><input class="border" id="email" name="email" type="text"  placeholder="'.esc_html__('Email*','shb').'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-required="true" /></p>',
    ),
    'label_submit'  => esc_html__( 'Post Comment', 'shb' ),
    'logged_in_as'  => '',
    'comment_field' => '<p class="contact-message"><textarea id="comment-textarea" name="comment"  placeholder="'.esc_html__('Your comment*','shb').'"  class="border" cols="30" rows="10"></textarea></p>',
    'title_reply_before' => '<h2 class="title18 text-uppercase  font-bold title-reply-comment">',
    'title_reply_after' => '</h2>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'class_form' => 'contact-form',
    'class_submit' => 'shop-button'
);
?>
<div class="reply-comment">
    <?php comment_form( apply_filters( 'comment_form_default_fields', $comment_form ) ); ?>
</div>
