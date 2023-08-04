<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package talos
 */

get_header(); 
$img = talos_get_option( 'page_header_bg' ) ? talos_get_option( 'page_header_bg' ) : get_template_directory_uri().'/images/type.png';
?>

<div class="section padding-bottom padding-top-page back-white" id="top">
    <div class="parallax-title-top" style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"></div>  
    <div class="container z-bigger fade-elements">
        <div class="twelve columns">
            <div class="title-text page-full-width top-page-title">
                <?php
                    the_archive_title( '<h3>', '</h3>' );
                    the_archive_description( '<p class="taxonomy-description">', '</p>' );
                ?>
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

                <div class="text-center">                
                    <ul class="cd-pagination">
                        <?php echo talos_pagination(); ?>
                    </ul>                
                </div>
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