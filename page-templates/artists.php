<?php
/**
 * Template Name: Artists
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

get_header(); ?>

    <main class="with-padding">
        <div class="container">
            <header>
                <h2 class="with-margin">Artists</h2>
                <p>Lorem ipsum dolor sit amet, ei erant nemore vulputate vim. Singulis definiebas disputationi usu ei, hinc iusto electram ne duo. Id vel tollit legimus nostrum, at vivendo atomorum consequat vis. </p>
            </header>

            <section class="filter-results">
                <div class="filter-drawer-controls">
                    <button class="btn trigger-drawer"></button>
                </div>
                <div class="filter-drawer">
                    <div class="filter-inner">
                        <ul class="advanced-filter-menu radio-select" data-type="radio" data-parameter="orderby">                    
                            <li>
                                <div class="radio-wrap">
                                    <input id="alphabetical" name="radio-group" type="radio" value="last_name" checked="checked"/>
                                    <label for="alphabetical">Alphabetical</label>
                                </div>
                            </li>

                            <li>
                                <div class="radio-wrap">
                                    <input id="chronological" name="radio-group" type="radio" value="meta_value_num">
                                    <label for="chronological">Chronological</label>
                                </div>
                            </li>
                        </ul>

                        <ul class="advanced-filter-menu check-select" data-type="checkbox" data-parameter="taxonomy-terms"> 
                            <div>
                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="modern" value="modern" type="checkbox">
                                        <label for="modern">Modern</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="painting" value="painting" type="checkbox">
                                        <label for="painting">Painting</label>
                                    </div>
                                </li>
                            </div> 
                            
                            <div>
                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="old-master" value="old-master" type="checkbox">
                                        <label for="old-master">Old Master</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="drawing" value="drawing" type="checkbox">
                                        <label for="drawing">Drawing</label>
                                    </div>
                                </li>
                            </div>
                            
                            <div>
                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="impressionist" value="impressionist" type="checkbox">
                                        <label for="impressionist">Impressionist</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkbox-wrap">
                                        <input id="sculpture" value="sculpture" type="checkbox">
                                        <label for="sculpture">Sculpture</label>
                                    </div>
                                </li>
                            </div>   

                        </ul>
                        <!-- If we decide we want a button for filtering -->
                        <!-- <button type="button" class="submit" id="apply-filters">Apply Filters</button> -->

                    </div>
                </div>
            </section>

            <section class="masonry-layout">
                <?php // echo do_shortcode('[ajax_load_more id="artists" post_type="artist" order="ASC" orderby="title" taxonomy="taxonomy" taxonomy_terms="" taxonomy_operator="IN" pause="false" scroll="true" posts_per_page="12"]'); ?>
                <?php echo do_shortcode('[ajax_load_more id="artists" post_type="artist" order="ASC" orderby="last_name" meta_key="date_of_birth" taxonomy="taxonomy" taxonomy_terms="" taxonomy_operator="IN" pause="false" scroll="true" posts_per_page="12" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up" ]'); ?>
                <?php // orderby="meta_value_num" meta_key="date_of_birth" ?>
            </section>
        </div>

        <!-- Modal -->

        <div class="main-modal">
            <div class="container">
                <section class="single-artist-content">
                    <div class="row around-xs">
                        <div class="col-xs-12 col-sm-5">
                            <div class="artist-gallery">
                                <div class="gallery-slider">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-5 padding-wrap">
                            <div class="artist-bio">
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <span class="close modal-close"></span>
        </div>
    </main>

    <script type="text/javascript">
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
<?php
get_footer();
