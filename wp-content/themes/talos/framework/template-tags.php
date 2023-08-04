<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package talos
 */

if ( ! function_exists( 'talos_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function talos_entry_meta() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><!--<time class="updated" datetime="%3$s">%4$s</time>-->';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'talos' ),
    //'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    $time_string
  );

    echo '<span class="posted-on"><span class="separator"><i class="fa fa-clock-o" aria-hidden="true"></i></span>' . $posted_on . '</span>'; // WPCS: XSS OK.

  $byline = sprintf(
    esc_html_x( '%s', 'post author', 'talos' ),
    '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
  );

    echo '<span class="byline"><span class="separator"><i class="fa fa-user" aria-hidden="true"></i></span>' . $byline . '</span>'; // WPCS: XSS OK.

  if ( 'post' === get_post_type() ) {
    talos_entry_taxonomies();
  } 
}
endif;

if ( ! function_exists( 'talos_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own talos_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function talos_entry_taxonomies() {
  $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'talos' ) );
  if ( $categories_list ) {
    printf( '<span class="cat-links"><span class="separator"><i class="fa fa-folder-open" aria-hidden="true"></i></span>%2$s</span>',
      _x( 'Categories', 'Used before category names.', 'talos' ),
      $categories_list
    );
  }

  $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'talos' ) );
  if ( $tags_list ) {
    printf( '<span class="tags-links"><span class="separator"><i class="fa fa-tags" aria-hidden="true"></i></span>%2$s</span>',
      _x( 'Tags', 'Used before tag names.', 'talos' ),
      $tags_list
    );
  }

}
endif;

// Add specific CSS class by filter
add_filter( 'body_class', 'talos_body_class_names' );
function talos_body_class_names( $classes ) {
    
    $theme = wp_get_theme();
    $classes[] = 'talos-theme-ver-'.$theme->version;
    $classes[] = 'wordpress-version-'.get_bloginfo( 'version' );

    if(talos_get_option('preload')){
      $classes[] = 'royal_preloader';
    }

    // return the $classes array
    return $classes;
}

if ( ! function_exists( 'talos_excerpt_length' ) ) :
/**** Change length of the excerpt ****/
function talos_excerpt_length() {
      if((talos_get_option('excerpt_length'))){
        $limit = talos_get_option('excerpt_length');
      }else{
        $limit = 15;
      }  
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
}
endif;

if ( ! function_exists( 'talos_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function talos_excerpt() {
  if((talos_get_option('excerpt_length'))){
    $limit = talos_get_option('excerpt_length');
  }else{
    $limit = 15;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'talos_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function talos_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 14; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = ''; //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'talos_tag_cloud_widget' );
endif;

/** Excerpt Section Blog Post **/
function talos_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

if ( ! function_exists( 'talos_pagination' ) ) :
//pagination
function talos_pagination($prev = '<i>prev</i>', $next = '<i>next</i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'        => '',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $pages,
        'prev_text'     => $prev,
        'next_text'     => $next,       
        'type'          => 'list',
        'end_size'      => 3,
        'mid_size'      => 3
);
    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="cd-pagination animated-buttons custom-icons">', $return );
}
endif;

if ( ! function_exists( 'talos_custom_wp_admin_style' ) ) :
function talos_custom_wp_admin_style() {

        wp_register_style( 'talos_custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'talos_custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'talos_custom_wp_admin_style' );
endif;

if ( ! function_exists( 'talos_search_form' ) ) :
/* Custom form search */
function talos_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" class="searchform" >  
        <input type="search" id="search" class="search-field" value="' . get_search_query() . '" name="s" placeholder="'.__('To search type and hit enter', 'talos').'" />
        <div class="clearfix"></div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'talos_search_form' );
endif;

//if(class_exists('WPBakeryVisualComposerSetup')){
function talos_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-2/', 'two columns', $class_string);        
        $class_string = preg_replace('/vc_col-sm-3/', 'three columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-4/', 'four columns', $class_string);       
        $class_string = preg_replace('/vc_col-sm-5/', 'five columns ', $class_string);
        $class_string = preg_replace('/vc_col-sm-6/', 'six columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-7/', 'seven columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-8/', 'eight columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-9/', 'nine columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-10/', 'ten columns', $class_string);
        $class_string = preg_replace('/vc_col-sm-11/', 'eleven columns', $class_string);    
        $class_string = preg_replace('/vc_col-sm-12/', 'twelve columns', $class_string);    
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'talos_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 

/* Custom comment List: */
function talos_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment; ?>
    <li>
      <div id="comment-<?php comment_ID(); ?>" class="content-comm">
        <div class="img">
          <?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
        </div>
        <?php if ($comment->comment_approved == '0'){ ?>
          <p><em><?php _e('Your comment is awaiting moderation.','talos') ?></em></p>
        <?php }else{ ?>
          <?php comment_text() ?>
        <?php } ?>
        <div class="name-aut-replay"><?php printf(__('%s','talos'), get_comment_author()) ?> / <?php the_time('g:i a'); ?> / <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
      </div>
    </li>
<?php
}

/* Move comment field bottom */
function talos_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'talos_move_comment_field_to_bottom' );

if(!function_exists('talos_custom_frontend_scripts')){
    function talos_custom_frontend_scripts(){
    ?>  
      <?php if(talos_get_option('preload')){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
              Royal_Preloader.config({
                    <?php if(talos_get_option('preload_style')=='2'){ ?>
                        mode:        'scale_text',
                        text:        '<?php echo talos_get_option('preload_scale_text'); ?>',
                    <?php }elseif(talos_get_option('preload_style')=='3'){ ?>
                        mode           : 'logo',
                        logo           : '<?php echo talos_get_option('preload_logo'); ?>',
                        logo_size      : [<?php echo talos_get_option('preload_logo_width'); ?>, <?php echo talos_get_option('preload_logo_height'); ?>],
                        showProgress   : true,
                        showPercentage : true,
                    <?php }elseif(talos_get_option('preload_style')=='4'){ ?>
                        mode           : 'progress',
                        showProgress   : true,
                        showPercentage : false,
                    <?php }elseif(talos_get_option('preload_style')=='5'){ ?>
                        mode           : 'progress',
                        showProgress   : true,
                        showPercentage : false,
                    <?php }else{ ?>
                        mode           : 'number',
                        showProgress   : true,
                        showPercentage : false,
                    <?php } ?>
                    
                    text_colour: '<?php echo talos_get_option('preload_scale_text_color'); ?>',
                    background:  '<?php echo talos_get_option('preload_scale_text_bcolor'); ?>'
                });
            })(jQuery);
        </script>
    <?php } ?>          
<?php        
    }
}
add_action('wp_footer', 'talos_custom_frontend_scripts');