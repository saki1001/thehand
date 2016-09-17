<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Hand_Space
 */
	$permalink = get_the_permalink();
	$title = get_the_title();
	$subtitle = get_field('subtitle');
	$start_date = date('F j', strtotime(get_field('start_date')));
	$end_date = date('F j, Y', strtotime(get_field('end_date')));
	$press_release_file = get_field('press_release_file');
	$press_release_url = $press_release_file['url'];
	$press_release_text = get_field('press_release_text');
	$ID = get_the_ID();
	$featured_image = get_the_post_thumbnail($ID);
	$images = get_field('images');
?>

<article id="post-<?php echo $ID; ?>">
	<section class="show-content">
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
			<a href="<?php echo $press_release_url; ?>" title="<?php echo $title . ' Press Release'; ?>" target="_blank">
				Press Release
			</a>
		</div><!-- .show-details -->

		<div class="show-text">
			<?php echo $press_release_text; ?>
		</div><!-- .show-text -->
	</section>

	<section class="show-images">
		<?php
			if( !empty($images) ) :
				foreach( $images as $imageArray ) :
					$image = $imageArray['image'];
					$size = 'large';
					$source = $image['sizes']['large'];
					$width = $image['sizes'][$size . '-width'];
					$height = $image['sizes'][$size . '-height'];
					$caption = $imageArray['caption'];
		?>
				<div class="image">
					<img src="<?php echo $source; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $caption; ?>" />
					<figcaption><?php echo $caption; ?></figcaption>
				</div>
		<?php
				endforeach;

			elseif( $featured_image ) :
		?>
				<div class="image">
					<?php echo $featured_image; ?>
				</div>
		<?php
			else :
				// do nothing
			endif;	
		?>

	</section><!-- .show-images -->
</article><!-- #post-## -->
