<div class="contact-modal">
    <span class="close"></span>
    <div class="contact-info">
        <div class="logo-icon bg-image"></div>
        <label>Address</label>
        <h3><?php the_field('street', 'option'); ?></h3>
        <h3><?php the_field('city', 'option'); ?>,<?php the_field('state', 'option'); ?>&nbsp;<?php the_field('zip', 'option'); ?></h3>
        <h3><?php the_field('phone', 'option'); ?></h3>
        <label>Email</label>
        <h3 class="email"><a href="mailto:info@wildenstein.com"><?php the_field('email', 'option'); ?></a></h3>
    </div>
</div>