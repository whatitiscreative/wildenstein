<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
	<main>
		<div class="hero with-overlay bg-image with-icon" style="background-image: url('http://localhost:5132/wp-content/uploads/2017/09/bg.png')">
			<h1 class="white">About Us</h1>
			<span class="down-arrow"></span>
		</div>
		<?php if(have_rows('content_blocks')):?>
			<?php while(have_rows('content_blocks')): the_row(); ?>
			<section class="background">
				<div class="container">
					<div class="row center-xs">
						<div class="col-xs-12 col-md-6 section-image"> 
							<div class="bg-image" style="background-image: url(<?php the_sub_field('section_image'); ?>)"></div>
						</div>
						<div class="col-xs-12 col-md-6 about-content"> 
							<h3><?php (the_sub_field('subhead'));?></h3>
							<h4><?php (the_sub_field('headline'));?></h4>
							<p><?php (the_sub_field('body_copy'));?></p>
						</div>
					</div>
				</div>
				
			</section>
			<?php endwhile;?>
		<?php endif;?>
    </main>
<?php
get_footer();
