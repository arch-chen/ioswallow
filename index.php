<?php 
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-07 09:13:33
 * @FilePath: /ioswallow/index.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>
<main class="container custom-width">
	<div class="page type-page status-publish hentry">
		<div class="entry-content">
			<?php 
			if (io_get_option('index_banner')) {
				get_template_part('templates/slider');
			}
			if (io_get_option('home_top')) {
				get_template_part('templates/cms', 'top');
			}
			$list_type = io_get_option('home_list_region','6');
			io_post_list_html($list_type);
			//get_template_part('templates/index-list/list', $list_type);
			?>
		</div>
	</div>
	<?php if(io_get_option('links')) : ?>
	<div class="friendlink text-xs bg-light rounded p-4 wow flipInX" data-wow-delay="0.3s">
		<div class="text-md mb-2"><i class="text-lg pr-2 iconfont icon-tag"></i><?php _e('友情链接','i_theme') ?></div>
			<?php wp_list_bookmarks('title_li=&before=&after=&categorize=0&show_images=0&orderby=rating&order=DESC&category='.get_option('link_f_cat')); ?>
			<a href="<?php echo get_permalink(io_get_option('links_pages')) ?>" target="_blank" title="<?php _e('更多链接','i_theme') ?>"><?php _e('更多链接','i_theme') ?><i class="icon-li"></i></a>
	</div> 
	<?php endif; ?>    			
</main>
<?php get_footer();?>
