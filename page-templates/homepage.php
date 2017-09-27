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
				</div>
			</section>
		</div>

		<div class="hero with-overlay bg-image with-icon" style="background-image: url(<?php the_field('cover_image');?>)">
			<h1 class="white"><?php the_field('headline');?></h1>
			<a class="btn rounded dark" href="<?php echo get_field('feature_cta')['url'];?>"><?php echo get_field('feature_cta')['title'];?></a>
		</div>

		<div class="container">
			<section class="latest-news">
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-3">
						<aside>
							<h4><?php the_field('section_headline');?></h4>
							<p><?php the_field('section_copy');?></p>
							<a class="btn rounded dark" href="<?php echo get_field('news_cta')['url'];?>"><?php echo get_field('news_cta')['title'];?></a>
						</aside>
					</div>

					<div class="col-xs-12 col-sm-8">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<a href="#">
									<div class="fill">
										<img src="http://localhost:5132/wp-content/uploads/2017/09/news2.png">
									</div>
								</a>
							</div>

							<div class="col-xs-12 col-sm-8">
								<div class="news-info">
									<span class="date">05.22.2017</span>
									<a href="#"><h4>News Title</h4></a>
									<p>This is news</p>
									<a class="read-more" href="#" class="with-arrow"><span class="chevron-arrow-right"></span>Read More</a>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<a href="#">
									<div class="fill">
										<img src="http://localhost:5132/wp-content/uploads/2017/09/news2.png">
									</div>
								</a>
							</div>

							<div class="col-xs-12 col-sm-8">
								<div class="news-info">
									<span class="date">05.22.2017</span>
									<a href="#"><h4>News Title</h4></a>
									<p>This is news</p>
									<a class="read-more" href="#" class="with-arrow"><span class="chevron-arrow-right"></span>Read More</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		</div>
	</main>
<?php
get_footer();
