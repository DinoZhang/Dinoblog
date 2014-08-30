<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
    <div class="liuy_1">
	    <h2 id="comments"><?php comments_number('目前还没有评论', '目前有 1 条评论', '目前有 % 条评论' );?></h2>
        <div class="liuy_2"><a href="#respond">发 布</a></div>
    </div>
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>你已经登录　　<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">点击退出</a></p>

		<?php else : ?>
            <p>你好！你目前的身份是游客，请输入昵称和电邮</p>
            
            
			<div class="lybd1">
               <div class="lybd1_1 lygg-bd">
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			   </div>

			   <div class="lybd1_2 lygg-bd">
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			   </div>

			   <div class="lybd1_3 lygg-bd">
				<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			   </div>
            </div>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<div class="lybd2">
            <div class="lybd2_1">
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		    </div>
            <div class="lybd2_2">
			<input name="submit" type="submit" id="submit" tabindex="5" value=" " />
			<?php comment_id_fields(); ?>
		    </div>
        </div>
		
		<?php do_action('comment_form', $post->ID); ?>
        <div style="font: 0px/0px sans-serif;clear: both;display: block"> </div>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
