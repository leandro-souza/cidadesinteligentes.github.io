<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Template Path
 * @author     Template Path
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>

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
        
<?php endif; ?>