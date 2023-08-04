<?php if(talos_get_option('portfolio_single')=='2'){ ?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>	
</head>
<body>	
	<div class="section padding-bottom project-page">
	<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
		_e('Page Canvas For Page Builder', 'talos'); 
	}?>
	</div>
</body>
</html>
<?php }else { ?>
<?php get_header(); ?>
<div class="section half-height" >	
	<div class="parallax-subheader" <?php if( function_exists( 'rwmb_meta' ) ) { ?>       
	        <?php $images = rwmb_meta( '_cmb_port_subheader_image', "type=image" ); ?>
	        <?php if($images){ foreach ( $images as $image ) { ?>
	        <?php 
	        $img =  $image['full_url']; ?>
	          style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"
	        <?php } } ?>
	    <?php } ?>></div>
	<div class="home-text">
		<div class="container fade-elements">
			<div class="twelve columns">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>	
	<a href="#scroll-from-top" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down fade-elements"></div></a>		
</div>

<div class="section back-white project-page" id="scroll-from-top">
	<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
		_e('Page Canvas For Page Builder', 'talos'); 
	}?>
</div>
<div class="section next-pre-background">					
	<div class="project-next-prev">	
		<?php echo previous_post_link('%link', __('<div class="project-prev"><div class="text">prev<br><span>%title</span></div></div>', 'talos'), $post->max_num_pages); ?>
		<?php echo next_post_link('%link', __('<div class="project-next"><div class="text">next<br><span>%title</span></div></div>', 'talos'), $post->max_num_pages); ?>
	</div>
</div>

<?php get_footer(); ?>	
<?php } ?>
