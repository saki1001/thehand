<?php
/**
 * Template part for displaying featured shows in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Hand_Space
 */
	$my_post = $featured_post;
	$ID = $my_post->ID;
	$featured_image = get_the_post_thumbnail($ID);
	$title = $my_post->post_title;
	$content = $my_post->post_content;
?>

<article id="post-<?php echo $ID; ?>">
	<div class="image">
		<?php echo $featured_image; ?>
	</div>
	<header class="entry-header">
		<h1 class="entry-title">
			<?php echo $title; ?>
		</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo $content; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
