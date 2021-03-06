<?php
get_header();

?>
<section class="main">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
             <div class="header-title">
                <h3 class="title-undercode"><?php single_cat_title('Home / Tag / '); ?></h3>
            </div>
        <?php if(have_posts()):  ?>
            <?php while (have_posts()) : the_post(); 
                       
             get_template_part('loop');
             
             endwhile; ?>
            <div style="margin: 60px auto 20px;text-align: center;">
                <?php wordpress_pagination(); ?>
            </div>
            
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="">
                    <?php get_sidebar(); ?>
        </div>
    </div>    
    </section>

<?php
get_footer();
?>