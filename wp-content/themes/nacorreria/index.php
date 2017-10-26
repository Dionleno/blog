<?php
get_header();?>

 
    <?php
do_shortcode('[cb_template page="banner"]');

   $args = array(
	'post_type' => 'post',	
	'order'   => 'DESC',
);
 
 $query = new WP_Query($args);
?>
<style>
  
</style>
<section class="main">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
             
             <?php if($query->have_posts()):  ?>
            <?php while ($query->have_posts()) : $query->the_post(); 
                       
             get_template_part('loop');
             
             endwhile; ?>
            <?php endif; ?>
            <div class="text-right"><br>
                <a href="<?= get_category_link(4); ?>" class="btn btn-default btn-lg">Mais postagens</a>
            </div>
            
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
get_footer();
?>