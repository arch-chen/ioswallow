<?php 
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-24 17:01:02
 * @FilePath: /ioswallow/author.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); 
?>
<div id="thumbnail_canvas" class="author-thumbnail-pass wow fadeIn" data-wow-duration="1s"  data-wow-delay="0.5s" style="background-image:url('<?php echo io_get_option('author_info_img') ?>');">
<canvas id="header_canvas"style="position:absolute;bottom:0"></canvas>
</div>
<main id="content" class="container custom-width"> 
            <?php get_template_part('templates/author', 'info') ?>
			<div class="mt-5">  </div>
			<div class="ioc_cat_list archive-list">
				<?php 
				if ( have_posts() ) : while (have_posts()):
					the_post();
					io_get_archive_list();
				endwhile; endif;
				?>
			</div>
			<?php //io_page_nav()?> 
</main>
<?php io_post_archive_nav() ?>
<?php get_footer(); ?>