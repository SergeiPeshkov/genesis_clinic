<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>	
	
<?php foreach ($comments as $comment) : ?>

                        <!-- .comment -->
                        <div class="comment">
                            <div class="comment-user-img">
                                <?php if (is_doctor($comment->user_id)) { ?>
                                    <?=get_the_doctor_avatar($comment->user_id)?>
                                <?php } else { ?>
                                    <?=get_avatar($comment, 58)?>
                                <?php } ?>
                            </div>
                            <div class="comment-text">
                                <div class="comment-panel">
                                    <span class="name"><?php if (is_doctor($comment->user_id)) { echo comment_author_d($comment->user_id); } else { comment_author(); } ?></span>
                                    <span class="date"><?php comment_date('j M, H:i'); ?></span>
                                </div>
                                <?php comment_text(); ?>
                            </div>
                        </div>
                        <!-- /.comment -->

<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>

<?php endforeach; /* end for each comment */ ?>	

<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
<p class="nocomments">Комментарии закрыты.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

	// ....

<?php else : ?>

<div class="b-form">
                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                    		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                            <h2>Добавить комментарий</h2>
<?php if ( $user_ID ) : ?>

<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Выйти &raquo;</a></p>

<?php else : ?>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input name="author" value="<?php echo $comment_author; ?>" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
                                        <input name="email" value="<?php echo $comment_author_email; ?>"  class="form-text">
                                    </div>
                                </div>
                            </div>

<?php endif; ?>

                            <div class="form-item">
                                <label>Текст</label>
                                <div class="controls">
                                    <textarea cols="30"  name="comment"  rows="10"></textarea>
                                    <label><input type="checkbox" name="comment_agree" checked="checked">Я даю согласие на обработку и публикацию моих персональных данных</label>
                                    <br><?php show_subscription_checkbox(); ?>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>&nbsp;</label>
                                <div class="controls">
                                    <button type="submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>


<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>