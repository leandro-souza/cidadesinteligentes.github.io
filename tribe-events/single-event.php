<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;
$event_id = get_the_ID();

$data    = \GOVERNLIA\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'blog-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = governlia_WSH()->option();


$event_thumbnail_id = get_post_thumbnail_id($event_id);
$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

$start_datetime = tribe_get_start_date( $event_id );
$end_datetime = tribe_get_end_date( $event_id );

$start_date = tribe_get_start_date($event_id, true, 'Y/m/d' );
$end_date = tribe_get_end_date($event_id, true, 'Y/m/d' );

$start_time = tribe_get_start_time ( $event_id, 'h:i A' );
$end_time = tribe_get_end_time ( $event_id, 'h:i A' );

$location = get_option('location');

?>

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

<!--Start Events Details Area-->
<section class="events-details-area">
    <div class="container">
        <div class="row">
        	
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                	<div class="sidebar-content-box">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="events-details-content-box">
					<?php while ( have_posts() ) : the_post(); ?>
                    
                        <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                        <?php the_content();?>
                        <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                        
                        <!-- Event meta -->
                        <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
                        <?php tribe_get_template_part( 'modules/meta' ); ?>
                        <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                    
                    <?php endwhile; ?>
                </div>
            </div>
        	
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                	<div class="sidebar-content-box">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </div>
                </div>
			<?php endif; ?>
			
        </div>
    </div>
</section>
<!--End blog area-->
