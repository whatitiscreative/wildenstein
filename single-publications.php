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
						<section class="publications">
                            <div class="row around-xs">
                                
                                <div class="col-xs-12 col-sm-5">
                                    <div class="publications-content">
                                        <label><?php the_field('publication_date');?></label>
                                        <h3><?php the_field('publication_title'); ?></h3>
                                        <label class="main-label"><?php the_field('publication_subtitle'); ?></label>
                                        <label><?php the_field('publication_brief'); ?></label>
                                        <label><?php the_field('no_of_pages'); ?></label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="publications-image">
                                        <div class="bg-image" style="background-image: url(<?php the_field('publication_image'); ?>)"></div>
                                    </div>
                                </div>

                            </div>
                        </section>
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();