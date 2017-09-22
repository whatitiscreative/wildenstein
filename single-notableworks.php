<?php
/**
 * The Template for displaying all single Notable Works posts
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
						<div class="notable-works-content">
							<div class="bg-image" style="background-image: url(<?php the_field('image'); ?>)"></div>
							<label><?php the_field('artist_name'); ?></label>
							<label class="main-label"><?php the_field('title'); ?></label>
							<label><?php the_field('supporting_details'); ?></label>								
						</div>
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();