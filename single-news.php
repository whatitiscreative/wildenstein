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
					<div class="hero with-overlay bg-image framed" style="background-image: url(<?php the_field('cover_image'); ?>)">
						<span class="date"><?php the_date('m.j.Y'); ?></span>
						<h2 class="white"><?php the_title();?></h2>
						<a class="down-arrow" href="#anchorNews" rel="relativeanchor"></a>
					</div>
					<div id="anchorNews"></div>					
					<?php if(have_rows('article_content')):?>
						<?php while(have_rows('article_content')): the_row(); ?>
							<?php if (get_row_layout() == 'text_block'):?>
								<section class="news-content">
									<div class="container">
										<div class="row center-xs">
											<div class="col-xs-12 col-sm-8">
												<?php the_sub_field('wysiwyg_editor');?>
											</div>
										</div>
									</div>
								</section>
							<?php endif;?>

							<?php if (get_row_layout() == 'gallery_block'):?>
								<section class="gallery-spotlight">
									<?php if(have_rows('gallery')): ?>
										<div class="news-slider">
											<?php while(have_rows('gallery')): the_row();?>
												<div>
													<img src="<?php the_sub_field('image');?>">
													<label><?php the_sub_field('caption');?></label>
												</div>
											<?php endwhile; ?>
										</div>
									<?php endif; ?>
								</section>
							<?php endif;?>

						<?php endwhile;?>
					<?php endif;?>
				</main>
			<?php endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();