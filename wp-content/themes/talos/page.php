<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package talos
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
              style="background: url('<?php echo esc_url($img); ?>') repeat fixed;"
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

<div class="section back-white" id="scrol-top">
    <div class="section padding-top-bottom">
        <div class="container">
                <div class="eight columns">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_post_thumbnail() ?>
                        <article> 
                            <?php the_content(); ?>
                            <?php
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'talos' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'talos' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                ) );
                            ?>
                        </article>
                        <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>      
                    <?php endwhile; ?>
                </div>
                <div class="four columns">
                    <?php get_sidebar();?>  
                </div>
        </div>
    </div>    
</div>

<?php get_footer(); ?>
