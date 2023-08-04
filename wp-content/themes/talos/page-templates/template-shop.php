<?php
/**
 * Template Name: Template Shop
 */
get_header(); 
$subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle_page', true);
$title = get_post_meta(get_the_ID(),'_cmb_page_title_page', true);
?>

<div class="section padding-bottom padding-top-page back-white" id="top">
    <div class="parallax-title-top"
        <?php if( function_exists( 'rwmb_meta' ) ) { ?>      
            <?php $images = rwmb_meta( '_cmb_subheader_image_page', "type=image" ); ?>
            <?php if($images){ foreach ( $images as $image ) { ?>
            <?php 
            $img =  $image['full_url']; ?>
              style="background: url('<?php echo esc_url($img); ?>');"
            <?php } } ?>
        <?php } ?>
    ></div>  
    <div class="container z-bigger fade-elements">
        <div class="twelve columns">
            <div class="title-text top-page-title">
                <?php if($subtitle){ ?><p><?php echo htmlspecialchars_decode($subtitle); ?></p><?php } ?>
                <h3><?php if(!empty($title)){echo htmlspecialchars_decode($title);}else{the_title();} ?></h3>
            </div>
        </div>
    </div>
</div>

<div id="content" role="main" class="padding-top back-white">
    <div class="container"> 
        <?php if(talos_get_option('shop_layout')=='2'){ ?>   
            <div class="four columns">  
                <?php
                    /**
                     * woocommerce_sidebar hook
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    do_action( 'woocommerce_sidebar' );
                ?>
            </div> 
        <?php } ?>
        <div class="<?php if(talos_get_option('shop_layout')=='3'){echo 'twelve columns';}else{echo 'eight columns';} ?>">
            <?php if (have_posts()){ ?>
                    <?php while (have_posts()) : the_post()?>            
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                <?php }else {
                    _e('Page Canvas For Page Builder', 'talos'); 
            } ?>
        </div>

        <?php if(talos_get_option('shop_layout')=='1'){ ?>   
            <div class="four columns">  
                <?php
                    /**
                     * woocommerce_sidebar hook
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    do_action( 'woocommerce_sidebar' );
                ?>
            </div> 
        <?php } ?>
    </div>
</div>   
    
<?php get_footer(); ?>
