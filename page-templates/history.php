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
    <div class="hero with-overlay bg-image with-icon framed" style="background-image: url('<?php the_field('cover_image'); ?>')">
        <h1 class="white">Our History</h1>
        <label><?php the_field('scroll_cta'); ?></label>
        <span class="down-arrow"></span>
    </div>
    <?php if(have_rows('content_blocks')):?>
        <?php while(have_rows('content_blocks')): the_row(); ?>
        <section class="section-block">
            <div class="container">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-4"> 
                        <img src="<?php the_sub_field('section_image'); ?>">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-sm-offset-1"> 
                        <div class="text-block">
                            <span class="date"><?php (the_sub_field('year'));?></span>
                            <h3><?php (the_sub_field('headline'));?></h3>
                            <p><?php (the_sub_field('body_copy'));?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile;?>
    <?php endif;?>
</main>
<?php
get_footer();
