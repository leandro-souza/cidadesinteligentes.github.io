<?php
/**
 * Archive Main File.
 *
 * @package GOVERNLIA
 * @author  Template Path
 * @version 1.0
 */
get_header();
global $wp_query;
$data  = \GOVERNLIA\Includes\Classes\Common::instance()->data( 'archive' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'governlia_banner', $data );?>
<?php else:?>
<!-- Page Title -->
<section class="page-title" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                </div>
                <ul class="bread-crumb">
                    <?php echo governlia_the_breadcrumb(); ?>
                </ul>
            </div>                    
        </div>
    </div>
</section>

<?php endif;?>

<!-- Sidebar Page Container -->
<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'governlia_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                
                <div class="thm-unit-test">
                    
					<?php
                        while ( have_posts() ) :
                            the_post();
                            governlia_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                        endwhile;
                        wp_reset_postdata();
                    ?>
                        
                </div>
                
                <!--Pagination-->
                <div class="post-pagination mt-5 mb-30">
                	<?php governlia_the_pagination( $wp_query->max_num_pages );?>
                </div>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'governlia_sidebar', $data );
				}
			?>
        </div>
    </div>
</section> 
<!--End blog area--> 
<?php
}
get_footer();
