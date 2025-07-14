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
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr__( 'Explore City ...', 'governlia' ); ?>" required >
    <button type="submit"><i class="icon-search"></i></button>
</form>