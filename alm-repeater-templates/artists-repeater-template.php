<!-- ARTISTS REPEATER TEMPLATE -->

<div class="grid-item">
<a href="javascript:void(0);" class="trigger-modal" data-id="<?php echo get_the_id(); ?>" title="<?php the_title(); ?>">
   <?php the_post_thumbnail('alm-cta'); ?>
 </a>

  <div class="artist-info">
    <p><?php the_title();?></p>
    <label><?php the_field('nationality'); ?>, <?php the_field('date_of_birth'); ?>-<?php the_field('date_of_death'); ?></label>    
   </div>
</div>