<?php
/**
 * alos theme customizer
 *
 * @package talos
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class talos_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function talos_get_option( $name ) {
	global $talos_customize;

	if ( empty( $talos_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $talos_customize->get_theme(), $name );
	} else {
		$value = $talos_customize->get_option( $name );
	}

	return apply_filters( 'talos_get_option', $value, $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function talos_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'talos_customize_modify' );

/**
 * Customizer configuration
 */
$talos_customize = new talos_Customize(
	array(
		'theme'    => 'talos',
		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_html__( 'General', 'talos' ),
			),
			'header'  => array(
				'priority' => 11,
				'title'    => esc_html__( 'Header', 'talos' ),
			),
			'socials'  => array(
				'priority' => 210,
				'title'    => esc_html__( 'Socials', 'talos' ),
			),
		),

		'sections' => array(

			// Panel Header
			'logo'        => array(
				'title'       => esc_html__( 'Site Logo', 'talos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'header'      => array(
				'title'       => esc_html__( 'Navigation', 'talos' ),
				'description' => '',
				'priority'    => 15,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'page_header' => array(
				'title'       => esc_html__( 'Page Header', 'talos' ),
				'description' => '',
				'priority'    => 20,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),

			// Panel Socials
			'socials'      => array(
				'title'       => esc_html__( 'Socials', 'talos' ),
				'description' => '',
				'priority'    => 121,
				'capability'  => 'edit_theme_options',
			),
			
			// Panel Content
			'content'     => array(
				'title'       => esc_html__( 'Blog Setting', 'talos' ),
				'description' => '',
				'priority'    => 122,
				'capability'  => 'edit_theme_options',
			),			

			// Panel Portfolio
			'portfolio'     => array(
				'title'       => esc_html__( 'Portfolio Settting', 'talos' ),
				'description' => '',
				'priority'    => 123,
				'capability'  => 'edit_theme_options',
			),

			// Panel Shop
			'shop'     => array(
				'title'       => esc_html__( 'Shop Setting', 'talos' ),
				'description' => '',
				'priority'    => 124,
				'capability'  => 'edit_theme_options',
			),

			// Panel Footer
			'footer'     => array(
				'title'       => esc_html__( 'Footer', 'talos' ),
				'description' => '',
				'priority'    => 125,
				'capability'  => 'edit_theme_options',
			),

			// 404 
			'404'     => array(
				'title'       => esc_html__( '404 Setting', 'talos' ),
				'description' => '',
				'priority'    => 126,
				'capability'  => 'edit_theme_options',
			),

			// Coming Soon
			'csoon'     => array(
				'title'       => esc_html__( 'Coming Soon', 'talos' ),
				'description' => '',
				'priority'    => 127,
				'capability'  => 'edit_theme_options',
			),

			// Styling Setting
			'styling'     => array(
				'title'       => esc_html__( 'Styling Setting', 'talos' ),
				'description' => '',
				'priority'    => 128,
				'capability'  => 'edit_theme_options',
			),
			// Preload Setting
			'preload_config'     => array(
				'title'       => esc_html__( 'Preload Setting', 'talos' ),
				'description' => '',
				'priority'    => 129,
				'capability'  => 'edit_theme_options',
			),
			'miscellaneous_section'     => array(
				'title'       => esc_attr__( 'Miscellaneous', 'talos' ),
				'description' => '',
				'priority'    => 196,
				'capability'  => 'edit_theme_options',
			),	
		),

		'fields'   => array(
			'bg_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Main Menu', 'talos' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),
			'color_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Menu', 'talos' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),
			'bg_submenu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Sub Menu', 'talos' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),
			'sticky'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Sticky Header', 'talos' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
			),
			'bg_menu_scroll'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Main Menu Scroll', 'talos' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'sticky',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bg_menu_m'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Main Menu Mobile', 'talos' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),

			// Theme Main Color & Custom CSS Code
			'main_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Primary Color', 'talos' ),
				'section'  => 'styling',
				'default'  => '#73c026',
				'priority' => 10,
			),			

			// Logo
			'logo'           => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo', 'talos' ),
				'section'  => 'logo',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'images/logo.png',
				'priority' => 10,
			),
			'logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width on Desktop', 'talos' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height on Desktop', 'talos' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin on Desktop', 'talos' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '',
					'bottom' => '',
					'left'   => '',
					'right'  => '',
				),
			),

			'logo_width_mobile'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width on Mobile', 'talos' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_height_mobile'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height on Mobile', 'talos' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_position_mobile'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin on Mobile', 'talos' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '',
					'bottom' => '',
					'left'   => '',
					'right'  => '',
				),
			),

			// Blog			
			'blog_layout'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Blog Layout', 'talos' ),
				'section'  => 'content',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					'1' => esc_html__( 'Right Sidebar', 'talos' ),
					'2' => esc_html__( 'Left Sidebar', 'talos' ),
					'3' => esc_html__( 'Fullwidth', 'talos' ),
				),
			),
			'page_header_bg'=> array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background header', 'talos' ),
				'section'  => 'content',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'images/type.png',
				'priority' => 10,
			),
			'excerpt_length' => array(
				'type'    => 'number',
				'label'   => esc_html__( 'Excerpt Length', 'talos' ),
				'section' => 'content',
				'default' => 30,
				'choices' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),

			// Portfolio			
			'portfolio_single'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Portfolio Single', 'talos' ),
				'section'  => 'portfolio',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					'1' => esc_html__( 'Single Page', 'talos' ),
					'2' => esc_html__( 'Load Ajax Content', 'talos' ),
				),
			),

			// Shop			
			'shop_layout'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Shop Layout', 'talos' ),
				'section'  => 'shop',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					'1' => esc_html__( 'Right Sidebar', 'talos' ),
					'2' => esc_html__( 'Left Sidebar', 'talos' ),
					'3' => esc_html__( 'Fullwidth', 'talos' ),
				),
			),
			'cart_button'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Cart Button Show?', 'talos' ),
				'section'     => 'shop',
				'default'     => '1',
				'priority'    => 10,
			),

			//Footer			
			'bg_footer'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color Footer', 'talos' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
			),
			'color_footer'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Footer', 'talos' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
			),
			'footer_bottom'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Footer Bottom', 'talos' ),
				'section'     => 'footer',
				'default'     => '1',
				'priority'    => 10,
			),
			'logo_footer'    => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo Footer', 'talos' ),
				'section'  => 'footer',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'images/logo.png',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'footer_bottom',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'footer_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials', 'talos' ),
				'section'  => 'footer',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'talos' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'talos' ),
						'default'     => '',
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link URL', 'talos' ),
						'description' => esc_html__( 'This will be the social link', 'talos' ),
						'default'     => '',
					),
				),
				'active_callback' => array(
					array(
					  	'setting'  => 'footer_bottom',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'text_left'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Text Left Footer Bottom', 'talos' ),
				'section'     => 'footer',
				'default'     => '2022 © Talos. All rights reserved.',
				'priority'    => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'footer_bottom',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'text_right'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Text Right Footer Bottom', 'talos' ),
				'section'     => 'footer',
				'default'     => 'With love from OceanThemes.',
				'priority'    => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'footer_bottom',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),

			//miscellaneous
			'mapapikey'     => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Add Your Google Map API Key', 'talos' ),
				'section'     => 'miscellaneous_section',
				'default'     => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI',
				'priority'    => 10,	
				'description' => 'Get an API Key here: https://developers.google.com/maps/documentation/javascript/get-api-key',			
			),

			// 404
			'bg404'           => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background Image', 'talos' ),
				'section'  => '404',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'images/404.jpg',
				'priority' => 10,
			),
			'text_title404'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Title', 'talos' ),
				'section'     => '404',
				'default'     => '',
				'priority'    => 10,
			),
			'text_stitle404'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Sub Title', 'talos' ),
				'section'     => '404',
				'default'     => '',
				'priority'    => 10,
			),

			// Coming Soon
			'bgcms'        => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background Image', 'talos' ),
				'section'  => 'csoon',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'images/cmsoon.jpg',
				'priority' => 10,
			),
			'time_date'    => array(
				'type'     => 'date',
				'label'    => esc_html__( 'Date Time', 'talos' ),
				'section'  => 'csoon',
				'default'  => '2023-10-31',
				'priority' => 10,
			),
			'text_title'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Title', 'talos' ),
				'section'     => 'csoon',
				'default'     => '',
				'priority'    => 10,
			),
			'text_stitle'     => array(
				'type'        => 'editor',
				'label'       => esc_html__( 'Sub Title', 'talos' ),
				'section'     => 'csoon',
				'default'     => '',
				'priority'    => 10,
			),
			'cs_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials', 'talos' ),
				'section'  => 'csoon',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'talos' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'talos' ),
						'default'     => '',
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link URL', 'talos' ),
						'description' => esc_html__( 'This will be the social link', 'talos' ),
						'default'     => '',
					),
				),
			),

			//Preload				
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'On/Off Preloader', 'talos' ),
				'section'     => 'preload_config',
				'default'     => '1',
				'priority'    => 10,
			),
			'preload_style'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Preloader Style', 'talos' ),
				'section'  => 'preload_config',
				'default'  => '1',
				'priority' => 10,
				'choices'  => array(
					// '1' => esc_html__( 'No Preload', 'talos' ),
					'2' => esc_html__( 'Preload Scale Text', 'talos' ),
					'3' => esc_html__( 'Logo Loading', 'talos' ),
					'4' => esc_html__( 'Progress Bar Loading', 'talos' ),
					'5' => esc_html__( 'Number Style 1 Loading', 'talos' ),
					'6' => esc_html__( 'Number Style 2 Loading', 'talos' ),
				),
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_scale_text'    => array(
				'type'     => 'text',
				'label'    => esc_html__( 'Preload Scale Text', 'talos' ),
				'section'  => 'preload_config',
				'default'  => 'your digital solution',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload_style',
					  	'operator' => '==',
					  	'value'    => 2,
				 	),
				),
			),
			'preload_logo'    => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo', 'talos' ),
				'section'  => 'preload_config',
				'default'  => 'your digital solution',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload_style',
					  	'operator' => '==',
					  	'value'    => 3,
				 	),
				),
			),
			'preload_logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'talos' ),
				'section'  => 'preload_config',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload_style',
					  	'operator' => '==',
					  	'value'    => 3,
				 	),
				),
			),
			'preload_logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'talos' ),
				'section'  => 'preload_config',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload_style',
					  	'operator' => '==',
					  	'value'    => 3,
				 	),
				),
			),
			'preload_scale_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Text Color', 'talos' ),
				'section'  => 'preload_config',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_scale_text_bcolor'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'talos' ),
				'section'  => 'preload_config',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
		),
	)
);