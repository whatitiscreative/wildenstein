<!-- NOTABLE WORKS REPEATER TEMPLATE -->

<div class="grid-item">
    <a href="javascript:void(0);" class="trigger-modal" data-id="<?php echo get_the_id(); ?>" title="<?php the_title(); ?>">
    <?php the_post_thumbnail('alm-cta'); ?>
    </a>

  <div class="notable-works">
      <p><?php the_field('artist_name'); ?></p>
     <label class="main-label"><?php the_field('title'); ?></label>
   </div>
</div>