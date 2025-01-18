<?php 
/*
 * @Template Name: 微语
 * 
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-24 17:01:51
 * @FilePath: /ioswallow/template-shuoshuo.php
 * @Description: 
 */
?>
<?php get_header(); ?>
<style type="text/css">  
	.shuo_content .shuo-title{margin-bottom: 33px;} 
	.shuo_content .shuo_tmlabel > .shuoshuo_meta{margin-bottom: 0;font-size: 12px;}
	.shuo_content article .shuo-body{margin-left: 60px;}
	.shuo_content article .shuo_tmlabel{background: #ff4949;background: -webkit-gradient(linear, left top, right top, from(#ff4949), to(#ff49cd));background: -webkit-linear-gradient(left, #ff4949, #ff49cd);background: linear-gradient(90deg, #ff4949, #ff49cd);color: #fff;padding: .8em 1.2em .4em 1.2em; font-weight: 300;line-height: 1.4;position: relative;border-radius: 10px;transition: all 0.3s ease 0s; display: block;}
	.shuo_content .shuo_tmlabel a,.ioc-dark-mode .shuo_content .shuo_tmlabel >a{color: #ffffff!important; }
	.shuo_content .shuo_tmlabel p{color: #ffffff!important; }
	.shuo_content .shuo_tmlabel img {max-width: 100%;height: auto;} 
	.shuo_content .shuo_tmlabel a:hover ,.shuo_content .shuo_tmlabel a:hover p{color: #fffa33!important; -webkit-text-shadow: 0px 0px 10px #fffa33;text-shadow: 0px 0px 10px #fffa33;}
	.shuo_content article .shuo_tmlabel:hover{transform: translateY(-3px);transform: translateX(3px);z-index: 1;-webkit-box-shadow: 0 15px 32px rgba(255, 73, 73, 0.5);box-shadow: 0 15px 32px rgba(255, 73, 73, 0.5)}
	.shuo_content article:nth-child(odd) .shuo_tmlabel{background: #a47dd6;background: -webkit-gradient(linear, left top, right top, from(#a47dd6), to(#c57cd6));background: -webkit-linear-gradient(left, #a47dd6, #c57cd6);background: linear-gradient(90deg, #a47dd6, #c57cd6)}
	.shuo_content article:nth-child(odd) .shuo_tmlabel:hover{-webkit-box-shadow: 0 15px 32px rgba(164, 125, 214, 0.5);box-shadow: 0 15px 32px rgba(164, 125, 214, 0.5)}
	.shuo_content article .shuo_tmlabel:after{right: 100%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;border-right-color: #ff4949;border-width: 8px;top: 8px;}
	.shuo_content article:nth-child(odd) .shuo_tmlabel:after{border-right-color: #a47dd6;}
	.shuo_content .shuoshuo_meta{margin-top: 10px;border-top: 1px dashed #fff;padding-top: 5px;} 
	.shuo_content .shuoshuo_author_img{float: left;margin-top: 16px;}
	.shuo_content .shuoshuo_author_img img{border: 1px solid rgba(136, 136, 136, 0.5);padding: 2px;border-radius: 64px;transition: all 1.0s;} 
	.shuo_content .avatar{-webkit-border-radius: 100% !important;-moz-border-radius: 100% !important;-webkit-transition: 0.4s;-webkit-transition: -webkit-transform 0.4s ease-out;transition: transform 0.4s ease-out;-moz-transition: -moz-transform 0.4s ease-out;}
	.shuo_content article:hover .avatar{transform: rotateZ(720deg);-webkit-transform: rotateZ(720deg);-moz-transform: rotateZ(720deg);} 
	.shuo_content .ss-comment,.shuo_content .ss-favorite{float: right;}   
	.shuo_content .ss-comment .count{margin-left: 3px; }
	.shuo_content .ss-favorite .count{margin-left: 10px; }
	.shuo_content .ss-time{}
	@media screen and (max-width: 991px){
		.shuo_content .shuo-title h1 {
			font-size: 30px;
	}}
	@media screen and (max-width: 767.98px){
		.shuoshuo_author_img img{width: 36px;height: 36px;}
		.shuo_content .shuoshuo_author_img{margin-top: 19px;}
		.shuo_content article .shuo-body {
			margin-left: 46px;
	}}
</style> 

<?php
$post_id = get_the_ID();
$author_id = get_post_field ('post_author', $post_id );
$user = get_userdata($author_id);
//$user  = wp_get_current_user();
//if(!$user->ID) {
//    $user = get_userdata(1);
//}
$title = sprintf(__('%s已经发表了 %s 条微语','i_theme'),$user->nickname,count_user_posts($author_id, 'shuoshuo', true));
io_page_head_html( $title) ?>
	<div id="content" class='shuo_content'>
		<div class="ioc_cat_list">
			<?php  
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type' => 'shuoshuo',
				'orderby'   => 'date',
				'paged' 	=> $paged
			);
			$the_query = new WP_Query( $args );  
			if ( $the_query ->have_posts() ) : 
			while ( $the_query ->have_posts() ) : $the_query ->the_post(); 
			?>
			<article class="mb-4 mb-md-5 load-posts wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s">
				<div class="shuoshuo_author_img"><?php echo get_avatar(get_the_author_meta('email'), 48) ?></div> 
				<div class="shuo-body">
					<div class="ss-time text-xs text-muted mb-1 mb-md-2"><i class="iconfont icon-time"></i> <?php the_time('Y/n/j G:i'); ?></div>
					<div class="shuo_tmlabel" >
						<?php  the_content() ?>
						<div class="shuoshuo_meta">
							<a href="<?php the_permalink() ?>"><i class="iconfont icon-yinhao"></i> <?php _e('查看原文','i_theme')?></a>
							<?php if (io_get_option('comment_switcher', true)) { ?>
							<a class="ss-comment"  href="<?php the_permalink() ?>#respond"><i class="iconfont icon-news"></i><span class="count"><?php echo get_post()->comment_count; ?> <?php _e('吐槽', 'i_theme') ?></span></a>
							<span style="float: right;padding: 0  10px;color: #fff;">|</span>
							<?php } ?>
							<?php iowen_like_button_shoushou($post->ID) ?>
						</div>
					</div>
				</div>
			</article>
			<?php endwhile;endif; wp_reset_postdata();?>
		</div>
		<?php //io_page_nav($the_query ->max_num_pages)?>
	</div>  
</main> 
<?php io_post_archive_nav($the_query ->max_num_pages) ?>
<?php get_footer();?>