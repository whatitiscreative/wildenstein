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
						<span class="date"><?php the_date('m.j.Y'); ?></span>
						<h2 class="white"><?php the_title();?></h2>
						<span class="down-arrow"></span>
					</div>

					<section class="news-content intro">
						<div class="container">
							<div class="row center-xs">
								<div class="col-xs-12 col-sm-8">
									<p>Lorem ipsum dolor sit amet, no duo natum magna mandamus, putent omittam per te. Habeo expetenda qui ei. Ne vis integre admodum salutatus. Ex omnes recteque vix, sea graeci facilisi in. Et ius homero reprehendunt.</p>
									<br>
									<h3>Nulla Complectitur Quo No</h3>
									<p>His singulis mnesarchum no. Nulla complectitur quo no, autem repudiare sea cu. Fugit vocent molestie ad has, odio augue ad vix. No quas accumsan tacimates vim. Lucilius accusata in nam, reque aliquid et sea, doming inimicus pri ne.</p>
								</div>
							</div>
						</div>
					</section>

					<section class="gallery-spotlight">
						<div class="news-slider">

						</div>
					</section>

					<section class="news-content">
						<div class="container">
							<div class="row center-xs">
								<div class="col-xs-12 col-sm-8">
									<h3>Denique Repudiandae</h3>
									<p>His singulis mnesarchum no. Nulla complectitur quo no, autem repudiare sea cu. Fugit vocent molestie ad has, odio augue ad vix. No quas accumsan tacimates vim. Lucilius accusata in nam, reque aliquid et sea, doming inimicus pri ne.</p>
								</div>
							</div>
						</div>
					</section>

				</main>
			<?php endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();