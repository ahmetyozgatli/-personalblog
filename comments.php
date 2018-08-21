<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<div class="yorumkacust"><?php comments_number(__('Yorum bulunmamakta.'), __('1 Yorum'), __('% Yorum')); ?>
<?php if ( comments_open() ) : ?>
	<a href="#postcomment" title="<?php _e("Siz değerli okuyucu, içinizden geçenleri biz de öğrenebilir miyiz?"); ?>">&raquo;</a>
<?php endif; ?>
</div>

<?php if ( have_comments() ) : ?>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
<div class="yorumcu"><cite><?php comment_author_link() ?> - <?php comment_date() ?> </cite> </div>
	<?php comment_text() ?>
	
	</li>

<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>
	
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div class="yorumkac"><?php _e('Herhangibir yorumda bulunmak ister misiniz?'); ?></div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() ) );?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('%s olarak giriş yapılmış.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<p><input onclick="if(this.value=='İsim')this.value='';" onblur="if(this.value=='')this.value='İsim';" type="text" name="author" id="author" value="<?php if (esc_attr($comment_author)=="") { echo "İsim";} else { echo esc_attr($comment_author); } ?>" size="22" tabindex="1" />
&nbsp;
<input onclick="if(this.value=='E-posta')this.value='';" onblur="if(this.value=='')this.value='E-posta';" type="text" name="email" id="email" value="<?php if (esc_attr($comment_author_email)=="") { echo "E-posta";} else { echo esc_attr($comment_author_email); } ?>" size="22" tabindex="2" />
</p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input style="width:100px;float:right;" name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Gönder'); ?>" />
<div class="persil"></div>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
<div class="temizle"></div>
<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>
