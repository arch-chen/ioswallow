<?php
/*
 * @Template Name: 网站地图
 * 
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-24 15:15:49
 * @FilePath: \ioswallow\template-sitemap.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title><?php _e('博客地图','i_theme') ?>|<?php bloginfo('name'); ?></title>
	<meta name="keywords" content="SiteMap,<?php bloginfo('name'); ?>,网站地图" />
	<meta name="generator" content="<?php bloginfo('name'); ?> SiteMap Generator" />
	<meta name="copyright" content="<?php bloginfo('name'); echo get_home_url();?>" />
	<link rel="canonical" href="<?php echo get_permalink();?>" />
	<style type="text/css">
		@charset "utf-8";
		html,body,header,section,nav,h3 {margin: 0;padding: 0;border: 0;background: transparent;}
		.sitemap {font-family: Verdana;margin: 0;color: #555555;background: #f8f8f8;}
		img {border:0;}
		body {background-color: #fff;font: 13px Verdana, 微软雅黑, Geneva, sans-serif;overflow-x: hidden;overflow-y: scroll;line-height: 24px;color: #666;}
		a{color: #888888}
		a,a:hover {text-decoration: none;}
		a:visited{color: #da682f;}
		a:hover,a:active{color: #000000}
		.sitemap h3 {margin-bottom: 12px;border-bottom: 1px #eee solid;padding-bottom: 12px;font-weight: unset;font-size: 16px;}
		li {margin-top: 8px;line-height: 16px;}
		.page {padding: 4px; border-top: 1px #EEEEEE solid}
		.author {background-color:#EEEEFF; padding: 6px; border-top: 1px #ddddee solid}
		.sitemap >header, .sitemap >nav,.sitemap >section, .sitemap >footer{padding: 15px; border: 1px solid #EEEEEE; background: #ffffff;clear: both; width: 92%; margin: 15px auto;}
		footer {text-align: center;line-height: 28px;}
		.tag{line-height: 28px;text-align: justify;}
		.tag a{display: inline-block; margin: 0 4px;}
		@media only screen and (max-width: 480px) {ul,ul .children {padding: 0 0 0 20px;}.sitemap > header, .sitemap > nav,.sitemap > section,.sitemap > footer {padding: 12px 8px;}.sitemap time{display: none;}}
	</style>
</head>
<body class="sitemap">
	<header>
		<h1 style="text-align: center; margin-top: 20px"><?php printf(__('%s的博客地图','i_theme'),get_bloginfo('name')) ?></h1>
	</header>
	<nav><?php _e('您的位置','i_theme') ?> &raquo; <a href="<?php home_url() ?>/"><?php bloginfo('name'); ?></a> &raquo; <a href="<?php echo get_permalink(); ?>"><?php _e('博客地图','i_theme') ?></a></nav>
  	<!--最新文章-->
	<section>
		<h3><?php echo io_get_option('index_new_title', '最新文章') ?></h3>
		<ul>
			<?php
			$previous_year = $year = 0;
			$previous_month = $month = 0;
			$ul_open = false;
			$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
			foreach($myposts as $post) :
			?>
			<li><time><?php the_time( 'Y/m/d') ?>: </time><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</section>
  	<!--分类目录-->
	<section>
		<h3><?php _e('分类目录','i_theme') ?></h3>
		<ul>
		<?php wp_list_categories('title_li='); ?>
		</ul>
	</section>
	<!--单页面-->
	<section>
		<h3><?php _e('单页面','i_theme') ?></h3>
		<?php @wp_page_menu( $args ); ?>
	</section> 
	<?php $post_args=@array( 'order'=> 'DESC', 'taxonomy' => 'post_tag', 'orderby' => 'count', 'number' => $sitemap_tag_count ); $post_tags_list = get_terms($post_args); if ($post_tags_list) { ?>
	<!--文章标签-->
	<section>
		<h3><?php _e('文章标签','i_theme') ?></h3>
		<div class="tag">
		<?php foreach($post_tags_list as $tag) { ?>
			<a href="<?php echo get_tag_link($tag); ?>" title="<?php printf( __( '标签 %s 下有 %s 篇文章' , 'i_theme' ), esc_attr($tag->name), esc_attr($tag->count) ); ?>" target="_blank">
			<?php echo $tag->name; ?><span>(<?php echo $tag->count; ?>)</span></a>
		<?php } ?>
		</div>
	</section>
	<?php }?>
	<footer>
		<?php _e('查看博客首页：','i_theme') ?><strong><a href="<?php home_url() ?>/"><?php bloginfo('name'); ?></a></strong><br />
		<?php _e('最后更新：','i_theme') ?><?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-m-d G:i:s', strtotime($last[0]->MAX_m));echo $last; ?><br />
		<a href="<?php home_url()?>/sitemap.xml" target="_blank">XML SiteMap</a>&nbsp;
		&copy; <?php echo date('Y'); ?> <a href="<?php home_url() ?>/" style="cursor:help"><?php bloginfo('name');?></a> <?php _e('版权所有','i_theme') ?>
	</footer>
</body>
</html>