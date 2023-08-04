<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function talos_register_meta_boxes( $meta_boxes ) {

	$prefix = '_cmb_';
	$meta_boxes[] = array(

		'id'       => 'format_detail',

		'title'    => esc_html__( 'Format Details', 'talos' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(

			array(

				'name'             => esc_html__( 'Image', 'talos' ),

				'id'               => $prefix . 'image',

				'type'             => 'image_advanced',

				'class'            => 'image',

				'max_file_uploads' => 1,

			),

			array(

				'name'  => esc_html__( 'Gallery', 'talos' ),

				'id'    => $prefix . 'images',

				'type'  => 'image_advanced',

				'class' => 'gallery',

			),

			array(

				'name'  => esc_html__( 'Quote', 'talos' ),

				'id'    => $prefix . 'quote',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'quote',

			),

			array(

				'name'  => esc_html__( 'Audio', 'talos' ),

				'id'    => $prefix . 'link_audio',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'audio',

				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',

			),

			array(

				'name'  => esc_html__( 'Video', 'talos' ),

				'id'    => $prefix . 'link_video',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'video',

				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',

			),			

		),

	);

	$meta_boxes[] = array(
		'id'       => 'portfolio_detail',
		'title'    => esc_html__( 'Portfolio Multi Image Thumbnail', 'talos' ),
		'pages'    => array( 'portfolio' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Portfolio Thumbnal 1', 'talos' ),
				'id'               => $prefix . 'portfolio_thumbnail_1',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),
			array(
				'name'             => esc_html__( 'Portfolio Thumbnal 2', 'talos' ),
				'id'               => $prefix . 'portfolio_thumbnail_2',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),
			array(
				'name'             => esc_html__( 'Portfolio Thumbnal 3', 'talos' ),
				'id'               => $prefix . 'portfolio_thumbnail_3',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),			
		),
	);

	$meta_boxes[] = array(

		'id'       => 'portfolio_single',

		'title'    => esc_html__( 'Single Portfolio Details', 'talos' ),

		'pages'    => array( 'portfolio' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Background Image Single Page Sub-header', 'talos' ),
				'id'               => $prefix . 'port_subheader_image',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),			
		),

	);	

	$meta_boxes[] = array(

		'id'       => 'page_dt_post',

		'title'    => esc_html__( 'Page Details', 'talos' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Background Image Page Sub-header', 'talos' ),
				'id'               => $prefix . 'subheader_image_post',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),			
		),

	);

	$meta_boxes[] = array(

		'id'       => 'page_dt_shop',

		'title'    => esc_html__( 'Page Details', 'talos' ),

		'pages'    => array( 'product' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Background Image Page Sub-header', 'talos' ),
				'id'               => $prefix . 'subheader_image',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),
			array(
                'name' 				=> esc_html__( 'Page Subtitle', 'talos' ),
                'desc'				=> 'Subtitle of page',
                'id'   				=> $prefix . 'page_subtitle',
                'type' 				=> 'text',
            ),				
		),

	);

	$meta_boxes[] = array(

		'id'       => 'page_dt',

		'title'    => esc_html__( 'Page Details', 'talos' ),

		'pages'    => array( 'page'),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Background Image Page Sub-header', 'talos' ),
				'id'               => $prefix . 'subheader_image_page',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),
			array(
                'name' 				=> esc_html__( 'Page Title', 'talos' ),
                'desc'				=> 'Title of page',
                'id'   				=> $prefix . 'page_title_page',
                'type' 				=> 'textarea',
            ),
			array(
                'name' 				=> esc_html__( 'Page Subtitle', 'talos' ),
                'desc'				=> 'Subtitle of page',
                'id'   				=> $prefix . 'page_subtitle_page',
                'type' 				=> 'text',
            ),				
		),

	);
	
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'talos_register_meta_boxes' );

/**
 * Enqueue scripts for admin
 *
 * @since  1.0
 */
function talos_admin_enqueue_scripts( $hook ) {
	// Detect to load un-minify scripts when WP_DEBUG is enable
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'talos-backend-js', get_template_directory_uri()."/js/admin.js", array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'talos_admin_enqueue_scripts' );

