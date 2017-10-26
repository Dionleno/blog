<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="">    
 
  <div class="input-group col-md-12">        
        <input type="text" value="<?php get_search_query(); ?>" name="s" class="search-query form-control" id="s" placeholder="<?php esc_html_e('Pesquisar ...', 'st-magazine'); ?>"/>
       <input type="hidden" name="post_type" value="post" />        
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </span>
    </div>

</form>
