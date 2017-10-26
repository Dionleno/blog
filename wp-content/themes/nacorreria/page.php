 <?php 
 
 get_header();
 if($query->have_posts()):  ?>
            <?php  $query->the_post(); 
                       
     the_content();
             
            ?>
            <?php endif; 
            
            
 get_footer();
 
 ?>