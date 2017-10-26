<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
$categories = get_the_category();
the_post();
?>
<section class="main">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
             <div class="header-title">
                <h3 class="title-undercode">Home / Categoria / Recentes</h3>
            </div>

           <div class="box-materias-single" >               
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-text-materia">
                    <h1 class="media-heading"><?php the_title();?></h1>
                    <div style="margin: 15px 0;">
                        <span>por <?php the_author(); ?> em <strong style="color: #ff8f00;"><?= $categories[0]->cat_name; ?></strong> - <?php the_date('d/m/Y'); ?></span>                       
                    </div>     
                  
                    <?php the_content(); 
                    
                       do_shortcode('[wr_galeria post_id="'.  get_the_ID() .'"]');
                    ?>
                    <br>
                    <div class="st-theme-social-header">
                        <a rel="external nofollow" target="_blank" class="facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                        <a rel="external nofollow" target="_blank" class="twitter" href="http://twitter.com/intent/tweet/?url=<?= get_the_permalink(); ?>&text=<?= get_the_title(); ?>"><i class="fa fa-twitter"></i></a>
                    <a rel="external nofollow" target="_blank" class="google" href="https://plus.google.com/share?url=<?= get_the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                    <a rel="external nofollow" target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?= get_the_permalink(); ?>&media=<?= get_the_post_thumbnail_url(); ?>&description=<?= get_the_title(); ?>"><i class="fa fa-pinterest"></i></a>
                </div>
                </div>             
            </div>
            
            <div style="width: 100%;float: left;">
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
            </div>
            
            <div class="" style="width: 100%;float: left;">
             <div class="header-title">
                <h3 class="title-undercode">RELACIONADOS</h3>
            </div>

             <?php
             wp_reset_query();
             $args=array(
                    'posts_per_page' => 2, 
                    'post_type' => 'post',
                    'category' => $categories[0]->term_id,
                 'order'=>'rand'
                );
                $query = new WP_Query( $args );
           ?>
                   <?php if($query->have_posts()):  ?>
            <?php while ($query->have_posts()) : $query->the_post(); 
                       
             get_template_part('loop');
             
             endwhile; ?>
            <?php endif; ?>
                
                
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="">
                    <?php get_sidebar(); ?>
        </div>
    </div>    
    </section>
<?php
get_footer();