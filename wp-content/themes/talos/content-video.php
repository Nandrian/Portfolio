<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>

<div class="blog-pages-wrap-box full-standard video">
    <div class="blog-box-2">
        <?php if(get_the_post_thumbnail()){ ?>
            <a href="<?php the_permalink(); ?>" class="animsition-link">              
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
            </a>
        <?php }else{ ?>
            <div class="margin-bottom-30">
                <iframe height="170" src="<?php echo esc_url( $link_video ); ?>"></iframe>
            </div>
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