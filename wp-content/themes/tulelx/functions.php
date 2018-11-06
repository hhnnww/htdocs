<?php

if ( ! function_exists( 'tulelx_setup ') ):
    function tulelx_setup(){
        add_theme_support('title-tag');
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );
    }
endif;
add_action('after_setup_theme','tulelx_setup');

function tulelx_scripts(){
    wp_enqueue_style('tulelx-style',get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','tulelx_scripts');


function fanly_remove_images_attribute( $html ) {
	$html = preg_replace( '/(width|height|class|alt)=".*"\s/', "", $html );
	$html = preg_replace( '/  /', "", $html );
	return $html;
}
add_filter( 'post_thumbnail_html', 'fanly_remove_images_attribute', 10 );
add_filter( 'image_send_to_editor', 'fanly_remove_images_attribute', 10 );

//wordpress上传文件重命名
function git_upload_filter($file) {
    $time = str_shuffle(date("YmdHis"));
    $file['name'] = $time.".".pathinfo($file['name'], PATHINFO_EXTENSION);
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'git_upload_filter');

?>