<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Hand_Space
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php

			// find todays date
			$date = date('Ymd');

			if( is_front_page() || is_home() ) :

				$featured_posts = get_field('featured_posts');

				if( $featured_posts ) :

				foreach( $featured_posts as $post ) :
					setup_postdata($post);

					get_template_part( 'template-parts/content', 'featured' );
					
				endforeach;

				wp_reset_postdata();
				endif;

			elseif( is_page('current') || is_page('past') ) :

				if( is_page('current') ) :
					$meta_query = array(
						'relation'		=> 'OR',
						array(
							'key'		=> 'start_date',
							'compare'	=> '>=',
							'value'		=> $date,
						),
						array(
							'key'		=> 'end_date',
							'compare'	=> '>=',
							'value'		=> $date,
						)
					);

					$template = 'featured';

				else :
					$meta_query = array(
						'relation'		=> 'AND',
						array(
							'key'		=> 'start_date',
							'compare'	=> '<=',
							'value'		=> $date,
						),
						array(
							'key'		=> 'end_date',
							'compare'	=> '<=',
							'value'		=> $date,
						)
					);

					$template = 'past';
				endif;

				// args
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> 'show',
			        'meta_key' => 'start_date',
			        'orderby'   => 'meta_value',
			        'order' => 'DESC',
					'meta_query'	=> $meta_query
				);


				// query
				$the_query = new WP_Query( $args );

				if( $the_query->have_posts() ):

					while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'template-parts/content', $template );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;

				wp_reset_query();

			else :
				while ( have_posts() ) : the_post();
				
					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
			endif;

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
