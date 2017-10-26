
<div class="sidebar">
    <div class="header-title">
        <h3 class="title-undercode">Busca</h3>
    </div>
   <?php get_search_form(); ?>
    <br>        
     <div class="header-title">
        <h3 class="title-undercode">Categorias</h3>
    </div>
    <div input-group col-md-12>
        
        <ul class="list-categoria">
        <?php
        $args = array(
        'orderby' => 'id',
        'hide_empty'=> 1     
    );
    $categories = get_categories($args);    
    
    foreach ($categories as $cat) {                     
        echo '<li><a href="'.  get_category_link($cat->term_id).'" class="btn btn-white btn-block">'.$cat->name.'</a></li>';       
    }
        ?>                      
        </ul>        
        <br>
    </div>
    
    <div class="header-title">
        <h3 class="title-undercode">Canal do <img src="<?php echo bloginfo('template_url');?>/assets/images/youtube.png" style="width: 50px;margin-top: -5px;"></h3>      
    </div>
      <?php //https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCf0yAEJ6zgkF06wy2EENsqw&maxResults=1&order=date&type=video&key=AIzaSyDUDDJkMpqYZcOQioJ9Ag3vdN1HJ66RKgM
            //apply_filters('videos_youtube',1);     
      
         ?>
    <a href="https://www.youtube.com/channel/UCf0yAEJ6zgkF06wy2EENsqw" target="_blank">
        <img src="<?php echo bloginfo('template_url');?>/assets/images/canal.jpg" class="img-responsive">
    </a>
    
    <br>
    <div class="header-title">
        <h3 class="title-undercode">Newsletter</h3>
    </div>
    <p>Fique por dentro de todas
as novidades da plataforma.</p>
    <div class="input-group col-md-12">
        <input type="text" class="  search-query form-control" placeholder="E-mail..." />
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </span>
    </div>
    <br>   
    <div class="header-title">
        <h3 class="title-undercode">Tags</h3>
    </div>
    <p>Facilite a sua pesquisa filtrando
o conteúdo por assunto.</p>
    <?php 
    $tags = get_tags(array(
         'hide_empty' => false,
          'number' => 8
     ));
     
    echo '<ul class="list-inline">';
foreach ($tags as $tag) {
  echo '<li style="margin:5px 0;"><a href="'.get_tag_link($tag->term_id).'" class="btn btn-white">' . $tag->name . '</a></li>';
}
echo '</ul>';

    ?>
    <br>  
    
    <div class="header-title">
        <h3 class="title-undercode">Calendário</h3>
    </div>
   <div style="padding-top:0px;background-color:#f0f0f0;text-align:center;">
 <iframe style="width: 260px; height: 600px; background: transparent none repeat scroll 0% 0%; margin-top: -9px;padding-top:10px;" scrolling="no" src="https://www.ticketagora.com.br/css_frame_eventos/iframeTA2.aspx?origem=ticketagora&amp;campanha=destaque no blog ticketagora" frameborder="0"></iframe>
<a href="http://ticketagora.com.br/calendario.aspx" style="display:block;background-color:#000;color:#fff;padding:5px;"><b>Veja o nosso calendário completo</b></a>
</div>
</div>