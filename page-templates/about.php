<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>
    <main>
        <div class="hero with-overlay bg-image" style="background-image: url(<?php the_field('cover_image'); ?>)">
            <h1 class="white">About Us</h1>
            <span class="down-arrow"></span>
        </div>

        <section>

        </section>
    </main>


    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
