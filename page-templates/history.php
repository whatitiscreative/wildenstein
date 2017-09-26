<?php
/**
 * Template Name: History
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
	<main>                 
        <div class="hero with-overlay bg-image with-icon" style="background-image: url('http://localhost:5132/wp-content/uploads/2017/09/bg-history-no-overlay.png')">
            <h1 class="white">Our History</h1>
            <h4 class="white"><?php the_field('scroll_cta');?></h4> 
            <span class="down-arrow"></span>
        </div>

        <section class="history-body">
            <div class="container">
                <?php if(have_rows('content_blocks')):?>
                    <?php while(have_rows('content_blocks')): the_row(); ?>
                        <div class="row center-xs">
                            <div class="col-xs-12 col-md-6 section-image"> 
                                <div class="bg-image" style="background-image: url(<?php the_sub_field('section_image'); ?>)"></div>
                                <div></div> 
                            </div>
                            <div class="col-xs-12 col-md-6 content-block history-content"> 
                                <h4><?php (the_sub_field('year'));?></h4>
                                <h3><?php (the_sub_field('headline'));?></h3>
                                <p><?php (the_sub_field('body_copy'));?></p>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
        </section>
    </main>
<?php
get_footer();
