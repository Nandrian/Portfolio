<?php 
get_header();
global $wp_query;
$subtitle = get_post_meta($wp_query->get_queried_object_id(), "_cmb_page_subtitle_page", true);
$title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_page_title_page", true);
$img = talos_get_option( 'page_header_bg' ) ? talos_get_option( 'page_header_bg' ) : get_template_directory_uri().'/images/type.png';
?>
	
<div class="section padding-bottom padding-top-page back-white" id="top">
    <div class="parallax-title-top" style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"></div>  
    <div class="container z-bigger fade-elements">
        <div class="twelve columns">
            <div class="title-text page-full-width top-page-title">
                <?php if($subtitle){ ?><p><?php echo htmlspecialchars_decode($subtitle); ?></p><?php } ?>
                <h3><?php if(!empty($title)){echo htmlspecialchars_decode($title);}else{echo esc_html_e('Blog', 'talos');} ?></h3>
            </div>
        </div>
    </div>
</div>
<div class="section back-white" id="scrol-top">
    <div class="section padding-top-bottom">
        <div class="container">            

            <?php if(talos_get_option('blog_layout')=='2'){ ?>      
                <div class="four columns">  
                    <?php get_sidebar();?> 
                </div> 
            <?php } ?>

            <div class="<?php if(talos_get_option('blog_layout')=='3'){echo 'twelve columns';}else{echo 'eight columns';} ?>">    
                <?php 
                    while (have_posts()) : the_post();
                    get_template_part( 'content', get_post_format() ) ;   // End the loop.
                    endwhile;
                ?>

                <nav role="navigation">                    
                    <?php echo talos_pagination(); ?>                    
                </nav>
            </div>

            <?php if(talos_get_option('blog_layout')=='1'){ ?>   
                <div class="four columns">  
                    <?php get_sidebar();?> 
                </div> 
            <?php } ?>

        </div>
    </div>
</div>
    
<?php get_footer(); ?>