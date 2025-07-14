<?php
/**
 * Footer Template  File
 *
 * @package GOVERNLIA
 * @author  Template Path
 * @version 1.0
 */

$options = governlia_WSH()->option();

$footer_logo_img2 = $options->get( 'footer_logo_image2');
$footer_logo_img2 = governlia_set( $footer_logo_img2, 'url', GOVERNLIA_URI . 'assets/images/logo-2.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- Main  Footer -->
    <footer class="main-footer">
        <?php if( $options->get('show_footer_top_area_v2') ){?>
        <div class="footer-top">
            <div class="auto-container">
                <div class="row align-items-center">
                    <?php if($footer_logo_img2){ ?>
                    <div class="col-lg-3">
                        <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_img2); ?>" alt="<?php esc_attr_e('Awesome Image', 'governlia'); ?>"></a></div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-9">
                        <div class="wrapper-box">
                            <h4><?php echo wp_kses($options->get('form_title_v2'), true); ?></h4>
                            <div class="newsletter-form">
                                <div class="ajax-sub-form">
									<?php echo do_shortcode($options->get('mailchimp_form_url_v2')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="copyright">
                        <div class="text"><?php echo wp_kses( $options->get( 'copyright_text2', '© 1995-2021 <a href="#">GOVERNLIA</a> - The City Govt All rights reserved. ' ), true ); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>