<?php
/**
 * Template Name: Notable Works
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
    <main>
        <div class="container">
            <header>
                <h2><?php the_field('page_title'); ?></h2>
                <p><?php the_field('artist_overview_text');?> </p>
            </header>

            <section class="masonry-layout">
                <?php echo do_shortcode('[ajax_load_more repeater="template_1" post_type="notableworks" order="ASC" pause="false" scroll="true" posts_per_page="12" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up" ]'); ?>
            </section>
        </div>

        <!-- Modal -->

        <div class="main-modal notable-works">
            <div class="container">
                <div class="row center-xs">
                    <div class="col-xs-6">
                        <div class="notable-works-content">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-close">CLOSE</div>
        </div>
    </main>


    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
