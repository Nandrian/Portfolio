<?php
    $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
    $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
    $quote = get_post_meta(get_the_ID(),'_cmb_quote', true);
    $format = get_post_format();
get_header(); ?>

<div class="section padding-bottom padding-top-page back-white" id="top">
    <div class="parallax-title-top"
        <?php if( function_exists( 'rwmb_meta' ) ) { ?>      
            <?php $images = rwmb_meta( '_cmb_subheader_image_post', "type=image" ); ?>
            <?php if($images){ foreach ( $images as $image ) { ?>
            <?php 
            $img =  $image['full_url']; ?>
              style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"
            <?php } } ?>
        <?php } ?>
    ></div>  
    <div class="container z-bigger fade-elements">
        <div class="twelve columns">
            <?php while (have_posts()) : the_post(); ?>
            <div class="title-text page-full-width top-page-title">
                <p><?php echo get_the_date( get_option('date_format') ); ?><span><?php esc_html_e('by', 'talos'); ?> <?php the_author() ?></span></p>
                <h3><?php the_title(); ?></h3>
            </div>
            <?php endwhile;?>
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
                
                <?php if($format=='audio'){ ?>
                    <div class="margin-bottom-30">
                        <iframe style="width:100%" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
                    </div>
                <?php }elseif($format=='gallery'){ ?>
                    <div id="owl-post-slider-<?php the_ID(); ?>" class="owl-post-slider owl-carousel owl-theme">        
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                            <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                            <?php if($images){ ?>                  
                                <?php                                                        
                                    foreach ( $images as $image ) {                              
                                ?>
                                <?php $img = $image['full_url']; ?>
                                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
                                <?php } ?>                                     
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <script type="text/javascript">
                        (function($) { "use strict";
                            $(document).ready(function() {
                                $("#owl-post-slider-<?php the_ID(); ?>").owlCarousel({                
                                    pagination:true,
                                    slideSpeed : 300,
                                    autoPlay : 5000,
                                    singleItem:true  
                                });
                            });
                        })(jQuery);
                    </script>
                <?php }elseif($format=='image'){ ?>
                    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                        <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                        <?php if($images){ ?>              
                        <?php  foreach ( $images as $image ) {  ?>
                            <?php $img = $image['full_url']; ?>
                            <img src="<?php echo esc_url($img); ?>" alt="">
                            <?php } ?>                
                        <?php } ?>
                    <?php } ?>
                <?php }elseif($format=='video'){ ?>
                    <div class="margin-bottom-30">
                        <iframe height="170" src="<?php echo esc_url( $link_video ); ?>"></iframe>
                    </div>
                <?php }else{ ?>
                    <?php if(get_the_post_thumbnail()){ ?>
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                    <?php } ?>
                <?php } ?>

                <div class="post">  
                    <?php the_content(); ?>

                    <?php if(has_tag()) { ?>
                        <div class="tags-wrap">
                            <?php the_tags('',''); ?>
                        </div> 
                    <?php } ?> 
                </div> 

                <?php if ( comments_open() || get_comments_number() ) :                     
                    comments_template();  
                endif; ?>

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

