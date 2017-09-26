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
					<h3 class="white">A Legacy of Prestigious Artworks</h3>
					<p class="white">Lorem ipsum dolor sit amet, ei erant nemore vulputate vim. Singulis definiebas disputationi usu ei, hinc iusto electram ne duo. Id vel tollit legimus nostrum, at vivendo atomorum consequat vis.</p>
					<a class="btn rounded light">Notable Works</a>
				</div>
			</div>

			<div class="hero-block" style="background-image: url('http://localhost:5132/wp-content/uploads/2017/09/painting-1.png')">

			</div>
		</div>

		<div class="container">
			<section class="featured-artists">
				<div class="intro">
					<div class="row center-xs">
						<div class="col-xs-12 col-sm-3">
							<aside>
								<h4>A Legacy of Prestigious Artworks</h4>
								<a class="btn rounded dark">View All Artists</a>
							</aside>
						</div>

						<div class="col-xs-12 col-sm-5 col-sm-offset-1">
							<p>Lorem ipsum dolor sit amet, no duo natum magna mandamus, putent omittam per te. Habeo expetenda qui ei. Ne vis integre admodum salutatus. Ex omnes recteque vix, sea graeci facilisi in. Et ius homero reprehendunt. Graeco equidem eligendi et eos.</p>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="hero with-overlay bg-image with-icon" style="background-image: url('http://localhost:5132/wp-content/uploads/2017/09/bg-history-no-overlay.png')">
			<h1 class="white">Our History</h1>
			<a class="btn rounded dark">View All News</a>
		</div>

		<div class="container">
			<section class="latest-news">
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-3">
						<aside>
							<h4>The Latest News</h4>
							<p>Lorem ipsum dolor sit amet, ex duo mollis propriae detracto, bonorum electram expetendis ut duo.</p>
							<a class="btn rounded dark">View All News</a>
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
