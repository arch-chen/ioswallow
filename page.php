<?php 
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-02-29 15:06:37
 * @FilePath: /ioswallow/page.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();?>
<?php io_page_head_html() ?>
			<article class="type-post post wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s">
				<div class="entry-wrapper">
					<div class="entry-content u-clearfix">
					<?php while( have_posts() ): the_post(); ?>
						<?php the_content();?>
					<?php edit_post_link(__('编辑','i_theme'), '<span class="edit-link">', '</span>' ); ?>
					<?php endwhile; ?>
					</div>
				</div>
			</article>
			<?php if(io_get_option('comment_switcher',true)) comments_template( '', true ); ?>
</main>
<?php get_footer();?>