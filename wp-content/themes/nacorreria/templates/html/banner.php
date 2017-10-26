 <?php
     
 
 $query = new WP_Query($args);
 
 ?>

<!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if($query->have_posts()):  ?>
            <?php while ($query->have_posts()) : $query->the_post(); 
            $categories = get_the_category();
             if(get_the_post_thumbnail_url()){
                 $images = "background: url(".get_the_post_thumbnail_url().");";
             }else{
                 $images = "background: #333;";
             }
            ?>
            <div class="swiper-slide" style="<?php echo $images; ?>">
                <div class="banner-slider-fundo">
                <div class="banner-slider">
                    <span><?php the_date('d/m/Y'); ?></span>
                    <h1><a href="<?php the_permalink(); ?>" style="color: #FFF;text-decoration: none;"><?php the_title();?></a></h1><br>
                    <span class="materia-categoria"><?= $categories[0]->cat_name; ?></span>
                </div>    
                </div>
                
                
            </div>
            <?php endwhile; ?>
            <?php endif; ?>            
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>