<?php 
/**** WooCommerce custom functions ****/

if (class_exists('woocommerce')) {
	
    add_theme_support( 'woocommerce' );   

    /* Enabling product gallery features (zoom, swipe, lightbox) in 3.0.0 */ 
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );  

    /**
	 * Products per page.
	 *
	 * @return integer number of products.
	 */
	function talos_woocommerce_products_per_page() {
		return 6;
	}
	add_filter( 'loop_shop_per_page', 'talos_woocommerce_products_per_page' );

    // breadcrumb woocommerce
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

    // Remove link before and after product
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	add_filter( 'woocommerce_output_related_products_args', 'talos_related_products_args' );
	function talos_related_products_args( $args ) {
		$args['posts_per_page'] = 3; // 4 related products
		$args['columns'] = 3; // arranged in 2 columns
		return $args;
	}

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter( 'woocommerce_add_to_cart_fragments', 'talos_header_add_to_cart_fragment' );
	function talos_header_add_to_cart_fragment( $fragments ) {
		ob_start();
	?>
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="talos-cart"><i class="fa fa-single fa-shopping-cart"></i> <small>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</small></a>
	<?php
		$fragments['a.talos-cart'] = ob_get_clean();
		return $fragments;
	}
}
?>