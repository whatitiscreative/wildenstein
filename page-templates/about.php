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
        <div class="container">
                 
			<div class="hero with-overlay bg-image" style="background-image: url(<?php the_field('cover_image'); ?>)">
				<h2 class="white">About Us</h2>
				<span class="down-arrow"></span>
			</div>
			<?php if(have_rows('content_blocks')):?>
				<?php while(have_rows('content_blocks')): the_row(); ?>
				<section class="background">
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
</section>
				<?php endwhile;?>
			<?php endif;?>
        </div>
    </main>
<?php
get_footer();
