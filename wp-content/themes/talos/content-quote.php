<?php $quote = get_post_meta(get_the_ID(),'_cmb_quote', true); ?>

<div class="blog-pages-wrap-box full-standard quote">
    <div class="blog-box-2">
        <?php if($quote !=''){?><div class="quote-text"><?php echo esc_html($quote); ?> 
        </div><?php } ?>
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