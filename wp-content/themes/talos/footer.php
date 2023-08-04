<?php
/**
 * The template for displaying the footer
 */
?>

<div class="section back-dark padding-top-bottom overflow-hidden footer">
	<div class="container">
		<?php get_sidebar('footer');?>	
		<?php if(talos_get_option( 'footer_bottom' )){ ?>
			<div class="six columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="footer-top">
					<img src="<?php echo talos_get_option( 'logo_footer' ); ?>" alt="Some image" />
				</div>
			</div>
			<div class="six columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="footer-top">
					
					<div class="social-footer">
						<ul class="list-social-footer">
							<?php $socials = talos_get_option( 'footer_socials', array() ); ?>
							<?php foreach ( $socials as $social ) { ?>									
								<li class="icon-footer">
									<a href="<?php echo esc_url($social['link']); ?>"><i class="fa <?php echo esc_attr($social['icon']); ?>"></i></a>
								</li>
							<?php } ?>   
						</ul>	
					</div>
				</div>
			</div>
			<div class="twelve columns remove-top remove-bottom" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="footer-line"></div>
			</div>
			<div class="five columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="left-footer">
					<p><?php echo htmlspecialchars_decode(talos_get_option('text_left')) ?></p>
				</div>
			</div>
			<div class="two columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="arrow-up-footer scroll-to-top"></div>
			</div>
			<div class="five columns" data-scroll-reveal="enter bottom move 100px over 1s after 0.4s">
				<div class="right-footer">
					<p><?php echo htmlspecialchars_decode(talos_get_option('text_right')) ?></p>
				</div>
			</div>
		<?php } ?>
	</div>	
</div>	
<?php wp_footer(); ?>
    
</body>
</html>