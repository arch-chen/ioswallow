<?php
include "./wp-load.php";
// --- iowen --- //
if(isset($_GET['url'])){
	$id=$_GET['id'];
	if(get_post($id)){
		$down_demo = $_GET['url'];
	}
}else{
	$id=$_GET['id'];
	$title = get_post($id)->post_title;
	$down_demo=get_post_meta($id, '_down_demo', true);
}
$ctx = stream_context_create(array('http' => array('timeout' => 2 ))); 
@file_get_contents($down_demo, 0, $ctx); 
$responseInfo = $http_response_header;
$responseUrl = '';
if(!empty($responseInfo)){
	foreach ($responseInfo as $loop) {
		if(strpos($loop, "X-Frame-Options") !== false){
			$responseUrl = trim(substr($loop, 17));
		}
	}
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $title;?> | <?php _e('演示','i_theme') ?></title>
<meta name="keywords" content="<?php echo $title;?>" />
<meta name="description" content="<?php echo sprintf(__('%s演示页','i_theme'),$title) ?>" />
<meta name="robots" content="noindex,follow">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/css/iconfont.css')  ?>" />
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/css/down.css') ?>" />
<script type="text/javascript" src="<?php echo get_theme_file_uri('/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
var calcHeight = function() {
	var headerDimensions = $('#switch').height();
	$('#preview-frame').height($(window).height() - headerDimensions);
}
$(window).resize(function() {
	calcHeight();
	}).ready(function() {
    calcHeight();
});

// 预览
$(document).ready(function () {
	$('.monitor').addClass('preview');

	$(".monitor").click(function () {
		$("#by").css("overflow-y", "hidden");
		$('#iframe-wrap').removeClass().addClass('full-width');
		$('.tablet,.tablet-h,.monitor,.mobile,.mobile-h').removeClass('preview');
		$(this).addClass('preview');
		return false;
	});

	$(".tablet").click(function () {
		$("#by").css("overflow-y", "auto");
		$('#iframe-wrap').removeClass().addClass('tablet-width');
		$('.tablet,.tablet-h,.monitor,.mobile,.mobile-h').removeClass('preview');
		$(this).addClass('preview');
		return false;
	});

	$(".tablet-h").click(function () {
		$("#by").css("overflow-y", "auto");
		$('#iframe-wrap').removeClass().addClass('tablet-h-width');
		$('.tablet,.icon-mobile,.monitor,.mobile,.mobile-h').removeClass('preview');
		$(this).addClass('preview');
		return false;
	});

	$(".mobile").click(function () {
		$("#by").css("overflow-y", "auto");
		$('#iframe-wrap').removeClass().addClass('mobile-width');
		$('.tablet,.tablet-h,.monitor,.mobile,.mobile-h').removeClass('preview');
		$(this).addClass('preview');
		return false;
	});

	$(".mobile-h").click(function () {
		$("#by").css("overflow-y", "auto");
		$('#iframe-wrap').removeClass().addClass('mobile-width-h');
		$('.tablet,.tablet-h,.monitor,.mobile,.mobile-h').removeClass('preview');
		$(this).addClass('preview');
		return false;
	});
});
</script>

</head>
<body id="by" style="overflow-y: hidden;background: #666;">
	<div id="switch">
		<div class="switch-center">
			<ul class="switch-close"><li><a title="<?php _e('关闭演示','i_theme') ?>" href="javascript:close();"><i class="iconfont icon-error"></i></a></li></ul>
			<ul class="switch-link">
				<li><a target="_blank" title="<?php _e('访问演示链接','i_theme') ?>" href="<?php echo $down_demo;?>"><i class="iconfont icon-link"></i><?php _e('链接','i_theme') ?></a></li> 
				<?php if(!isset($_GET['url'])): ?><li><a target="_blank" title="<?php _e('下载该资源','i_theme') ?>" href="<?php echo home_url() ?>/down/?id=<?php echo $id;?>" ><i class="iconfont icon-download"></i><?php _e('下载','i_theme') ?></a></li><?php endif; ?>
			</ul>
			<ul class="switch-ico">
				<li><a href="javascript:" title="<?php _e('手机横向','i_theme') ?>"><div class="mobile-h"><i class="iconfont icon-mobile fa-rotate-90"></i></div></a></li>
				<li><a href="javascript:" title="<?php _e('手机竖向','i_theme') ?>"><div class="mobile"><i class="iconfont icon-mobile"></i></div></a></li>
				<li><a href="javascript:" title="<?php _e('平板横向','i_theme') ?>"><div class="tablet-h"><i class="iconfont icon-tablet fa-rotate-90"></i></div></a></li>
				<li><a href="javascript:" title="<?php _e('平板竖向','i_theme') ?>"><div class="tablet"><i class="iconfont icon-tablet"></i></div></a></li>
				<li><a href="javascript:" title="<?php _e('电脑全屏','i_theme') ?>"><div class="monitor preview"><i class="iconfont icon-pc"></i></div></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>

	<div class="full-width" id="iframe-wrap">
		<?php if($responseUrl!=""){
	  		// --- iowen --- //
			//header("Location:$down_demo"); 
			header("refresh:4;url=$down_demo");
			echo '<p style="line-height:30px;text-align:center;margin-top:60px;">'.sprintf(__('错误：目标网站不支持 .%siframe.%s...%s五秒后自动跳转至目标页'),'&lt;','&gt;','<br>').'</p>';
		}else{
		echo '<script type="text/javascript">document.write("<iframe id=\"preview-frame\" src=\"'. $down_demo.'\" name=\"preview-frame\" frameborder=\"0\" noresize=\"noresize\"></iframe>");</script>';
		} ?>
	</div>
</body>
</html>