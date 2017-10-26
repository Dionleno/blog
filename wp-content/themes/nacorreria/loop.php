<?php
   if(get_the_post_thumbnail_url(get_the_ID())){
                  
                 $images = get_the_post_thumbnail_url();
             }else{
                 
                 $images = get_bloginfo('template_url')."/assets/images/thumb.jpg";
             }
             $categories = get_the_category();
?>
<div class="box-materias" >
    <a class="col-xs-12 col-sm-4 col-md-5 col-lg-5 padding-no imagebox" href="<?php the_permalink(); ?>">
                    <img class="cover-image" src="<?php echo $images;?>" alt="Image">
                </a>
                <div class="col-xs-12 col-sm-8 col-md-7 col-lg-7 box-text-materia">
                    <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div style="margin: 15px 0;">
                        <span><?php the_date('d/m/Y'); ?></span>
                        <span class="materia-categoria cat-sm" style="margin-left: 5px;"><?= $categories[0]->cat_name; ?></span>
                    </div> 
                     <?php
                               $excerpt= strip_tags(get_the_excerpt());

                              echo substr($excerpt, 0, 220).'[...]';
                              
                               ?>
                    
                </div>
                <a href="<?php the_permalink(); ?>" style="position: absolute;bottom: -16px;right: 15px;z-index: 99999996;"><img src="<?php echo bloginfo('template_url');?>/assets/images/leia_mais.png" /></a>
            </div>