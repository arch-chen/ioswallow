<?php 
/*
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2021-08-07 21:18:11
 * @LastEditors: iowen
 * @LastEditTime: 2024-01-27 21:59:13
 * @FilePath: \ioswallow\search.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

io_set_history_search($s);

get_header();
get_template_part('templates/cat', 'list');
get_footer(); 
