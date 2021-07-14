<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}


function first_class_features() {	
 add_theme_support('title_tag');
 add_image_size('pageBanner', 2500, 500, true);
}
add_action ('after_theme_setup', 'first_class_features');




//For Custom Logo and Title//
function first_class_theme_setup() {

    // Add <title> tag support
    add_theme_support( 'title-tag' );  

    // Add custom-logo support
    add_theme_support( 'custom-logo' );



}
add_action( 'after_setup_theme', 'first_class_theme_setup');


function firstclass_custom_header_setup() {
    $defaults = array(
        // Default Header Image to display
        'default-image'         => get_template_directory_uri() . '/img/main.jpg',
        // Display the header text along with the image
        'header-text'           => false,
        // Header text color default
        'default-text-color'        => '000',
        // Header image width (in pixels)
        'width'             => 1000,
        // Header image height (in pixels)
        'height'            => 198,
        // Header image random rotation default
        'random-default'        => false,
        // Enable upload of image file in admin 
        'uploads'       => true,
        // function to be called in theme head section
        'wp-head-callback'      => 'wphead_cb',
        //  function to be called in preview page head section
        'admin-head-callback'       => 'adminhead_cb',
        // function to produce preview markup in the admin screen
        'admin-preview-callback'    => 'adminpreview_cb',
        );
}
add_action( 'after_setup_theme', 'firstclass_custom_header_setup' );
add_theme_support( 'custom-header' );


//Navigation Menu//
function register_childtheme_menus() {
    register_nav_menu('primary', __( 'Header Menu', 'child-theme-textdomain' ));
    
  }
  
  add_action( 'init', 'register_childtheme_menus' );
  

  //Footer Menus + Social Icons + Search Bars//

  function register_additional_childtheme_sidebars() {
    register_sidebar( array(
        'id'            => 'sidebar-2',
        'name'          => __( 'Footer Menu Left', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'id'            => 'sidebar-3',
        'name'          => __( 'Footer Menu Middle', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );

    
    register_sidebar( array(
        'id'            => 'sidebar-4',
        'name'          => __( 'Footer Menu Right', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'id'            => 'footer-social',
        'name'          => __( 'Footer Social Icons', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'id'            => 'search-box',
        'name'          => __( 'Search Bar', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar( array(
        'id'            => 'search-box-footer',
        'name'          => __( 'Search Bar Footer', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar( array(
        'id'            => 'footer-copyright',
        'name'          => __( 'Footer Copyright Text', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'id'            => 'navbar-logo',
        'name'          => __( 'Navbar Logo', 'child-theme-textdomain' ),
        'description'   => __( 'Appears on the static front page template', 'child-theme-textdomain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title-footer">',
        'after_title'   => '</h3>',
    ) );


}
  
add_action( 'init', 'register_additional_childtheme_sidebars' );



//Custom Header and Theme Background Colors//

function wp_customizer_add_colorPicker( $wp_customize){
     
    // Add New Section: Colors//
  
    $wp_customize->add_section( 'wp_color_section', array(
                     'title' => 'Header, Footer, & Font Color',
                     'description' => 'Set Colors For Background & Links',
                     'priority' => '40'                  
    ));
 
    // Add Settings   
 
    $wp_customize->add_setting( 'header_bgcolor', array(
        'default' => '#ffffff',                        
    ));

    $wp_customize->add_setting( 'font_color', array(
        'default' => '#8e8e8e',                        
    ));
 
    $wp_customize->add_setting( 'footer_background_color', array(
        'default' => '#232323',                        
    ));

    $wp_customize->add_setting( 'link_color', array(
        'default' => '#6c757d',                        
    ));
 
    $wp_customize->add_setting( 'footer_title_color', array(
        'default' => '#fff',                        
    ));

    $wp_customize->add_setting( 'button_color', array(
        'default' => '#000',                        
    ));

    $wp_customize->add_setting( 'button_text_color', array(
        'default' => '#fff',                        
    ));
 
    $wp_customize->add_setting( 'social_media_color', array(
        'default' => '#fff',                        
    ));
 
 
    // Add Controls// 
 
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor', array(
        'label' => 'Header Background',
        'section' => 'wp_color_section',
        'settings' => 'header_bgcolor'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
        'label' => 'Header Font Color',
        'section' => 'wp_color_section',
        'settings' => 'font_color'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label' => 'Footer Background Color',
        'section' => 'wp_color_section',
        'settings' => 'footer_background_color'
    )));
 

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label' => 'Footer Link Color',
        'section' => 'wp_color_section',
        'settings' => 'link_color'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color', array(
        'label' => 'Footer Title Color',
        'section' => 'wp_color_section',
        'settings' => 'footer_title_color'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', array(
        'label' => 'Button Color',
        'section' => 'wp_color_section',
        'settings' => 'button_color'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_color', array(
        'label' => 'Button Text Color',
        'section' => 'wp_color_section',
        'settings' => 'button_text_color'
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_color', array(
        'label' => 'Social Icon Color',
        'section' => 'wp_color_section',
        'settings' => 'social_media_color'
    )));
}
 
add_action( 'customize_register', 'wp_customizer_add_colorPicker' );



//CSS targeting for Custom Color Controls//

function wp_generate_theme_option_css(){
 
    $themeColor = get_theme_mod('wp_theme_color');
    $header_bgcolor = get_theme_mod('header_bgcolor');
    $font_color = get_theme_mod('font_color');
    $footer_background_color = get_theme_mod('footer_background_color');
    $link_color = get_theme_mod('link_color');
    $footer_title_color = get_theme_mod('footer_title_color');
    $button_color = get_theme_mod('button_color');
    $button_text_color = get_theme_mod('button_text_color');
    $social_media_color = get_theme_mod('social_media_color');

    if(!empty($themeColor)):
     
    ?>
    <style type="text/css" id="wp-theme-option-css">
         
        .navigation {
            background:<?php echo $header_bgcolor; ?>;
        }
 
        a:hover{
            color: <?php echo $themeColor; ?>
        }        
 
        .search-form .search-submit{
            background: <?php echo $themeColor; ?>
        }
        .navbar-light .navbar-nav .nav-link {
            color: <?php echo $font_color; ?>;
        }
     
        .footer-main{
            background: <?php echo $footer_background_color; ?>;
        }
       
        a{
            color: <?php echo $link_color; ?>;
        }

        .widget-title-footer{
            color: <?php echo $footer_title_color; ?>;
            
        }

        .btn{
           background-color: <?php echo $button_color; ?>
        }

        .btn{         
            color: <? echo $button_text_color; ?>
        }

        i{
            color: <?php echo $social_media_color; ?>
        }
     
    </style>    
 
    <?php
 
    endif;    
}
 
add_action( 'wp_head', 'wp_generate_theme_option_css' );




add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {

    $exclude_filters[] = 'themes/understrap-child-main/node_modules';
  
    return $exclude_filters;
  
  });


