<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>





<footer class="footer-main">

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-4 footer-column">
        <ul class="nav flex-column">
          <li class="nav-item">            
            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <div id="sidebar-2" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
<?php endif; ?> 
            </ul>       
      </div>
      <div class="col-md-4 footer-column">
        <ul class="nav flex-column">
          <li class="nav-item">
          <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
    <div id="sidebar-3" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
<?php endif; ?>
      </div>
      <div class="col-md-4 footer-column">
        <ul class="nav flex-column">
          <li class="nav-item">
          <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
    <div id="sidebar-4" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
    <?php endif; ?>
        </ul>
      </div>
    </div>

    <div class="text-center mb-5"></i></i></i></div>
    
    <div class="row text-center">
      <div class="col-md-4 box">
      <?php if ( is_active_sidebar( 'footer-copyright' ) ) : ?>     
        <?php dynamic_sidebar( 'footer-copyright' ); ?>
        <?php endif; ?>
      </div>

      
      <div class="col-md-4 box">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
          <div class="social-icons">
          <?php if ( is_active_sidebar( 'footer-social' ) ) : ?>             
    <?php dynamic_sidebar( 'footer-social' ); ?>
<?php endif; ?>
          </div>
          </li>
        </ul>
      </div>
      <div class="col-md-4 box">
        <ul class="list-inline quick-links">          
<?php if ( is_active_sidebar( 'search-box-footer' ) ) : ?>             
    <?php dynamic_sidebar( 'search-box-footer' ); ?>
<?php endif; ?>
</ul>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
  </div>  
        </footer>   







        </footer>   


<?php wp_footer(); ?>

</body>

</html>

