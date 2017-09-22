<?php
/**
 * The Template for displaying all single Publications posts
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
						<div class="publications-content">
                            <!-- <h3><?php the_field(''); ?></h3> -->
                            
							<label class="main-label"><?php the_field('publication_title'); ?></label>
                            <p class="small"><?php the_field('publication_subtitle'); ?><?php the_field('publication_brief');?></p>
                            <label class="main-label"><?php the_field('publication_date')?>,<?php the_field('no_of_pages');?></label>			
						</div>
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();