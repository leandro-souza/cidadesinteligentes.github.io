<?php 
/* Template Name: Default Elementor Page */ 
/**
 * @package GOVERNLIA
 * @author  TemplatePath
 * @version 1.0
 */
?>
<?php 
get_header();
$data  = \GOVERNLIA\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get('layout') ? $data->get('layout') : 'right';
$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-lg-8 col-sm-12' : 'col-xs-12 col-sm-12 col-md-12';
do_action( 'governlia_banner', $data );
?>
<?php while ( have_posts() ): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
