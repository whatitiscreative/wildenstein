<?php
/**
 * The Template for displaying all single news posts
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>
				<main>
					<div class="hero with-overlay bg-image" style="background-image: url(<?php the_field('cover_image'); ?>)">
						<h2 class="white"><?php the_title();?></h2>
					</div>

					<section class="news-content">
						
					</section>
				</main>
			<?php endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();