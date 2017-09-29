<!-- PUBLICATIONS REPEATER TEMPLATE -->

<div class="grid-item">
    <a href="javascript:void(0);" class="trigger-modal" data-id="<?php echo get_the_id(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('alm-cta'); ?>
    </a>

  <div class="publications-info">
     <p><?php the_field('publication_title'); ?></p>
     <label><?php the_field('publication_subtitle'); ?></label>
   </div>
</div>