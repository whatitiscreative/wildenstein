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
				<div class="display">
				<div class="notable-works-content">
					
						<div class="nw-modal-img-wrapper">
							<img class="nw-modal-img" src="" style="background-image: url(<?php the_field('image'); ?>)">
						</div>
						<div class="layout">
							<p><?php the_field('artist_name'); ?></p>
							<label class="main-label"><?php the_field('title'); ?></label>
							<label><?php the_field('supporting_details'); ?></label>								
						</div>
				</div>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();