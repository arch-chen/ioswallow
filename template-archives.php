<?php
/*
 * @Template Name: 文章归档
 * 
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-27 18:29:55
 * @FilePath: \ioswallow\template-archives.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>
<style type="text/css">
.web-font{font-style:normal;opacity:1;font-weight:bold;-webkit-font-smoothing: antialiased;-webkit-text-stroke-width: 0.2px;-moz-osx-font-smoothing: grayscale;transition: .2s;}
.archives-tags h3, .archives-content h3{padding-bottom: .625rem;font-size: 1.75rem;font-weight: 300;}
.archives-tags a {position: relative;display: inline-block;padding: .625rem .7rem;font-style: normal;line-height: 1rem;font-size: 1rem;border-radius: 1.125rem;transition: .5s all ease;-webkit-transition: .5s all ease;}
.archives-tags a:hover{background:rgba(150,150,150,.3)}
.mon {font-size: 40px;color:rgba(150,150,150,.2);border-radius: 5px;line-height: 40px; margin: 15px 0;cursor: pointer;background:rgba(150,150,150,.2);padding: 0 10px;display: block;transition: .3s all ease;-webkit-transition: .3s all ease;}
.tags,.mon_list{padding-bottom: 2.5rem}
.tags{text-align: justify}
.mon:hover{color: #fff;background:var(--theme-color);box-shadow: 0 15px 20px -8px var(--shadow-color);transform:translateY(-3px)}
.mon:hover .mon-num{color: #fff;}
.mon:hover .web-font{opacity:0.3}
.post_list a {position: relative;display: block;padding: .625rem;font-style: normal;line-height: 1.125rem;font-size: 1rem;border-radius: 0.25rem;transition: .5s all ease;-webkit-transition: .5s all ease;}
.post_list a:hover{background:rgba(150,150,150,.3)}
.post_list {color: #999;margin: 0 0 10px 0;}
.time {color: #888;padding-right: 0.625rem;}
.list{margin-bottom: .625rem;}
.mon-num {font-size: 16px;color: #999;margin: 0 0 0 10px;float: right;}
</style>
<?php
$last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");
$last = date('Y/n/j', strtotime($last[0]->MAX_m));
$second = __('站点统计：', 'i_theme') . sprintf(__('%s 个分类', 'i_theme'), wp_count_terms('category')).'&nbsp;&nbsp;
	'. sprintf(__('%s 个标签', 'i_theme'), wp_count_terms('post_tag')).'&nbsp;&nbsp;
	'. sprintf(__('%s 篇文章', 'i_theme'), wp_count_posts()->publish).'&nbsp;&nbsp;
	'. sprintf(__('%s 条留言', 'i_theme'), $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments")).'&nbsp;&nbsp;
	'. sprintf(__('浏览', 'i_theme'),author_posts_views()).'&nbsp;&nbsp;
	'.__('最后更新：', 'i_theme'). $last;
io_page_head_html(get_the_title(), $second);
?>	
				
				<?php $post_args=@array( 'order'=> 'DESC', 'taxonomy' => 'post_tag', 'orderby' => 'count' ); 
				$post_tags_list = get_terms($post_args); 
				if ($post_tags_list) { ?>
				<!--标签云-->
				<div class="archives-tags wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s">
					<div class="tags">
						<h3><?php _e('标签云', 'i_theme') ?></h3>
						<?php foreach($post_tags_list as $tag) { ?>
							<a href="<?php echo get_tag_link($tag); ?>" title="<?php printf( __( '标签 %s 下有 %s 篇文章' , 'i_theme' ), esc_attr($tag->name), esc_attr($tag->count) ); ?>" target="_blank">
						<?php echo $tag->name; ?><span>(<?php echo $tag->count; ?>)</span></a>
						<?php } ?>
					</div>
				</div>
				<?php }?>
				<div class="archives-content wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s"><?php IOTOOLS::ioArchivesList(); ?></div>
	</main><!-- .container -->



<script type="text/javascript">

$(document).ready(function(){
    (function(){
		$('#all_archives span.mon').each(function(){
			var num=$(this).next().children('div').length;
			var text=$(this).html();
			$(this).html(text+' <span class="mon-num">'+num+' <?php _e('篇','i_theme') ?></span>');
		});
		var $al_post_list=$('#all_archives .post_list'),
			$al_post_list_f=$('#all_archives .post_list:first');
		$al_post_list.hide(1,function(){
			$al_post_list_f.show();
		});
		$('#all_archives span.mon').click(function(){
			$(this).next().slideToggle(500);
			return false;
		});
    })();
 });
</script>

<?php get_footer(); ?>