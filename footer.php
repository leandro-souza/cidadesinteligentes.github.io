<?php
/**
 * Footer Main File.
 *
 * @package GOVERNLIA
 * @author  Template Path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php governlia_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>

</div>
<!--End Page Wrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon-arrow"></span></div>

<?php wp_footer(); ?>
</body>
</html>
