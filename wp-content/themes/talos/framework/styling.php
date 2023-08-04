<?php 

//Custom Style Frontend
if(!function_exists('talos_custom_frontend_style')){
    function talos_custom_frontend_style(){
    	$style_css 	= '';
        
        $bg_h 		= '';
        $bg_h_m     = '';
        $bg_h_s     = '';
        $color_m 	= '';
        $bg_sh 		= '';
        $sub_menu   = '';
        $logo_top 	= '';
        $logo_bot   = '';
        $logo_left  = '';
        $logo_right = '';
        $logo_w 	= '';
        $logo_h 	= '';

        $logo_mobile = '';

        $bg_ft		= '';
        $color_ft	= '';

        $boxed		= '';
        $bg_bd		= '';
        $bg_ibd		= '';
        $bg_rp		= '';

        $bgcms 		= '';

        
        if(talos_get_option('bg_menu')){
        	$bg_h = '.menu-back{ background: '.talos_get_option('bg_menu').'; }';
        }
        if(talos_get_option('bg_menu_m')){
            $bg_h_m = '@media only screen and (max-width: 1199px) {.menu-back{ background: '.talos_get_option('bg_menu_m').'; }}';
        }
        if(talos_get_option('bg_submenu')){
            $sub_menu = 'ul.slimmenu.sf-menu li ul.normal-sub,ul.sf-menu .mega-menu-container{ background: '.talos_get_option('bg_submenu').'; }';
        }
        if(talos_get_option('bg_menu_scroll')){
            $bg_h_s = '.cbp-af-header.cbp-af-header-shrink{ background: '.talos_get_option('bg_menu_scroll').'; }';
        }

        if(talos_get_option('color_menu')){
        	$color_m = '.sf-menu .mega-menu-container .mega-sub-menu.menu-title > a,ul.slimmenu li a,ul.slimmenu > li a:after,ul.slimmenu.sf-menu > li a,ul.slimmenu.sf-menu li ul li a{ color: '.talos_get_option('color_menu').'; }';
        }
        if(talos_get_option('page_header_bg')){
        	$bg_sh = '.sub-header-2{ background-image: url('.talos_get_option('page_header_bg').'); }';
        }

        //Logo Desktop
        if(talos_get_option('logo_width')){
        	$logo_w = '.logo img{ width: '.talos_get_option('logo_width').'px; }';
        }
        if(talos_get_option('logo_height')){
        	$logo_h = '.logo img{ height: '.talos_get_option('logo_height').'px; }';
        }
        if(talos_get_option('logo_position')){
        	$space = talos_get_option('logo_position');
            $logo_top   = '.logo,.multi-page .logo{ top: '.$space["top"].'px; }';
            $logo_bot   = '.logo{ bottom: '.$space["bottom"].'px; }';
            $logo_right = '.logo{ right: '.$space["right"].'px; }';
            $logo_left = '.logo{ left: '.$space["left"].'px; }';
        }

        //Logo Mobile
        $mspace = talos_get_option('logo_position_mobile');
        $logo_mobile = '
        .cbp-af-header.cbp-af-header-shrink .logo img{ width: '.talos_get_option('logo_width_mobile').'px; height: '.talos_get_option('logo_height_mobile').'px;}
        .cbp-af-header.cbp-af-header-shrink .logo{ top: '.$mspace["top"].'px; }
        @media only screen and (max-width: 1199px) {            
            .logo img, .cbp-af-header.cbp-af-header-shrink .logo img{ width: '.talos_get_option('logo_width_mobile').'px; height: '.talos_get_option('logo_height_mobile').'px;}
            .logo,.multi-page .logo{ top: '.$mspace["top"].'px; }
            .logo{ bottom: '.$mspace["bottom"].'px; right: '.$mspace["right"].'px; left: '.$mspace["left"].'px; }
        }';        

        //Coming Soon
        if(talos_get_option('bgcms')){
        	$bgcms = '.bgcms{ background-image: url('.talos_get_option('bgcms').'); }';
        }

        //Footer
        if(talos_get_option('bg_footer')){
        	$bg_ft = '.back-dark.footer{ background: '.talos_get_option('bg_footer').'; }';
        }
        if(talos_get_option('color_footer')){
        	$color_ft = '.list-social-footer li.icon-footer a,.right-footer p,.left-footer p,.footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer p, .footer .widget ul li a,.footer .widget ul li span,.widget.widget_tag_cloud ul li a,.footer .widget .textwidget{ color: '.talos_get_option('color_footer').'; }';
        }

        //Styling
        if(talos_get_option('boxed')){
        	$boxed = '#page{ max-width: 1230px; margin: 40px auto; box-shadow: 0 3px 8px #666; }';
        }
        if(talos_get_option('bg_body')){
        	$bg_bd = 'body{ background-color: '.talos_get_option('bg_body').'; }';
        }
        if(talos_get_option('bg_ibody')){
        	$bg_ibd = 'body{ background: url('.talos_get_option('bg_ibody').') top center; background-size: cover; } #page{ box-shadow: none; }';
        }
        if(talos_get_option('repeat')){
        	$bg_rp = 'body{ background-repeat: url('.talos_get_option('repeat').'); background-size: inherit; background-repeat: repeat; }';
        }

        $style_css .= talos_get_option('custom_css');        
        $style_css .= $bg_h;
        $style_css .= $bg_h_m;
        $style_css .= $bg_h_s;
        $style_css .= $color_m;
        $style_css .= $sub_menu;
        $style_css .= $bg_sh;
        $style_css .= $logo_w;
        $style_css .= $logo_h;
        $style_css .= $logo_top;
        $style_css .= $logo_bot;
        $style_css .= $logo_left;
        $style_css .= $logo_right;
        $style_css .= $bgcms;
        $style_css .= $bg_ft;        
        $style_css .= $color_ft;        
        $style_css .= $boxed;
        $style_css .= $bg_bd;
        $style_css .= $bg_ibd;
        $style_css .= $bg_rp;
        $style_css .= $logo_mobile;
        if(! empty($style_css)){
			echo '<style type="text/css">'.$style_css.'</style>';
		}
    }
}
add_action('wp_head', 'talos_custom_frontend_style');