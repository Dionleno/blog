<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>
<section class="main">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
             
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="">
                    <?php get_sidebar(); ?>
        </div>
        
        <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
                
    </div>    
    </section> 

<?php

wp_footer();
