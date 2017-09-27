<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
	<main class="home">
		<div class="hero split-screen">
			<div class="hero-block">
				<div class="inner">
					<h3 class="white"><?php the_field('hero_headline');?></h3>
					<p class="white"><?php the_field('intro_text');?></p>
					<a class="btn rounded light" href="<?php echo get_field('hero_cta')['url'];?>"><?php echo get_field('hero_cta')['title'];?></a>
				</div>
			</div>

			<div class="hero-block" style="background-image: url(<?php the_field('hero_image'); ?>)">

			</div>
		</div>

		<div class="container">
			<section class="featured-artists">
				<div class="intro">
					<div class="row center-xs">
						<div class="col-xs-12 col-sm-3">
							<aside>
								<h4><?php the_field('artist_section_headline');?></h4>
								<a class="btn rounded dark" href="<?php echo get_field('section_cta')['url'];?>"><?php echo get_field('section_cta')['title'];?></a>
							</aside>
						</div>

						<div class="col-xs-12 col-sm-5 col-sm-offset-1">
							<p><?php the_field('artist_section_copy');?></p>
						</div>
					</div>
					<!-- Pull in Artists -->
					<?php 

					$posts = get_field('featured_artists');

					if( $posts ): ?>

						<div class="featured-artist-row">
							<div class="row center-xs">
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
										<div class="col-xs-12 col-sm-3">
											<a href="<?php the_permalink(); ?>">
												<div class="img-wrap">
													<?php the_post_thumbnail(); ?>
												</div>
												<p><?php the_title(); ?></p>
											</a>
										</div>
								<?php endforeach; ?>
							</div>
						</div>
						
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>

				</div>
			</section>
		</div>

		<div class="hero with-overlay bg-image with-icon framed" style="background-image: url(<?php the_field('cover_image');?>)">
			<h1 class="white"><?php the_field('headline');?></h1>
			<a class="btn rounded dark" href="<?php echo get_field('feature_cta')['url'];?>"><?php echo get_field('feature_cta')['title'];?></a>
		</div>

		<div class="container">
			<section class="latest-news">

				<?php 
					// Query for the 3 latest news stories
					$the_query = new WP_Query( array(
						'post_type' => 'news',
						'posts_per_page' => 3,
					)); 
				?>

				<div class="row center-xs">
					<div class="col-xs-12 col-sm-3">
						<aside>
							<h4><?php the_field('section_headline');?></h4>
							<p><?php the_field('section_copy');?></p>
							<a class="btn rounded dark" href="<?php echo get_field('news_cta')['url'];?>"><?php echo get_field('news_cta')['title'];?></a>
						</aside>
					</div>

					<div class="col-xs-12 col-sm-8">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<a href="<?php the_permalink(); ?>">
										<div class="fill">
											<?php the_post_thumbnail('alm-cta'); ?>
										</div>
									</a>
								</div>

								<div class="col-xs-12 col-sm-8">
									<div class="news-info">
										<span class="date"><?php the_date('m.j.Y'); ?></span>
										<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
										<p><?php the_excerpt(); ?></p>
										<a class="read-more" href="<?php the_permalink(); ?>" class="with-arrow"><span class="chevron-arrow-right"></span>Read More</a>
									</div>
								</div>
							</div>
						<?php endwhile; ?>

					</div>
				</div>
			</section>
		</div>
	</main>
<?php
get_footer();
