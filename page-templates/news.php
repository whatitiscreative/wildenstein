<?php
/**
 * Template Name: News
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
    <main>
        <div class="container">
            <header>
                <h2><?php the_title();?></h2>
            </header>

            <section class="news-layout">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-10">
                        <div class="news-index">
                            <?php echo do_shortcode('[ajax_load_more repeater="template_1" post_type="news" order="DSC" pause="false" scroll="true" posts_per_page="8"]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
