<?php
/*
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-07 10:16:56
 * @FilePath: /ioswallow/footer.php
 * @Description: 
 */ 
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<footer class="container custom-width main-footer footer-stick">
	<div class="content my-5 mx-auto text-center">
		<?php if(io_get_option('ad_footer')) { ?>
		<div class="post-ad my-5"><?php echo stripslashes( io_get_option('ad_footer_c') ); ?></div>
		<?php } ?>
		<div class="mb-3">
		<?php echo io_get_menu_ico('footer') ?>
		</div>
		<?php io_footer_copyright_box() ?>
	</div>
	<?php io_footer_tools_html() ?> 
</footer>
<?php wp_footer(); ?>
<!-- 自定义代码 -->
<?php echo io_get_option('foot_code');?>
<!-- end 自定义代码 -->
</body>
</html>