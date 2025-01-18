<?php
/*
Template Name: 试试手气
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>

<?php $rand_post=get_posts(array('numberposts'=>1,'orderby'=>'rand')); foreach($rand_post as $post) : ?>
<script> location="<?php the_permalink(); ?>";</script>
<?php endforeach; ?>

<?php get_footer(); ?>