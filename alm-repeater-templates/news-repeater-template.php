<!-- NEWS REPEATER TEMPLATE -->

<div class="row">
    <div class="col-xs-5 col-sm-4">
        <a href="<?php the_permalink(); ?>">
            <div class="fill">
                <?php the_post_thumbnail('alm-cta'); ?>
            </div>
        </a>
    </div>

    <div class="col-xs-7 col-sm-8">
        <div class="news-info">
            <span class="date"><?php the_date('m.j.Y'); ?></span>
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <div class="desktop">
                <p><?php the_excerpt(); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>" class="with-arrow"><span class="chevron-arrow-right"></span>Read More</a>
            </div>
        </div>
    </div>
</div>