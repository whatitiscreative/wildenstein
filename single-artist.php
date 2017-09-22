<?php
/**
 * The Template for displaying all single artist posts
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="main-modal">
				<div class="container">
					<section class="single-artist-content">
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post(); ?>
								<div class="row around-xs">
									<div class="col-xs-12 col-sm-5">
										<div class="artist-gallery">
											<div class="gallery-slider">
											<?php while(have_rows('artist_gallery')): the_row(); ?>
												<div>
													<div class="bg-image" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
													 <label class="main-label"><?php the_sub_field('title'); ?>,<?php the_sub_field('year'); ?>,<?php the_sub_field('type'); ?>,<?php the_sub_field('location'); ?>.</label>
												</div>
											<?php endwhile; ?>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-sm-5">
										<div class="artist-bio">
											<h3><?php the_field('artist_name'); ?></h3>
											<label>
												<?php if(get_field('nationality')): ?>
													<?php the_field('nationality'); ?>:
												<?php endif; ?>

												<?php if(get_field('date_of_birth')): ?>
													<?php the_field('date_of_birth'); ?>-
												<?php endif; ?>

												<?php if(get_field('date_of_death')): ?>
													<?php the_field('date_of_death'); ?>
												<?php endif; ?>
											</label>
											<p class="small"><?php the_field('bio'); ?></p>
										</div>
									</div>
								</div>
						<?php 	endwhile; ?>
					</section>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
