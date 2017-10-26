<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*ADICIONAR CAMPOS PERSONALIZADOS EM POSTS TYPE*/
add_action("admin_init", "admin_init");
function admin_init(){  
   add_meta_box("upload_meta_galeria", "Upload de imagens galeria", "upload_meta_galeria", "post", "normal", "low"); 
}

function upload_meta_galeria(){
   
global $post;

// Get WordPress' media upload URL
$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

// See if there's a media id already saved as post meta
$your_img_id = get_post_meta( $post->ID, '_img_galeria', true );


?>
<style>
    .box-galeria{display: inline-block;width: 33%;height: 200px;position: relative;border: 0px solid;overflow:hidden;}
    .delete-custom-img{display: none;position: absolute;bottom: 0;top:0;width: 100%;background: #383838;color: #FFF;text-align: center;text-decoration: none;padding-top: 30%; font-weight: bold;}
    .upload-custom-img{width: 100%;height: 30px;text-align: center;background: #383838;color: #FFF;padding: 10px 15px;margin-bottom: 30px;text-decoration: none;}
</style>
<!-- Your image container, which can be manipulated with js -->
<div class="custom-img-container">
    
    <?php if (count($your_img_id) > 0 ) : 
     foreach ($your_img_id as $key => $value) {
           // Get the image src
            $your_img_src = wp_get_attachment_image_src( $value, 'full' );

            // For convenience, see if the array is valid
            $you_have_img = is_array( $your_img_src );
            ?>
                <div class='box-galeria'>
                    <img src="<?php echo $your_img_src[0] ?>" alt="" style="max-width:100%;padding: 10px;position:relative;" />   
                    <input class="custom-img-id" name="galeria-img-id[]" type="hidden" value="<?php echo $value; ?>" />
                    <a class="delete-custom-img" href="javascript:void(0)">X Excluir</a>
               </div>  
         <?php
     } 
     endif; ?>
    <div style="width:100%;text-align: center;margin-bottom: 30px;">
        <hr><br>
        <a class="upload-custom-img" href="javascript:void(0)">Adicionar fotos</a>
    </div>
    
</div>
 

<!-- A hidden input to set and post the chosen image id -->

<?php }


//Saving the file
function save_podcasts_meta($post_id, $post) {
   
    // Is the user allowed to edit the post?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    // We need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $images_galeria['_img_galeria'] = $_POST['galeria-img-id'];
    // Add values of $podcasts_meta as custom fields

   
        
      
        if (get_post_meta($post->ID, '_img_galeria', FALSE)) { // If the custom field already has a value it will update
            update_post_meta($post->ID, '_img_galeria', $_POST['galeria-img-id']);
        } else { // If the custom field doesn't have a value it will add
            add_post_meta($post->ID, '_img_galeria', $_POST['galeria-img-id']);
        }
        if (!$_POST['galeria-img-id']) delete_post_meta($post->ID, '_img_galeria'); // Delete if blank value
    
}
add_action('save_post', 'save_podcasts_meta', 1, 2); // save the custom fields




function add_admin_scripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'post' === $post->post_type ) {     
            wp_enqueue_script(  'mygaleria', get_stylesheet_directory_uri().'/galeria/galeria.js' );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

add_shortcode('wr_galeria', 'fn_get_galeria');
function fn_get_galeria($atts){
    
    
    $atts = shortcode_atts( array(
		'post_id' => ''		
	), $atts, 'fn_get_galeria' );
    
   
    
    if($atts['post_id'] != ''){
    global $post;
        

        // See if there's a media id already saved as post meta
        $your_img_id = get_post_meta( $atts['post_id'], '_img_galeria', true );
        
        if (count($your_img_id) > 0 ) : 
    
    ?>
<div class="clearfix"></div>
<div class="col-sm-12" id="galeriax">
    
  <noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
                <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
                                 <div style="text-align:right;padding: 0 15px;">
                                 <strong class="itens-count" >${itemsCurrent} / ${itemsCount}</strong>
                                 </div>
                                
				</div>
			</div>
		</script>
        <div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
                                                            
                                                            <ul style="padding: 0;">
                                                                <?php  foreach ($your_img_id as $key => $value) {
                                                                     // Get the image src
                                                                    $your_img_src = wp_get_attachment_image_src( $value, 'full' );
                                                                     $image_alt = get_post( $value );                                                                      
                                                                    // For convenience, see if the array is valid
                                                                    $you_have_img = is_array( $your_img_src );
                                                                    ?>
									<li><a href="#"><img src="<?php echo $your_img_src[0] ?>" data-large="<?php echo $your_img_src[0] ?>" alt="<?= $image_alt->post_title; ?>" data-description="<?= $image_alt->post_excerpt; ?>" /></a></li>
                                                                <?php  } ?>	                                                                        
								</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
        
        </div>
        <?php
        endif;
    }
}

 add_action( 'wp_head', 'inigaleria');
 function inigaleria(){
     
          //css galeria
    //  wp_enqueue_style('gl-demo', get_template_directory_uri() . '/galeria/css/demo.css');
      wp_enqueue_style('gl-style', get_template_directory_uri() . '/galeria/css/style.css');
      wp_enqueue_style('gl-elastislide', get_template_directory_uri() . '/galeria/css/elastislide.css');
        
    
    //js galeria
    wp_enqueue_script('gl-tmplJs', get_template_directory_uri() . '/galeria/js/jquery.tmpl.min.js',array('jquery'));    
    wp_enqueue_script('gl-easingJs', get_template_directory_uri() . '/galeria/js/jquery.easing.1.3.js',array('jquery'));    
    wp_enqueue_script('gl-elastislideJs', get_template_directory_uri() . '/galeria/js/jquery.elastislide.js',array('jquery'));    
    wp_enqueue_script('gl-galleryJs', get_template_directory_uri() . '/galeria/js/gallery.js',array('jquery'));    
     
 }