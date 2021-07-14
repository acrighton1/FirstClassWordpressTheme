<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<?php if( is_page('contact') ){ ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/verif.js"></script>
<?php }?>
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">




	<!-- ******************* The Navbar Area ******************* -->
  <nav  class="navigation"> 
    <div class="navbar navbar-expand-lg navbar-light" role="navigation" id="navbar"> 
  <div class="container">	  
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
	<span class="fa fa-bars"></span> Menu
    </button>
    <a class="navbar-brand" href="#"><?php dynamic_sidebar( 'navbar-logo' ); ?></a>
    <?php
  wp_nav_menu(
    array(
      'name'              => 'Header Menu',
      'id'                => 'header-menu',
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'navbar-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => '',
      'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
    )
  );
?>

<?php if ( is_active_sidebar( 'search-box' ) ) : ?>             
    <?php dynamic_sidebar( 'search-box' ); ?>
<?php endif; ?>
    </div>
		</nav>

		   
    <header>
    
    <div class="banner">
    <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">   
    <h1 href="<?php echo site_url()?>"><?php echo get_custom_logo(); ?></h1>
      <div>     
  </div>  
</div>
</div> 
</header>



  

	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

	<h2 id="main-nav-label" class="sr-only">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


  <style>
  .banner {
  background: url("<?php echo esc_url( get_header_image('custom-header') ); ?>") 
  no-repeat bottom center;
  width: 100%;
  background-size:cover;
  }
</style>

		

				

			

			

			
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
