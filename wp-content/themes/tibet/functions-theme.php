<?php 
/**
 * Functions
 */


/**
 * display errors
 */
if( is_super_admin() ){
    // error_reporting(E_ALL);ini_set("display_errors", 1);
}else{
    // exit;
}




function _wt($name=''){
    include 'widgets/widget-'.$name.'.php';
}

function getloop($name=''){
    include 'loop-'.$name.'.php';
}







add_filter('query_vars', 'add_query_vars');
function add_query_vars($aVars) {
    $aVars[] = "tianqi"; 
    $aVars[] = "location"; 
    return $aVars;
}

add_filter('rewrite_rules_array', 'add_rewrite_rules');
function add_rewrite_rules($aRules) {
    $aNewRules = array(
        'tianqi/([a-z]+)?$' => 'index.php?page_id=6385&location=$matches[1]'
    );
    $aRules = $aNewRules + $aRules;
    return $aRules;
}


/**
 * @param  forecast | lifestyle
 * @param  $tq_citys string
 * @return [type]
 */
function tq_requestByKey($type='', $city=''){
    //准备请求参数
    $key ="52c927f0756645b3bd11c4db5e74fff0";
    $location = $city;
    $curlPost = "key=".$key."&location=".urlencode($location);
    //初始化请求链接
    $req=curl_init();
    //设置请求链接
    curl_setopt($req, CURLOPT_URL,'https://free-api.heweather.com/s6/weather'.($type?'/'.$type:'').'?'.$curlPost);
    //设置超时时长(秒)
    curl_setopt($req, CURLOPT_TIMEOUT,3);
    //设置链接时长
    curl_setopt($req, CURLOPT_CONNECTTIMEOUT,10);
    //设置头信息
    $headers=array( "Accept: application/json", "Content-Type: application/json;charset=utf-8" );
    curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
    $data = curl_exec($req);
    curl_close($req);
    return $data;
}

/*function shortcode_tianqi( $attr, $content = '' ) {

    global $tq_citys;

    if( empty($content) || !in_array($content, $tq_citys) ){
        return $content.'，无效的城市';
    }

    extract(shortcode_atts(array(
        'days'      => '7'
    ), $attr));

    
}
add_shortcode( 'tianqi', 'shortcode_tianqi' );*/








function shortcode_che( $atts, $content = '' ) {
    return !empty($content) ? '<div class="route-item route-che"><strong>汽车：</strong>'.$content.'</div>' : '';
}
add_shortcode( 'che', 'shortcode_che' );

function shortcode_can( $atts, $content = '' ) {
    return !empty($content) ? '<div class="route-item route-can"><strong>三餐：</strong>'. str_replace("  ", ' &nbsp; &nbsp; ', $content) .'</div>' : '';
}
add_shortcode( 'can', 'shortcode_can' );

function shortcode_zhu( $atts, $content = '' ) {
    return !empty($content) ? '<div class="route-item route-zhu"><strong>住宿：</strong>'.$content.'</div>' : '';
}
add_shortcode( 'zhu', 'shortcode_zhu' );




/**
 * remove actions from wp_head
 */
remove_action( 'wp_head' , 'feed_links_extra', 3 ); 
remove_action( 'wp_head' , 'rsd_link' ); 
remove_action( 'wp_head' , 'wlwmanifest_link' ); 
remove_action( 'wp_head' , 'index_rel_link' ); 
remove_action( 'wp_head' , 'start_post_rel_link', 10, 0 ); 
remove_action( 'wp_head' , 'wp_generator' ); 
remove_action( 'wp_head' , 'wp_shortlink_wp_head', 10, 0);
remove_action( 'wp_head' , 'rel_canonical' );
remove_action( 'wp_head' , 'wp_resource_hints', 2 );



/**
 * WordPress Emoji Delete
 */
remove_action( 'admin_print_scripts' ,  'print_emoji_detection_script');
remove_action( 'admin_print_styles'  ,  'print_emoji_styles');
remove_action( 'wp_head'             ,  'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles'     ,  'print_emoji_styles');
remove_filter( 'the_content_feed'    ,  'wp_staticize_emoji');
remove_filter( 'comment_text_rss'    ,  'wp_staticize_emoji');
remove_filter( 'wp_mail'             ,  'wp_staticize_emoji_for_email');



/**
 * wp-json delete
 */
add_filter('rest_enabled', '_return_false');
add_filter('rest_jsonp_enabled', '_return_false');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );



// add link manager
add_filter( 'pre_option_link_manager_enabled', '__return_true' );



/*
add_action( 'after_setup_theme', 'remove_featured_images_from_child_theme', 11 ); 
 
function remove_featured_images_from_child_theme() {
    remove_theme_support( 'post-thumbnails' );
    // add_theme_support( 'post-thumbnails', array( 'post' ) );
}*/



/**
 * add theme thumbnail
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'thumb_md', 600, 400, true );
    add_image_size( 'thumb', 300, 200, true );
    add_image_size( 'thumb_xs', 150, 100, true );
}



/**
 * post formats
 */
add_theme_support( 'post-formats', array( 'status' ) );  

add_filter( 'esc_html', 'rename_post_formats' );
function rename_post_formats( $safe_text ) {
    if ( $safe_text == '状态' )
        return '旅行线路';
    return $safe_text;
}










/**
 * the theme
 */

$current_theme = wp_get_theme();


function _the_theme_name(){
    global $current_theme;
    return $current_theme->get( 'Name' );
}


function _the_theme_version(){
    global $current_theme;
    return $current_theme->get( 'Version' );
}


function _the_theme_thumb(){
    return _hui('post_default_thumb') ? _hui('post_default_thumb') : get_stylesheet_directory_uri() . '/img/thumb.png';
}


function _the_theme_avatar(){
    return get_stylesheet_directory_uri() . '/img/avatar.png';
}


function _get_description_max_length(){
    return 200;
}


function _get_delimiter(){
    return '-';
}


function _get_price_pre(){
    return '&yen;';
}





/**
 * get theme option         
 */
function _hui( $name, $default = false ) {

    $option_name = _the_theme_name();

    $options = get_option( $option_name );

    if ( isset( $options[$name] ) ) {
        return $options[$name];
    }

    return $default;
}





/**
 * register menus
 */
if (function_exists('register_nav_menus')){
    register_nav_menus( array(
        'nav' => __('导航')
        // ,'pagenav' => __('页面菜单')
    ));
}


/**
 * register sidebar
 */
if (function_exists('register_sidebar')){
    $sidebars = array();

    $sidebars['home']            = '首页侧边栏';
    $sidebars['cat']             = '文章分类侧边栏';
    $sidebars['single']          = '文章页侧边栏';
    $sidebars['tourline']    = '旅行线路侧边栏';
    $sidebars['tourline-single'] = '旅行线路详情侧边栏';
    $sidebars['page-tianqi']            = '天气页面侧边栏';

    foreach ($sidebars as $key => $value) {
        register_sidebar(array(
            'name'          => $value,
            'id'            => $key,
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<header><h3>',
            'after_title'   => '</h3></header>'
        ));
    };
}







/**
 * Widgets
 */
require_once (get_stylesheet_directory() . '/functions-widgets.php');




require_once (get_stylesheet_directory() . '/inc/triporders.php');
require_once (get_stylesheet_directory() . '/Parsedown.php');



/**
 * Functions for admin
 */
if( is_admin() ){
    require_once (get_stylesheet_directory() . '/functions-admin.php');
}



/**
 * target blank
 */
function _target_blank(){
    return _hui('target_blank') ? ' target="_blank"' : '';
}





function _get_linkmore($option=''){
    $res = '';
    $data = _hui($option);
    
    if( !$data ) return false;

    $data = explode("\n", $data);
    foreach ($data as $item) {
        $item = explode('|', $item);
        $res .= '<a'. ((isset($item[2])&&trim($item[2])=='on')?' class="on"':'') .' href="'. trim($item[1]) .'">'. trim($item[0]) .'</a>';
    }
    return $res;
}





/**
 * Disable embeds
 */
if ( !function_exists( 'disable_embeds_init' ) ) :
    function disable_embeds_init(){
        global $wp;
        $wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
        remove_action('rest_api_init', 'wp_oembed_register_route');
        add_filter('embed_oembed_discover', '__return_false');
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'wp_oembed_add_host_js');
        add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
        add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
    }
    add_action('init', 'disable_embeds_init', 9999);

    function disable_embeds_tiny_mce_plugin($plugins){
        return array_diff($plugins, array('wpembed'));
    }
    function disable_embeds_rewrites($rules){
        foreach ($rules as $rule => $rewrite) {
            if (false !== strpos($rewrite, 'embed=true')) {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }
    function disable_embeds_remove_rewrite_rules(){
        add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
        flush_rewrite_rules();
    }
    register_activation_hook(__FILE__, 'disable_embeds_remove_rewrite_rules');

    function disable_embeds_flush_rewrite_rules(){
        remove_filter('rewrite_rules_array', 'disable_embeds_rewrites');
        flush_rewrite_rules();
    }
    register_deactivation_hook(__FILE__, 'disable_embeds_flush_rewrite_rules');
endif;




/**
 * SSL Gravatar
 */
if (!function_exists('_get_ssl2_avatar')) :
    function _get_ssl2_avatar($avatar) {
        $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2&d=mm" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
        return $avatar;
    }
    add_filter('get_avatar', '_get_ssl2_avatar');
endif;




/**
 * Remove Open Sans that WP adds from frontend
 */
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
endif;

if (!function_exists('remove_open_sans')) :
    function remove_open_sans() {    
        wp_deregister_style( 'open-sans' );    
        wp_register_style( 'open-sans', false );    
        wp_enqueue_style('open-sans','');    
    }    
    add_action( 'init', 'remove_open_sans' );
endif;






/**
 * post like
 */
function _get_post_like_data(){
    global $post;
    $post_ID = $post->ID;

    $count = get_post_meta( $post_ID, 'likes', true );

    return (object) array(
        'liked' => _is_user_has_like($post_ID),
        'count' => $count ? $count : 0
    );
}

function _is_user_has_like(){
    global $post;
    $post_ID = $post->ID;

    if( empty($_COOKIE['likes']) || !in_array($post_ID, explode('.', $_COOKIE['likes'])) ){
        return false;
    }

    return true;
}


/**
 * post views
 */
function _post_views_record(){
    if (is_singular()){
      global $post;
      $post_ID = $post->ID;
      if($post_ID){
          $post_views = (int)get_post_meta($post_ID, 'views', true);
          if(!update_post_meta($post_ID, 'views', ($post_views+1))){
            add_post_meta($post_ID, 'views', 1, true);
          }
      }
    }
}

function _get_post_views(){
    global $post;
    $post_ID = $post->ID;
    $views = (int)get_post_meta($post_ID, 'views', true);
    /*if( $views>=1000 ){
        $views = round($views/1000, 2).'K';
    }*/
    return $views;
}



function _get_post_showname(){
    global $post;
    $post_ID = $post->ID;
    $name = get_post_meta($post_ID, 'showname', true);
    return $name;
}


function _get_post_price(){
    global $post;
    $post_ID = $post->ID;
    $price = get_post_meta($post_ID, 'item_price', true);
    return $price;
}






/**
 * title
 */
function _title() {

    global $paged;

    $html = '';
    $t = trim(wp_title('', false));

    if ($t) {
        $html .= $t . _get_delimiter();
    }

    if ( get_query_var('page') ) {
        $html .= '第' . get_query_var('page') . '页' . _get_delimiter();
    }

    $html .= get_bloginfo('name');

    if (is_home()) {
        if ($paged > 1) {
            $html .= _get_delimiter() . '最新发布';
        }else{
            $html .= _get_delimiter() . get_option('blogdescription');
        }
    }

    if( is_category() ){
        global $wp_query;
        $cat_ID = get_query_var('cat');
        $title = _get_tax_meta($cat_ID, 'title');
        if( $title ){
            $html = $title;
        }
    }

    $html = apply_filters( 'set_my_title', $html );

    if ($paged > 1) {
        $html .= _get_delimiter() . '第' . $paged . '页';
    }

    return $html;
}



/**
 * menu
 */
function _the_menu($location = 'nav') {
    echo str_replace("</ul></div>", "", preg_replace("/<div[^>]*><ul[^>]*>/", "", wp_nav_menu(array('theme_location' => $location, 'echo' => false))));
}



/**
 * ads
 */
function _the_ads($name='', $class=''){
    if( !_hui($name.'_s') ) return;

    if( wp_is_mobile() ){
        echo '<div class="asst asst-m asst-'.$class.'">'._hui($name.'_m').'</div>';
    }else{
        echo '<div class="asst asst-'.$class.'">'._hui($name).'</div>';
    }
}



/**
 * leadpager
 * @return [type] [description]
 */
function _the_leadpager(){
    global $paged;
    if( $paged && $paged > 1 ){
        echo ' 第'.$paged.'页';
    }
}



function _cat_search($cat_id=0){
    global $navs;

    $the_cat = get_term_by('id', $cat_id, 'category');

    $link = get_category_link( $the_cat->term_id );
    $navs[] = '<a href="'. $link .'">'. $the_cat->name .'</a>';

    if( $the_cat->parent ){
        _cat_search( $the_cat->parent );
    }

}



function _get_cat_root($cat){
    $this_category = get_category($cat); 
    while($this_category->category_parent){
        $this_category = get_category($this_category->category_parent);
    }
    return $this_category; 
}


/**
 * bodyclass
 */
function _bodyclass() {
    $class = '';

    // if( is_home() && _hui('homepage_skin') ){
    //     $class .= ' home-'._hui('homepage_skin');
    // }

    if ((is_single() || is_page()) && comments_open()) {
        $class .= ' comment-open';
    }

    if( is_tourline() ){
        $class .= ' the-tourline';
    }
    
    if (is_super_admin()) {
        $class .= ' logged-admin';
    }


    return trim($class);
}


function is_tourline(){
    if( is_single() && get_post_format()=='status' ){
        return true;
    }else{
        return false;
    }
}



/**
 * head
 */
function _the_head() { 
    _post_views_record();
    _head_css();
    _keywords();
    _description();
    if( _hui('headcode') ) echo _hui('headcode');
}
add_action('wp_head', '_the_head');



function _the_404(){
    echo '<div class="f404"><img src="'.get_stylesheet_directory_uri().'/img/404.png"><h3>沒有找到你要的内容</h3><p><a href="'.get_bloginfo('url').'">返回首页</a></p></div>';
}


function _get_excerpt($limit=200, $after=''){
    $excerpt = get_the_excerpt();
    if ( $limit>0 && mb_strlen( $excerpt ) > $limit ) {
        return mb_substr(strip_tags($excerpt), 0, $limit, 'utf-8').$after;
    }else{
        return $excerpt;
    }
}

function _excerpt_length( $length ) {
    return 200;
}
add_filter( 'excerpt_length', '_excerpt_length' );




/*function _get_post_thumbnail_url($themethumb=true, $size='thumbnail') { 
    if ( has_post_thumbnail() ) {
        $thumb_id = get_post_thumbnail_id(get_the_ID());
        $thumb = wp_get_attachment_image_src($thumb_id, $size);
        return $thumb[0];
    } else {       
        return $themethumb ? _the_theme_thumb() : '';
    }
}

function _get_post_thumbnail() { 
    // return '<img src="'._the_theme_thumb().'" data-src="'. _get_post_thumbnail_url() .'" class="thumb">';
    return '<img src="'._get_post_thumbnail_url().'" class="thumb">';
}

*/

function _get_post_thumbnail_url($size='thumb', $themethumb=true) { 
    if ( has_post_thumbnail() ) {
        $thumb_id = get_post_thumbnail_id(get_the_ID());
        $thumb = wp_get_attachment_image_src($thumb_id, $size);
        return $thumb[0];
    } else {       
        return $themethumb ? _the_theme_thumb() : '';
    }
}

function _get_post_thumbnail($size='thumb', $alt='') { 
    return ('video'==get_post_format()?'<span class="thumb-video"><i class="fa">&#xe615;</i></span>':'').'<img alt="'.$alt.'" src="'. _get_post_thumbnail_url($size) .'" class="thumb">';
}



function _get_user_avatar($user_email='', $src=false, $size=50){

    $avatar = get_avatar( $user_email, $size , _the_theme_avatar());
    if( $src ){
        return $avatar;
    }else{
        return str_replace(' src=', ' data-src=', $avatar);
    }

}




/**
 * set postthumbnail
 */
if( _hui('set_postthumbnail') && !function_exists('_set_postthumbnail') ){
    function _set_postthumbnail() {
        global $post;
        if( empty($post) ) return;
        $already_has_thumb = has_post_thumbnail($post->ID);
        if (!$already_has_thumb){
            $attached_image = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1");
            if ($attached_image){
                foreach ($attached_image as $attachment_id => $attachment) {
                    set_post_thumbnail($post->ID, $attachment_id);
                }
            }
        }
    }

    // add_action('the_post', '_set_postthumbnail');
    add_action('save_post', '_set_postthumbnail');
    add_action('draft_to_publish', '_set_postthumbnail');
    add_action('new_to_publish', '_set_postthumbnail');
    add_action('pending_to_publish', '_set_postthumbnail');
    add_action('future_to_publish', '_set_postthumbnail');
}





/* 
 * keywords
 * ====================================================
*/
function _keywords() {
    global $s, $post;
    $keywords = '';

    if ( is_single() || is_page() ) {

        /*if ( get_the_tags( $post->ID ) ) {
            foreach ( get_the_tags( $post->ID ) as $tag ) $keywords .= $tag->name . ', ';
        }*/

        $keywords = trim(get_post_meta($post->ID, 'keywords', true));

        if( !$keywords ){
            foreach ( get_the_category( $post->ID ) as $category ){
                $keywords .= $category->cat_name . ', ';
            }
            $keywords = substr_replace( $keywords , '' , -2);
        }

    } elseif ( is_home () ){ 

        $keywords = _hui('home_keywords');
    
    } elseif ( is_category() ) {

        global $wp_query;
        $cat_ID = get_query_var('cat');
        $keywords = _get_tax_meta($cat_ID, 'keywords');

        if( !$keywords ){
            $keywords = single_cat_title('', false);
        }

    } elseif ( is_tag() ) { 
        $keywords = single_tag_title('', false);
    } elseif ( is_search() )   { 
        $keywords = esc_html( $s, 1 );
    } else { 
        $keywords = trim( wp_title('', false) );
    }

    $keywords = apply_filters( 'set_my_keywords', $keywords );

    if ( $keywords ) {
        echo "<meta name=\"keywords\" content=\"$keywords\">\n";
    }
}


/* 
 * description
 * ====================================================
*/
function _description() {
    global $s, $post;
    $description = '';

    $blog_name = get_bloginfo('name');

    if ( is_single() || is_page() ) {

        $description = trim(get_post_meta($post->ID, 'description', true));

        if( !$description ){
            $description = _get_excerpt();
            $description = trim( str_replace( array( "\r\n", "\r", "\n", "　", " "), " ", str_replace( "\"", "'", strip_tags( $description ) ) ) );
        }

    } elseif ( is_home () ) { 

        $description = _hui('home_description');

    } elseif ( is_category() ) { 

        global $wp_query;
        $cat_ID = get_query_var('cat');
        $description = _get_tax_meta($cat_ID, 'description');

        if( !$description ){
            $description = single_cat_title('', false).' '.$blog_name;
        }

    } elseif ( is_tag() ){ 

        $description = $blog_name . "'" . single_tag_title('', false) . "'";

    } elseif ( is_archive() )  { 
        $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
    } elseif ( is_search() )   { 
        $description = $blog_name . ": '" . esc_html( $s, 1 ) . "' ".__('的搜索結果', 'haoui');
    } else { 
        $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
    }

    $description = mb_substr( $description, 0, _get_description_max_length(), 'utf-8' );

    $description = apply_filters( 'set_my_description', $description );
    
    echo "<meta name=\"description\" content=\"$description\">\n";
}




function _noself_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, $home ) )
    unset($links[$l]);
}
add_action('pre_ping','_noself_ping');





function _hide_admin_bar($flag) {
    return false;
}
//add_filter('show_admin_bar','_hide_admin_bar');





function _get_thumb_url($url, $last){
    $filetype = explode('.', $url);
    $filetype = end($filetype);
    return rtrim($url, '.'.$filetype).'-'.$last.'.'.$filetype;
}





function _get_post_time() {
    return (time()-strtotime(get_the_time('Y-m-d')))>86400 ? get_the_date() : get_the_time();
}





function _load_scripts() {
    if (!is_admin()) {
        wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/style.css', array(), _the_theme_version(), 'all' );
        if(is_page()){
            wp_enqueue_style( 'travel-gency', get_stylesheet_directory_uri().'/travel-gency.css',array());
        }
        wp_deregister_script( 'jquery' );
        wp_deregister_script( 'l10n' ); 

        wp_register_script( 'jquery', '//apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js', false, _the_theme_version(), true );
        wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), _the_theme_version(), true );

    }
}
add_action('wp_enqueue_scripts', '_load_scripts');






function _head_css() {

    $styles = '';

    /*if( _hui('site_gray') ){
        $styles .= "html{overflow-y:scroll;filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(100%);}";
    }

    $skc = _hui('theme_skin');

    if( _hui('theme_skin_custom') ){
        $skc = _hui('theme_skin_custom');
    }*/
    
    /*if( $skc && $skc !== '#00AAEE' ){
        $styles .= "";
    }*/

    $styles .= _hui('csscode');

    if( $styles ) echo '<style>'.$styles.'</style>'."\n";
}











/**
 * no category
 */
if( !function_exists('no_category_base_refresh_rules') ){

    /*
    Plugin Name: No Category Base (WPML)
    Version: 1.2
    Plugin URI: http://infolific.com/technology/software-worth-using/no-category-base-for-wordpress/
    Description: Removes '/category' from your category permalinks. WPML compatible.
    Author: Marios Alexandrou
    Author URI: http://infolific.com/technology/
    License: GPLv2 or later
    Text Domain: no-category-base-wpml
    */

    /*
    Copyright 2015 Marios Alexandrou
    Copyright 2011 Mines (email: hi@mines.io)
    Copyright 2008 Saurabh Gupta (email: saurabh0@gmail.com)

    Based on the work by Saurabh Gupta (email : saurabh0@gmail.com)

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
    */

    /* hooks */
    register_activation_hook(__FILE__,    'no_category_base_refresh_rules');
    register_deactivation_hook(__FILE__,  'no_category_base_deactivate');

    /* actions */
    add_action('created_category',  'no_category_base_refresh_rules');
    add_action('delete_category',   'no_category_base_refresh_rules');
    add_action('edited_category',   'no_category_base_refresh_rules');
    add_action('init',              'no_category_base_permastruct');

    /* filters */
    add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
    add_filter('query_vars',             'no_category_base_query_vars');    // Adds 'category_redirect' query variable
    add_filter('request',                'no_category_base_request');       // Redirects if 'category_redirect' is set

    function no_category_base_refresh_rules() {
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

    function no_category_base_deactivate() {
        remove_filter( 'category_rewrite_rules', 'no_category_base_rewrite_rules' ); // We don't want to insert our custom rules again
        no_category_base_refresh_rules();
    }

    /**
     * Removes category base.
     *
     * @return void
     */
    function no_category_base_permastruct()
    {
        global $wp_rewrite;
        global $wp_version;

        if ( $wp_version >= 3.4 ) {
            $wp_rewrite->extra_permastructs['category']['struct'] = '%category%';
        } else {
            $wp_rewrite->extra_permastructs['category'][0] = '%category%';
        }
    }

    /**
     * Adds our custom category rewrite rules.
     *
     * @param  array $category_rewrite Category rewrite rules.
     *
     * @return array
     */
    function no_category_base_rewrite_rules($category_rewrite) {
        global $wp_rewrite;
        $category_rewrite=array();

        /* WPML is present: temporary disable terms_clauses filter to get all categories for rewrite */
        if ( class_exists( 'Sitepress' ) ) {
            global $sitepress;

            remove_filter( 'terms_clauses', array( $sitepress, 'terms_clauses' ) );
            $categories = get_categories( array( 'hide_empty' => false ) );
            add_filter( 'terms_clauses', array( $sitepress, 'terms_clauses' ) );
        } else {
            $categories = get_categories( array( 'hide_empty' => false ) );
        }

        foreach( $categories as $category ) {
            $category_nicename = $category->slug;

            if ( $category->parent == $category->cat_ID ) {
                $category->parent = 0;
            } elseif ( $category->parent != 0 ) {
                $category_nicename = get_category_parents( $category->parent, false, '/', true ) . $category_nicename;
            }

            $category_rewrite['('.$category_nicename.')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
            $category_rewrite["({$category_nicename})/{$wp_rewrite->pagination_base}/?([0-9]{1,})/?$"] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
            $category_rewrite['('.$category_nicename.')/?$'] = 'index.php?category_name=$matches[1]';
        }

        // Redirect support from Old Category Base
        $old_category_base = get_option( 'category_base' ) ? get_option( 'category_base' ) : 'category';
        $old_category_base = trim( $old_category_base, '/' );
        $category_rewrite[$old_category_base.'/(.*)$'] = 'index.php?category_redirect=$matches[1]';

        return $category_rewrite;
    }

    function no_category_base_query_vars($public_query_vars) {
        $public_query_vars[] = 'category_redirect';
        return $public_query_vars;
    }

    /**
     * Handles category redirects.
     *
     * @param $query_vars Current query vars.
     *
     * @return array $query_vars, or void if category_redirect is present.
     */
    function no_category_base_request($query_vars) {
        if( isset( $query_vars['category_redirect'] ) ) {
            $catlink = trailingslashit( get_option( 'home' ) ) . user_trailingslashit( $query_vars['category_redirect'], 'category' );
            status_header( 301 );
            header( "Location: $catlink" );
            exit();
        }

        return $query_vars;
    }

}








/**
 * get post mostviews
 */
function _posts_mostviews($mode = 'post', $limit = 10, $days = 15, $display = true) {
    global $wpdb, $post;
    $limit_date = current_time('timestamp') - ($days*86400);
    $limit_date = date("Y-m-d H:i:s",$limit_date);
    $where = '';
    $temp = '';

    if(!empty($mode) && $mode != 'both') {
        $where = "post_type = '$mode'";
    } else {
        $where = '1=1';
    }

    $most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND post_date > '".$limit_date."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER  BY views DESC LIMIT $limit");

    if($most_viewed) {
        $i = 1;
        foreach ($most_viewed as $post) {
            $post_title = get_the_title();
            $post_views = intval($post->views);
            // $post_views = number_format($post_views);

            // $temp .= "<li><a href=\"".get_permalink()."\">$post_title</a> - $post_views ".__('views', 'wp-postviews')."</li>";
            $temp .= '<li class="item-'.$i.'"><a href="'.get_permalink($postid).'"><b>'.$i.'</b><span class="thumbnail">'._get_post_thumbnail().'</span><h2>'.$post_title.'</h2><p>'.timeago( get_the_time('Y-m-d H:i:s') ).'<span class="post-views">阅读('.$post_views.')</span></p></a></li>';
                $i++;
        }
    } else {
        $temp = '<li>'.__('N/A', 'wp-postviews').'</li>'."\n";
    }

    if($display) {
        echo $temp;
    } else {
        return $temp;
    }
}




function _posts_orderby_views($days = 30, $limit = 12, $display = true, $mode = 'post') {
    global $wpdb, $post;
    $limit_date = current_time('timestamp') - ($days*86400);
    $limit_date = date("Y-m-d H:i:s",$limit_date);
    $where = '';
    $temp = '';

    if(!empty($mode) && $mode != 'both') {
        $where = "post_type = '$mode'";
    } else {
        $where = '1=1';
    }

    $most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND post_date > '".$limit_date."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER  BY views DESC LIMIT $limit");

    if($most_viewed) {
        foreach ($most_viewed as $post) {
            $temp .= '<li><a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail(array()).'<h2>'.get_the_title().'</h2></a></li>';
        }
    } else {
        $temp = '<li>暂无内容！</li>'."\n";
    }

    if($display) {
        echo $temp;
    } else {
        return $temp;
    }
}


// Posts Related
function _posts_related($limit=8){
    global $post;

    $cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
    $args = array(
        'post__not_in'        => explode(',', $post->ID), 
        'category__in'        => explode(',', $cats), 
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => $limit
    );
    query_posts($args);
    while( have_posts() ) { the_post();
        echo '<li><a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail().'<span class="tit">'.get_the_title().'</span>'.'</a></li>';
    };
    wp_reset_query();

}





// PAGING
if ( ! function_exists( '_paging' ) ) :

    function _paging() {
        $p = 2;
        $pmt = 'multi';
        if ( is_singular() ) return;
        global $wp_query, $paged;
        $max_page = $wp_query->max_num_pages;

        if ( $max_page == 1 ) return; 
        echo '<div class="pagination'.($pmt == 'multi'?' pagination-multi':'').'"><ul>';
        if ( empty( $paged ) ) $paged = 1;
        if( $pmt == 'multi' && $paged !== 1 ) _paging_link(0);
        // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> '; 
        echo '<li class="prev-page">'; previous_posts_link(__('上一页', 'haoui')); echo '</li>';

        if( $pmt == 'multi' ){
            if ( $paged > $p + 1 ) _paging_link( 1, '<li>'.__('第一页', 'haoui').'</li>' );
            if ( $paged > $p + 2 ) echo "<li><span>···</span></li>";
            for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { 
                if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : _paging_link( $i );
            }
            if ( $paged < $max_page - $p - 1 ) echo "<li><span> ... </span></li>";
        }
        //if ( $paged < $max_page - $p ) _paging_link( $max_page, '&raquo;' );
        echo '<li class="next-page">'; next_posts_link(__('下一页', 'haoui')); echo '</li>';
        // if( $pmt == 'multi' && $paged < $max_page ) _paging_link($max_page, '', 1);
        // if( $pmt == 'multi' ) echo '<li><span>'.__('共', 'haoui').' '.$max_page.' '.__('页', 'haoui').'</span></li>';

        echo '</ul></div>';
    }

    function _paging_link( $i, $title = '', $w='' ) {
        if ( $title == '' ) $title = __('页', 'haoui')." {$i}";
        $itext = $i;
        if( $i == 0 ){
            $itext = __('首页', 'haoui');
        }
        if( $w ){
            $itext = __('尾页', 'haoui');
        }
        echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "'>{$itext}</a></li>";
    }

endif;













function tb_gallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
         // 'ids' is explicitly ordered, unless you specify otherwise.
         if ( empty( $attr['orderby'] ) )
                 $attr['orderby'] = 'post__in';
         $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
         return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
         $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
         if ( !$attr['orderby'] )
                 unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
         'order'      => 'ASC',
         'orderby'    => 'menu_order ID',
         'id'         => $post->ID,
         'itemtag'    => 'div',
         'icontag'    => 'div',
         'captiontag' => 'div',
         'columns'    => 3,
         'size'       => 'thumbnail',
         'include'    => '',
         'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
         $orderby = 'none';

    if ( !empty($include) ) {
         $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

         $attachments = array();
         foreach ( $_attachments as $key => $val ) {
                 $attachments[$val->ID] = $_attachments[$key];
         }
    } elseif ( !empty($exclude) ) {
         $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
         $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
         return '';

    if ( is_feed() ) {
         $output = "\n";
         foreach ( $attachments as $att_id => $attachment )
                 $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
         return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
         $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
         $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
         $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';

    $size_class = sanitize_html_class( $size );


    $gallery_div = "<div class='gallery galleryid-{$id} gallerylink-{$attr['link']} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    if( $size == 'full' && _hui('full_gallery') ){
        $output .= '<div class="glide">
                    <div class="glide__arrows">
                        <button class="glide__arrow prev" data-glide-dir="<"><i class="fa">&#xe610;</i></button>
                        <button class="glide__arrow next" data-glide-dir=">"><i class="fa">&#xe603;</i></button>
                    </div>
                    <div class="glide__wrapper">
                        <ul class="glide__track">';
    }


    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
         $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        if( $size == 'full' && _hui('full_gallery') ){
            $output .= '<li class="glide__slide"><div class="gallery-item">'.$link.'</div>'. ($attachment->post_excerpt ? '<div class="gallery-itemdesc">'.wptexturize($attachment->post_excerpt).'</div>' : '') .'</li>';
        }else{
            $output .= "<{$itemtag} class='gallery-item'>";
            $output .= "
                 <{$icontag} class='gallery-icon'>
                         $link
                 </{$icontag}>";
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                 $output .= "
                         <{$captiontag} class='gallery-caption'>
                         " . wptexturize($attachment->post_excerpt) . "
                         </{$captiontag}>";
            }
            $output .= "</{$itemtag}>";
        }

    }

    if( $size == 'full' && _hui('full_gallery') ){
        $output .= '</ul>
                    </div>
                    <div class="glide__bullets"></div>
                </div>';
    }

    $output .= "

         </div>\n";

    return $output;

}

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'tb_gallery_shortcode');





function _get_cat_banner($id=0){
    $url = _get_tax_meta($id, 'banner');
    return $url ? $url : get_stylesheet_directory_uri().'/img/banner-default.jpg';
}






// print_r( _get_tax_meta(21, 'style') );

function _get_tax_meta($id=0, $field=''){
    $ops = get_option( "_taxonomy_meta_$id" );

    if( empty($ops) ){
        return '';
    }

    if( empty($field) ){
        return $ops;
    }

    return isset($ops[$field]) ? $ops[$field] : '';
}


class __Tax_Cat{

    function __construct(){
        add_action( 'category_add_form_fields', array( $this, 'add_tax_field' ) );
        add_action( 'category_edit_form_fields', array( $this, 'edit_tax_field' ) );

        add_action( 'edited_category', array( $this, 'save_tax_meta' ), 10, 2 );
        add_action( 'create_category', array( $this, 'save_tax_meta' ), 10, 2 );
    }
 
    public function add_tax_field(){
        echo '
            <div class="form-field">
                <label for="term_meta[banner]">焦点图地址</label>
                <input type="text" name="term_meta[banner]" id="term_meta[banner]" />
            </div>
            <div class="form-field">
                <label for="term_meta[title]">SEO 标题</label>
                <input type="text" name="term_meta[title]" id="term_meta[title]" />
            </div>
            <div class="form-field">
                <label for="term_meta[keywords]">SEO 关键字（keywords）</label>
                <input type="text" name="term_meta[keywords]" id="term_meta[keywords]" />
            </div>
            <div class="form-field">
                <label for="term_meta[keywords]">SEO 描述（description）</label>
                <textarea name="term_meta[description]" id="term_meta[description]" rows="4" cols="40"></textarea>
            </div>
        ';
    }
 
    public function edit_tax_field( $term ){

        $term_id = $term->term_id;
        $term_meta = get_option( "_taxonomy_meta_$term_id" );

        $meta_banner = isset($term_meta['banner']) ? $term_meta['banner'] : '';
        $meta_title = isset($term_meta['title']) ? $term_meta['title'] : '';
        $meta_keywords = isset($term_meta['keywords']) ? $term_meta['keywords'] : '';
        $meta_description = isset($term_meta['description']) ? $term_meta['description'] : '';
        
        echo '
            <tr class="form-field">
                <th scope="row">
                    <label for="term_meta[banner]">焦点图地址</label>
                    <td>
                        <input type="text" name="term_meta[banner]" id="term_meta[banner]" value="'. $meta_banner .'" />
                    </td>
                </th>
            </tr>
            <tr class="form-field">
                <th scope="row">
                    <label for="term_meta[title]">SEO 标题</label>
                    <td>
                        <input type="text" name="term_meta[title]" id="term_meta[title]" value="'. $meta_title .'" />
                    </td>
                </th>
            </tr>
            <tr class="form-field">
                <th scope="row">
                    <label for="term_meta[keywords]">SEO 关键字（keywords）</label>
                    <td>
                        <input type="text" name="term_meta[keywords]" id="term_meta[keywords]" value="'. $meta_keywords .'" />
                    </td>
                </th>
            </tr>
            <tr class="form-field">
                <th scope="row">
                    <label for="term_meta[description]">SEO 描述（description）</label>
                    <td>
                        <textarea name="term_meta[description]" id="term_meta[description]" rows="4">'. $meta_description .'</textarea>
                    </td>
                </th>
            </tr>
        ';
    }
 
    public function save_tax_meta( $term_id ){
 
        if ( isset( $_POST['term_meta'] ) ) {
            
            $term_meta = array();

            $term_meta['banner'] = isset ( $_POST['term_meta']['banner'] ) ? esc_sql( $_POST['term_meta']['banner'] ) : '';
            $term_meta['title'] = isset ( $_POST['term_meta']['title'] ) ? esc_sql( $_POST['term_meta']['title'] ) : '';
            $term_meta['keywords'] = isset ( $_POST['term_meta']['keywords'] ) ? esc_sql( $_POST['term_meta']['keywords'] ) : '';
            $term_meta['description'] = isset ( $_POST['term_meta']['description'] ) ? esc_sql( $_POST['term_meta']['description'] ) : '';

            update_option( "_taxonomy_meta_$term_id", $term_meta );
 
        }
    }
 
}
 
$tax_cat = new __Tax_Cat();








function post_is_in_descendant_category( $cats, $_post = null ) {
    foreach ( (array) $cats as $cat ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $cat, 'category' );
        if ( $descendants && in_category( $descendants, $_post ) )
            return true;
    }
    return false;
}


function _get_cat_sticky_ids($catid=0){
    global $wp_query;

    $sticky_posts = get_option('sticky_posts');
    
    if ( !empty($sticky_posts) && is_array($sticky_posts) ) {

        if( $wp_query->is_category == 1 ){
            $catid = $wp_query->query_vars['cat'];
        }

        query_posts(array( 
            'posts_per_page' => 100,
            'post__in' => $sticky_posts
        ));
        while ( have_posts() ) : the_post();
            if( !in_category($catid) && !post_is_in_descendant_category(array($catid)) ){
                $offset1 = array_search(get_the_ID(), $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }

        endwhile; 
        wp_reset_query();
    }

    // if( is_super_admin( ) ) print_r($sticky_posts);

    rsort($sticky_posts);

    $sticky_posts = array_slice($sticky_posts, 0, 9);

    return $sticky_posts;
}










// if($wp_query->is_category == 1) {
// add_filter('the_posts',  'putStickyOnTop' );
function putStickyOnTop( $posts ) {
    if(is_home() || !is_main_query() || !is_archive())
        return $posts;

    global $wp_query;

    $stickyids = _get_cat_sticky_ids();

    if ( $wp_query->query_vars['paged'] <= 1 ){

        $num_posts = count($posts);
        $sticky_offset = 0;

        // Loop over posts and relocate stickies to the front.
        for ( $i = 0; $i < $num_posts; $i++ ) {
            if ( in_array($posts[$i]->ID, $stickyids) ) {
                $sticky_post = $posts[$i];
                // 列表中删除置顶文章
                array_splice($posts, $i, 1);
                // 置顶文章添加到最前
                array_splice($posts, $sticky_offset, 0, array($sticky_post));
                // 置顶位置计数
                $sticky_offset++;
                // Remove post from sticky posts array
                $offset = array_search($sticky_post->ID, $stickyids);
                unset( $stickyids[$offset] );
            }
        }

        
        // If any posts have been excluded specifically, Ignore those that are sticky.
        if ( !empty($stickyids) && !empty($wp_query->query_vars['post__not_in'] ) ){
            $stickyids = array_diff($stickyids, $wp_query->query_vars['post__not_in']);
        }

        // Fetch sticky posts that weren't in the query results
        if ( !empty($stickyids) ) {
            $stickies = get_posts( array(
                'post__in'    => $stickyids,
                'post_type'   => $wp_query->query_vars['post_type'],
                'post_status' => 'publish',
                'nopaging'    => true
            ) );

            foreach ( $stickies as $item ) {
                array_splice( $posts, $sticky_offset, 0, array( $item ) );
                $sticky_offset++;
            }
        }


        $new_num = count($posts);
        if( $new_num > $num_posts ){
            for ($i=$num_posts; $i <= $new_num; $i++) { 
                unset($posts[$i]);
            }
        }

        if( is_super_admin( ) ){
            // print_r(count($posts));
        }
    }

    return $posts;
}