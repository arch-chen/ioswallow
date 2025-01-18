<?php
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-27 18:57:46
 * @FilePath: \ioswallow\single-shuoshuo.php
 * @Description: 
 */ 
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php get_header(); ?>
			
			<?php get_post_banner() ?>
			<?php //get_breadcrumbs();?>
			<?php while( have_posts() ): the_post(); ?>
			<article class="post hentry position-relative">
				<?php 
				ob_start();
				the_content();
				$content = ob_get_contents();
				ob_end_clean();
				global $post_summary;
				$post_summary = mb_strimwidth(strip_tags($content), 0, 200,"……"); 
				?>
				<!-- 竖分享 -->
				<?php if(!wp_is_mobile()) get_template_part( 'templates/share','vertical' ); ?>
				<!-- 竖分享end -->
				<div class="entry-content wow fadeIn" data-wow-duration="1s"  data-wow-delay="1s">
					<?php if(io_get_option('ad_s_title')) { ?>
					<div class="post-ad"><?php echo stripslashes( io_get_option('ad_s_title_c') ); ?></div>
					<?php } ?>
					<?php echo $content;
					iowen_link_pages('before=<div class="nav-links">&after=&next_or_number=next&previouspagelink=<i class="iconfont icon-arrow-left"></i>&nextpagelink=');  iowen_link_pages('before=&after='); iowen_link_pages('before=&after=</div>&next_or_number=next&previouspagelink=&nextpagelink=<i class="iconfont icon-arrow-right"></i>');
					?>
					<?php if (io_get_option('baidu_xzh') && io_get_option('xzh_gz')) { ?>
					<script>cambrian.render('tail')</script>
					<?php } ?>
					<?php if(io_get_option('reward_switcher')){ ?>
					<a class="post-reward_btn" href="javascript:void(0);" id="reward_btn"><i class="iconfont icon-candy"></i></a>
					<?php } ?>
				</div> 
				<!-- 分享 -->
				<?php get_template_part( 'templates/share'); ?>
				<!-- 分享end -->
				<?php if(io_get_option('ad_s_b')) { ?>
				<div class="post-ad"><?php echo stripslashes( io_get_option('ad_s_b_c') ); ?></div>
				<?php } ?>
			</article>
			<?php endwhile; ?>
			<!-- 上下篇导航 -->
			<?php get_template_part( 'templates/near','navigation') ?>
			<!-- 上下篇导航end -->
			<?php if(io_get_option('ad_c')) { ?>
			<div class="post-ad mt-5"><?php echo stripslashes( io_get_option('ad_c_c') ); ?></div>
			<?php } ?>
			<?php if(io_get_option('comment_switcher',true)) comments_template( '', true ); ?>
</main>

<?php get_footer();?>
