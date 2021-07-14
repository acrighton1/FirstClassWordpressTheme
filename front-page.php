<?php get_header(); ?>

<div class="tm-bg-white-transparent tm-welcome-container">
        <div class="container-fluid">
          <div class="row h-100">
            <!-- Welcome Text -->
            <!-- White transparent bg -->            
            <div class="col-md-7 tm-welcome-left-col">
              <div class="tm-welcome-left">                
                <p class="pb-5">                
                  <?php the_content(); ?></p>
              </div>
            </div>
          
            <!-- Brown bg -->
            <div class="col-md-4 pt-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 mt-4 bg-white rounded">
        
        <div id="right-sidebar" class="sidebar">
    <?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>
        </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
 

      
    
    <!-- End Welcome section -->



























<?php get_footer(); ?>