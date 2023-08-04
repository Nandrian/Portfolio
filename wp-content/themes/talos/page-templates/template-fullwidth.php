<?php
/**
 * Template Name: Template Full Width
 */
get_header(); 
$subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle_page', true);
$title = get_post_meta(get_the_ID(),'_cmb_page_title_page', true);
?>

<div class="section padding-bottom padding-top-page back-white" id="top">
    <div class="parallax-title-top"
        <?php if( function_exists( 'rwmb_meta' ) ) { ?>      
            <?php $images = rwmb_meta( '_cmb_subheader_image_page', "type=image" ); ?>
            <?php if($images){ foreach ( $images as $image ) { ?>
            <?php 
            $img =  $image['full_url']; ?>
              style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"
            <?php } } ?>
        <?php } ?>
    ></div>  
    <div class="container z-bigger fade-elements">
        <div class="twelve columns">
            <div class="title-text top-page-title">
                <?php if($subtitle){ ?><p><?php echo htmlspecialchars_decode($subtitle); ?></p><?php } ?>
                <h3><?php if(!empty($title)){echo htmlspecialchars_decode($title);}else{the_title();} ?></h3>
            </div>
        </div>
    </div>
</div>

<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
		_e('Page Canvas For Page Builder', 'talos'); 
}?>

<?php get_footer(); ?>