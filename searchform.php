<?php
/**
 * Search Form template
 *
 * @package GOVERNLIA
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <div class="form-group">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search', 'governlia' ); ?>" required="">
            <button type="submit"><span class="icon fa fa-search"></span></button>
        </div>
    </form>
</div>