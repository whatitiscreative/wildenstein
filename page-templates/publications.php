<?php
/**
 * Template Name: Publications
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
                <p><?php the_field('publications_overview_text');?> </p>
            </header>
           
            <!-- <div class="row"> -->
                <!-- <div class=> -->
                    <section class="masonry-layout">
                        <?php echo do_shortcode('[ajax_load_more repeater="template_5" post_type="publications" order="ASC" pause="false" scroll="true" posts_per_page="12" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up" ]'); ?>
                    </section>
                <!-- </div> -->
            <!-- </div> -->
        </div>

        <!-- Modal -->

        <div class="main-modal">
            <div class="container">
                <section class="publications">
                    <div class="row around-xs">
                        <div class="col-xs-12 col-sm-5">
                            <div class="publications-content">
                                    
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="publications-image">

                            </div>
                        </div>

                        

                    </div>
                </section>
            </div>

            <div class="modal-close">CLOSE</div>
        </div>
    </main>


    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
