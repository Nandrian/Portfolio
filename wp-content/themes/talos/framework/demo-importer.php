<?php
/**
 * Hooks for importer
 *
 * @package Talos
 *
 * Importer the demo content
 *
 * @since  1.0
 *
 */

function talos_importer() {
  return array(
    array(
      'name'       => 'Multi Pages',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/multi_pages/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/multi_pages/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/multi_pages/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'sliders'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/multi_pages/sliders.zip',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    
    array(
      'name'       => 'Slider Revolution',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/slider_revolution/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/slider_revolution/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/slider_revolution/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'sliders'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/slider_revolution/sliders.zip',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Home Shop',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/home_shop/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/home_shop/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/home_shop/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'sliders'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/home_shop/sliders.zip',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'App Landing',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/app_landing/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/app_landing/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/app_landing/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Barber Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/barber/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/barber/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/barber/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Blog Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/blog/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/blog/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/blog/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Corporate Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/corporate/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/corporate/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/corporate/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Freelance Creative',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/creative_freelance/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/creative_freelance/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/creative_freelance/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Freelance Design',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/design_freelance/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/design_freelance/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/design_freelance/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Furniture Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/furniture/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/furniture/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/furniture/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Interior & Architecture Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/interior_architecture/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/interior_architecture/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/interior_architecture/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Main demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/main/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/main/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/main/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Medical Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/medical/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/medical/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/medical/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Minimal Case Study',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_case_study/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_case_study/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_case_study/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Minimal Gallery Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_gallery/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_gallery/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/minimal_gallery/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Portfolio Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/portfolio/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/portfolio/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/portfolio/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Restaurant Demo',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/restaurant/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/restaurant/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/restaurant/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),
    array(
      'name'       => 'Video Production',
      'preview'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/video_production/preview.jpg',
      'content'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/video_production/demo-content.xml',
      'customizer' => 'http://oceanthemes.net/plugins-required/talos/talos_demo/video_production/customizer.dat',
      'widgets'    => 'http://oceanthemes.net/plugins-required/talos/talos_demo/widgets.json',
      'pages'      => array(
        'front_page' => 'Home',
        'blog'       => 'Blog',
        'shop'       => 'Shop',
        'cart'       => 'Cart',
        'checkout'   => 'Checkout',
        'my_account' => 'My Account',
      ),
      'menus'      => array(
        'primary'   => 'main-menu',
        'onepage'    => 'one-page-menu',
      )
    ),

  );
}

add_filter( 'soo_demo_packages', 'talos_importer', 30 );