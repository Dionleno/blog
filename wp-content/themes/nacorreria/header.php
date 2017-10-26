<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IT=edge,chrome=IE8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/assets/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>
<body>
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <header>
        <div class="container">
        
<nav class="navbar navbar-default" role="navigation">    
    
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo bloginfo('template_url');?>/assets/images/logo.jpg" /></a>
        <a href="https://ticketagora.com.br/" style="text-align: right;" target="_blank" class="visible-sm visible-xs"><img src="<?php echo bloginfo('template_url');?>/assets/images/logo-ticket.jpg" class="" style="width: 60px;float: right;margin-right: 10px;margin-top: 10px;"/></a>
    </div>
    <div style="position: relative;margin-bottom: 10px;margin-right: 100px;color: #838484;" class="hidden-xs hidden-sm text-center">
            <strong>Dicas para você organizar um evento de sucesso!</strong>
        </div>
    
    
    <div id="navbar-ex1-collapse" class="collapse navbar-collapse">
                        <?php 
                         wp_nav_menu( array(
                                        'menu'              => 'header-menu',
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 2,
                                        'container'         => 'ul',
                                        'container_class'   => 'collapse navbar-collapse',                                       
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker())
                                    );
                         
                        ?>
                <ul class="nav navbar-nav navbar-right visible-md visible-lg">            
                    <li><a href="https://ticketagora.com.br/" target="_blank"><img src="<?php echo bloginfo('template_url');?>/assets/images/logo-ticket.jpg" style="margin-top: -40px;"/></a></li>            
        </ul>         
                    </div><!-- /.navbar-collapse -->
                    
                    
    
</nav>

    </div>
    </header>