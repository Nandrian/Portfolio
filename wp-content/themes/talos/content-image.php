<div class="blog-pages-wrap-box full-standard photo">
    <div class="blog-box-2">
        <?php if(get_the_post_thumbnail()){ ?>
            <a href="<?php the_permalink(); ?>" class="animsition-link">              
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
            </a>
        <?php }else{ ?> 
            <a href="<?php the_permalink(); ?>" class="animsition-link">
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                    <?php if($images){ ?>              
                    <?php  foreach ( $images as $image ) {  ?>
                        <?php $img = $image['full_url']; ?>
                        <img src="<?php echo esc_url($img); ?>" alt="">
                        <?php } ?>                
                    <?php } ?>
                <?php } ?>
            </a> 
        <?php } ?>
        <h3><a href="<?php the_permalink(); ?>" class="blog-title"><?php the_title(); ?></a></h3>
        <div class="subtext">
            <?php echo talos_entry_meta(); ?>
        </div>
        <p><?php echo talos_excerpt(); ?></p>
        <div class="link-to-post">
            <a href="<?php the_permalink(); ?>"><div class="link"><?php esc_html_e('read more', 'talos'); ?></div></a>
        </div>
    </div>
</div>
