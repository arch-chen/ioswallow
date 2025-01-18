<?php
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-27 18:59:25
 * @FilePath: \ioswallow\single.php
 * @Description: 
 */ 
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php get_header(); ?>
			<?php get_post_banner() ?>
			<?php //get_breadcrumbs();?>
			<?php while( have_posts() ): the_post(); ?>
			<article class="post hentry position-relative">
				<?php 
				global $post_summary;
				$post_summary = io_get_excerpt(160); 
				?>
				<!-- 竖分享 -->
				<?php if(!wp_is_mobile()) get_template_part( 'templates/share','vertical' );?>
				<!-- 竖分享end -->
				<?php if(io_get_option('post_menu')): ?>
				<!-- 文章目录 -->
				<div class="small-menu d-none d-lg-block wow fadeInRight" data-wow-duration="1s"  data-wow-delay="0.8s"  >
					<div class="theiaStickySidebar">
						<div class="small-menu-body">
							<h2 class="small-title mb-0"><i class="iconfont icon-eercast"></i><?php _e('文章目录','i_theme') ?></h2>
							<ul id="small-menu-ul">
							</ul>
						</div>
					</div>
				</div>
				<!-- 文章目录end -->
				<?php endif; ?>
				<div class="entry-content wow fadeIn" data-wow-duration="1s"  data-wow-delay="1s">
					<?php if(io_get_option('ad_s_title')) { ?>
					<div class="post-ad"><?php echo stripslashes( io_get_option('ad_s_title_c') ); ?></div>
					<?php } ?>
					<?php 
					the_content();
					iowen_link_pages('before=<div class="nav-links">&after=&next_or_number=next&previouspagelink=<i class="iconfont icon-arrow-left"></i>&nextpagelink=');  iowen_link_pages('before=&after='); iowen_link_pages('before=&after=</div>&next_or_number=next&previouspagelink=&nextpagelink=<i class="iconfont icon-arrow-right"></i>');
					?>
					<div class="tags">
						<?php //the_tags('<span class="color-'.mt_rand(0, 8).'">', '</span> <span class="color-'.mt_rand(0, 8).'">', '</span>'); ?>
						<?php
							$post_tags = get_the_tags();
							if ($post_tags) {
								echo '<i class="iconfont icon-tags"></i>';
								foreach($post_tags as $tag) {
									echo '<a href="'.get_tag_link($tag->term_id).'" rel="tag" class="tag-' . $tag->slug . ' color-'.mt_rand(0, 8).'">' . $tag->name . '</a>';
								}
							}
						?>
					</div>
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
			
			<!-- 作者版权 -->
			<?php if(io_get_option('copyright_show')) get_template_part( 'templates/copyright'); ?>
			<!-- 作者版权end -->
			<?php endwhile; ?>
			<!-- 相关文章 -->
			<?php if(io_get_option('you_like')) get_template_part( 'templates/related'); ?>
			<!-- 相关文章end -->
			<!-- 上下篇导航 -->
			<?php get_template_part( 'templates/near','navigation') ?>
			<!-- 上下篇导航end -->
			<?php if(io_get_option('ad_c')) { ?>
			<div class="post-ad mt-5"><?php echo stripslashes( io_get_option('ad_c_c') ); ?></div>
			<?php } ?>
			<?php if(io_get_option('comment_switcher',true)) comments_template( '', true ); ?>
</main>
<?php get_footer();?>
