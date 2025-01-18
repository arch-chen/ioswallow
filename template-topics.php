<?php
/*
 * @Template Name: 专题模板
 * 
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-25 12:34:23
 * @FilePath: \ioswallow\template-topics.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php 
get_header(); 
io_page_head_html() 
?>	
			<?php if(io_get_option('topics_list')){ ?>
			<div class="row wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s"> 
			<?php $cat_ids = io_get_option('topics_list');
			foreach ($cat_ids as $cat_id ){
				echo '<div class="col-lg-6 pb-lg-5">';
					io_get_topics_box($cat_id);
				echo '</div>';
			} 
			?>
			</div>
			<?php }else{ ?>
			<p><?php _e('请到后台 “主题设置 > 基础设置 > 专题页显示内容” 设置内容','i_theme') ?></p>
			<?php } ?>
</main>

<?php get_footer(); ?>