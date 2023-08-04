<?php 
// Button
if(function_exists('vc_map')){
   vc_map(array(
   "name"      => esc_html__("OT Button", 'otvcp-i10n'),
   "base"      => "button",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Button", 'otvcp-i10n'),
         "param_name" => "linkbox",       
         "description" => esc_html__("Add link to Button.", 'otvcp-i10n'),
      ),
      array(
         "type"         => "colorpicker",
         "holder"       => "div",
         "class"        => "",
         "heading"      => esc_html__("Button Background Color", 'otvcp-i10n'),
         "param_name"   => "bg_color",
         "value"        => "",
      ),
      array(
         "type"      => "checkbox",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__('Use Effect', 'otvcp-i10n'),
         "param_name" => "eff",
      ),
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
   )));
}

// Accordion
if(function_exists('vc_map')){
   vc_map(array(
   "name"      => esc_html__("OT Accordion", 'otvcp-i10n'),
   "base"      => "accordion",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Accordion', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'accordions',
         "description" => esc_html__("Enter your accordions. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textfield',
               'value' => '',
               'heading' => 'Title',
               'param_name' => 'title',
            ),
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Content',
               'param_name' => 'acc',
               "value" => "",
            ),
         ),
      ),
   )));
}

// About
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT About", 'otvcp-i10n'),
   "base" => "about",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         'type' => 'dropdown',
         'heading' => esc_html__( 'Icon library', 'otvcp-i10n' ),
         'value' => array(
            esc_html__( 'Font Awesome', 'otvcp-i10n' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'otvcp-i10n' ) => 'openiconic',
            esc_html__( 'Typicons', 'otvcp-i10n' ) => 'typicons',
            esc_html__( 'Entypo', 'otvcp-i10n' ) => 'entypo',
            esc_html__( 'Linecons', 'otvcp-i10n' ) => 'linecons',
            esc_html__( 'Mono Social', 'otvcp-i10n' ) => 'monosocial',
            esc_html__( 'Material', 'otvcp-i10n' ) => 'material',
            esc_html__( 'Et-Line', 'otvcp-i10n' ) => 'etline',
            esc_html__( 'Image Icon', 'otvcp-i10n' ) => 'image',
         ),
         'admin_label' => true,
         'param_name' => 'type',
         'description' => esc_html__( 'Select icon library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of icon.", 'otvcp-i10n'),
         'dependency' => array(
            'element' => 'type',
            'value' => 'image',
         ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'otvcp-i10n'),
         "param_name" => "icon",
         "value" => "",
         "description" => wp_kses( __( 'Ex: icon-wallet, <a href="http://vegatheme.com/html/archi-icons-etlinefont/" target="_blank">view more icon class</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),        
         'dependency' => array(
            'element' => 'type',
            'value' => 'etline',
         ),
      ), 
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_fontawesome',
         'value' => 'fa fa-adjust',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_openiconic',
         'value' => 'vc-oi vc-oi-dial',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'openiconic',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_typicons',
         'value' => 'typcn typcn-adjust-brightness',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'typicons',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_entypo',
         'value' => 'entypo-icon entypo-icon-note',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'entypo',
         ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_linecons',
         'value' => 'vc_li vc_li-heart',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'linecons',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_monosocial',
         'value' => 'vc-mono vc-mono-fivehundredpx',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'monosocial',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'monosocial',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_material',
         'value' => 'vc-material vc-material-cake',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'material',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'material',
         ),
         'description' => esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Sub Title",
         "param_name" => "subtitle",
         "value" => "",
      ),     
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "content",
         "value" => "",
      ), 
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Button", 'otvcp-i10n'),
         "param_name" => "linkbox",       
         "description" => esc_html__("Add link to Button.", 'otvcp-i10n'),
      ),   
    )));
}

// Home Slider Text Center
if(function_exists('vc_map')){
   vc_map(array(
   "name"      => esc_html__("OT Home Slider Text Center", 'otvcp-i10n'),
   "base"      => "home_sli",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Full height', 'otvcp-i10n'),
         "param_name" => "full",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Small Text', 'otvcp-i10n'),
         "param_name" => "small",
      ),   
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Slides', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'slides',
         "description" => esc_html__("Enter your slides. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Title(multiple field)',
               'param_name' => 'title',
               "value" => "",
            ),
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Subtitle(multiple field)',
               'param_name' => 'subtitle',
               "value" => "",
            ),
            array(
               "type" => "attach_image",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__("Image Background", 'otvcp-i10n'),
               "param_name" => "photo",
               "value" => "",
               "description" => esc_html__("Image background of slide.", 'otvcp-i10n')
            ),
         ),
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button Scrolldown", 'otvcp-i10n'),
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Add link scrolldown for button. If non-exiting, button will not display.", 'otvcp-i10n')
      ),   
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
   )));
}

// Home Slider Text Left
if(function_exists('vc_map')){
   vc_map(array(
   "name"      => esc_html__("OT Home Slider Text Left", 'otvcp-i10n'),
   "base"      => "home_sli2",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(   
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Slides', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'slides',
         "description" => esc_html__("Enter your slides. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Title(multiple field)',
               'param_name' => 'title',
               "value" => "",
            ),
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Subtitle(multiple field)',
               'param_name' => 'subtitle',
               "value" => "",
            ),
            array(
               "type" => "attach_image",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__("Image Background", 'otvcp-i10n'),
               "param_name" => "photo",
               "value" => "",
               "description" => esc_html__("Image background of slide.", 'otvcp-i10n')
            ),
         ),
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button Scrolldown", 'otvcp-i10n'),
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Add link scrolldown for button. If non-exiting, button will not display.", 'otvcp-i10n')
      ),   
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
   )));
}

// Home Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Video", 'otvcp-i10n'),
   "base" => "home_video",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link video", 'otvcp-i10n'),
         "param_name" => "video_link",
         "value" => "",
         "description" => esc_html__("Add link video. Ex: http://player.vimeo.com/video/32351411", 'otvcp-i10n')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Poster", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Poster of video.", 'otvcp-i10n')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ),   
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button Scrolldown", 'otvcp-i10n'),
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Add link scrolldown for button. If non-exiting, button will not display.", 'otvcp-i10n')
      ), 
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Full height', 'otvcp-i10n'),
         "param_name" => "full",
      ),       
   )));
}

// Heading
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Talos Heading", 'otvcp-i10n'),
   "base" => "heading",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array( 
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of heading", 'otvcp-i10n')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Subtitle", 'otvcp-i10n'),
         "param_name" => "subtitle",
         "value" => "",
         "description" => esc_html__("Subtitle of heading", 'otvcp-i10n')
      ),
      array(
         "type"      => "colorpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Text Color", 'otvcp-i10n'),
         "param_name"=> "color",
         "value"     => "",
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Extra Class", 'otvcp-i10n'),
         "param_name" => "el_class",
         "value" => "",
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n')
      ), 
   )));
}

// Icon Box (icon left)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box (Icon left)", 'otvcp-i10n'),
   "base" => "iconbox",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         'type' => 'dropdown',
         'heading' =>esc_html__( 'Icon library', 'otvcp-i10n' ),
         'value' => array(
           esc_html__( 'Font Awesome', 'otvcp-i10n' ) => 'fontawesome',
           esc_html__( 'Open Iconic', 'otvcp-i10n' ) => 'openiconic',
           esc_html__( 'Typicons', 'otvcp-i10n' ) => 'typicons',
           esc_html__( 'Entypo', 'otvcp-i10n' ) => 'entypo',
           esc_html__( 'Linecons', 'otvcp-i10n' ) => 'linecons',
           esc_html__( 'Mono Social', 'otvcp-i10n' ) => 'monosocial',
           esc_html__( 'Material', 'otvcp-i10n' ) => 'material',
           esc_html__( 'Et-Line', 'otvcp-i10n' ) => 'etline',
           esc_html__( 'Image Icon', 'otvcp-i10n' ) => 'image',
         ),
         'admin_label' => true,
         'param_name' => 'type',
         'description' =>esc_html__( 'Select icon library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of icon.", 'otvcp-i10n'),
         'dependency' => array(
            'element' => 'type',
            'value' => 'image',
         ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'otvcp-i10n'),
         "param_name" => "icon",
         "value" => "",
         "description" => wp_kses( __( 'Ex: icon-wallet, <a href="http://vegatheme.com/html/archi-icons-etlinefont/" target="_blank">view more icon class</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'etline',
         ),
      ), 
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_fontawesome',
         'value' => 'fa fa-adjust',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_openiconic',
         'value' => 'vc-oi vc-oi-dial',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'openiconic',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_typicons',
         'value' => 'typcn typcn-adjust-brightness',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'typicons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_entypo',
         'value' => 'entypo-icon entypo-icon-note',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'entypo',
         ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_linecons',
         'value' => 'vc_li vc_li-heart',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'linecons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_monosocial',
         'value' => 'vc-mono vc-mono-fivehundredpx',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'monosocial',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'monosocial',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_material',
         'value' => 'vc-material vc-material-cake',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'material',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'material',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Style', 'otvcp-i10n'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1 : Big Icon', 'otvcp-i10n')       => 'style1',
                     esc_html__('Style 2 : Small Icon', 'otvcp-i10n')     => 'style2',
                     esc_html__('Style 3 : Normal Icon', 'otvcp-i10n')     => 'style3',
                     ),
         'dependency' => array(
            'element' => 'type',
            'value' => array( 'fontawesome','openiconic','typicons','entypo','linecons','monosocial','material','etline')
         ), 
      ),   
    )));
}

// Icon Box (icon center)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box (Icon center)", 'otvcp-i10n'),
   "base" => "iconboxcenter",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         'type' => 'dropdown',
         'heading' =>esc_html__( 'Icon library', 'otvcp-i10n' ),
         'value' => array(
           esc_html__( 'Font Awesome', 'otvcp-i10n' ) => 'fontawesome',
           esc_html__( 'Open Iconic', 'otvcp-i10n' ) => 'openiconic',
           esc_html__( 'Typicons', 'otvcp-i10n' ) => 'typicons',
           esc_html__( 'Entypo', 'otvcp-i10n' ) => 'entypo',
           esc_html__( 'Linecons', 'otvcp-i10n' ) => 'linecons',
           esc_html__( 'Mono Social', 'otvcp-i10n' ) => 'monosocial',
           esc_html__( 'Material', 'otvcp-i10n' ) => 'material',
           esc_html__( 'Et-Line', 'otvcp-i10n' ) => 'etline',
           esc_html__( 'Image Icon', 'otvcp-i10n' ) => 'image',
         ),
         'admin_label' => true,
         'param_name' => 'type',
         'description' =>esc_html__( 'Select icon library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of icon.", 'otvcp-i10n'),
         'dependency' => array(
            'element' => 'type',
            'value' => 'image',
         ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'otvcp-i10n'),
         "param_name" => "icon",
         "value" => "",
         "description" => wp_kses( __( 'Ex: icon-wallet, <a href="http://vegatheme.com/html/archi-icons-etlinefont/" target="_blank">view more icon class</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'etline',
         ),
      ), 
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_fontawesome',
         'value' => 'fa fa-adjust',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_openiconic',
         'value' => 'vc-oi vc-oi-dial',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'openiconic',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_typicons',
         'value' => 'typcn typcn-adjust-brightness',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'typicons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_entypo',
         'value' => 'entypo-icon entypo-icon-note',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'entypo',
         ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_linecons',
         'value' => 'vc_li vc_li-heart',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'linecons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_monosocial',
         'value' => 'vc-mono vc-mono-fivehundredpx',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'monosocial',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'monosocial',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_material',
         'value' => 'vc-material vc-material-cake',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'material',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'material',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "content",
         "value" => "",
      ),   
    )));
}

// Service Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Service Box", 'otvcp-i10n'),
   "base" => "servicebox",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         'type' => 'dropdown',
         'heading' =>esc_html__( 'Icon library', 'otvcp-i10n' ),
         'value' => array(
           esc_html__( 'Font Awesome', 'otvcp-i10n' ) => 'fontawesome',
           esc_html__( 'Open Iconic', 'otvcp-i10n' ) => 'openiconic',
           esc_html__( 'Typicons', 'otvcp-i10n' ) => 'typicons',
           esc_html__( 'Entypo', 'otvcp-i10n' ) => 'entypo',
           esc_html__( 'Linecons', 'otvcp-i10n' ) => 'linecons',
           esc_html__( 'Mono Social', 'otvcp-i10n' ) => 'monosocial',
           esc_html__( 'Material', 'otvcp-i10n' ) => 'material',
           esc_html__( 'Et-Line', 'otvcp-i10n' ) => 'etline',
         ),
         'admin_label' => true,
         'param_name' => 'type',
         'description' =>esc_html__( 'Select icon library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'otvcp-i10n'),
         "param_name" => "icon",
         "value" => "",
         "description" => wp_kses( __( 'Ex: icon-wallet, <a href="http://vegatheme.com/html/archi-icons-etlinefont/" target="_blank">view more icon class</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'etline',
         ),
      ), 
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_fontawesome',
         'value' => 'fa fa-adjust',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'fontawesome',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_openiconic',
         'value' => 'vc-oi vc-oi-dial',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'openiconic',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_typicons',
         'value' => 'typcn typcn-adjust-brightness',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'typicons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_entypo',
         'value' => 'entypo-icon entypo-icon-note',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'entypo',
         ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_linecons',
         'value' => 'vc_li vc_li-heart',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'linecons',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_monosocial',
         'value' => 'vc-mono vc-mono-fivehundredpx',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'monosocial',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'monosocial',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         'type' => 'iconpicker',
         'heading' =>esc_html__( 'Icon', 'otvcp-i10n' ),
         'param_name' => 'icon_material',
         'value' => 'vc-material vc-material-cake',
         // default value to backend editor admin_label
         'settings' => array(
            'emptyIcon' => false,
            // default true, display an "EMPTY" icon?
            'type' => 'material',
            'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
         ),
         'dependency' => array(
            'element' => 'type',
            'value' => 'material',
         ),
         'description' =>esc_html__( 'Select icon from library.', 'otvcp-i10n' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "content",
         "value" => "",
      ),       
    )));
}

// Testimonial Slider Style 1
if(function_exists('vc_map')){
   vc_map(array(
   "name"      =>esc_html__("OT Testimonial Slider Style 1", 'otvcp-i10n'),
   "base"      => "testis",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Time Delay', 'otvcp-i10n'),
         "param_name" => "time",
         "description" => esc_html__("Enter time delay slide (1000 = 1s). Default : 5000. ", 'otvcp-i10n')
      ), 
      array(
        "type" => "checkbox",
        "heading" => esc_html__('Use Small padding', 'otvcp-i10n'),
        "param_name" => "small",
      ),
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Testimonials', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'testimonials',
         "description" => esc_html__("Enter your testimonials. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Testimonial(multiple field)',
               'param_name' => 'testimonial',
               "value" => "",
            ),
         ),
      ),
   )));
}

// Testimonial Slider Style 2
if(function_exists('vc_map')){
   vc_map(array(
   "name"      => esc_html__("OT Testimonial Slider Style 2", 'otvcp-i10n'),
   "base"      => "testis2",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Time Delay', 'otvcp-i10n'),
         "param_name" => "time",
         "description" => esc_html__("Enter time delay slide (1000 = 1s). Default : 5000. ", 'otvcp-i10n')
      ),
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Testimonials', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'testimonials',
         "description" => esc_html__("Enter your testimonials. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Testimonial(multiple field)',
               'param_name' => 'testimonial',
               "value" => "",
            ),
         ),
      ),
   )));
}

// Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Team", 'otvcp-i10n'),
   "base" => "team",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Layout', 'otvcp-i10n'),
        "param_name" => "layout",
        "value" => array(   
                     esc_html__('Layout 1: Image Bottom', 'otvcp-i10n')   => 'layout1', 
                     esc_html__('Layout 2: Image Top', 'otvcp-i10n')   => 'layout2',                  
                    ), 
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'otvcp-i10n'),
        "param_name" => "style",
        "value" => array(   
                     esc_html__('Style 1: Text Dark', 'otvcp-i10n')   => 'style1', 
                     esc_html__('Style 2: Text Light', 'otvcp-i10n')   => 'style2',                  
                    ), 
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of person.", 'otvcp-i10n')
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name", 'otvcp-i10n'),
         "param_name" => "name",
         "value" => "",
         "description" => esc_html__("Name of person", 'otvcp-i10n')
      ),  
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'otvcp-i10n'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("content right.", 'otvcp-i10n')
      ),
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Socials', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'contacts',
         "description" => esc_html__("Enter team's socials. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               "type" => "iconpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__("Contact", 'otvcp-i10n'),
               "param_name" => "contact",
               "value" => "",
            ),
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Link Contact(multiple field)',
               'param_name' => 'url',
               "value" => "",
            ),
         ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Extra Class", 'otvcp-i10n'),
         "param_name" => "el_class",
         "value" => "",
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n')
      ), 
   )));
}

// Our Facts
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Facts", 'otvcp-i10n'),
   "base" => "facts",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number", 'otvcp-i10n'),
         "param_name" => "number",
         "value" => "",
         "description" => esc_html__("Number of box.", 'otvcp-i10n')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of box.", 'otvcp-i10n')
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Style', 'otvcp-i10n'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1: Title Bottom', 'otvcp-i10n')   => 'style1',
                     esc_html__('Style 2: Title on Number', 'otvcp-i10n')  => 'style2',
                     ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Extra Class", 'otvcp-i10n'),
         "param_name" => "el_class",
         "value" => "",
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n')
      ), 
   )));
}

// Portfolio List Style 1
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio List Style 1", 'otvcp-i10n'),
   "base" => "portfolio",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Button Text Read More', 'otvcp-i10n'),
         "param_name" => "btn_text",
      ),
   )));
}

// Portfolio List Style 2
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio List Style 2", 'otvcp-i10n'),
   "base" => "portfolio2",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
   )));
}

// Portfolio Masonry Style 1
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Masonry Style 1", 'otvcp-i10n'),
   "base" => "portfoliomas",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

// Portfolio Masonry Style 2
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Masonry Style 2", 'otvcp-i10n'),
   "base" => "portfoliomas2",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

// Portfolio Masonry Style 3
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Masonry Style 3", 'otvcp-i10n'),
   "base" => "portfoliomas3",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

// Portfolio Category
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Category", 'otvcp-i10n'),
   "base" => "portcate",
   'admin_enqueue_js'  => plugins_url('ot_composer/assets/javascripts/select2.min.js'),
   'admin_enqueue_css' => plugins_url('ot_composer/assets/stylesheets/select2.css'),
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type"      => "select_categories",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Select Categories", 'archi'),
         "param_name"=> "idcate",
         "value"     => "",
         "description" => __("Enter your category, It's help show portfolio by category.", 'archi')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

if ( ! function_exists( 'is_plugin_active' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {     
  if ( function_exists( 'vc_add_shortcode_param' ) ) {
     vc_add_shortcode_param( 'select_categories', 'select_param', plugins_url('ot_composer/assets/javascripts/select-field.js') );
  } elseif ( function_exists( 'add_shortcode_param' ) ) {
     add_shortcode_param( 'select_categories', 'select_param', plugins_url('ot_composer/assets/javascripts/select-field.js') );
  }
}   

function select_param( $settings, $value ) {
  $categories = get_terms( 'categories' );
  $cat = array();
  foreach( $categories as $category ) {
     if( $category ) {
        $cat[] = sprintf('<option value="%s">%s</option>',
           esc_attr( $category->slug ),
           $category->name
        );
     }

  }

  return sprintf(
     '<input type="hidden" name="%s" value="%s" class="wpb-input-categories wpb_vc_param_value wpb-textinput %s %s_field">
     <select class="select-categories-post">
     %s
     </select>',
     esc_attr( $settings['param_name'] ),
     esc_attr( $value ),
     esc_attr( $settings['param_name'] ),
     esc_attr( $settings['type'] ),
     implode( '', $cat )
  );
}

// Gallery Masonry Style 1
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Gallery Masonry Style 1", 'otvcp-i10n'),
   "base" => "portfoliomasg",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Gallery Translate Top', 'otvcp-i10n'),
         "param_name" => "tran",
      ), 
   )));
}

// Gallery Masonry Style 2
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Gallery Masonry Style 2", 'otvcp-i10n'),
   "base" => "portfoliomasg2",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

// Gallery Masonry Style 3
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Gallery Masonry Style 3", 'otvcp-i10n'),
   "base" => "portfoliomasg3",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
   )));
}

// Gallery Category
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Gallery Category", 'otvcp-i10n'),
   "base" => "gallerycate",
   'admin_enqueue_js'  => plugins_url('ot_composer/assets/javascripts/select2.min.js'),
   'admin_enqueue_css' => plugins_url('ot_composer/assets/stylesheets/select2.css'),
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type"      => "select_category_gallery",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Select Categories", 'archi'),
         "param_name"=> "idcate",
         "value"     => "",
         "description" => __("Enter your category, It's help show portfolio by category.", 'archi')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                     esc_html__('5', 'otvcp-i10n')   => '5',
                    ), 
      ), 
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Gallery Translate Top', 'otvcp-i10n'),
         "param_name" => "tran",
      ), 
   )));
}

if ( ! function_exists( 'is_plugin_active' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {     
  if ( function_exists( 'vc_add_shortcode_param' ) ) {
     vc_add_shortcode_param( 'select_category_gallery', 'select_param_2', plugins_url('ot_composer/assets/javascripts/select-field-2.js') );
  } elseif ( function_exists( 'add_shortcode_param' ) ) {
     add_shortcode_param( 'select_category_gallery', 'select_param_2', plugins_url('ot_composer/assets/javascripts/select-field-2.js') );
  }
}   

function select_param_2( $settings, $value ) {
  $categories = get_terms( 'category_gallery' );
  $cat = array();
  foreach( $categories as $category ) {
     if( $category ) {
        $cat[] = sprintf('<option value="%s">%s</option>',
           esc_attr( $category->slug ),
           $category->name
        );
     }

  }

  return sprintf(
     '<input type="hidden" name="%s" value="%s" class="wpb-input-category-gallery wpb_vc_param_value wpb-textinput %s %s_field">
     <select class="select-category-gallery-post">
     %s
     </select>',
     esc_attr( $settings['param_name'] ),
     esc_attr( $value ),
     esc_attr( $settings['param_name'] ),
     esc_attr( $settings['type'] ),
     implode( '', $cat )
  );
}

// Clients Logo
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Clients Logo", 'otvcp-i10n'),
   "base"      => "clients",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Use link out for logo client by enter link input caption image, View guide here: http://vegatheme.com/images/add-link-logo.jpg , Recomended Size: 200 x 130. ", 'otvcp-i10n')
      ),       
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Visible Of Row', 'otvcp-i10n'),
        "param_name" => "visible",
        "value" => array(   
                     esc_html__('6', 'otvcp-i10n')   => '6', 
                     esc_html__('5', 'otvcp-i10n')   => '5',
                     esc_html__('4', 'otvcp-i10n')   => '4',                    
                    ), 
      ), 
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Pagination', 'otvcp-i10n'),
         "param_name" => "pagi",
      ),   
    )));
}

// Pricing Table
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Pricing Table", 'otvcp-i10n'),
   "base" => "pricing",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array( 
      array(
         "type"      => "colorpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Box Background Color", 'otvcp-i10n'),
         "param_name"=> "background_color",
         "value"     => "",
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Style', 'otvcp-i10n'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1 : Text light', 'otvcp-i10n')   => 'style1',
                     esc_html__('Style 2 : Text Dark', 'otvcp-i10n')  => 'style2',
                     ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'otvcp-i10n'),
         "param_name" => "price",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Unit", 'otvcp-i10n'),
         "param_name" => "unit",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Period", 'otvcp-i10n'),
         "param_name" => "per",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'otvcp-i10n'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("content right.", 'otvcp-i10n')
      ),
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Button", 'otvcp-i10n'),
         "param_name" => "linkbox",       
         "description" => esc_html__("Add link to Button.", 'otvcp-i10n'),
      ),
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),
   )));
}

// Lastest News
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Lastest News", 'otvcp-i10n'),
   "base" => "lastestnew",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Button Text Read More', 'otvcp-i10n'),
         "param_name" => "btn_text",
      ),
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ), 
    )));
}

// Call To Action
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Call To Action", 'otvcp-i10n'),
   "base" => "call",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ),      
      array(
        'type' => 'textfield',
         "heading" => esc_html__("Link Box", 'otvcp-i10n'),
         "param_name" => "linkbox",        
         "description" => esc_html__("Add link.", 'otvcp-i10n'),
      ),
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'otvcp-i10n' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'otvcp-i10n' )
      ),
    )));
}

//Google Map (use)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Talos Map", 'otvcp-i10n'),
   "base"      => "maps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Talos Elements',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Height Map", 'otvcp-i10n'),
         "param_name"=> "height",
         "value"     => '',
         "description" => esc_html__("Height's Map. Ex : 300px, 400px, 500px.... default : 500px. Fullheight : 100vh", 'otvcp-i10n')
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Enter your address", 'otvcp-i10n'),
         "param_name"=> "address",
         "value"     => '',
         "description" => esc_html__("", 'otvcp-i10n')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Latitude", 'otvcp-i10n'),
         "param_name"=> "latitude",
         "value"     => 44.8013716,
         "description" => wp_kses( __( 'Find Latitude code: <a href="http://www.latlong.net/"" target="_blank">view more</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Longitude", 'otvcp-i10n'),
         "param_name"=> "longitude",
         "value"     => 20.4631372,
         "description" => wp_kses( __( 'Find Latitude code: <a href="http://www.latlong.net/"" target="_blank">view more</a>', 'otvcp-i10n' ), wp_kses_allowed_html('post') ),
      ),     
     array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Location Image", 'otvcp-i10n'),
         "param_name"=> "iconmap",
         "value"     => "",
         "description" => esc_html__("Upload Location Image.", 'otvcp-i10n')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Enter number for Zoom Map", 'otvcp-i10n'),
         "param_name"=> "zoommap",
         "value"     => 15,
         "description" => esc_html__("", 'otvcp-i10n')
      ),
    )));
}

// Infomation Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Infomation Box", 'otvcp-i10n'),
   "base" => "infobox",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         "type"      => "colorpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Box Background Color", 'otvcp-i10n'),
         "param_name"=> "background_color",
         "value"     => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),      
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "contents",
         "value" => "",
      ),  
    )));
}

// Home Parallax
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Parallax", 'otvcp-i10n'),
   "base" => "homepara",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Style', 'otvcp-i10n'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Style 1 : Home Freelance', 'otvcp-i10n')   => 'style1',
                     esc_html__('Style 2 : Home Case Study', 'otvcp-i10n')  => 'style2',                     
                     esc_html__('Style 3 : Home Shop', 'otvcp-i10n')        => 'style4',
                     esc_html__('Style 4 : Home Barber', 'otvcp-i10n')      => 'style5',
                     // esc_html__('Style 5 : Home Travel', 'otvcp-i10n')      => 'style3',
                     ), 
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image Background", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
      ), 
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Subtitle",
         "param_name" => "subtitle",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' , 'style2' , 'style4') ),
      ), 
      array(
        'type' => 'textfield',
         "heading" => esc_html__("Link Box", 'otvcp-i10n'),
         "param_name" => "linkbox",        
         "description" => esc_html__("Add link button.", 'otvcp-i10n'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' , 'style4') ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Button Scroll Link",
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Add link button bottom. If non-exiting , button will not show.", 'otvcp-i10n'),
      ),  
    )));
}

// Home Text Auto Write
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Text Automatic Write", 'otvcp-i10n'),
   "base" => "homeauto",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array( 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "content",
         "value" => "",
      ),
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Text Auto Write', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'texts',
         "description" => esc_html__("Enter your Text Auto write. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Text(multiple field)',
               'param_name' => 'text',
               "value" => "",
            ),
         ),
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Button Scroll Link",
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Add link button bottom. If non-exiting , button will not show.", 'otvcp-i10n'),
      ),  
    )));
}

// Home Video Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Video Background", 'otvcp-i10n'),
   "base" => "homevideob",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(       
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Poster", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video HTML5 mp4",
         "param_name" => "link_mp4",
         "value" => "",
         "description" => esc_html__("Enter your link video HTML5.", 'otvcp-i10n'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video HTML5 webm",
         "param_name" => "link_webm",
         "value" => "",
         "description" => esc_html__("Enter your link video HTML5.", 'otvcp-i10n'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video HTML5 ogg",
         "param_name" => "link_ogg",
         "value" => "",
         "description" => esc_html__("Enter your link video HTML5.", 'otvcp-i10n'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Subtitle",
         "param_name" => "subtitle",
         "value" => "",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Background Color Cover', 'otvcp-i10n'),
         "param_name" => "cover",
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Color", 'otvcp-i10n'),
         "param_name" => "color",
         "dependency"  => array( 'element' => 'cover', 'value' => "true" ),
      ),
    )));
}

// Home Text Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Home Text Background", 'otvcp-i10n'),
   "base" => "hometext",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(       
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Image Background", 'otvcp-i10n'),
         "param_name" => "photo",
         "value" => "",
      ), 
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Subtitle",
         "param_name" => "subtitle",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Button Scroll",
         "param_name" => "link",
         "value" => "",
      ),
    )));
}

// Our Skill
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Skill", 'otvcp-i10n'),
   "base" => "skill",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number", 'otvcp-i10n'),
         "param_name" => "number",
         "value" => "",
      ), 
   )));
}

// Feature Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Feature Box", 'otvcp-i10n'),
   "base" => "feature",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Feature Text", 'otvcp-i10n'),
         "param_name" => "textf",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ), 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'otvcp-i10n'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("content right.", 'otvcp-i10n')
      ), 
   )));
}

// Menu Services
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Menu Services", 'otvcp-i10n'),
   "base" => "menuser",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(   
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Menu Title", 'otvcp-i10n'),
         "param_name" => "mtitle",
         "value" => "",
      ),    
      // params group
      array(
         'type' => 'param_group',
         "heading" => esc_html__('Services', 'otvcp-i10n'),
         'value' => '',
         'param_name' => 'services',
         "description" => esc_html__("Enter your services and price. Click '+' to add more. ", 'otvcp-i10n'),
         // Note params is mapped inside param-group:
         'params' => array(
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Service Title(multiple field)',
               'param_name' => 'title',
               "value" => "",
            ),
            array(
               'type' => 'textarea',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Services Subtitle(multiple field)',
               'param_name' => 'subtitle',
               "value" => "",
            ),
            array(
               'type' => 'textfield',
               "holder" => "div",
               "class" => "",
               'heading' => 'Enter Your Services Price(multiple field)',
               'param_name' => 'price',
               "value" => "",
            ),
         ),
      ),
      array(
         'type' => 'textfield',
         'value' => '',
         'heading' => 'Extra Class',
         'param_name' => 'el_class',
         "description" => esc_html__("Add class for CSS.", 'otvcp-i10n'),
      ),      
   )));
}

// Video Player
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Video Player", 'otvcp-i10n'),
   "base" => "videoplayer",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'otvcp-i10n'),
         "param_name" => "title",
         "value" => "",
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link video", 'otvcp-i10n'),
         "param_name" => "link",
         "value" => "",
      ),
   )));
}

// Image Carousel
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Image Carousel", 'otvcp-i10n'),
   "base" => "image_carousel",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "photo",
         "value" => "",         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Time Delay', 'otvcp-i10n'),
         "param_name" => "time",
         "description" => esc_html__("Enter time delay slide (1000 = 1s). Default : 5000. ", 'otvcp-i10n')
      ),
   )));
}

// Image Gallery
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Image Gallery", 'otvcp-i10n'),
   "base" => "image_gallery",
   "class" => "",
   "category" => 'Talos Elements',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "photo",
         "value" => "",         
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Slides per view', 'otvcp-i10n'),
         "param_name" => "item",
         "value" => array(    
                     esc_html__('4', 'otvcp-i10n')  => '4',  
                     esc_html__('5', 'otvcp-i10n')  => '5',
                     esc_html__('6', 'otvcp-i10n')  => '6',
                    ), 
         "description" => esc_html__("Select number of slides to display at the same time.", 'otvcp-i10n')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Time Delay', 'otvcp-i10n'),
         "param_name" => "time",
         "description" => esc_html__("Enter time delay slide (1000 = 1s). Default : 5000. ", 'otvcp-i10n')
      ),

   )));
}

// Product
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Product", 'otvcp-i10n'),
   "base" => "productf",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Talos Elements',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Number Show', 'otvcp-i10n'),
         "param_name" => "number",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Use Filter', 'otvcp-i10n'),
         "param_name" => "filter",
      ),       
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Text Show All', 'otvcp-i10n'),
         "param_name" => "all",
         "dependency"  => array( 'element' => 'filter', 'value' => "true" ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Columns', 'otvcp-i10n'),
        "param_name" => "col",
        "value" => array(   
                     esc_html__('2', 'otvcp-i10n')   => '2', 
                     esc_html__('3', 'otvcp-i10n')   => '3',
                     esc_html__('4', 'otvcp-i10n')   => '4',  
                    ), 
      ), 
   )));
}

?>