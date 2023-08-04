<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();
$img = talos_get_option( 'bg404' ) ? talos_get_option( 'bg404' ) : get_template_directory_uri().'/images/404.jpg';
?>

<div class="text-center section fullheight">                
    <div class="parallax-1" style="background-image: url('<?php echo esc_url($img); ?>');"></div>    
    <div class="hero-wrap-pages">
        <div class="container fade-elements">
            <div class="twelve columns">
                <h2><?php echo talos_get_option('text_title404'); ?></h2>
                <p><?php echo talos_get_option('text_stitle404'); ?></p> 
            </div>
        </div>
    </div>                  
</div>
<!-- content close -->
<?php get_footer(); ?>