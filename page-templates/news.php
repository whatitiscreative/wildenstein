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
                <h2>News</h2>
                <p>Lorem ipsum dolor sit amet, ei erant nemore vulputate vim. Singulis definiebas disputationi usu ei, hinc iusto electram ne duo. Id vel tollit legimus nostrum, at vivendo atomorum consequat vis. </p>
            </header>

            <section class="masonry-layout">
                <?php echo do_shortcode('[ajax_load_more post_type="news" order="ASC" pause="false" scroll="true" posts_per_page="12" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up" ]'); ?>
            </section>
        </div>

    </main>


    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
