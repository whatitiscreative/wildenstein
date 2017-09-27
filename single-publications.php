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
			<div class="main-modal publications">
				<div class="container">
                    <div class="row around-xs">
                        <div class="col-xs-12 col-sm-6">
                            <div class="publications-modal-img-wrapper">
                                <img class="publications-modal-img" src="<?php the_field('publication_image');?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="publications-content">
                                <label><?php the_field('publication_date');?></label>
                                <h3><?php the_field('publication_title'); ?></h3>
                                <h4 class="pub-border"><?php the_field('publication_subtitle'); ?></h4>
                                <p class="pub-font"><?php the_field('publication_brief'); ?></p>
                                <p class="pub-font"><?php the_field('no_of_pages'); ?>pages</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();

