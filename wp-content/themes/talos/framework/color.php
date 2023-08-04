<?php 

//Custom Style Frontend
if(!function_exists('talos_color_scheme')){
    function talos_color_scheme(){
        $main_color = '';

        //Main Color
        if(talos_get_option('main_color')){
            $main_color = 
            '.menu--juliet .menu__link::after,
			#owl-sep-1.owl-theme .owl-controls .owl-page.active span,
			#owl-sep-2.owl-theme .owl-controls .owl-page.active span,
			#owl-logos.owl-theme .owl-controls .owl-page.active span,
			.owl-portfolio-slider.owl-theme .owl-controls .owl-page.active span,
			.des-programs-author.left .link:before,
			.des-programs-author.right .link:before,
			.pricing-plan .button,
			.journal-det .link:before,
			.journal-det-right .link:before,
			.widget.widget_tag_cloud ul li a:hover,
			#sync2 .synced .item,
			.wpcf7 .button-contact:hover,
			#owl-home.owl-theme .owl-controls .owl-page.active span,
			#owl-home.owl-theme .owl-controls .owl-page span:hover,
			.pro-bar, .portfolio-filter-2  #filter li .current,
			.portfolio-filter-3  #filter li .current,
			.cd-headline.type .cd-words-wrapper.selected,
			.con-soc-links a:hover,
			.owl-gallery.owl-theme .owl-controls .owl-page.active span,
			.shop-item.portfolio-box-1 .product-det .product-links a.added_to_cart,
			.woocommerce span.onsale,
			.woocommerce button.button.alt,
			.woocommerce #review_form #respond .form-submit input:hover,
			.button.btn.btn-line,
			.woocommerce input.button,.woocommerce a.button.alt,
			.woocommerce input.button.alt,
			.shop-item.portfolio-box-1 .product-det .product-links a:hover,
			.cart-slide-out-item p.buttons a:hover
			{
			  background: '.talos_get_option('main_color').';
			}
			.shop-item.portfolio-box-1 .product-det .product-links a.added_to_cart,
			.button.btn.btn-line,
			.shop-item.portfolio-box-1 .product-det .product-links a:hover
			{
				border-color: '.talos_get_option('main_color').';
			}

			a.button--size-s:hover
			{
			  background: '.talos_get_option('main_color').'!important;
			}

			a,ul.slimmenu li a:hover,
			ul.slimmenu li a.mPS2id-highlight,
			.about-wrap .about-icon,
			.counter-wrap p,
			.des-programs-author.left p span,
			.des-programs-author.left .link,
			.des-programs-author.right p span,
			.des-programs-author.right .link,
			.services-wrap h5 span,
			.services-wrap-feature h5 span,
			.journal-det .link,
			.journal-det-right .link,
			.list-social-team li.icon-team a:hover,
			.project-page a:hover,
			.widget ul li a:hover,
			.widget ul li.recentcomments a,
			.widget_calendar tr td a,
			.blog-pages-wrap-box  .blog-box-2 .subtext a:hover,
			.blog-box-2 h3 a.blog-title:hover,
			.blog-pages-wrap-box  .blog-box-2 .link-to-post .link,
			.wellcome-meal h3 b,
			.portfolio-bottom-link b,
			.process h6 b,
			.services-wrap.services-box .icon-ser,
			.new-menu,a.button-video:hover:before,
			.title-text-app .icon i,
			.title-text-button-app a.button-app:hover,
			.title-text-button-app a.button-app:after,
			.shop-item.portfolio-box-1 .product-det h3 del span,
			.shop-page p,.woocommerce-review-link:hover,
			.woocommerce div.product p.price, .woocommerce div.product span.price,
			.posted_in a:hover,
			a.shop-item h3:hover,
			.widget.woocommerce.widget_products ul li del,
			.cart-slide-out-item ul li.mini_cart_item a:hover,
			ul.cs_socials li i:hover,
			ul.slimmenu.sf-menu li.current-menu-item > a,
			ul.slimmenu.sf-menu li.current-menu-ancestor > a,
			ul.slimmenu.sf-menu > li a:hover,
			#royal_preloader.royal_preloader_number .royal_preloader_percentage:after,
			#portfolio-filter.shop #filter.project-filter li a.current
			{
				color: '.talos_get_option('main_color').';
			}

			.cart-slide-out-item ul li.mini_cart_item a.remove,
			.cart-slide-out-item ul li.mini_cart_item a.remove:hover
			{
				color: '.talos_get_option('main_color').'!important;
			}

			#cd-zoom-in, #cd-zoom-out,
			#ajax-form button:hover,
			.list-social-footer li:hover,
			.sidebar input:active,
			.sidebar input:focus,
			.cd-pagination .current,
			.blog-pages-wrap-box  .blog-box-2 .link-to-post .link:before,
			#filter li a:hover, #filter li .current,
			.home-text p span,
			.wellcome-meal a:hover,
			.top-call-action .link,
			.smk_accordion .accordion_in .acc_head:hover, .smk_accordion .accordion_in.acc_active > .acc_head,
			#royal_preloader.royal_preloader_progress .royal_preloader_meter
			{
				background-color: '.talos_get_option('main_color').';
			}

			.cd-pagination .current {
				border: 1px solid '.talos_get_option('main_color').';
			}

			.journal-det {
			    border-right: 3px solid '.talos_get_option('main_color').';
			}
			.journal-det-right {
			    border-left: 3px solid '.talos_get_option('main_color').';
			}

			.menu-wrap h6 span.dots {
			    background-image: radial-gradient(circle closest-side, '.talos_get_option('main_color').' 99%, transparent 1%);
			}

			.comments textarea:focus,
			.comments input:focus,
			.comments textarea:active,
			.comments input:active {	
				border-bottom:1px solid '.talos_get_option('main_color').';
			}
			.sidebar input:-ms-input-placeholder  {
				color:'.talos_get_option('main_color').';
			}
			.sidebar input::-moz-placeholder  {
				color:'.talos_get_option('main_color').';
			}
			.sidebar input:-moz-placeholder  {
				color:'.talos_get_option('main_color').';
			}
			.sidebar input::-webkit-input-placeholder  {
				color:'.talos_get_option('main_color').';
			}

			#ajax-form textarea:focus,
			#ajax-form input:focus,
			#ajax-form textarea:active,
			#ajax-form input:active {	
				border-bottom:1px solid '.talos_get_option('main_color').';
			}
			::selection {
				background: '.talos_get_option('main_color').';
			}
			::-moz-selection {
				background: '.talos_get_option('main_color').';
			}
			.wpcf7-form-control-wrap input:focus, 
			.wpcf7-form-control-wrap input:active, 
			.wpcf7-form-control-wrap textarea:focus, 
			.wpcf7-form-control-wrap textarea:active {
			    border-bottom: 1px solid '.talos_get_option('main_color').'!important;
			}

			';
        }

        if(! empty($main_color)){
			echo '<style type="text/css">'.$main_color.'</style>';
		}
    }
}
add_action('wp_head', 'talos_color_scheme');