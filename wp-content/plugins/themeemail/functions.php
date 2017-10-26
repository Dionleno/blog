<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//CRIAR NOVOS POST
add_action( 'init', 'create_post_type_temaemail' );
function create_post_type_temaemail() {
    register_post_type( 'temaemail',
        array(
            'labels' => array(
                'name' => __( 'Tema email' ),
                'singular_name' => __( 'Tema email' ),
                'add_new' => _x('Adicionar Novo', 'Produtos'),
                'add_new_item' => __('Adicionar Novo Produtos'),
                'edit_item' => __('Editar'),
                'new_item' => __('Novo'),
                'all_items' => __('Todos'),
                'view_item' => __('Ver'),
                'search_items' => __('Buscar'),
                'not_found' =>  __('Nada Encontrado'),
                'not_found_in_trash' => __('No Produtos found in Trash'),
                'parent_item_colon' => '',
                'menu_name' => 'Tema email'
            ),          
        'public'             => true,
        'publicly_queryable' => true,
        'menu_position'     => 5,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'temaemail' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
            'supports' => array('title','tag')
 
        )
    );
    
}
function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );

/*ADICIONAR CAMPOS PERSONALIZADOS EM POSTS TYPE*/
add_action("admin_init", "admin_initss");
function admin_initss(){  
   add_meta_box("upload_meta_email", "Editar template email", "upload_meta_email", "temaemail", "normal", "low"); 
}


function upload_meta_email(){
   
global $post;
 
// See if there's a media id already saved as post meta
$img_temaemail = get_post_meta( $post->ID, '_img_temaemail', true );


?>
<style>
    .box-galeria{display: inline-block;width: 33%;height: 200px;position: relative;border: 0px solid;overflow:hidden;}
    .delete-custom-img{display: none;position: absolute;bottom: 0;top:0;width: 100%;background: #383838;color: #FFF;text-align: center;text-decoration: none;padding-top: 30%; font-weight: bold;}
    .upload-custom-img{width: 100%;height: 30px;text-align: center;background: #383838;color: #FFF;padding: 10px 15px;margin-bottom: 30px;text-decoration: none;}
</style>
<!-- Your image container, which can be manipulated with js -->
<div class="custom-img-container">
    <div class="text-center" >
        <div style="width:468px;margin: 0 auto;">
            
            <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[0]["image"] : plugins_url('themeemail/assets/image/banner1.jpg'); ?>" class="bannerimage img-responsive"/>
            <input type="text" name="emailt[0][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[0]["url"] : '';?>"/>
            <input type="hidden" name="emailt[0][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[0]["image"] : plugins_url('themeemail/assets/image/banner1.jpg'); ?>"/>
        </div>
        
    </div><br/><hr>
    
    <div class="text-center" >
        <div style="width:600px;margin: 0 auto;">
            <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[1]["image"] : plugins_url('themeemail/assets/image/banner2.jpg'); ?>" class="bannerimage img-responsive"/>
            <input type="text" name="emailt[1][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[1]["url"] : '';?>"/>
            <input type="hidden" name="emailt[1][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[1]["image"] : plugins_url('themeemail/assets/image/banner2.jpg'); ?>"/>
        </div>
        
    </div><br/><hr>
    
     <div class="text-center" >
        <div style="width:600px;margin: 0 auto;">
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[2]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                 <input type="text" name="emailt[2][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[2]["url"] : '';?>"/>
                 <input type="hidden" name="emailt[2][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[2]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[3]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                <input type="text" name="emailt[3][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[3]["url"] : '';?>"/>
                <input type="hidden" name="emailt[3][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[3]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[4]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                <input type="text" name="emailt[4][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[4]["url"] : '';?>"/>
                 <input type="hidden" name="emailt[4][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[4]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </div><br/><hr>
    
    <div class="text-center" >
        <div style="width:600px;margin: 0 auto;">
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[5]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                 <input type="text" name="emailt[5][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[5]["url"] : '';?>"/>
                 <input type="hidden" name="emailt[5][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[5]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[6]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                 <input type="text" name="emailt[6][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[6]["url"] : '';?>"/>
                 <input type="hidden" name="emailt[6][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[6]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="col-sm-4">
                <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[7]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>" class="bannerimage img-responsive"/>
                 <input type="text" name="emailt[7][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[7]["url"] : '';?>"/>
                 <input type="hidden" name="emailt[7][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[7]["image"] : plugins_url('themeemail/assets/image/banner-single.jpg'); ?>"/>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </div><br/><hr>
    
      <div class="text-center" >
        <div style="width:468px;margin: 0 auto;">
            <img src="<?php echo !empty($img_temaemail) ? $img_temaemail[8]["image"] : plugins_url('themeemail/assets/image/banner1.jpg'); ?>" class="bannerimage img-responsive"/>
            <input type="text" name="emailt[8][url]" placeholder="URL da materia" class="form-control" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[8]["url"] : '';?>"/>
            <input type="hidden" name="emailt[8][image]" class="form-control urlimagem" style="margin-top: 10px;" value="<?php echo !empty($img_temaemail) ? $img_temaemail[8]["image"] : plugins_url('themeemail/assets/image/banner1.jpg'); ?>"/>
        </div>
        
    </div><br/><hr>
</div>
 

<!-- A hidden input to set and post the chosen image id -->

<?php }



//Saving the file
function save_temaemail_meta($post_id, $post) {
   
    // Is the user allowed to edit the post?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    
    if(!$_POST) return;
    // We need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $images_galeria['_img_temaemail'] = $_POST['emailt'];
    // Add values of $podcasts_meta as custom fields

   
        
      
        if (get_post_meta($post->ID, '_img_temaemail', FALSE)) { // If the custom field already has a value it will update
            update_post_meta($post->ID, '_img_temaemail', $_POST['emailt']);
        } else { // If the custom field doesn't have a value it will add
            add_post_meta($post->ID, '_img_temaemail', $_POST['emailt']);
        }
        if (!$_POST['emailt']) delete_post_meta($post->ID, '_img_temaemail'); // Delete if blank value
    
}
add_action('save_post', 'save_temaemail_meta', 1, 2); // save the custom fields