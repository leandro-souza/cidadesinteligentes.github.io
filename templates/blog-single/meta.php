<?php
/**
 * Single Post meta File.
 *
 * @package GOVERNLIA
 * @author  Template Path
 * @version 1.0
 */

?>

<?php if ( $options->get( 'single_date' ) ) : ?>

	<span class="post-date"><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'F j,' ) . ' ' . get_the_date( ' Y' ); ?></a></span>

<?php endif; ?>

	<ul class="likes">

		<?php if ( $options->get( 'single_likes' ) ) : ?>

			<li>

				<?php governlia_template_load( 'templates/like.php', compact( 'data' ) ); ?>

			</li>

		<?php endif; ?>

		<?php if ( $options->get( 'single_comments' ) ) : ?>

			<li><a href="#comments"><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></a></li>

		<?php endif; ?>

	</ul>

<?php if ( $options->get( 'show_single_sharing' ) && $social ) : ?>

	<ul class="social-media">

		<?php foreach ( $social as $k => $v ) {

			if ( $v == '' ) {
				continue;
			} ?>

			<?php do_action('governlia_social_share_output', $k ); ?>

		<?php } ?>

	</ul>

<?php endif; ?>