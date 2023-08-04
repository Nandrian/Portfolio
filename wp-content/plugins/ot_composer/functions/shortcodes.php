<?php 

// Button
add_shortcode('button','button_func');
function button_func($atts, $content = null){
    extract(shortcode_atts(array(
        'linkbox'   =>  '',
        'eff'       =>  '',
        'bg_color'  =>  '',
        'el_class'  =>  '',
    ), $atts));
        $url    = vc_build_link( $linkbox );
        $bg_color1 = (!empty($bg_color) ? 'style="background:'.$bg_color.'"' : '');
        $eff1 = (!empty($eff) ? 'button-effect button--moema' : '');
    ob_start(); 
?>
        
    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
        echo '<a class="'.esc_attr($eff1).' '.esc_attr($el_class).' button--size-s" data-gal="m_PageScroll2id" data-ps2id-offset="78" '.$bg_color1.' href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ).'</a>';
    } ?>

<?php
    return ob_get_clean();
}

// Accordion
add_shortcode('accordion', 'accordion_func');
function accordion_func($atts, $content = null){
    extract(shortcode_atts(array(
        'el_class'      =>  '',
        'accordions'    =>  '',
    ), $atts));
        $accordions = (array) vc_param_group_parse_atts( $accordions );
    ob_start(); 
?>

    <div class="accordion">
        <?php 
            foreach ( $accordions as $data ) {
                $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
                $data['content'] = isset($data['acc']) ? $data['acc'] : '';
        ?>
            <div class="accordion_in">
                <div class="acc_head"><?php echo htmlspecialchars_decode($data['title']); ?></div>
                <div class="acc_content">
                    <p><?php echo htmlspecialchars_decode($data['acc']); ?></p>
                </div>
            </div>
        <?php } ?>   
    </div>      

<?php
    return ob_get_clean();
}

// About
add_shortcode('about','about_func');
function about_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon_fontawesome'      =>  '',
        'icon_openiconic'       =>  '',
        'icon_typicons'         =>  '',
        'icon_entypo'           =>  '',
        'icon_linecons'         =>  '',
        'icon_monosocial'       =>  '',
        'icon_material'         =>  '',
        'photo'                 =>  '',
        'icon'                  =>  '',
        'title'                 =>  '',
        'subtitle'              =>  '',
        'linkbox'               =>  '',
        'el_class'              =>  '',
    ), $atts));
        $url    = vc_build_link( $linkbox );
    ob_start(); 
?>
        
    <div class="title-text-app left">
        <div class="icon">
            <?php if($photo){
            $img = wp_get_attachment_image_src($photo,'full');
            $img = $img[0]; ?><img src="<?php echo esc_url($img); ?>" alt=""><?php }else{ ?><i class="<?php echo esc_attr($icon); ?><?php echo esc_attr($icon_fontawesome); echo esc_attr($icon_openiconic);echo esc_attr($icon_typicons);echo esc_attr($icon_entypo);echo esc_attr($icon_linecons);echo esc_attr($icon_monosocial);echo esc_attr($icon_material); ?>"></i><?php } ?>                                             
        </div>
        <p><?php echo htmlspecialchars_decode($subtitle); ?></p>
        <h3><?php echo htmlspecialchars_decode($title); ?></h3>
    </div>
    <p class="title-small-p"><?php echo htmlspecialchars_decode($content); ?></p>                   
    <div class="title-text-button-app">
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a class="button-app" data-gal="m_PageScroll2id" data-ps2id-offset="78" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ).'</a>';
        } ?>
    </div>

<?php
    return ob_get_clean();
}

// Home Slider Text Center
add_shortcode('home_sli','home_sli_func');
function home_sli_func($atts, $content = null){
    extract(shortcode_atts(array(
        'btn_link'      =>  '',
        'el_class'      =>  '',
        'slides'        =>  '',
        'full'          =>  '',
        'small'         =>  '',
    ), $atts));
        $slides = (array) vc_param_group_parse_atts( $slides );        
    ob_start(); 
?>    
    
    <div class="home-carousel-wrap <?php if($full != true){echo 'half-height';} ?> <?php echo esc_attr($el_class); ?>">                        
        <div id="sync1" class="owl-carousel">
            <?php 
                foreach ( $slides as $data ) {
                    $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
                    $data['subtitle'] = isset( $data['subtitle'] ) ? $data['subtitle'] : '';
                    $data['photo'] = isset( $data['photo'] ) ? $data['photo'] : '';
                    $img = wp_get_attachment_image_src($data['photo'],'full');
                    $img = $img[0];
            ?>
                <div class="item background-home-image-1 <?php if($full != true){echo 'half-height';} ?>" style="background-image: url('<?php echo esc_url($img); ?>');">
                    
                    <div class="home-text home-text-carousel <?php if($small==true){echo 'home-archi';}else{echo 'home-main';} ?>">
                        <div class="container fade-elements">
                            <div class="twelve columns">
                                <?php if($data['subtitle'] != ''){ ?><p><span><?php echo htmlspecialchars_decode($data['subtitle']); ?></span></p><?php } ?>
                                <h1><?php echo htmlspecialchars_decode($data['title']); ?></h1>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php } ?>
        </div>
            
        <div id="sync2" class="owl-carousel fade-elements">
            <?php 
                foreach ( $slides as $data ) {                   
            ?>
                <div class="item"></div>
            <?php } ?>
        </div>                          
    </div>

    <?php if($btn_link != ''){ ?>
        <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down fade-elements"></div></a>
    <?php } ?>
    
    <script type="text/javascript">
        (function($) { "use strict";
            $(document).ready(function() {              
                var sync1 = $("#sync1");
                var sync2 = $("#sync2");                 
                sync1.owlCarousel({
                    singleItem : true,
                    autoPlay: 5000,
                    transitionStyle : "fade",
                    autoHeight : false,
                    slideSpeed : 200,
                    navigation: false,
                    pagination:false,
                    afterAction : syncPosition,
                    responsiveRefreshRate : 200
                });                  
                sync2.owlCarousel({
                    items : 3,
                    itemsDesktop      : [1199,3],
                    itemsDesktopSmall     : [979,3],
                    itemsTablet       : [768,3],
                    itemsMobile       : [479,3],
                    pagination:false,
                    responsiveRefreshRate : 100,
                    afterInit : function(el){
                      el.find(".owl-item").eq(0).addClass("synced");
                    }
                });                 
                function syncPosition(el){
                    var current = this.currentItem;
                    $("#sync2")
                      .find(".owl-item")
                      .removeClass("synced")
                      .eq(current)
                      .addClass("synced")
                    if($("#sync2").data("owlCarousel") !== undefined){
                      center(current)
                    }
                }                 
                $("#sync2").on("click", ".owl-item", function(e){
                    e.preventDefault();
                    var number = $(this).data("owlItem");
                    sync1.trigger("owl.goTo",number);
                });                 
                function center(number){
                    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for(var i in sync2visible){
                      if(num === sync2visible[i]){
                        var found = true;
                      }
                    }                 
                    if(found===false){
                      if(num>sync2visible[sync2visible.length-1]){
                        sync2.trigger("owl.goTo", num - sync2visible.length+2)
                      }else{
                        if(num - 1 === -1){
                          num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                      }
                    } else if(num === sync2visible[sync2visible.length-1]){
                      sync2.trigger("owl.goTo", sync2visible[1])
                    } else if(num === sync2visible[0]){
                      sync2.trigger("owl.goTo", num-1)
                    }                    
                }
            }); 
        })(jQuery);
    </script>

<?php
    return ob_get_clean();
}

// Home Slider Text Left
add_shortcode('home_sli2','home_sli2_func');
function home_sli2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'btn_link'      =>  '',
        'el_class'      =>  '',
        'slides'        =>  '',
    ), $atts));
        $slides = (array) vc_param_group_parse_atts( $slides ); 
    ob_start(); 
?>    
    
    <div class="home-carousel-wrap <?php echo esc_attr($el_class); ?>">                        
        <div id="owl-home" class="owl-carousel owl-theme">
            <?php 
                foreach ( $slides as $data ) {
                    $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
                    $data['subtitle'] = isset( $data['subtitle'] ) ? $data['subtitle'] : '';
                    $data['photo'] = isset( $data['photo'] ) ? $data['photo'] : '';
                    $img = wp_get_attachment_image_src($data['photo'],'full');
                    $img = $img[0];
            ?>
                <div class="item background-home-image-1" style="background-image: url('<?php echo esc_url($img); ?>');">
                    <div class="home-text home-medical">
                        <div class="container fade-elements">
                            <div class="twelve columns">
                                <?php if($data['subtitle']){ ?><p><span><?php echo htmlspecialchars_decode($data['subtitle']); ?></span></p><?php } ?>
                                <h1><?php echo htmlspecialchars_decode($data['title']); ?></h1>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php } ?>
        </div>                          
    </div>
    <?php if($btn_link != ''){ ?>
        <div class="home-link fade-elements">
            <div class="container">
                <div class="twelve columns">
                    <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down link-down-home-medical tipped" data-title="scroll down"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a> 
                </div>
            </div>                      
        </div>
    <?php } ?>

    <script type="text/javascript">
        (function($) { "use strict";
            $(document).ready(function() {              
                $("#owl-home").owlCarousel({
                    singleItem : true,
                    autoPlay: 5000,
                    transitionStyle : "fade",
                    autoHeight : false,
                    slideSpeed : 200,
                    navigation: false,
                    pagination:true,
                    paginationSpeed : 500,
                    responsiveRefreshRate : 200
                });
            }); 
        })(jQuery);
    </script>

<?php
    return ob_get_clean();
}

// Home Video
add_shortcode('home_video','home_video_func');
function home_video_func($atts, $content = null){
    extract(shortcode_atts(array(
        'video_link'    =>  '',
        'btn_link'      =>  '',
        'photo'         =>  '',
        'title'         =>  '',
    ), $atts));
        $img = wp_get_attachment_image_src($photo,'full');
        $img = $img[0];
    ob_start(); 
?>
    <div class="full-height">
        <div class="home-text">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <div class="home-video">
                        <figure class="vimeo"> 
                            <a href="<?php echo esc_url($video_link); ?>">
                                <img src="<?php echo esc_url($img); ?>" alt="image" />
                            </a>
                        </figure>
                    </div>
                    <div class="big-text-top"><?php echo htmlspecialchars_decode($title); ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php if($btn_link != ''){ ?>
        <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down link-down-home-video fade-elements"></div></a>
    <?php } ?>
<?php
    return ob_get_clean();
}

// Heading
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'       =>    '',
        'subtitle'    =>    '',
        'el_class'    =>    '',
        'color'       =>    '',
    ), $atts));
        $color1 = (!empty($color) ? 'style="color:'.$color.';"' : '');
    ob_start(); 
?>
    
    <div class="title-text left <?php echo esc_attr($el_class); ?>">
        <?php if($subtitle != ''){ ?><p <?php echo htmlspecialchars_decode($color1); ?>><?php echo htmlspecialchars_decode($subtitle); ?></p><?php } ?>
        <h3 <?php echo htmlspecialchars_decode($color1); ?>><?php echo htmlspecialchars_decode($title); ?></h3>
    </div>

<?php
    return ob_get_clean();
}

// Icon Box (icon left)
add_shortcode('iconbox', 'iconbox_func');
function iconbox_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon_fontawesome'      =>  '',
        'icon_openiconic'       =>  '',
        'icon_typicons'         =>  '',
        'icon_entypo'           =>  '',
        'icon_linecons'         =>  '',
        'icon_monosocial'       =>  '',
        'icon_material'         =>  '',
        'photo'                 =>  '',
        'icon'                  =>  '',
        'title'                 =>  '',
        'type'                  =>  'fontawesome',
        'style'                 =>  'style1',
    ), $atts));
    ob_start(); ?>

    <?php if($style=='style1' || $style=='style3'){ ?>
        <div class="about-wrap">
            <div class="about-icon <?php if($style=='style3'){echo 'normal';} ?>">
                <?php if($photo){
                $img = wp_get_attachment_image_src($photo,'full');
                $img = $img[0]; ?><img src="<?php echo esc_url($img); ?>" alt=""><?php }else{ ?><i class="<?php echo esc_attr($icon); ?><?php echo esc_attr($icon_fontawesome); echo esc_attr($icon_openiconic);echo esc_attr($icon_typicons);echo esc_attr($icon_entypo);echo esc_attr($icon_linecons);echo esc_attr($icon_monosocial);echo esc_attr($icon_material); ?>"></i><?php } ?>                       
            </div>
            <h5><?php echo htmlspecialchars_decode($title); ?></h5>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    <?php }else{ ?>
        <div class="services-wrap">
            <h5><span>
            <?php if($photo){
            $img = wp_get_attachment_image_src($photo,'full');
            $img = $img[0]; ?><img src="<?php echo esc_url($img); ?>" alt=""><?php }else{ ?><i class="<?php echo esc_attr($icon); ?><?php echo esc_attr($icon_fontawesome); echo esc_attr($icon_openiconic);echo esc_attr($icon_typicons);echo esc_attr($icon_entypo);echo esc_attr($icon_linecons);echo esc_attr($icon_monosocial);echo esc_attr($icon_material); ?>"></i><?php } ?></span> <?php echo htmlspecialchars_decode($title); ?></h5>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    <?php } ?> 

<?php
    return ob_get_clean();
}

// Icon Box (icon center)
add_shortcode('iconboxcenter', 'iconboxcenter_func');
function iconboxcenter_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon_fontawesome'      =>  '',
        'icon_openiconic'       =>  '',
        'icon_typicons'         =>  '',
        'icon_entypo'           =>  '',
        'icon_linecons'         =>  '',
        'icon_monosocial'       =>  '',
        'icon_material'         =>  '',
        'photo'                 =>  '',
        'icon'                  =>  '',
        'title'                 =>  '',
        'type'                  =>  'fontawesome',
    ), $atts));
    ob_start(); ?>

    <div class="about-wrap align-center">
        <div class="about-icon">
            <?php if($photo != ''){
            $img = wp_get_attachment_image_src($photo,'full');
            $img = $img[0]; ?><img src="<?php echo esc_url($img); ?>" alt=""><?php }else{ ?><i class="<?php echo esc_attr($icon); ?><?php echo esc_attr($icon_fontawesome); echo esc_attr($icon_openiconic);echo esc_attr($icon_typicons);echo esc_attr($icon_entypo);echo esc_attr($icon_linecons);echo esc_attr($icon_monosocial);echo esc_attr($icon_material); ?>"></i><?php } ?>                       
        </div>
        <h5><?php echo htmlspecialchars_decode($title); ?></h5>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>
    
<?php
    return ob_get_clean();
}

// Service Box
add_shortcode('servicebox', 'servicebox_func');
function servicebox_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon_fontawesome'      =>  '',
        'icon_openiconic'       =>  '',
        'icon_typicons'         =>  '',
        'icon_entypo'           =>  '',
        'icon_linecons'         =>  '',
        'icon_monosocial'       =>  '',
        'icon_material'         =>  '',
        'icon'                  =>  '',
        'title'                 =>  '',
        'type'                  =>  'fontawesome',
    ), $atts));
        
    ob_start(); ?>

    <div class="services-wrap services-box">  
        <div class="icon-ser">
            <i class="<?php echo esc_attr($icon); ?><?php echo esc_attr($icon_fontawesome); echo esc_attr($icon_openiconic);echo esc_attr($icon_typicons);echo esc_attr($icon_entypo);echo esc_attr($icon_linecons);echo esc_attr($icon_monosocial);echo esc_attr($icon_material); ?>"></i>                    
        </div>
        <h5><?php echo htmlspecialchars_decode($title); ?></h5>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>

<?php
    return ob_get_clean();
}

// Testimonial Slider Style 1
add_shortcode('testis', 'testis_func');
function testis_func($atts, $content = null){
    extract(shortcode_atts(array(
        'el_class'      =>  '',
        'testimonials'  =>  '',
        'time'          =>  '5000',
        'small'         =>  '',
    ), $atts));
        $testimonials = (array) vc_param_group_parse_atts( $testimonials );
    ob_start(); 
?>
    
    <div id="owl-sep-1" class="owl-sep-1 owl-carousel owl-theme">   
        <?php 
            foreach ( $testimonials as $data ) {
                $data['testimonial'] = isset( $data['testimonial'] ) ? $data['testimonial'] : '';
        ?>
            <div class="item">                                                          
                
                <div class="quote <?php if($small==true){echo 'small';} ?>"> 
                    <h4 <?php if($small==true){echo 'class="small"';} ?>><?php echo $data['testimonial']; ?></h4>
                </div>   
                                                             
            </div>    
        <?php } ?>                          
    </div>

    <script type="text/javascript">
        (function($) { "use strict";
            $(document).ready(function() {              
                $(".owl-sep-1").owlCarousel({
                    navigation: false,
                    pagination : true,
                    transitionStyle : "fade",
                    slideSpeed : 500,
                    paginationSpeed : 500,
                    singleItem:true,
                    autoPlay: <?php echo esc_attr($time); ?>,
                });
            }); 
        })(jQuery);
    </script>

<?php
    return ob_get_clean();
}

// Testimonial Slider Style 2
add_shortcode('testis2', 'testis2_func');
function testis2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'el_class'      =>  '',
        'testimonials'  =>  '',
        'time'          =>  '5000',
    ), $atts));
        $testimonials = (array) vc_param_group_parse_atts( $testimonials );
    ob_start(); 
?>
    
    <div id="owl-sep-2" class="owl-sep-2 owl-carousel owl-theme"> 
        <?php 
            foreach ( $testimonials as $data ) {
                $data['testimonial'] = isset( $data['testimonial'] ) ? $data['testimonial'] : '';
        ?>                     
            <div class="item">  
                <div class="quote"> 
                    <h4><?php echo $data['testimonial']; ?></h4>
                </div>                                          
            </div> 
        <?php } ?>
    </div>

    <script type="text/javascript">
        (function($) { "use strict";
            $(document).ready(function() {              
                $(".owl-sep-2").owlCarousel({
                    navigation: false,
                    pagination : true,
                    transitionStyle : "fade",
                    slideSpeed : 500,
                    paginationSpeed : 500,
                    singleItem:true,
                    autoPlay: <?php echo esc_attr($time); ?>,
                });
            }); 
        })(jQuery);
    </script>

<?php
    return ob_get_clean();
}

// Team
add_shortcode('team','team_func');
function team_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'name'      =>  '',
        'contacts'  =>  '',
        'el_class'  =>  '',
        'layout'    =>  'layout1',
        'style'     =>  'style1',
    ), $atts));
        $contacts = (array) vc_param_group_parse_atts( $contacts );
        $img = wp_get_attachment_image_src($photo,'full');
        $img = $img[0];
    ob_start(); 
?>
    
    <?php if($layout=='layout2'){ ?><img src="<?php echo esc_url($img); ?>" class="padding-bottom-30" alt="Some image" /><?php } ?>
    <div class="team-wrap <?php echo esc_attr($el_class); ?> <?php if($style=='style2'){echo 'text-light';} ?>">
        <h6><?php echo htmlspecialchars_decode($name); ?></h6>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
        <div class="social-team">
            <ul class="list-social-team">
                <?php 
                    foreach ( $contacts as $data ) {
                        $data['contact'] = isset( $data['contact'] ) ? $data['contact'] : '';
                        $data['url'] = isset( $data['url'] ) ? $data['url'] : '';
                ?>
                    <li class="icon-team">
                        <a href="<?php echo esc_url($data['url']); ?>"><i class="<?php echo esc_attr($data['contact']); ?>"></i></a>
                    </li>
                <?php } ?>
            </ul>   
        </div>
        <?php if($layout=='layout1'){ ?><img src="<?php echo esc_url($img); ?>" alt="Some image" /><?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Our Facts
add_shortcode('facts', 'facts_func');
function facts_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'number'    =>  '',
        'style'     =>  'style1',   
        'el_class'  =>  '', 
    ), $atts));

    ob_start(); ?>

    <div class="counter-wrap <?php if($style=='style2'){echo 'freelance-num';} ?> <?php echo esc_attr($el_class); ?>">
        <p><span class="counter-numb"><?php echo esc_attr($number); ?></span></p>
        <h6><?php echo htmlspecialchars_decode($title); ?></h6>
    </div> 

<?php
    return ob_get_clean();
}

// Portfolio List Style 1
add_shortcode('portfolio', 'portfolio_func');
function portfolio_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1',
        'btn_text'      =>  '',  
    ), $atts));

    ob_start(); ?>    

    <div class="clear"></div>

<div class="portfolio"></div>

<div class="expander-wrap relative">
    <div id="expander-wrap" class="container">
        <p class="cls-btn"><a class="close"></a></p>
        <div class="expander-inner"></div>
    </div>
</div>

<div class="clear"></div>   

    <?php 
        $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $number,               
        );  
        $wp_query = new WP_Query($args);
        $i = 0;
        while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
        $i++;
        $image1 = rwmb_meta( '_cmb_portfolio_thumbnail_1', "type=image" );
        $image2 = rwmb_meta( '_cmb_portfolio_thumbnail_2', "type=image" );
        $image3 = rwmb_meta( '_cmb_portfolio_thumbnail_3', "type=image" );
    ?> 
        <div class="five columns <?php if($i%2==0){echo 'float-right';} ?>">
            <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>">
                <div class="work-wrap">
                    <?php if(get_the_post_thumbnail()){ ?>
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"  alt="Some image"  data-scroll-reveal="enter bottom move 150px over 1s after 0.1s" />
                    <?php }else{ ?>
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                            <?php $images = rwmb_meta( '_cmb_portfolio_thumbnail_1', "type=image" ); ?>
                            <?php if($images){ ?>              
                            <?php  foreach ( $images as $image ) {  ?>
                                <?php $img = $image['full_url']; ?>
                                <img src="<?php echo esc_url($img); ?>"  alt="Some image"  data-scroll-reveal="enter bottom move 150px over 1s after 0.1s" />
                                <?php } ?>                
                            <?php } ?>
                        <?php } ?>
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                            <?php $images = rwmb_meta( '_cmb_portfolio_thumbnail_2', "type=image" ); ?>
                            <?php if($images){ ?>              
                            <?php  foreach ( $images as $image ) {  ?>
                                <?php $img = $image['full_url']; ?>
                                <img src="<?php echo esc_url($img); ?>"  alt="Some image"  data-scroll-reveal="enter bottom move 150px over 1s after 0.3s" />
                                <?php } ?>                
                            <?php } ?>
                        <?php } ?>
                        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                            <?php $images = rwmb_meta( '_cmb_portfolio_thumbnail_3', "type=image" ); ?>
                            <?php if($images){ ?>              
                            <?php  foreach ( $images as $image ) {  ?>
                                <?php $img = $image['full_url']; ?>
                                <img src="<?php echo esc_url($img); ?>"  alt="Some image"  data-scroll-reveal="enter bottom move 150px over 1s after 0.5s" />
                                <?php } ?>                
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </a>
        </div>
        
        <div class="seven columns <?php if($i%2==0){echo 'float-right';} ?>" data-scroll-reveal="enter right move 150px over 1s after 1.6s">
            <div class="<?php if($i%2==0){echo 'translate-right';}else{echo 'translate-left';} ?>">
                <div class="description-title-text <?php if($i%2==0){echo 'right';}else{echo 'left';} ?>">
                    <?php 
                        $cates = get_the_terms(get_the_ID(),'categories');
                        $cate_name = '';
                            foreach((array)$cates as $cate){
                                if(count($cates)>0){
                                    $cate_name .= $cate->name.'<i>,</i> ' ;     
                                } 
                    } ?>
                    <p><?php echo htmlspecialchars_decode($cate_name); ?> <span><?php the_title(); ?></span></p>
                </div>
                <div class="des-programs-author <?php if($i%2==0){echo 'right';}else{echo 'left';} ?>">
                    <?php if(has_excerpt()){ ?><h6><?php the_excerpt(); ?></h6><?php } ?>
                    <p><?php esc_html_e('author : ', 'talos'); ?><span><?php the_author(); ?></span></p>
                    <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>"><div class="link"><?php echo htmlspecialchars_decode($btn_text); ?></div></a>
                </div>
            </div>  
        </div>
        <div class="clear"></div>
    <?php endwhile; wp_reset_postdata(); ?> 

<?php
    return ob_get_clean();
}

// Portfolio List Style 2
add_shortcode('portfolio2', 'portfolio2_func');
function portfolio2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
    ), $atts));

    ob_start(); ?> 

    <ul class="case-study-wrapper">
        <?php 
            $args = array(   
                'post_type' => 'portfolio',   
                'posts_per_page' => $number,               
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            $cates = get_the_terms(get_the_ID(),'categories');
            $cate_slug = '';
            $cate_name = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
                    $cate_name .= $cate->name.'<i>,</i> ' ;     
                } 
            }
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?> 
            <li class="case-study-name">                                
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?><br><span><?php echo htmlspecialchars_decode($cate_name); ?></span></a>
            </li>
        <?php endwhile; wp_reset_postdata(); ?> 
    </ul>
    <div class="dark-over-portfolio"></div> 
    <ul class="case-study-images">
        <?php 
            $args = array(   
                'post_type' => 'portfolio',   
                'posts_per_page' => $number,               
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post();             
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?> 
        <li style="background-image: url('<?php echo esc_url($image); ?>');"></li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul> 
    <script type="text/javascript">
        (function($) { "use strict";
            $(document).ready(function() { 
                $('.case-study-name:nth-child(1)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(1)').addClass("show");
                    $('.case-study-name:nth-child(1)').addClass('active');
                })
                $('.case-study-name:nth-child(2)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(2)').addClass("show");
                    $('.case-study-name:nth-child(2)').addClass('active');
                })
                $('.case-study-name:nth-child(3)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(3)').addClass("show");
                    $('.case-study-name:nth-child(3)').addClass('active');
                })
                $('.case-study-name:nth-child(4)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(4)').addClass("show");
                    $('.case-study-name:nth-child(4)').addClass('active');
                })
                $('.case-study-name:nth-child(5)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(5)').addClass("show");
                    $('.case-study-name:nth-child(5)').addClass('active');
                })

                $('.case-study-name:nth-child(6)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(6)').addClass("show");
                    $('.case-study-name:nth-child(6)').addClass('active');
                })
                $('.case-study-name:nth-child(7)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(7)').addClass("show");
                    $('.case-study-name:nth-child(7)').addClass('active');
                })
                $('.case-study-name:nth-child(8)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(8)').addClass("show");
                    $('.case-study-name:nth-child(8)').addClass('active');
                })
                $('.case-study-name:nth-child(9)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(9)').addClass("show");
                    $('.case-study-name:nth-child(9)').addClass('active');
                })
                $('.case-study-name:nth-child(10)').on('mouseenter', function() {
                    $('.case-study-name.active').removeClass('active');
                    $('.case-study-images li.show').removeClass("show");
                    $('.case-study-images li:nth-child(10)').addClass("show");
                    $('.case-study-name:nth-child(10)').addClass('active');
                })

                $('.case-study-name:nth-child(1)').trigger('mouseenter');
            }); 
        })(jQuery);
    </script>   

<?php
    return ob_get_clean();
}  

// Portfolio Masonry Style 1
add_shortcode('portfoliomas', 'portfoliomas_func');
function portfoliomas_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>    
    
    <div class="clear"></div>

    <div class="portfolio"></div>

    <div class="expander-wrap relative">
        <div id="expander-wrap" class="container">
            <p class="cls-btn"><a class="close"></a></p>
            <div class="expander-inner"></div>
        </div>
    </div>

    <div class="clear"></div>   
    <div class="section">
        <?php if($filter=='true'){ ?>
        <div id="portfolio-filter">
            <ul id="filter">
                <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                <?php 
                    $categories = get_terms('categories');
                    foreach( (array)$categories as $categorie){
                        $cat_name = $categorie->name;
                        $cat_slug = $categorie->slug;
                ?>
                    <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        
        <div id="projects-grid">
            <?php 
                $args = array(   
                    'post_type' => 'portfolio',   
                    'posts_per_page' => $number,              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'categories');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <h3><span><?php echo esc_attr($cate_name); ?></span><br><?php the_title(); ?></h3>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Portfolio Masonry Style 2
add_shortcode('portfoliomas2', 'portfoliomas2_func');
function portfoliomas2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>    
    
    <div class="clear"></div>

    <div class="portfolio"></div>

    <div class="expander-wrap relative">
        <div id="expander-wrap" class="container">
            <p class="cls-btn"><a class="close"></a></p>
            <div class="expander-inner"></div>
        </div>
    </div>

    <div class="clear"></div>   
    <div class="section columns">
        <?php if($filter=='true'){ ?>
        <div id="portfolio-filter" class="portfolio-filter-2">
            <ul id="filter">
                <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                <?php 
                    $categories = get_terms('categories');
                    foreach( (array)$categories as $categorie){
                        $cat_name = $categorie->name;
                        $cat_slug = $categorie->slug;
                ?>
                    <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        
        <div id="projects-grid" class="projects-grid-2">
            <?php 
                $args = array(   
                    'post_type' => 'portfolio',   
                    'posts_per_page' => $number,              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'categories');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Portfolio Masonry Style 3
add_shortcode('portfoliomas3', 'portfoliomas3_func');
function portfoliomas3_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>  

    <div class="clear"></div>

    <div class="portfolio"></div>

    <div class="expander-wrap relative">
        <div id="expander-wrap" class="container">
            <p class="cls-btn"><a class="close"></a></p>
            <div class="expander-inner"></div>
        </div>
    </div>

    <div class="clear"></div>   
    <div class="section columns">  
        
        <?php if($filter=='true'){ ?>
        <div class="container">
            <div class="float-left margin-bottom-25 twelve">
                <div id="portfolio-filter" class="portfolio-filter-3">
                    <ul id="filter">
                        <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                        <?php 
                            $categories = get_terms('categories');
                            foreach( (array)$categories as $categorie){
                                $cat_name = $categorie->name;
                                $cat_slug = $categorie->slug;
                        ?>
                            <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <div id="projects-grid" class="projects-grid-3">
            <?php 
                $args = array(   
                    'post_type' => 'portfolio',   
                    'posts_per_page' => $number,              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'categories');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <h3><span><?php echo esc_attr($cate_name); ?></span><br><?php the_title(); ?></h3>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Portfolio Category
add_shortcode('portcate', 'portcate_func');
function portcate_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
        'idcate'        =>  '',
    ), $atts));

    ob_start(); ?>    
    
    <div class="clear"></div>

    <div class="portfolio"></div>

    <div class="expander-wrap relative">
        <div id="expander-wrap" class="container">
            <p class="cls-btn"><a class="close"></a></p>
            <div class="expander-inner"></div>
        </div>
    </div>

    <div class="clear"></div>   
    <div class="section">
        <?php if($filter=='true'){ ?>
        <div id="portfolio-filter">
            <ul id="filter">
                <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                <?php 
                    $categories = explode(",",$idcate);
                    foreach( (array)$categories as $categorie){
                        $cates = get_term_by('slug', $categorie, 'categories');
                        $cat_name = $cates->name;
                        $cat_slug = $cates->slug; 
                ?>                          
                  <li><a href="#" data-filter=".<?php echo esc_attr( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        
        <div id="projects-grid">
            <?php 
                $args = array(
                    'posts_per_page' => $number,
                    'post_type' => 'portfolio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categories',
                            'field' => 'slug',
                            'terms' => explode(',',$idcate),
                        ),
                    ),              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'categories');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a class="<?php if(talos_get_option('portfolio_single')=='2'){echo 'expander';} ?>" href="<?php the_permalink(); ?>">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <h3><span><?php echo esc_attr($cate_name); ?></span><br><?php the_title(); ?></h3>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Gallery Masonry Style 1
add_shortcode('portfoliomasg', 'portfoliomasg_func');
function portfoliomasg_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
        'tran'          =>  '',
    ), $atts));

    ob_start(); ?>    
    
    <?php if($filter=='true'){ ?>
    <div id="portfolio-filter" <?php if($tran==true){echo 'class="gallery-version"';} ?>>
        <ul id="filter">
            <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
            <?php 
                $categories = get_terms('category_gallery');
                foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
            ?>
                <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    
    <div id="projects-grid" <?php if($tran==true){echo 'class="translate-gallery full-width-small "';} ?>>
        <?php 
            $args = array(   
                'post_type' => 'ot_gallery',   
                'posts_per_page' => $number,              
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            $cates = get_the_terms(get_the_ID(),'category_gallery');
            $cate_slug = '';
            $cate_name = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
                    $cate_name .= $cate->name.' ' ;
                    $cate_slug .= $cate->slug .' ';     
                } 
            }
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?> 
        <a href="<?php echo esc_url($image); ?>" class="fancybox" rel="mygallery">
            <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                <div class="mask-g"></div>
                <img src="<?php echo esc_url($image); ?>" alt="">
            </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>  

        <script>
        (function($) { "use strict";            
            $(document).ready(function() {
                var $grid = $('#projects-grid').imagesLoaded( function() {
                    $grid.isotope({                     
                        itemSelector: '.portfolio-box-1',
                        percentPosition: true,  
                    });
                });          
                $('#portfolio-filter #filter a').click(function(){
                    $('#portfolio-filter #filter a').removeClass('current');
                    $(this).addClass('current');             
                    var selector = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: selector,                       
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            }); 
        })(jQuery); 
    </script>
           
    </div> 

<?php
    return ob_get_clean();
}

// Gallery Masonry Style 2
add_shortcode('portfoliomasg2', 'portfoliomasg2_func');
function portfoliomasg2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>     

    <div class="clear"></div>   
    <div class="section">
        <?php if($filter=='true'){ ?>
        <div id="portfolio-filter" class="portfolio-filter-2">
            <ul id="filter">
                <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                <?php 
                    $categories = get_terms('category_gallery');
                    foreach( (array)$categories as $categorie){
                        $cat_name = $categorie->name;
                        $cat_slug = $categorie->slug;
                ?>
                    <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        
        <div id="projects-grid" class="projects-grid-2">
            <?php 
                $args = array(   
                    'post_type' => 'ot_gallery',   
                    'posts_per_page' => $number,              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'category_gallery');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a href="<?php echo esc_url($image); ?>" class="fancybox" rel="mygallery">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Gallery Masonry Style 3
add_shortcode('portfoliomasg3', 'portfoliomasg3_func');
function portfoliomasg3_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>  

    <div class="clear"></div>

    <div class="portfolio"></div>

    <div class="expander-wrap relative">
        <div id="expander-wrap" class="container">
            <p class="cls-btn"><a class="close"></a></p>
            <div class="expander-inner"></div>
        </div>
    </div>

    <div class="clear"></div>   
    <div class="section columns">  
        
        <?php if($filter=='true'){ ?>
        <div class="container">
            <div class="float-left margin-bottom-25 twelve">
                <div id="portfolio-filter" class="portfolio-filter-3">
                    <ul id="filter">
                        <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
                        <?php 
                            $categories = get_terms('category_gallery');
                            foreach( (array)$categories as $categorie){
                                $cat_name = $categorie->name;
                                $cat_slug = $categorie->slug;
                        ?>
                            <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <div id="projects-grid" class="projects-grid-3">
            <?php 
                $args = array(   
                    'post_type' => 'ot_gallery',   
                    'posts_per_page' => $number,              
                );  
                $wp_query = new WP_Query($args);
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $cates = get_the_terms(get_the_ID(),'category_gallery');
                $cate_slug = '';
                $cate_name = '';
                foreach((array)$cates as $cate){
                    if(count($cates)>0){
                        $cate_name .= $cate->name.' ' ;
                        $cate_slug .= $cate->slug .' ';     
                    } 
                }
                $image = wp_get_attachment_url(get_post_thumbnail_id());
            ?>  
            <a href="<?php echo esc_url($image); ?>" class="fancybox" rel="mygallery">
                <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                    <div class="mask"></div>
                    <h3><span><?php echo esc_attr($cate_name); ?></span><br><?php the_title(); ?></h3>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>          
               
        </div> 
    </div>

<?php
    return ob_get_clean();
}

// Gallery Category
add_shortcode('gallerycate', 'gallerycate_func');
function gallerycate_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
        'tran'          =>  '',
        'idcate'        =>  '',
    ), $atts));

    ob_start(); ?>    
    
    <?php if($filter=='true'){ ?>
    <div id="portfolio-filter" <?php if($tran==true){echo 'class="gallery-version"';} ?>>
        <ul id="filter">
            <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
            <?php 
                $categories = explode(",",$idcate);
                foreach( (array)$categories as $categorie){
                    $cates = get_term_by('slug', $categorie, 'category_gallery');
                    $cat_name = $cates->name;
                    $cat_slug = $cates->slug; 
            ?>                          
              <li><a href="#" data-filter=".<?php echo esc_attr( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    
    <div id="projects-grid" <?php if($tran==true){echo 'class="translate-gallery full-width-small "';} ?>>
        <?php 
            $args = array(
                'posts_per_page' => $number,
                'post_type' => 'ot_gallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category_gallery',
                        'field' => 'slug',
                        'terms' => explode(',',$idcate),
                    ),
                ),              
            ); 
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            $cates = get_the_terms(get_the_ID(),'category_gallery');
            $cate_slug = '';
            $cate_name = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
                    $cate_name .= $cate->name.' ' ;
                    $cate_slug .= $cate->slug .' ';     
                } 
            }
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?> 
        <a href="<?php echo esc_url($image); ?>" class="fancybox" rel="mygallery">
            <div class="portfolio-box-1 <?php if($col=='2'){echo 'col-2';}elseif($col=='4'){echo 'col-4';}elseif($col=='5'){echo 'col-5';} ?> <?php echo esc_attr($cate_slug); ?>">
                <div class="mask-g"></div>
                <img src="<?php echo esc_url($image); ?>" alt="">
            </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>  

        <script>
        (function($) { "use strict";            
            $(document).ready(function() {
                var $grid = $('#projects-grid').imagesLoaded( function() {
                    $grid.isotope({                     
                        itemSelector: '.portfolio-box-1',
                        percentPosition: true,  
                    });
                });          
                $('#portfolio-filter #filter a').click(function(){
                    $('#portfolio-filter #filter a').removeClass('current');
                    $(this).addClass('current');             
                    var selector = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: selector,                       
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            }); 
        })(jQuery); 
    </script>
           
    </div> 

<?php
    return ob_get_clean();
}

// Logo Clients
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
    extract(shortcode_atts(array(
        'gallery'           =>  '',
        'visible'           =>  '6', 
        'pagi'              =>  '',
    ), $atts));
        
    ob_start(); ?>
            
        <div id="owl-logos" class="owl-carousel owl-theme owl-logos <?php if($pagi!=true){echo 'padding-bottom-0';} ?>">
            <?php 
                $img_ids = explode(",",$gallery);
                foreach( $img_ids AS $img_id ){
                $meta = wp_prepare_attachment_for_js($img_id);
                $caption = $meta['caption'];
                $title = $meta['title'];    
                $description = $meta['description'];
                $image_src = wp_get_attachment_image_src($img_id,''); 
            ?>
                <div class="item"><?php if($caption){ ?><a href="<?php echo esc_url($caption); ?>" target="_blank" ><?php } ?><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""><?php if($caption){ ?></a><?php } ?></div>
            <?php } ?>
        </div>

        <script>
            (function($) { "use strict";
                $(document).ready(function() {
                    $("#owl-logos").owlCarousel({
                        items : <?php echo esc_attr($visible); ?>,
                        itemsDesktop : [1000,<?php echo esc_attr($visible); ?>], 
                        itemsDesktopSmall : [900,3],
                        itemsTablet: [600,2], 
                        itemsMobile : false, 
                        pagination : <?php if($pagi==true){echo 'true';}else{echo 'false';} ?>,
                        autoPlay : 3000,
                        slideSpeed : 300
                    }); 
                }); 
            })(jQuery); 
        </script>

<?php
    return ob_get_clean();  
}

// Pricing Table
add_shortcode('pricing','pricing_func');
function pricing_func($atts, $content = null){
    extract(shortcode_atts(array(
        'el_class'  =>  '',
        'title'     =>  '',
        'status'    =>  '',
        'price'     =>  '',
        'unit'      =>  '',
        'linkbox'   =>  '',
        'sale'      =>  '',
        'per'       =>  '',
        'style'     =>  'style1',
        'background_color'  =>  '',
    ), $atts));
        $url    = vc_build_link( $linkbox );
        $background_color1 = (!empty($background_color) ? 'background-color: '.$background_color.';' : 'background-color: #303030');
    ob_start(); 
?>
    
    <div class="pricing-plan <?php echo esc_attr($el_class); ?> <?php if($style=='style2'){echo 'dark';} ?>" style="<?php echo esc_attr($background_color1); ?>">
        <div class="top"><?php echo htmlspecialchars_decode($title); ?></div>
        <div class="price"><span class="small"><?php echo esc_attr($unit); ?></span><?php echo htmlspecialchars_decode($price); ?> <span class="small-text"><?php echo htmlspecialchars_decode($per); ?></span></div>
        <?php echo htmlspecialchars_decode($content); ?>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a class="button" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ).'</a>';
        } ?>
    </div>

<?php
    return ob_get_clean();
}

// Lastest News
add_shortcode('lastestnew', 'lastestnew_func');
function lastestnew_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1',
        'btn_text'      =>  '',
        'el_class'      =>  '',
    ), $atts));

    ob_start(); ?>

    <?php 
        $args = array(   
        'post_type' => 'post',   
        'posts_per_page' => $number,               
        );  
        $wp_query = new WP_Query($args);
        $i = 0;
        while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
        $i++;             
    ?>
    <div class="six columns">
        <div class="<?php if($i==1 || $i==2 || $i==5 || $i==6 || $i==9 || $i==10 || $i==13 || $i==14){echo 'journal-wrap';}else{echo 'journal-wrap-right';} ?>">
            <?php if(get_the_post_thumbnail()){ ?>
                <a href="<?php the_permalink(); ?>" class="animsition-link">              
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" data-scroll-reveal="enter right move 150px over 0.7s after 0.2s"/>
                </a>
            <?php } ?>
            <div class="<?php echo esc_attr($el_class); ?> <?php if($i==1 || $i==2 || $i==5 || $i==6 || $i==9 || $i==10 || $i==13 || $i==14){echo 'journal-det';}else{echo 'journal-det-right';} ?>" data-scroll-reveal="enter right move 150px over 0.7s after 0.6s">
                <h6><?php esc_html_e('author:', 'talos'); ?> <?php the_author(); ?>. <span><?php the_time( get_option( 'date_format' ) ); ?>.</span></h6>
                <h5><?php the_title(); ?></h5>
                <a href="<?php the_permalink(); ?>"><div class="link"><?php echo htmlspecialchars_decode($btn_text); ?></div></a>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
    
    
<?php
    return ob_get_clean();
}

// Call to Action
add_shortcode('call', 'call_func');
function call_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'linkbox'  =>  '',
        'css'       =>  '',
    ), $atts));
        
    ob_start(); ?>
    
    <a href="<?php echo esc_url($linkbox); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78">
        <div class="section">
            <div class="portfolio-bottom-link <?php echo vc_shortcode_custom_css_class( $css ) ?>"><?php echo htmlspecialchars_decode($title); ?></div>
        </div>
    </a>

<?php
    return ob_get_clean();
}

// Map
add_shortcode('maps','maps_func');
function maps_func($atts, $content = null){
    extract(shortcode_atts(array(       
        'iconmap'       => '',
        'photo'         =>  '',
        'address'       => '',      
        'latitude'      => '',
        'longitude'     => '',
        'zoommap'       => '',
        'height'        => '',  
    ), $atts));

    $img = wp_get_attachment_image_src($iconmap,'full');
    $img = $img[0];
    $height1 = (!empty($height) ? $height : 500);

    ob_start(); ?>

    <div id="cd-google-map">
        <div id="google-container" style="position: relative;width: 100%;height: <?php echo esc_attr($height1); ?>;"></div>
        <div id="cd-zoom-in"></div>
        <div id="cd-zoom-out"></div>
        <?php if($photo || $address){ ?>
            <address>
                <?php if($photo){
                $img1 = wp_get_attachment_image_src($photo,'full');
                $img1 = $img1[0]; ?><img src="<?php echo esc_url($img1); ?>" alt=""><?php } ?>
                <?php if($address){ ?><p><?php echo htmlspecialchars_decode($address); ?></p><?php } ?>
            </address>
        <?php } ?>
    </div>  

    <script type="text/javascript">
        
        (function($) { "use strict"
            var latitude = <?php echo esc_attr($latitude); ?>,
                longitude = <?php echo esc_attr($longitude); ?>,
                map_zoom = <?php echo esc_attr($zoommap); ?>;

            //google map custom marker icon - .png fallback for IE11
            var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
            var marker_url = '<?php echo esc_url( $img ); ?>';
                
            //define the basic color of your map, plus a value for saturation and brightness
            var main_color = '#e67e22',
                saturation_value= -50,
                brightness_value= 14;

            //we define here the style of the map
            var style= [
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ];
                
            //set google map options
            var map_options = {
                center: new google.maps.LatLng(latitude, longitude),
                zoom: map_zoom,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                streetViewControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                styles: style,
            }
            //inizialize the map
            var map = new google.maps.Map(document.getElementById('google-container'), map_options);
            //add a custom marker to the map                
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longitude),
                map: map,
                visible: true,
                icon: marker_url,
            });

            //add custom buttons for the zoom-in/zoom-out on the map
            function CustomZoomControl(controlDiv, map) {
                //grap the zoom elements from the DOM and insert them in the map 
                var controlUIzoomIn= document.getElementById('cd-zoom-in'),
                    controlUIzoomOut= document.getElementById('cd-zoom-out');
                controlDiv.appendChild(controlUIzoomIn);
                controlDiv.appendChild(controlUIzoomOut);

                // Setup the click event listeners and zoom-in or out according to the clicked element
                google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
                    map.setZoom(map.getZoom()+1)
                });
                google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
                    map.setZoom(map.getZoom()-1)
                });
            }

            var zoomControlDiv = document.createElement('div');
            var zoomControl = new CustomZoomControl(zoomControlDiv, map);

            //insert the zoom div on the top left of the map
            map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);            
        })(jQuery);

    </script>

    <?php

    return ob_get_clean();

}

// Infomation Box
add_shortcode('infobox', 'infobox_func');
function infobox_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'contents'   =>  '',
        'background_color'  =>  '',
    ), $atts));
        $background_color1 = (!empty($background_color) ? 'background-color: '.$background_color.';' : 'background-color: #303030');
    ob_start(); ?>

    <div class="contact-det" style="<?php echo esc_attr($background_color1); ?>">
        <p><?php echo htmlspecialchars_decode($title); ?></p>
        <h6><?php echo htmlspecialchars_decode($contents); ?></h6>
    </div>

<?php
    return ob_get_clean();
}

// Home Parallax
add_shortcode('homepara', 'homepara_func');
function homepara_func($atts, $content = null){
    extract(shortcode_atts(array(
        'style'     =>  'style1',
        'photo'     =>  '',
        'title'     =>  '',
        'subtitle'  =>  '',
        'linkbox'   =>  '',
        'btn_link'  =>  '', 
    ), $atts));
        $img = wp_get_attachment_image_src($photo,'full');
        $img = $img[0];
        $url    = vc_build_link( $linkbox );
    ob_start(); ?>

    <?php if($style=='style1'){ ?>
        <div class="parallax-freelance" style="background: url('<?php echo esc_url($img); ?>');"></div>
        <div class="home-text">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <h1><?php echo htmlspecialchars_decode($title); ?></h1>
                    <?php if($subtitle){ ?><p><span><?php echo htmlspecialchars_decode($subtitle); ?></span></p><?php } ?>
                </div>
            </div>
        </div>
        <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down fade-elements"></div></a>
    <?php }elseif($style=='style5'){ ?>
        <div class="parallax-freelance" style="background: url('<?php echo esc_url($img); ?>');"></div>
        <div class="home-text home-text-barber">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <h1><?php echo htmlspecialchars_decode($title); ?></h1>
                    <?php if($subtitle){ ?><p><span><?php echo htmlspecialchars_decode($subtitle); ?></span></p><?php } ?>
                </div>
            </div>
        </div>
        <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down fade-elements"></div></a>
    <?php } ?>
        
<?php
    return ob_get_clean();
}

// Home Text Auto Write
add_shortcode('homeauto', 'homeauto_func');
function homeauto_func($atts, $content = null){
    extract(shortcode_atts(array(        
        'texts'     =>  '',
        'btn_link'  =>  '', 
    ), $atts));
        $texts = (array) vc_param_group_parse_atts( $texts ); 
    ob_start(); ?>

    <div class="full-height">
        <div class="home-text home-design">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <h1 class="cd-headline letters type">
                        <?php echo htmlspecialchars_decode($content); ?>
                        <span class="cd-words-wrapper waiting">
                            <?php 
                                foreach ( $texts as $data ) {
                                    $data['text'] = isset( $data['text'] ) ? $data['text'] : '';
                            ?>
                                <b><?php echo htmlspecialchars_decode($data['text']); ?></b>
                            <?php } ?>
                        </span>
                    </h1>
                </div>
            </div>
        </div>  
                    
        <div class="home-link fade-elements">
            <div class="container">
                <div class="twelve columns">
                    <a href="<?php echo esc_url($btn_link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down tipped link-down-home-medical" data-title="scroll down"  data-tipper-options='{"direction":"top","follow":"true"}'></div></a>  
                </div>
            </div>                      
        </div>
    </div>
        
<?php
    return ob_get_clean();
}

// Home Video Background
add_shortcode('homevideob', 'homevideob_func');
function homevideob_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'         =>  '',
        'link_mp4'      =>  '',
        'link_webm'     =>  '',
        'link_ogg'      =>  '',
        'title'         =>  '',
        'subtitle'      =>  '',
        'color'         =>  '',
        'cover'         =>  '',
    ), $atts));
        $img = wp_get_attachment_image_src($photo,'full');
        $img = $img[0];
        $color1 = (!empty($color) ? 'background-color: '.$color.';' : '');
    ob_start(); ?>
    
    <div class="half-height">
        <div id="video-wrap">
            <video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0" poster="<?php echo esc_url($img); ?>"> 
                <source src="<?php echo esc_url($link_webm); ?>" type="video/webm"> 
                <source src="<?php echo esc_url($link_mp4); ?>" type="video/mp4"> 
                <source src="<?php echo esc_url($link_ogg); ?>" type="video/ogg"> 
            </video>
        </div>
        <div class="home-mask" style="<?php echo esc_attr($color1); ?>"></div>
        <div class="home-text">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
                    <p><span><?php echo htmlspecialchars_decode($subtitle); ?></span></p>
                </div>
            </div>
        </div>
    </div>
        
<?php
    return ob_get_clean();
}

// Home Text Background
add_shortcode('hometext', 'hometext_func');
function hometext_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'         =>  '',
        'title'         =>  '',
        'subtitle'      =>  '',
        'link'          =>  '',
    ), $atts));
        $img = wp_get_attachment_image_src($photo,'full');
        $img = $img[0];
    ob_start(); ?>
    
    <div class="full-height">
        <div class="home-text">
            <div class="container fade-elements">
                <div class="twelve columns">
                    <?php if($subtitle){ ?><p class="text-background"><?php echo htmlspecialchars_decode($subtitle); ?></p><?php } ?>
                    <h1 class="text-background" style="-webkit-text-fill-color: transparent;background: -webkit-linear-gradient(transparent, transparent),url('<?php echo esc_url($img); ?>') repeat;background: -o-linear-gradient(transparent, transparent);-webkit-background-clip: text;background-position:center center;background-size:cover;">
                        <?php echo htmlspecialchars_decode($title); ?>
                    </h1>
                </div>
            </div>
        </div>
        
        <a href="<?php echo esc_url($link); ?>" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down fade-elements"></div></a>
    </div>
        
<?php
    return ob_get_clean();
}

// Our Skill
add_shortcode('skill','skill_func');
function skill_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'number'    =>  '',     
    ), $atts));

    ob_start(); 
?>
    
    <div class="skills-name"><?php echo htmlspecialchars_decode($title); ?> <span>%</span><span class="counter-numb"><?php echo esc_attr($number); ?></span></div>
    <div class="pro-bar-container">
        <div class="pro-bar bar-<?php echo esc_attr($number); ?>" data-pro-bar-percent="<?php echo esc_attr($number); ?>"></div>
    </div>

<?php
    return ob_get_clean();
}

// Feature Box
add_shortcode('feature','feature_func');
function feature_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'textf'    =>  '',     
    ), $atts));

    ob_start(); 
?>
    
    <div class="services-wrap-feature">                           
        <h5><span><?php echo htmlspecialchars_decode($textf); ?></span> <?php echo htmlspecialchars_decode($title); ?></h5>
        <p><?php echo htmlspecialchars_decode($content); ?></p>
    </div>

<?php
    return ob_get_clean();
}

// Video Player
add_shortcode('videoplayer','videoplayer_func');
function videoplayer_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'link'      =>  '',
    ), $atts));
        
    ob_start(); 
?>
    
    <div class="top-call-action">
        <h6><?php echo htmlspecialchars_decode($title); ?></h6>
        <a href="<?php echo esc_url($link); ?>" class="fancybox  fancybox.iframe"><div class="link">&#xf04b;</div></a>
    </div>

<?php
    return ob_get_clean();
}

// Menu Services
add_shortcode('menuser','menuser_func');
function menuser_func($atts, $content = null){
    extract(shortcode_atts(array(
        'mtitle'    =>  '',
        'services'  =>  '',
        'el_class'  =>  '',
    ), $atts));
        $services = (array) vc_param_group_parse_atts( $services ); 
    ob_start(); 
?>
    
    <div class="menu-wrap <?php echo esc_attr($el_class); ?>">
        <h4><?php echo htmlspecialchars_decode($mtitle); ?></h4>
        <?php 
            foreach ( $services as $data ) {
                $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
                $data['subtitle'] = isset( $data['subtitle'] ) ? $data['subtitle'] : '';
                $data['price'] = isset( $data['price'] ) ? $data['price'] : '';
        ?>
            <h6 data-scroll-reveal="enter bottom move 100px over 1s after 0.3s"><?php echo htmlspecialchars_decode($data['title']); ?><span class="dots"></span><span><?php echo esc_attr($data['price']); ?></span></h6>
            <p data-scroll-reveal="enter bottom move 100px over 1s after 0.3s"><?php echo htmlspecialchars_decode($data['subtitle']); ?></p>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Image Carousel
add_shortcode('image_carousel','image_carousel_func');
function image_carousel_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'time'      =>  '5000',   
    ), $atts));
        
    ob_start(); 
?>
    
    <div class="owl-carousel owl-theme owl-portfolio-slider">
       <?php 
                $img_ids = explode(",",$photo);
                foreach( $img_ids AS $img_id ){                
                $image_src = wp_get_attachment_image_src($img_id,''); 
            ?>
            <div class="item"><img src="<?php echo esc_url( $image_src[0] ); ?>" alt=""></div>
        <?php } ?>
    </div>

    <script>
        (function($) { "use strict";
            $(document).ready(function() {
                $(".owl-portfolio-slider").owlCarousel({
                    pagination:true,
                    slideSpeed : 300,
                    autoPlay : <?php echo esc_attr($time); ?>,
                    singleItem:true     
                }); 
            }); 
        })(jQuery); 
    </script>

<?php
    return ob_get_clean();
}

// Image Gallery
add_shortcode('image_gallery','image_gallery_func');
function image_gallery_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'time'      =>  '5000',
        'item'      =>  '4',   
    ), $atts));
        
    ob_start(); 
?>
    
    <div class="owl-gallery owl-carousel owl-theme">
       <?php 
                $img_ids = explode(",",$photo);
                foreach( $img_ids AS $img_id ){                
                $image_src = wp_get_attachment_image_src($img_id,''); 
            ?>
            <div class="item">
                <a href="<?php echo esc_url( $image_src[0] ); ?>" class="fancybox">
                    <img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">                                  
                    <div class="mask"></div>
                </a>
            </div>      
        <?php } ?>
    </div>

    <script>
        (function($) { "use strict";
            $(document).ready(function() {
                $(".owl-gallery").owlCarousel({
                    items : <?php echo esc_attr($item); ?>,
                    itemsDesktop : [1000,4], 
                    itemsDesktopSmall : [900,3],
                    itemsTablet: [600,2], 
                    itemsMobile : false, 
                    navigation: false,
                    pagination : true,
                    slideSpeed : 300,
                    autoPlay : <?php echo esc_attr($time); ?>,
                });
            }); 
        })(jQuery); 
    </script>

<?php
    return ob_get_clean();
}

// Product
add_shortcode('productf', 'productf_func');
function productf_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'        =>  '-1', 
        'all'           =>  'all',
        'col'           =>  '2',
        'filter'        =>  '',
    ), $atts));

    ob_start(); ?>  

    <?php if($filter=='true'){ ?>
    <div id="portfolio-filter" class="shop portfolio-filter">
        <ul id="filter" class="project-filter">
            <li><a href="#" class="current" data-filter="*" title=""><?php echo htmlspecialchars_decode($all); ?></a></li>
            <?php 
                $categories = get_terms('product_cat');
                foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
            ?>
                <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" title=""><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="clear"></div>
    <?php } ?>

    <div id="projects-grid" class="shop-grid">
        <?php 
            global $product;
            $args = array(   
                'post_type' => 'product',   
                'posts_per_page' => $number,              
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
            $cates = get_the_terms(get_the_ID(),'product_cat');
            $cate_slug = '';
            $cate_name = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
                    $cate_name .= $cate->name.' ' ;
                    $cate_slug .= $cate->slug .' ';     
                } 
            }
            $image = wp_get_attachment_url(get_post_thumbnail_id());
        ?> 
        <div class="shop-item portfolio-box-1 <?php echo esc_attr($cate_slug); ?> <?php if($col=='3'){echo 'col-3';}elseif($col=='4'){echo 'col-4';}else{echo 'col-2';} ?>">
            <img src="<?php echo esc_url($image); ?>" alt="">
            <div class="mask"></div>
            <div class="product-det">
                <h3>    
                    <?php
                        /**
                         * woocommerce_after_shop_loop_item_title hook.
                         *
                         * @hooked woocommerce_template_loop_price - 10
                         */
                        do_action( 'woocommerce_after_shop_loop_item_title' );
                    ?>
                </h3>
                <h6><?php the_title(); ?></h6>
                <div class="product-links">
                    <a href="<?php the_permalink(); ?>">view</a>
                    <?php
                        /**
                         * woocommerce_after_shop_loop_item hook.
                         *
                         * @hooked woocommerce_template_loop_product_link_close - 5
                         * @hooked woocommerce_template_loop_add_to_cart - 10
                         */
                        do_action( 'woocommerce_after_shop_loop_item' );
                    ?> 
                </div>  
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>  
    </div>

<?php
    return ob_get_clean();
}

?>