<?php
/*
 * @Theme Name:Swallow
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-03-01 21:47:34
 * @FilePath: /ioswallow/header.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php io_html_class(); ?>">
<head> 
<?php io_auto_theme_mode() ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="renderer" content="webkit">
<meta name="force-rendering" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=0.0, viewport-fit=cover">
<?php ioTitle(); ?>
<link rel="shortcut icon" href="<?php echo io_get_option('favicon') ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo io_get_option('apple_icon'); ?>" />
<?php wp_head(); ?>
<?php echo io_get_option('head_code');?>
<?php echo io_get_option('ad_t'); ?> 
<?php io_custom_color() ?> 
</head>
<body <?php body_class(io_body_class()) ?>>
<?php get_template_part( 'templates/header','normal' ); ?>