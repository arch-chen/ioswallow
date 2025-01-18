<?php 
/*
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-07 09:13:11
 * @FilePath: /ioswallow/down.php
 * @Description: 
 */
	require( dirname(__FILE__) . '/../../../wp-load.php' );
	$id=$_GET['id'];
	$title 				= get_post($id)->post_title;
	$post_link 			= get_permalink($id);
	$custom_fields 		= get_post_custom($id);
	$down_name			= isset($custom_fields['_down_name'])?			$custom_fields['_down_name'][0]:'';
	$file_inf			= isset($custom_fields['_file_inf'])?			$custom_fields['_file_inf'][0]:'';
	$baidu_pan			= isset($custom_fields['_baidu_pan'])?			$custom_fields['_baidu_pan'][0]:'';
	$password_start		= isset($custom_fields['_password_start'])?		$custom_fields['_password_start'][0]:false;
	$baidu_password		= isset($custom_fields['_baidu_password'])?		$custom_fields['_baidu_password'][0]:'';
	$baidu_pan			= isset($custom_fields['_baidu_pan'])?			$custom_fields['_baidu_pan'][0]:'';
	$down_local			= isset($custom_fields['_down_local'])?			$custom_fields['_down_local'][0]:'';
	$rar_password		= isset($custom_fields['_rar_password'])?		$custom_fields['_rar_password'][0]:'';
	$down_official		= isset($custom_fields['_down_official'])?		$custom_fields['_down_official'][0]:'';
	$file_os			= isset($custom_fields['_file_os'])?			$custom_fields['_file_os'][0]:'';
	$down_size			= isset($custom_fields['_down_size'])?			$custom_fields['_down_size'][0]:'';
	$down_img			= isset($custom_fields['_down_img'])?			$custom_fields['_down_img'][0]:'';
	$baidu_pan_btn		= isset($custom_fields['_baidu_pan_btn'])?		$custom_fields['_baidu_pan_btn'][0]:'';
	$down_local_btn		= isset($custom_fields['_down_local_btn'])?		$custom_fields['_down_local_btn'][0]:'';
	$down_official_btn	= isset($custom_fields['_down_official_btn'])?	$custom_fields['_down_official_btn'][0]:'';
	$click_count 		= isset($custom_fields['down_count'])?			$custom_fields['down_count'][0]:0;
?>
<?php get_header();?>

<main class="container custom-width"> 
			<div class="download-thumbnail-pass wow fadeIn" data-wow-duration="1s"  data-wow-delay="0.3s" style="background-image: url('<?php echo io_theme_get_thumb(get_post($id)) ?>')">
				<div class="container">
					<div class="download-thumbnail-pass-inside row align-items-center">
						<div class="download-title-zone ws-sr col text-center">
							<h1><a href="<?php echo $post_link ?>"><?php echo $title; ?></a></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="down-main wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.5s" >
				<div class="down-inf">
					<div class="desc">
						<h3><?php _e('文件信息','i_theme') ?></h3>
						<?php if($down_name){ ?><p><strong><?php _e('资源名称：','i_theme') ?></strong><?php echo $down_name;?></p><?php } ?>
						<?php if($file_os){ ?><p><strong><?php _e('应用平台：','i_theme') ?></strong><?php echo $file_os;?></p><?php } ?>
						<?php if($file_inf){ ?><p><strong><?php _e('资源版本：','i_theme') ?></strong><?php echo $file_inf;?></p><?php } ?>
						<?php if($down_size){ ?><p><strong><?php _e('资源大小：','i_theme') ?></strong><?php echo $down_size;?></p><?php } ?>
						<p><strong><?php _e('下载次数：','i_theme') ?></strong><span class="down-count-text"><?php echo $click_count;?></span></p>
					</div>
					<div class="down-list-box">
						<h3><?php _e('下载地址','i_theme') ?></h3>
						<div style="clear: both;display: block;"></div>
						<div class="down-but back"><a href="<?php echo $post_link ?>"><i class="iconfont icon-arrow-left"></i> <?php _e('返回','i_theme') ?></a></div>
						<?php if($baidu_password){ ?>
							<?php if($baidu_pan){ ?><div class="down-but"><a href="<?php echo go_to($baidu_pan);?>" class="down_count" data-post_id="<?php echo $id ?>" data-action="down_count" onClick="copyUrl2()" target="_blank"><i class="iconfont icon-download"></i> <?php if($baidu_pan_btn){ ?><?php echo $baidu_pan_btn;?><?php } else { _e('网盘下载','i_theme'); } ?></a></div><?php } ?>
						<?php } else { ?>
							<?php if($baidu_pan){ ?><div class="down-but"><a href="<?php echo go_to($baidu_pan);?>" class="down_count" data-post_id="<?php echo $id ?>" data-action="down_count" target="_blank"><i class="iconfont icon-download"></i> <?php if($baidu_pan_btn){ ?><?php echo $baidu_pan_btn;?><?php } else { _e('网盘下载','i_theme'); } ?></a></div><?php } ?>
						<?php } ?>
						<?php if($down_official){ ?><div class="down-but"><a href="<?php echo go_to($down_official);?>" class="down_count" data-post_id="<?php echo $id ?>" data-action="down_count" target="_blank"><i class="iconfont icon-download"></i> <?php if($down_official_btn){ ?><?php echo $down_official_btn;?><?php } else { _e('官方下载','i_theme'); } ?></a></div><?php } ?>
						<?php if($down_local){ ?><div class="down-but"><a href="<?php echo go_to($down_local);?>" class="down_count" data-post_id="<?php echo $id ?>" data-action="down_count" target="_blank"><i class="iconfont icon-download"></i> <?php if($down_local_btn){ ?><?php echo $down_local_btn;?><?php } else { _e('本站下载','i_theme'); } ?></a></div><?php } ?>
					</div>
					<div style="clear: both;display: block;"></div>
					<?php if($password_start) { ?>
						<?php if( $rar_password || $baidu_password ){ ?><p><i class="iconfont icon-explain"></i> <?php _e('请去文章页查看密码','i_theme') ?></p><?php } ?>
					<?php }else{ ?>
					<div class="down-pass">
						<?php if($rar_password){ ?><p><?php _e('解压密码：','i_theme') ?><?php echo $rar_password;?></p><?php } ?>
						<?php if($baidu_password){ ?><textarea cols="20" rows="10" id="panpass"><?php echo $baidu_password;?></textarea><?php } ?>
						<?php if($baidu_password){ ?><p><?php _e('网盘密码：','i_theme') ?><?php echo $baidu_password;?></p><?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php if($down_img){ ?>
					<div class="down-img">
						<h3><?php _e('演示图片','i_theme') ?></h3>
						<img src="<?php echo $down_img;?>" alt="<?php echo $title;?>" />
					</div>
				<?php } else { ?>
					<?php if (io_get_option('ad_down')) { ?>
					<div class="down-img">
						<?php  echo stripslashes( io_get_option('ad_down') ); ?>
					</div>
				<?php } } ?>
			</div>	
			<div style="clear: both;display: block;"></div>
			<?php if (io_get_option('ad_down')) { ?>
				<div class="down-ad wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.5s" >
					<?php  echo stripslashes( io_get_option('ad_down') ); ?>
				</div>
			<?php } ?>
	
			<div class="down-copyright wow fadeInUp" data-wow-duration="1s"  data-wow-delay="0.5s" >
				<div class="tip worning "><p></p>
				<strong><?php _e('声明：','i_theme') ?></strong>
					<p><?php  echo stripslashes( io_get_option('down_explain') ); ?></p>
				</div> 
			</div> 
</main>
<?php if($baidu_password){ ?><script type="text/javascript">function copyUrl2() {var Url2=document.getElementById("panpass");Url2.select();document.execCommand("Copy");alert("<?php _e('网盘密码已复制，可贴粘，点“确定”进入下载页面。','i_theme') ?>");}</script><?php } ?>
<?php get_footer(); ?>
 