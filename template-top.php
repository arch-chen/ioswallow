<?php
/*
 * @Template Name: 推荐文章
 * 
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-24 17:02:02
 * @FilePath: /ioswallow/template-top.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>
<?php io_page_head_html() ?>
	<div id="content">
		<div class="ioc_cat_list">
			<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$args = array(
					//'meta_key' => '_cms_top',
					'meta_query' => array(
						array(
							'key' => '_cms_top',  
							'value' => '',  
							'compare' => '!='
						)
					),
					'orderby'   => 'date',
					'paged' => $paged
				); 
			$the_query = new WP_Query( $args );  
			if ( !$the_query ->have_posts() ) : ?> 
			<div class="text-center py-5"> 
				<div class="nothing"> </div>
				<p><?php _e('没有推荐内容，请到文章开启推荐选项','i_theme'); ?></p>
			</div>
			<?php elseif ( $the_query ->have_posts() ) : ?>
			<?php while ( $the_query ->have_posts() ) : $the_query ->the_post(); ?>
			<article class="blog-post row load-posts wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s">
				<div class="blog-post-thumbnail-zone col-12 col-lg-4 col-md-4">
					<a href="<?php the_permalink(); ?>">
						<?php  echo io_get_thumbnail('medium','blog-post-thumbnail') ?>
					</a>
				</div>
				<div class="blog-post-text-zone col-12 col-lg-8 col-md-8">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="meta">
						<?php io_entry_meta(true) ?>
					</div>
					<p>
					<?php echo io_strimwidth($post, 170) ?>
					</p>
				</div>
			</article>
			<?php endwhile; endif; wp_reset_postdata();?>
		</div>
		<?php //io_page_nav($the_query ->max_num_pages)?>
	</div>
</main>
<?php io_post_archive_nav($the_query ->max_num_pages) ?>
<?php get_footer(); ?>