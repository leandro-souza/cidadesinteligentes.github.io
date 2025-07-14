<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage GOVERNLIA
 * @author     Template Path
 * @version    1.0
 */

if ( class_exists( 'Governlia_Resizer' ) ) {
	$img_obj = new Governlia_Resizer();
} else {
	$img_obj = array();
}

$options = governlia_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
    <div class="news-block-two">
        <div class="inner-box">
            <div class="image">
                <?php the_post_thumbnail('governlia_1170x400'); ?>
                <div class="overlay">
                    <div class="link-btn"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="icon-arrow"></i></a></div>
                </div>
                <div class="category"><?php the_category(', '); ?></div>
            </div>
            <div class="lower-content">
                <h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                <div class="text"><?php the_excerpt(); ?></div>
                <ul class="post-meta">
                    <?php if( $options->get( 'blog_post_author' ) ){ ?>
                    <li><i class="fa fa-user"></i><?php the_author(); ?></li>
                    <?php } ?>
                    <?php if( $options->get( 'blog_post_date' ) ){ ?>
                    <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                    <?php } ?>
                    
                    <?php if( $options->get( 'blog_post_comments' ) ){ ?>
                    <li><i class="fa fa-comments"></i><?php comments_number( wp_kses(__('0 Comments' , 'governlia'), true), wp_kses(__('1 Comment' , 'governlia'), true), wp_kses(__('% Comments' , 'governlia'), true)); ?></li>
                    <?php } ?>
                    <li class="read-more"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="icon-arrow"></i><?php esc_html_e('Read More', 'governlia'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
        
</div>