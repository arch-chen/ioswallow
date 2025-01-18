<?php 
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-07 09:12:21
 * @FilePath: /ioswallow/404.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<main class="py-4 py-md-5">
	<div class="container custom-width">
		<section class="data-null text-center">
			<h1 style="font-size: 6rem;padding: 0;">404</h1>
			<p><?php _e('抱歉，没有你要找的内容...','i_theme') ?></p>
			<div class="single-content">
			<?php 
			$args = array(
				'class'  => 'text-left',
				'show_posts' => true,
			);
			echo io_search_body_html($args) 
			?>
			</div> 
			<div class="pt-5">
				<a class="btn vc-theme px-5 py-2 rounded-pill btn-shadow" href="<?php bloginfo('url'); ?>"><?php _e('返回首页','i_theme') ?></a>
			</div>
		</section>
	</div>
</main>
<?php get_footer(); ?>
