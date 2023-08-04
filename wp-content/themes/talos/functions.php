<?php
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package talos
 */

//Custom fields:
require_once get_template_directory() . '/framework/meta-boxes.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/template-tags.php';

require_once get_template_directory() . '/framework/color.php';
require_once get_template_directory() . '/framework/styling.php';

if( is_admin() ) {
  require get_template_directory() . '/framework/nav-menus.php';
} else {
  // Frontend functions and shortcodes
  require get_template_directory() . '/framework/menu-walker.php'; 
}

//Theme Set up:
function talos_theme_setup() {

    /** Set Content width **/
    if ( ! isset( $content_width ) ) {
        $content_width = 900;
    }

   /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on cubic, use a find and replace
     * to change 'cubic' to the name of your theme in all the template files
     */
	load_theme_textdomain( 'talos', get_template_directory() . '/languages' );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'video', 'quote',
    ) );
	//Tags
	add_theme_support( 'title-tag' );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__('Primary Menu', 'talos'),
		'onepage'   => esc_html__('One Page Menu', 'talos'),
	) );

    if( is_admin()  ) {
      new talos_Walker_Nav_Menu_Custom_Fields;
    }
}
add_action( 'after_setup_theme', 'talos_theme_setup' );

function talos_load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'talos_load_custom_wp_admin_style' );

function talos_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans: on or off', 'talos' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $poppins = _x( 'on', 'Poppins: on or off', 'talos' );

     /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $parisienne = _x( 'on', 'Parisienne: on or off', 'talos' );
     
    if ( 'off' !== $open_sans || 'off' !== $poppins || 'off' !== $parisienne ) {
        $font_families = array();
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic';
        }

        if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:300,400,500,600,700&subset=devanagari,latin-ext';
        }  
        if ( 'off' !== $parisienne ) {
            $font_families[] = 'Parisienne';
        }    
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

function talos_theme_scripts_styles() {
	$protocol = is_ssl() ? 'https' : 'http';
  $mapapikey = talos_get_option('mapapikey');
  
  // Add custom fonts, used in the main stylesheet.
  wp_enqueue_style( 'talos-fonts', talos_fonts_url(), array(), null );

  /** All frontend css files **/ 
  wp_enqueue_style( 'talos', get_template_directory_uri().'/css/talos.css');    
 wp_enqueue_style( 'talos-font-awesome', get_template_directory_uri().'/css/font-awesome.css');   
  wp_enqueue_style( 'talos-font-etline', get_template_directory_uri().'/css/et-line.css');  
  wp_enqueue_style( 'talos-monosocial', get_template_directory_uri().'/lib/monosocialiconsfont/monosocialiconsfont.min.css');
  wp_enqueue_style( 'talos-typicons', get_template_directory_uri().'/lib/typicons/src/font/typicons.min.css');
  wp_enqueue_style( 'talos-entypo', get_template_directory_uri().'/lib/vc-entypo/vc_entypo.min.css');
  wp_enqueue_style( 'talos-linecons', get_template_directory_uri().'/lib/vc-linecons/vc_linecons_icons.min.css');
  wp_enqueue_style( 'talos-material', get_template_directory_uri().'/lib/vc-material/vc_material.css');
  wp_enqueue_style( 'talos-iconic', get_template_directory_uri().'/lib/vc-open-iconic/vc_openiconic.min.css');  
  
  if (class_exists('Woocommerce')) {
    wp_enqueue_style( 'talos-woocommerce', get_template_directory_uri().'/css/woocommerce.css');
  }
  if(talos_get_option('preload_style')=='2'){
    wp_enqueue_style( 'talos-preload', get_template_directory_uri().'/css/preload2.css');
  }
  if(talos_get_option('preload_style')=='3'){
    wp_enqueue_style( 'talos-preload', get_template_directory_uri().'/css/preload3.css');
  }
  if(talos_get_option('preload_style')=='4'){
    wp_enqueue_style( 'talos-preload', get_template_directory_uri().'/css/preload4.css');
  }
  if(talos_get_option('preload_style')=='5'){
    wp_enqueue_style( 'talos-preload', get_template_directory_uri().'/css/preload5.css');
  }
  if(talos_get_option('preload_style')=='6'){
    wp_enqueue_style( 'talos-preload', get_template_directory_uri().'/css/preload6.css');
  }

  wp_enqueue_style( 'talos-style', get_stylesheet_uri(), array(), '22-11-2016' );


    /** Js for comment on single post **/    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    	wp_enqueue_script( 'comment-reply' );
	}

    /** All frontend js files **/    
	if(talos_get_option('preload')){
    wp_enqueue_script("talos-royal-preloader", get_template_directory_uri()."/js/royal_preloader.min.js",array('jquery'),false,false); 
  }  
  
  if ($mapapikey != '') {
    wp_enqueue_script("talos-mapapi", "$protocol://maps.googleapis.com/maps/api/js?key=$mapapikey",array('jquery'),false,false);
  }  

  wp_enqueue_script("talos-modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array('jquery'),false,false); 
  wp_enqueue_script("talos-parallax", get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",array('jquery'),false,false);
  wp_enqueue_script("talos-masonry", get_template_directory_uri()."/js/masonry.js",array('jquery'),false,true);
  wp_enqueue_script("talos-isotope-js", get_template_directory_uri()."/js/isotope.js",array('jquery'),false,true);
  wp_enqueue_script("talos-fancybox", get_template_directory_uri()."/js/jquery.fancybox.pack.js",array('jquery'),false,true);
  wp_enqueue_script("talos-letters", get_template_directory_uri()."/js/letters.js",array('jquery'),false,true);
  wp_enqueue_script("talos-plugins", get_template_directory_uri()."/js/plugins.js",array('jquery'),false,true); 
  wp_enqueue_script("talos-custom", get_template_directory_uri()."/js/custom.js",array('jquery'),false,true);  
    	    
}
add_action( 'wp_enqueue_scripts', 'talos_theme_scripts_styles');

// Widget Sidebar
function talos_widgets_init() {
	register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'talos' ),
    'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'talos' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h6>',        
		'after_title'   => '</h6>'
  ) );
	register_sidebar( array(
    'name'          => esc_html__( 'Shop Sidebar', 'talos' ),
    'id'            => 'shop-sidebar',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'talos' ),        
    'before_widget' => '<div id="%1$s" class="widget %2$s">',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h6>',        
    'after_title'   => '</h6>'
  ) );
  register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'talos' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'talos' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'talos' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'talos' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'talos' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'talos' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'talos' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'talos' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );    
    
}
add_action( 'widgets_init', 'talos_widgets_init' );




/**
 * Customizer Shop.
 */
require get_template_directory() . '/framework/woocommerce-customize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer.php';

//if(class_exists('WPBakeryVisualComposerSetup')){
// Add new Param in Row
if(function_exists('vc_add_param')){
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => esc_html__('Container Class', 'talos'),
                              "param_name" => "container_class",
                              "value" => "",      
                            ) 
    );
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => esc_html__('Fullwidth', 'talos'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                esc_html__('No', 'talos') => 'no',  
                                                esc_html__('Yes', 'talos') => 'yes',                                                                                
                                              ),
                              "description" => esc_html__("Select Fullwidth or not, Default: No fullwidth", "talos"),      
                            ) 
    );

vc_add_param('vc_row',array(
                              "type" => "checkbox",
                              "heading" => esc_html__('Use Background Image Parallax', 'talos'),
                              "param_name" => "parallax_bg",
                              "value" => '',
                              "description" => esc_html__("If checked columns will use background parallax.", "talos"),      
                            ) 
    );
vc_add_param('vc_row',array(
                              'type' => 'attach_image',
                              'heading' => esc_html__( 'Image', 'talos' ),
                              'param_name' => 'parallax_bg_image',
                              'value' => '',
                              'description' => esc_html__( 'Select image from media library.', 'talos' ),
                              'dependency' => array(
                                  'element' => 'parallax_bg',
                                  'not_empty' => true,
                                ),     
                            ) 
    );
vc_add_param('vc_row',array(
                              "type" => "checkbox",
                              "heading" => esc_html__('Image Cover', 'talos'),
                              "param_name" => "parallax_bg_cover",
                              "value" => '',
                              "description" => esc_html__("If checked image will cover.", "talos"), 
                              'dependency' => array(
                                  'element' => 'parallax_bg',
                                  'not_empty' => true,
                                ),     
                            ) 
    );
	

	
  vc_remove_param( "vc_row", "parallax" );
  vc_remove_param( "vc_row", "parallax_image" );
  vc_remove_param( "vc_row", "full_width" );  
  vc_remove_param( "vc_row", "video_bg_parallax" );
  vc_remove_param( "vc_row", "content_placement" );
	vc_remove_param( "vc_row", "parallax_speed_bg" );
	vc_remove_param( "vc_row", "parallax_speed_video" );
    
}

//Remove Customizer
add_action( "customize_register", "talos_customize_register" );
function talos_customize_register( $wp_customize ) {
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('colors');
}

/**
 * Require plugins install for this theme.
 *
 * @since Talos 1.0
 */
require_once get_template_directory() . '/framework/plugin-requires.php';


/**
 * Demo Content for this theme.
 *
 * @since Talos 1.0
 */
 require_once get_template_directory() . '/framework/demo-importer.php'; 

?>