<?php
/**
 * Blog Main File.
 *
 * @package GOVERNLIA
 * @author  TemplatePath
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \GOVERNLIA\Includes\Classes\Common::instance()->data( 'blog' )->get();
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
    <!-- Banner Section -->
    <section class="page-banner">
        <div class="image-layer" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
        <div class="banner-bottom-pattern"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <?php echo governlia_the_breadcrumb(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->
    <?php endif;?>
    
    <!--Start blog area-->
    <div class="sidebar-page-container">
        <div class="circles-two">
            <div class="c-1"></div>
            <div class="c-2"></div>
        </div>
        <span class="dotted-pattern dotted-pattern-5"></span>
        <span class="tri-pattern tri-pattern-8"></span>
    
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Sidebar Start-->
                <?php
					if ( $data->get( 'layout' ) == 'left' ) {
						do_action( 'governlia_sidebar', $data );
					}
				?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-content">
                        <div class="thm-unit-test">
                        
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    governlia_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                            
                        </div>
                    </div>
                
                    <!--Pagination-->
                    <div class="pagination-box">
                        <div class="styled-pagination">
                            <?php governlia_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                    </div>
                    
                </div>
                
                <!--Sidebar Start-->
                <?php
					if ( $data->get( 'layout' ) == 'right' ) {
						do_action( 'governlia_sidebar', $data );
					}
				?>
                
            </div>
        </div>
    </div>
    <!--End blog area--> 
	<?php
}
get_footer();
