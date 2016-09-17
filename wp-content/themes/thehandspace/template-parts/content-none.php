<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Hand_Space
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<?php
		if ( is_page('current') ) : ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing to show right now...', 'thehandspace' ); ?></h1>

		<?php
		else : ?>

			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'thehandspace' ); ?></h1>

		<?php
		endif; ?>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_page('current') ) : ?>
			<p><?php esc_html_e( 'Please come back later or sign up for our email list below to get updates.', 'thehandspace' ); ?></p>
			
		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thehandspace' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'thehandspace' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
