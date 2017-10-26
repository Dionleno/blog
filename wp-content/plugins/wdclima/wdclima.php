<?php

/*

Plugin Name: Wd Clima

Plugin URI: http://www.webdevelopers.com.br/

Description: Clima tempo

Author: Dionleno Vidaletti

Version: 1.1

Author URI: http://www.webdevelopers.com.br/

*/
class WdClima{
    
     function __construct() {                    
         add_action('wp_head', array($this ,'actions_scripts') );
     }
     
      function actions_scripts(){
            ?>
                  <script type="text/javascript">
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';                            
               </script>
                <?php
                wp_enqueue_style( 'bootsd_css2', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css'  );
                wp_enqueue_style( 'style_css2', plugin_dir_url( __FILE__ ) . 'assets/css/style.css'  );
             
            
            wp_enqueue_script( 'angulardata', plugin_dir_url( __FILE__ ) . 'assets/js/lib/angular.min.js' );
            
            wp_enqueue_script( 'angularapp', plugin_dir_url( __FILE__ ) . 'assets/js/clima.js', array( 'jquery') );
            wp_enqueue_script( 'servicesjs', plugin_dir_url( __FILE__ ) . 'assets/js/services/sistema.servicess.js', array( 'jquery') );
            wp_enqueue_script( 'climactrl', plugin_dir_url( __FILE__ ) . 'assets/js/controllers/climactrl.js', array( 'jquery') );
           
      }     
     
}new WdClima();
include_once 'functions.php';
