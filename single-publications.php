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
                <section class="single-publications-content">
                    <?php
                    while ( have_posts() ) : the_post(); ?>
                        <div class="row around-xs">
                            <div class="col-xs-12 col-sm-5">
                                <div class="image-gallery">
                                    <div class="gallery-slider">
                                    <?php while(have_rows('image_gallery')): the_row(); ?>
                                        <div>
                                            <div class="bg-image"  style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
                                            <label class="main-label"><?php the_sub_field('image_caption'); ?></label>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="publications-content">
                                        <label class="pub_date"><?php the_field('publication_date');?></label>
                                        <h3><?php the_field('publication_title'); ?></h3>
                                        <label class="pub-border"><?php the_field('publication_subtitle'); ?></label>
                                        <label class="pub-font"><?php the_field('publication_brief'); ?></label>
                                        <label class="pub-font"><?php the_field('no_of_pages'); ?>pages</label>
                                    </div>
                                </div>
                                
                        </div>
                    <?php endwhile; ?>
                </section>    
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();

