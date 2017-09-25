<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-block">
				<div class="contact-info">
				<div class="logo-icon bg-image"></div>
					<p><?php the_field('street', 'option'); ?></p>
					<p><?php the_field('city', 'option'); ?><?php the_field('state', 'option'); ?><?php the_field('zip', 'option'); ?></p>
					<p><?php the_field('phone', 'option'); ?></p>
					<p class="email"><a href="mailto:info@wildenstein.com"><?php the_field('email', 'option'); ?></a></p>
					<div class="legal">
						<p><?php the_field('copyright', 'option'); ?></p>
						<p>site by what.it.is</p>
					</div>
				</div>
			</div>

			<div class="footer-block bg-image" style="background-image: url('http://localhost:5132/wp-content/uploads/2017/09/pattern.png')">
				<div class="quote">
					<p><?php the_field('quote', 'option'); ?></p>
					<p class="source">-<?php the_field('quote_source', 'option'); ?></p>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>