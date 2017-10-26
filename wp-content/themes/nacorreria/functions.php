<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include(TEMPLATEPATH . '/templates/wp-bootstrap-navwalker.php');
//include(TEMPLATEPATH . '/galeria/galeria-post.php');
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
if (function_exists('add_theme_support')) { // Adicionado no 2.9
    add_theme_support('post-thumbnails');
    add_image_size('single-thumbnail', 350, 250, true); // imagem para página de post
}

function register_my_menu() {
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');

function fn_template($atts) {
    $atts = shortcode_atts(array(
        'page' => '',
        'directory' => 'templates/html/',
        'categoria' => '*'
            ), $atts, 'fn_template');

    $args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'showposts' => 3
    );

    if ($atts['categoria'] != "*") {
        $args['cat'] = $atts['categoria'];
    }
    include( locate_template($atts['directory'] . $atts['page'] . '.php', false, false) );
}

add_shortcode('cb_template', 'fn_template');

function wordpress_pagination() {
    global $wp_query;

    $big = 999999999;

    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

add_filter('videos_youtube', 'fn_videos_youtube');

function fn_videos_youtube() {
    $id_canal = "UCf0yAEJ6zgkF06wy2EENsqw";
    $api_key = "AIzaSyDUDDJkMpqYZcOQioJ9Ag3vdN1HJ66RKgM";

    $content = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=".$id_canal."&maxResults=1&order=date&type=video&key=".$api_key);

    $result = json_decode($content);

    ?>
<a href="https://www.youtube.com/watch?v=<?= $result->items[0]->id->videoId; ?>" target="_blank">
    <img src="<?= $result->items[0]->snippet->thumbnails->medium->url; ?>" class="img-responsive" />
</a>

  <?php    
}
 
