<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<?php 
		$subheader = get_post_meta(get_the_ID(),'_cmb_page_subtitle', true);
	?>
	

    <!-- subheader -->
    <section class="padding-bottom padding-top-page shop-page">
    	<div class="parallax-shop-page" 
    		<?php if( function_exists( 'rwmb_meta' ) ) { ?>      
            <?php $images = rwmb_meta( '_cmb_subheader_image', "type=image" ); ?>
            <?php if($images){ foreach ( $images as $image ) { ?>
            <?php 
            $img =  $image['full_url']; ?>
              style="background-image: url('<?php echo esc_url($img); ?>');"
            <?php } } ?>
        <?php } ?>
    	></div>
        <div class="container z-bigger">
            <div class="row">
                <div class="twelve columns">                    
					<?php if($subheader){ ?><p><?php echo htmlspecialchars_decode($subheader); ?></p><?php } ?>
					<h1><?php the_title(); ?></h1>	
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

	

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

	<?php if(talos_get_option('shop_layout')=='2'){ ?>   
        <div class="four columns">  
            <?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
        </div> 
    <?php } ?>
	
	<div class="<?php if(talos_get_option('shop_layout')=='3'){echo 'twelve columns';}else{echo 'eight columns';} ?>">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>	

	<?php if(talos_get_option('shop_layout')=='1'){ ?>   
        <div class="four columns">  
            <?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
        </div> 
    <?php } ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer(); ?>
