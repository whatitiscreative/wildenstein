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
		
		<footer id="colophon" class="site-footer" role="contentinfo" style="background-image: url('http://wildensteinandco.flywheelsites.com/wp-content/uploads/2017/10/footer-pattern.png')">
			<div class="container">
				<div class="row footer-row">

				<div class="col-xs-12 col-sm-6">
						<div class="footer-block contact-block">
							<div class="contact-info">
								<div class="logo-icon bg-image"></div>
								<p><?php the_field('street', 'option'); ?></p>
								<p><?php the_field('city', 'option'); ?>,&nbsp;<?php the_field('state', 'option'); ?>&nbsp;<?php the_field('zip', 'option'); ?></p>
								<p><?php the_field('phone', 'option'); ?></p>
								<p class="email"><a href="mailto:info@wildenstein.com"><?php the_field('email', 'option'); ?></a></p>
								<div class="legal">
									<p><?php the_field('copyright', 'option'); ?></p>
									<p>site by <a target="_blank" href="http://what.it.is/">what.it.is</a></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-5 col-sm-offset-1">
						<div class="footer-block quote-block">
							<div class="quote">
								<span class="quote-mark"></span>
								<p><?php the_field('quote', 'option'); ?></p>
								<p class="source">-&nbsp;<?php the_field('quote_source', 'option'); ?></p>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</footer>
	<!-- #colophon -->
	</div><!-- #page -->

	<?php get_template_part('partials/content', 'contact-modal'); ?>

	<?php wp_footer(); ?>
</body>
</html>