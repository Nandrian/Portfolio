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
            <div class="twelve columns">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <img src="<?php echo talos_get_option( 'logo' ); ?>" alt="">
                    </a> 
                </div>
                <?php
                    $onepage = array(
                        'theme_location'  => 'onepage',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'slimmenu onepage-menu',
                        'menu_id'         => 'mainmenu',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                    );
                    if ( has_nav_menu( 'onepage' ) ) {
                        wp_nav_menu( $onepage );
                    }
                ?>
            </div>
        </div>
    </nav>