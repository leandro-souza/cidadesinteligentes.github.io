<?php
/**
 * Blog Post Main File.
 *
 * @package GOVERNLIA
 * @author  Template Path
 * @version 1.0
 */

get_header();
$data    = \GOVERNLIA\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = governlia_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'governlia_banner', $data );?>
<?php else:?>
<section class="page-title style-two" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
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
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-single-post">
                	
                    <div class="thm-unit-test">    
                        
                        <div class="top-content">
                            <?php if( has_post_thumbnail() ):?><div class="image"><?php the_post_thumbnail('governlia_1170x430'); ?></div><?php endif;?>
                            
                            <div class="news-block-two style-two">
                                <ul class="post-meta">
                                    <?php if( $options->get( 'single_post_author' ) ):?>
                                    <li><i class="fa fa-user"></i> <?php the_author(); ?></li>
                                    <?php endif;?>
                                    
                                    <?php if( $options->get( 'single_post_date' ) ):?>
                                    <li><i class="fa fa-calendar"></i> <?php echo esc_attr(get_the_date()); ?></li>
                                    <?php endif;?>
                                    
                                    <?php if( $options->get( 'single_post_comments' ) ):?>
                                    <li><i class="fa fa-comments"></i> <?php comments_number( wp_kses(__('0 Comments' , 'governlia'), true), wp_kses(__('1 Comment' , 'governlia'), true), wp_kses(__('% Comments' , 'governlia'), true)); ?></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <div class="text">
								<?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'governlia'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            </div>
                        </div>
                        
						<?php if(function_exists('bunch_share_us_two') || has_tag()):?>
                        <div class="post-share-info">
                            <?php if(has_tag()){ ?>
                            <div class="left-column">
                                <div class="tag">
                                    <i class="fa fa-tags"></i>
                                    <?php the_tags( '', '' , '' ); ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(function_exists('bunch_share_us_two')):?>
							<?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                        	<?php endif;?>
                        </div>
                        <?php endif;?>
                        
                        <?php if( $options->get( 'single_post_author_box' ) ):?>
                        <div class="author-box">
                            <div class="image">
                            	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
									<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <h4><?php the_author(); ?></h4>
                                <?php if( $options->get( 'single_post_author_links' ) ):?>
                                <h5>
                                	<a href="<?php the_author_meta( 'url', get_the_author_meta('ID') ); ?>"><?php esc_html_e('Visit:', 'governlia'); ?> <?php the_author_meta( 'url', get_the_author_meta('ID') ); ?></a>
                                </h5>
								<?php endif; ?>
                                
                                <div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?> </div>
                                
                                <?php if( $options->get( 'single_post_author_links' ) ):?>
								<?php $icons = $options->get( 'single_post_author_social_share' );
                                if ( ! empty( $icons ) ) :
                                ?>
                                <ul class="social-links">
                                    <?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( governlia_set( $h_icon, 'data' ) ) );
									if ( governlia_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', governlia_set( $header_social_icons, 'icon' ) );
									?>
									<li><a href="<?php echo esc_url(governlia_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(governlia_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(governlia_set( $header_social_icons, 'color' )); ?>"><span class="fa <?php echo esc_attr( governlia_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
									<?php endforeach; ?>
                                </ul>
                                <?php endif; endif;?>
                            </div>
                        </div>
                        <?php endif;?>
                        
                        <!--End post-details-->
                        <?php comments_template(); ?>
                    
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
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
