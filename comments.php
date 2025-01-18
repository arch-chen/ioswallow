<?php
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-07 18:53:11
 * @FilePath: /ioswallow/comments.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( post_password_required() ) {
	return;
}
?>

	<section id="comments" class="comments wow fadeInUp" data-wow-delay="0.4s" >
		<div class="comments-main">
			<h3 id="comments-list-title"><i class="iconfont icon-news"></i><span class="noticom"><?php comments_popup_link(__('暂无评论','i_theme'), __('1 条评论','i_theme'), __('% 条评论','i_theme'),'comments-title'); ?> </span></h3>
			<?php if(comments_open() != false): ?>
			<div id="respond_box">
				<div id="respond" class="comment-respond">
					<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
					<p><?php printf(__('您必须%s[ 登录 ]%s才能发表留言！','i_theme'),'<a href="'. get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'"> ',' </a>') ?></p>
					<?php else : ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">	
						<?php if ( is_user_logged_in() ) : ?>
						<p class="loginby"><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('退出','i_theme') ?>">[ <?php _e( '退出','i_theme') ?> ]</a></p>
						<?php endif; ?>
						<?php if ( ! is_user_logged_in() ): ?>
						<div id="comment-author-info">			
								<input type="text" name="qq" id="qq" class="comment-text" value="" size="30" placeholder="<?php _e('输入QQ号码可以快速填写','i_theme') ?>"  tabindex="1"/>
								<input type="text" name="author" id="author" class="comment-text" value="<?php echo $comment_author; ?>" size="22" placeholder="<?php _e('昵称','i_theme') ?>" tabindex="2"/>	
								<input type="text" name="email" id="email" class="comment-text" value="<?php echo $comment_author_email; ?>" size="22" placeholder="<?php _e('邮箱','i_theme') ?>" tabindex="3" />
								<input type="text" name="url" id="url" class="comment-text" value="<?php echo $comment_author_url; ?>" size="22"placeholder="<?php _e('网址','i_theme') ?>"  tabindex="4" />
						</div>
						<?php endif; ?>
						<div class="clear"></div>
						<div class="comarea">
							<div class="visitor-avatar">
								<?php if ( is_user_logged_in() )://判断是否登录，获取admin头像 ?>
								<?php global $current_user;wp_get_current_user();
									echo get_avatar($current_user->user_email, 64,'',$current_user->display_name, array('class'=>'v-avatar'))
								?>
								<?php elseif($comment_author_email): ?>		
								<?php 
									echo get_avatar($comment_author_email, 64,'',$comment_author, array('class'=>'v-avatar'))
								?>
								<?php else: ?>
								<img class="v-avatar" src="<?php bloginfo('template_url'); ?>/images/gravatar.jpg">
								<?php endif; ?>
							</div>
							<textarea name="comment" id="comment" class="comment-text" placeholder="<?php _e('输入评论内容...','i_theme') ?>" tabindex="4" cols="50" rows="5"></textarea>
						</div>
						<div class="d-flex align-items-center mb-4">
						<?php if(io_get_option('ma_comment_unlock') && !is_user_logged_in()) { ?>
						<div class="comment-form-validate" data-balloon="<?php _e('滑动解锁后提交评论','i_theme') ?>" data-balloon-pos="right">
							<label class="ma-checkbox-label">
								<input class="ma-checkbox-radio" type="checkbox" name="no-robot">
								<span class="ma-no-robot-checkbox ma-checkbox-radioInput"></span>
							</label>				
						</div>
						<?php } ?>	
						<div id="io_emojis" class="comment_tags" title="<?php _e('表情','i_theme') ?>">
							<i class="iconfont icon-smile"></i>
							<div id="emojis_link" style="display: none;"> 
							<?php echo fa_get_wpsmiliestrans() ?>
							</div>
						</div>
						<?php if (io_get_option('comm-code', false)) { ?>
						<a href="javascript:;" class="com-btn" data-toggle="modal" data-target="#io-code-modal"><i class="iconfont icon-code"></i></a>
						<?php } ?>
						<?php if (io_get_option('comm-img', false) || io_get_option('comm-up-img', false)) { ?>
						<a href="javascript:;" class="com-btn" data-toggle="modal" data-target="#io-img-modal"><i class="iconfont icon-photo"></i></a>
						<?php } ?>
						<div class="com-footer ml-auto">
							<?php cancel_comment_reply_link(__('取消回复','i_theme')); ?>
							<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('发表评论','i_theme') ?>"/>
							<?php comment_id_fields(); ?>
						</div>
						</div>
						<?php do_action('comment_form', $post->ID); ?>
					</form>
					<div class="clear"></div>
				<?php endif; // If registration required and not logged in ?>
				</div>
			</div>	
			<?php else : ?>
			<div class="commclose wow flipInX" data-wow-duration="1s" data-wow-delay="0.6s"><?php _e('评论已关闭...','i_theme') ?></div>
			<?php endif; ?>
			<div id="loading-comments"><span></span></div>
			<?php if(have_comments()): ?>
			<ul class="commentwrap">
				<?php wp_list_comments('type=comment&callback=io_comment_format'); ?>
			</ul>
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comments-navi">
				<?php paginate_comments_links('prev_text=<&next_text=>');?>
			</nav>	
				<?php endif; ?>
			<?php else : ?>
			<div class="not-comment"><div class="nothing"></div><?php _e('暂无评论...','i_theme') ?></div>
			<?php endif; ?>		
		</div>
	</section>