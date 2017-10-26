<?php

/*

Plugin Name: Wd themeemail

Plugin URI: http://www.webdevelopers.com.br/

Description: Theme Email

Author: Dionleno Vidaletti

Version: 1.1

Author URI: http://www.webdevelopers.com.br/

*/
class Themeemail{
    
     function __construct() {                    
         add_action('admin_enqueue_scripts', array($this ,'themeemailactions_scripts') );
     }
     
      function themeemailactions_scripts(){
            ?>
                  <script type="text/javascript">
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';                            
               </script>
                <?php
                
                global $pagenow, $typenow,$post_type;
               if ('temaemail' ==$post_type) {
                     wp_enqueue_media();
                        wp_enqueue_style( 'themeemailbootsd_css2', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css'  );
                        wp_enqueue_style( 'themeemailstyle_css2', plugin_dir_url( __FILE__ ) . 'assets/css/style.css'  );


                        wp_enqueue_script( 'themeemailservicesjs', plugin_dir_url( __FILE__ ) . 'assets/js/themeemail.js',array('jquery') );
                }
               
                /*
            
            wp_enqueue_script( 'themeemailangulardata', plugin_dir_url( __FILE__ ) . 'assets/js/lib/angular.min.js?v=1' );
            wp_enqueue_script( 'themeemailangular.ng-modules', plugin_dir_url( __FILE__ ) . 'assets/js/lib/angular.ng-modules.js' );
            
            
            wp_enqueue_script( 'themeemailangularappbW', plugin_dir_url( __FILE__ ) . 'assets/js/app.js');
            wp_enqueue_script( 'themeemailservicesjs', plugin_dir_url( __FILE__ ) . 'assets/js/services/sistema.servicess.js');
            wp_enqueue_script( 'climactrl', plugin_dir_url( __FILE__ ) . 'assets/js/controllers/themeemail.js' );*/
           
      }     
     
}new Themeemail();
include_once 'functions.php';

