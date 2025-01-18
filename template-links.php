<?php
/*
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-04 13:35:50
 * @FilePath: /ioswallow/template-links.php
 * @Description: 
 */
/*
Template Name: 友情链接
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>
<?php io_page_head_html() ?>
					<div id="post-<?php the_ID(); ?>"  class="type-post wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.3s">
						<div class="content page">
							<div class="single-content">
								<?php if(get_post_meta( get_the_ID(), '_disable_links_content', true )){ ?>
								<p>一、申请友链可以直接在本页面留言，内容包括网站名称、链接以及相关说明，为了节约你我的时间，可先做好本站链接并此处留言，我将尽快答复</p>
								<p>二、欢迎申请友情链接，只要是正规站常更新即可，申请首页链接需符合以下几点要求：</p>
								<ul>
									<li>本站优先招同类原创、内容相近的博客或网站；</li>
									<li>Baidu和Google有正常收录，百度近期快照，不含有违反国家法律内容的合法网站，TB客，垃圾站不做。</li>
									<li>如果您的站原创内容少之又少，且长期不更新，申请连接不予受理！</li>
									<li>友情链接的目的是常来常往，凡是加了友链的朋友，我都会经常访问的，也欢迎你来我的网站参观、留言等。</li>
								</ul>
								<p>长期不更新的会视情节把友链转移至内页。</p>
								<div class="contextual-callout">
									<h4 class="text-md text-center">友链申请示例</h4>
									<p>本站名称：<?php echo get_bloginfo('name') ?><br>
									本站链接：<?php echo esc_url(home_url()) ?><br>
									本站描述：<?php echo get_bloginfo('description') ?><br>
									本站图标：<?php echo io_get_option('favicon') ?></p>
								</div>
								<p>PS:链接由于无法访问或您的博客没有发现本站链接等其他原因，将会暂时撤销超链接，恢复请留言通知我，望请谅解，谢谢！</p>
								<?php } ?>
								<?php the_content(); ?>
								<?php edit_post_link(__('编辑','i_theme'), '<span class="edit-link">', '</span>' ); ?>
							</div> <!-- .single-content -->  
							<div class="link-page my-3">
								<div class="row">
								<?php $default_ico = get_template_directory_uri() .'/images/link-favicon.png'; //默认 ico 图片位置
									$bookmarks = get_bookmarks(array(
									'orderby' => 'rating',
									'order' => 'asc'
								));
								foreach ($bookmarks as $bookmark) { 
									$ico = $bookmark->link_image?:"https://api.iowen.cn/favicon/" .parse_url($bookmark->link_url)['host'] . ".png";
								?>
									<div class="col-12 col-md-6 col-lg-4">
										<div class="list-item d-flex align-items-center mb-3">
											<div class="media w-48 flex-none">
												<img class="media-content rounded-circle" src="<?php echo $ico ?>" onerror="javascript:this.src='<?php echo $default_ico; ?>'">
											</div>
											<div class="ml-2 overflow-hidden flex-fill">
												<a class="text-sm" href="<?php echo $bookmark->link_url; ?>" title="<?php echo $bookmark->link_name; ?>" target="_blank"><?php echo $bookmark->link_name; ?></a>
												<p class="text-xs text-muted mt-1 overflowClip_1"><?php echo $bookmark->link_description; ?></p>
											</div>
										</div>
									</div>
								<?php } ?>
								</div>
								<div class="clear"></div>
							</div>  
							<?php if(get_post_meta( get_the_ID(), '_links_form', true )){ ?>  
							<h3 class="text-lg my-4"><i class="iconfont icon-link mr-2"></i><?php _e('提交链接','i_theme') ?></h3>
							<form method="post" class="io-add-link-form ajax-form">
									
								<div class="form-row">
									<div class="form-group col-md-6 mb-0">
										<input type="text" size="40" class="comment-text w-100" id="link_name" name="link_name" placeholder="<?php _e('请输入链接名称','i_theme') ?>" />
									</div>
									<div class="form-group col-md-6 mb-0">
										<input type="text" size="40" class="comment-text w-100" id="link_url" name="link_url" placeholder="<?php _e('请输入链接地址','i_theme') ?>" />
									</div>
								</div>  
								<div class="form-row">
									<div class="form-group col-md-6 mb-0">
										<input type="text" size="40" class="comment-text w-100" id="link_description" name="link_description" placeholder="<?php _e('请输入链接简介','i_theme') ?>" />
									</div>
									<div class="form-group col-md-6 mb-0">
										<input type="text" size="40" class="comment-text w-100" id="link_image" name="link_image" placeholder="<?php _e('请输入LOGO图像地址','i_theme') ?>" />
									</div>
								</div> 
								<div class="text-right">  
								<input type="hidden" name="action" value="io_submit_link"> 
								<button type="reset" class="btn btn-light mr-2"><?php _e('重填','i_theme') ?></button>
								<button type="submit" class="btn btn-danger"><?php _e('提交申请','i_theme') ?></button>
								</div>
							</form> <!--表单结束-->
							<?php } ?>
						</div><!-- .content -->
					</div><!-- #page -->
					<?php if(io_get_option('comment_switcher',true)) comments_template( '', true ); ?> 
</main>

<?php get_footer(); ?>
