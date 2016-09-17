<?php
/**
 * Template part for displaying featured shows in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Hand_Space
 */
	$ID = get_the_ID();
	$featured_image = get_the_post_thumbnail($ID);
	$permalink = get_the_permalink();
	$title = get_the_title();
	$subtitle = get_field('subtitle');
	$start_date = date('M j', strtotime(get_field('start_date')));
	$end_date = date('M j', strtotime(get_field('end_date')));
	$opening_date = date('F j', strtotime(get_field('opening_date')));
	$start_time = date('g', strtotime($opening_date . get_field('opening_time_start')));
	$end_time = date('ga', strtotime($opening_date . get_field('opening_time_end')));
?>

<article id="post-<?php echo $ID; ?>" class="featured">
	<a class="show-link" href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
		<div class="show-details">
			<h1 class="title">
				<?php echo $title; ?>
			</h1>
			<h2 class="subtitle">
				<?php echo $subtitle; ?>
			</h2>
			<p class="details">
				<?php echo $start_date . ' - ' . $end_date; ?>
			</p>
			<p class="details">
				Opening: <br>
				<?php echo $opening_date . ', ' . $start_time . ' - ' . $end_time; ?>
			</p>
		</div><!-- .show-details -->

		<div class="featured-image">
			<?php echo $featured_image; ?>
		</div><!-- .featured-image -->
	</a><!-- .show-link -->
</article><!-- #post-## -->
