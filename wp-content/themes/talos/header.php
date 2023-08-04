<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Talos
 * @since Talos 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>       
<?php if(talos_get_option('preload')){ ?><div id="royal_preloader"></div><?php } ?>    
    <nav id="<?php if(talos_get_option( 'sticky' )){echo 'menu-wrap';}else{echo 'menu-wraps';} ?>" class="menu-back <?php if(talos_get_option( 'sticky' )){echo 'cbp-af-header';} ?>">
        <div class="container">
            <div class="twelve columns multi-page">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <img src="<?php echo talos_get_option( 'logo' ); ?>" alt="">
                    </a> 
                </div>
                
                <?php
                    $primary = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'slimmenu sf-menu',
                        'menu_id'         => 'mainmenu',
                        'echo'            => true,
                        'fallback_cb'     => 'talos_Walker_Mega_Menu::fallback',
                        'walker'          => new talos_Walker_Mega_Menu(),
                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                    );
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( $primary );
                    }
                ?>
            </div>
        </div>
    </nav>

    <?php if(talos_get_option('cart_button')){ ?>
        <?php if (function_exists('Woocommerce')) { ?>
            <!-- Top Cart -->
            <div class="cart-slide-out">
                <i class="icon-basket"></i>
                <div class="cart-slide-out-item">
                    <?php woocommerce_mini_cart(); ?>
                </div>                
            </div>
        <?php } ?>
    <?php } ?>