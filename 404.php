<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Governlia
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \GOVERNLIA\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'governlia_banner', $data );
$options = governlia_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
       
    
    <!--Start Error Page Area-->
    <section class="error-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-content text-center wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h4>
						<?php 
							if( $options->get( '404_page_title' ) ){
								echo wp_kses( $options->get( '404_page_title' ), true );
							}else{
								esc_html_e( 'Page Not Found', 'governlia' );
							}
						?>
                        </h4>
                        <div class="title clr1">
						<?php 
							if( $options->get( '404_page_heading' ) ){
								echo wp_kses( $options->get( '404_page_heading' ), true );
							}else{
								esc_html_e( '404', 'governlia' );
							}
						?>
                        </div>
                        <p>
						<?php 
                            if( $options->get( '404_page_text' ) ){
                                echo wp_kses( $options->get( '404_page_text' ), true );
                            }else{
                                esc_html_e( 'We’re unable to find a page you are looking for, Try later or click the button.', 'governlia' );
                            }
                        ?>
                        </p>
                        <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                        <div class="link-btn">
                            <a class="btn-style-one" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>
							<?php 
								if( $options->get( 'back_home_btn_label' ) ){
									echo wp_kses( $options->get( 'back_home_btn_label' ), true );
								}else{
									esc_html_e( 'Back To Home', 'governlia' );
								}
							?></span></a>
                        </div>
                        <?php endif; ?>
                    </div>    
                </div>
            </div>       
        </div>
    </section>   
    <!--End Error Page Area-->
        
<?php
}
get_footer(); ?>
