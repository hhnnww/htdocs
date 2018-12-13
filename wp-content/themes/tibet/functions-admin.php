<?php 

// IN OPTIONS
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
require_once dirname( __FILE__ ) . '/inc/options.php';




function _admin_scripts() {  
    wp_register_script( '_admin', get_stylesheet_directory_uri().'/js/admin.js', array( 'jquery', 'media-models', 'media-upload', 'set-post-thumbnail' ));  
    wp_enqueue_script( '_admin' );  
}  
add_action( 'admin_enqueue_scripts', '_admin_scripts' );


// JPEG QUALITY
add_filter('jpeg_quality', function($arg){return 100;});




function admin_mycss() {
    echo'<style type="text/css">
    #dashboard_right_now .comment-count{display:none}
    .form-field.term-description-wrap22{display:none}
    #post-formats-select .post-format-icon::before{display:none}
    #postexcerpt .inside p{display:none}

    #tb_product .inside{overflow:hidden}
    .tbmitem label{display:block;margin-bottom:2px;font-weight:bold;}
    .tbmitem input, .tbmitem textarea{display:block;width:100%;}
    .tbmitem{float:left;width:97%;margin:5px 1.5%;}
    .tbmitem:nth-child(-n+7){width:30.333333%;}
    .tbmitem:nth-child(3){width:13.833333%;}
    .tbmitem:nth-child(4){width:13.5%;}
    .tbmitem:nth-child(10),
    .tbmitem:nth-child(11),
    .tbmitem:nth-child(12),
    .tbmitem:nth-child(13),
    .tbmitem:nth-child(14){width:47%;}


    #tb_uploads .inside{overflow:hidden}
    #tb_uploads .inside .item{float:left;width:162px;padding:10px 5px 5px;text-align:center;}
    #tb_uploads .inside .item strong{display:inline-block;margin-bottom:5px;}
    #tb_uploads .inside a.tbcus-upload{display:block;border:1px dashed #ddd;line-height:100px;text-align:center;text-decoration:none;color:#999;height:100px;padding:5px;}
    #tb_uploads .inside a.tbcus-upload:hover{border-color:#999;color:#666;}
    #tb_uploads .inside .tbcus-remove{display:inline-block;margin-top:5px;}
    </style>';
}
add_action('admin_head', 'admin_mycss');



// EDITOR STYLE
add_editor_style(get_stylesheet_directory_uri().'/editor-style.css');

if( !function_exists('_add_editor_buttons') ) :

    function _add_editor_buttons($buttons) {
        $buttons[] = 'fontselect';
        $buttons[] = 'fontsizeselect';
        $buttons[] = 'cleanup';
        $buttons[] = 'styleselect';
        $buttons[] = 'del';
        $buttons[] = 'sub';
        $buttons[] = 'sup';
        $buttons[] = 'copy';
        $buttons[] = 'paste';
        $buttons[] = 'cut';
        $buttons[] = 'image';
        $buttons[] = 'anchor';
        $buttons[] = 'backcolor';
        $buttons[] = 'wp_page';
        $buttons[] = 'charmap';
        return $buttons;
    }
    add_filter("mce_buttons", "_add_editor_buttons");

endif;



// MD5 FILENAME
if ( !function_exists('_new_filename') ) :

    function _new_filename($filename) {
        $info = pathinfo($filename);
        $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
        $name = basename($filename, $ext);
        return substr(md5($name), 0, 15) . $ext;
    }
    add_filter('sanitize_file_name', '_new_filename', 10);

endif;




// COMMENT Ctrl+Enter
if ( !function_exists('_admin_comment_ctrlenter') ) :

    function _admin_comment_ctrlenter(){
        echo '<script type="text/javascript">
            jQuery(document).ready(function($){
                $("textarea").keypress(function(e){
                    if(e.ctrlKey&&e.which==13||e.which==10){
                        $("#replybtn").click();
                    }
                });
            });
        </script>';
    };
    add_action('admin_footer', '_admin_comment_ctrlenter');

endif;




// hook the admin init
add_action('admin_init','customize_meta_boxes');

function customize_meta_boxes() {
    // remove_meta_box('tagsdiv-post_tag','post','normal');
    remove_meta_box('trackbacksdiv','post','normal');
    //remove_meta_box('postcustom','post','normal');
    remove_meta_box('authordiv','post','normal');
    remove_meta_box('commentsdiv','post','normal');
    remove_meta_box('commentstatusdiv','post','normal');

    remove_meta_box('trackbacksdiv','page','normal');
    remove_meta_box('postcustom','page','normal');
    remove_meta_box('authordiv','page','normal');
    remove_meta_box('commentsdiv','page','normal');
    remove_meta_box('commentstatusdiv','page','normal');

    remove_meta_box('dashboard_activity','dashboard','normal');
    remove_meta_box('dashboard_recent_comments','dashboard','normal');
    remove_meta_box('dashboard_incoming_links','dashboard','normal');
    remove_meta_box('dashboard_primary','dashboard','normal');
    remove_meta_box('dashboard_secondary','dashboard','normal');
}



add_action( 'admin_menu', 'wpjam_remove_admin_menus' );
function wpjam_remove_admin_menus(){
    remove_menu_page( 'edit-comments.php' );
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}



function my_manage_columns( $columns ) {
    unset($columns['tags']);
    unset($columns['comments']);
    unset($columns['author']);


    return $columns;
}
function my_column_init() {
    add_filter( 'manage_posts_columns' , 'my_manage_columns' );
    add_filter( 'manage_pages_columns' , 'my_manage_columns' );
}
add_action( 'admin_init' , 'my_column_init' );



/**
 * 文章、分类等显示ID
 */
function ssid_column($cols) {
    $cols['ssid'] = 'ID';
    return $cols;
}

function ssid_value($column_name, $id) {
    if ($column_name == 'ssid')
        echo $id;
}

function ssid_return_value($value, $column_name, $id) {
    if ($column_name == 'ssid')
        $value = $id;
    return $value;
}

function ssid_css() {
    ?>
    <style type="text/css">
        #ssid { width: 50px; }
    </style>
    <?php   
}

function ssid_add() {
    add_action('admin_head', 'ssid_css');
 
    add_filter('manage_posts_columns', 'ssid_column');
    add_action('manage_posts_custom_column', 'ssid_value', 10, 2);
 
    add_filter('manage_pages_columns', 'ssid_column');
    add_action('manage_pages_custom_column', 'ssid_value', 10, 2);
 
    add_filter('manage_media_columns', 'ssid_column');
    add_action('manage_media_custom_column', 'ssid_value', 10, 2);
 
    add_filter('manage_link-manager_columns', 'ssid_column');
    add_action('manage_link_custom_column', 'ssid_value', 10, 2);
 
    add_action('manage_edit-link-categories_columns', 'ssid_column');
    add_filter('manage_link_categories_custom_column', 'ssid_return_value', 10, 3);
 
    foreach ( get_taxonomies() as $taxonomy ) {
        add_action("manage_edit-${taxonomy}_columns", 'ssid_column');           
        add_filter("manage_${taxonomy}_custom_column", 'ssid_return_value', 10, 3);
    }
 
    add_action('manage_users_columns', 'ssid_column');
    add_filter('manage_users_custom_column', 'ssid_return_value', 10, 3);
 
    add_action('manage_edit-comments_columns', 'ssid_column');
    add_action('manage_comments_custom_column', 'ssid_value', 10, 2);
}
 
add_action('admin_init', 'ssid_add');







// ADMIN SCRIPTS
// if ( !function_exists('_admin_comment_ctrlenter') ) :

//     function _admin_scripts() {  
//         wp_register_script( '_admin', get_stylesheet_directory_uri().'/js/admin.js', array(), '' );  
//         wp_enqueue_script( '_admin' );  
//     }  
//     add_action( 'admin_enqueue_scripts', '_admin_scripts' );

// endif;





// ON THEME INIT
if ( isset($_GET['activated']) ){


    // THUMBNAIL SIZE
    // update_option('thumbnail_size_w', 220);
    // update_option('thumbnail_size_h', 220);
    // update_option('thumbnail_crop', 1);


    // update_option('posts_per_page', 20);


    // CREATE PAGES
    $init_pages = array(
        'custom.php'        => array( '定制旅游', 'custom' )
    );

    foreach ($init_pages as $template => $item) {
        
        $one_page = array(
            'post_title'  => $item[0],
            'post_name'   => $item[1],
            'post_status' => 'publish',
            'post_type'   => 'page',
            'post_author' => 1
        );

        $one_page_check = get_page_by_title( $item[0] );

        if(!isset($one_page_check->ID)){
            $one_page_id = wp_insert_post($one_page);
            update_post_meta($one_page_id, '_wp_page_template', $template);
        }

    }

}



























// Custom meta
add_action( 'add_meta_boxes', 'tb_meta_boxs' );
function tb_meta_boxs() {
    add_meta_box( 'tb_seo', __( 'SEO' ), 'tb_seo_init', 'post', 'advanced', 'low' );
    add_meta_box( 'tb_uploads', __( '线路 - 焦点图' ), 'tb_uploads_init', 'post', 'advanced', 'low' );
    add_meta_box( 'tb_product', __( '线路 - 数据' ), 'tb_product_init', 'post', 'advanced', 'low' );
    add_meta_box( 'tb_info', __( '文章属性' ), 'tb_info_init', 'post', 'side', 'low' );

    add_meta_box( 'tb_seo', __( 'SEO' ), 'tb_seo_init', 'page', 'advanced', 'low' );
    add_meta_box( 'tb_focus', __( '焦点图地址' ), 'tb_focus_init', 'page', 'side', 'low' );
}






/**
 * Custom product meta
 */
$tb_product = array(
    array('name' => 'item_price', 'title' => '价格', 'std' => ''),
    array('name' => 'item_saled', 'title' => '售出数量', 'std' => ''),
    array('name' => 'item_type', 'title' => '类型', 'std' => ''),
    array('name' => 'item_istuan', 'title' => '跟团游', 'std' => ''),
    array('name' => 'item_start', 'title' => '出发地', 'std' => ''),
    array('name' => 'item_bourn', 'title' => '目的地', 'std' => ''),
    array('name' => 'item_days', 'title' => '行程天数', 'std' => ''),
    array('name' => 'item_feature', 'title' => '产品特色', 'std' => '', 'type' => 'textarea'),
    array('name' => 'item_route', 'title' => '详细行程', 'std' => '', 'type' => 'textarea', 'rows' => '10'),
    array('name' => 'item_inprice_che', 'title' => '费用包含-用车', 'std' => '', 'type' => 'textarea', 'rows' => '2'),
    array('name' => 'item_inprice_zhu', 'title' => '费用包含-住宿', 'std' => '', 'type' => 'textarea', 'rows' => '2'),
    array('name' => 'item_inprice_can', 'title' => '费用包含-用餐', 'std' => '', 'type' => 'textarea', 'rows' => '2'),
    array('name' => 'item_inprice_piao', 'title' => '费用包含-门票', 'std' => '', 'type' => 'textarea', 'rows' => '2'),
    array('name' => 'item_inprice_bao', 'title' => '费用包含-保险', 'std' => '', 'type' => 'textarea', 'rows' => '2'),
    array('name' => 'item_outprice', 'title' => '费用不含', 'std' => '', 'type' => 'textarea'),
    array('name' => 'item_tuan', 'title' => '团购特价 （每行 日期=价格，如：2017-07-25=2850）', 'std' => '', 'type' => 'textarea'),
    // array('name' => 'item_cost', 'title' => '预定须知', 'std' => ''),
    // array('name' => 'item_tips', 'title' => '注意事项', 'std' => ''),
);
add_action('save_post', 'tb_product_save');
function tb_product_init() {
    global $post, $tb_product;
    foreach($tb_product as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        echo '<div class="tbmitem">';
        if( isset($meta_box['title']) ) echo'<label>'.$meta_box['title'].'：</label>';
        if( isset($meta_box['type']) && $meta_box['type']=='textarea' ){
            echo '<textarea rows="'.(isset($meta_box['rows'])?$meta_box['rows']:5).'" name="'.$meta_box['name'].'">'.$meta_box_value.'</textarea>';
        }else{
            echo '<input type="text" value="'.$meta_box_value.'" name="'.$meta_box['name'].'">';
        }
        echo '</div>';
    }
    echo '<input type="hidden" name="tb_product_noncename" id="tb_product_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function tb_product_save( $post_id ) {
    global $tb_product;
   
    if ( !wp_verify_nonce( isset($_POST['tb_product_noncename']) ? $_POST['tb_product_noncename'] : '', plugin_basename(__FILE__) ))
        return;
   
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                   
    foreach($tb_product as $meta_box) {
        $data = $_POST[$meta_box['name']];
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}







/**
 * Custom SEO meta
 */
$tb_seo = array(
    array(
        "name" => "keywords",
        "std" => "",
        "title" => '关键字（keywords）：'
    ),
    array(
        "name" => "description",
        "std" => "",
        "title" => '描述（description）：'
    )
);
add_action('save_post', 'tb_seo_save');
function tb_seo_init() {
    global $post, $tb_seo;
    foreach($tb_seo as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        if( isset($meta_box['title']) ) echo'<p style="margin-bottom:4px;">'.$meta_box['title'].'</p>';
        echo '<p style="margin-top:0;"><textarea rows="2" style="width:100%" name="'.$meta_box['name'].'">'.$meta_box_value.'</textarea></p>';
    }
    echo '<input type="hidden" name="tb_seo_noncename" id="tb_seo_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function tb_seo_save( $post_id ) {
    global $tb_seo;
   
    if ( !wp_verify_nonce( isset($_POST['tb_seo_noncename']) ? $_POST['tb_seo_noncename'] : '', plugin_basename(__FILE__) ))
        return;
   
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                   
    foreach($tb_seo as $meta_box) {
        $data = $_POST[$meta_box['name']];
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}









/**
 * Custom INFO meta
 */
$tb_info = array(
    array(
        "name" => "views",
        "std" => "",
        "title" => '阅读数：'
    ),
    array(
        "name" => "likes",
        "std" => "",
        "title" => '喜欢数：'
    ),
    array(
        "name" => "showname",
        "std" => "",
        "title" => '显示用户名：'
    )
);
add_action('save_post', 'tb_info_save');
function tb_info_init() {
    global $post, $tb_info;
    foreach($tb_info as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        if( isset($meta_box['title']) ) echo'<p style="margin-bottom:4px;">'.$meta_box['title'].'</p>';
        echo '<p style="margin-top:0;"><input type="text" style="width:100%;" value="'.$meta_box_value.'" name="'.$meta_box['name'].'"></p>';
    }
    echo '<input type="hidden" name="tb_info_noncename" id="tb_info_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function tb_info_save( $post_id ) {
    global $tb_info;
   
    if ( !wp_verify_nonce( isset($_POST['tb_info_noncename']) ? $_POST['tb_info_noncename'] : '', plugin_basename(__FILE__) ))
        return;
   
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                   
    foreach($tb_info as $meta_box) {
        $data = $_POST[$meta_box['name']];
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}







/**
 * Custom focus meta
 */
$tb_focus = array(
    array(
        "name" => "focus_src"
        , "std" => ""
        // , "title" => '图片地址：'
    )
);
add_action('save_post', 'tb_focus_save');
function tb_focus_init() {
    global $post, $tb_focus;
    foreach($tb_focus as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        if( isset($meta_box['title']) ) echo'<p style="margin-bottom:4px;">'.$meta_box['title'].'</p>';
        echo '<p style="margin-top:0;"><input type="text" style="width:100%;" value="'.$meta_box_value.'" name="'.$meta_box['name'].'"></p>';
    }
    echo '<input type="hidden" name="tb_focus_noncename" id="tb_focus_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function tb_focus_save( $post_id ) {
    global $tb_focus;
   
    if ( !wp_verify_nonce( isset($_POST['tb_focus_noncename']) ? $_POST['tb_focus_noncename'] : '', plugin_basename(__FILE__) ))
        return;
   
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                   
    foreach($tb_focus as $meta_box) {
        $data = $_POST[$meta_box['name']];
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}









/**
 * Custom upload
 */
$tb_uploads = array(
    array(
        "name" => "item_image_1"
        , "std" => ""
        , "title" => "焦点图1"
        , "type"=>"uploader"
    ),
    array(
        "name" => "item_image_2"
        , "std" => ""
        , "title" => "焦点图2"
        , "type"=>"uploader"
    ),
    array(
        "name" => "item_image_3"
        , "std" => ""
        , "title" => "焦点图3"
        , "type"=>"uploader"
    ),
    array(
        "name" => "item_image_4"
        , "std" => ""
        , "title" => "焦点图4"
        , "type"=>"uploader"
    ),
    array(
        "name" => "item_image_5"
        , "std" => ""
        , "title" => "焦点图5"
        , "type"=>"uploader"
    )
);
add_action('save_post', 'tb_uploads_save');
function tb_uploads_init() {
    global $post, $tb_uploads;
    foreach($tb_uploads as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        // if( isset($meta_box['title']) ) echo'<p style="margin-bottom:4px;">'.$meta_box['title'].'</p>';

        echo '<div class="item">';
            echo '<strong>'.$meta_box['title'].'</strong>';
            echo '<a href="javascript:;" class="tbcus-upload" id="set-'.$meta_box['name'].'-thumbnail" data-uploader_title="设置'.$meta_box['title'].'" data-uploader_button_text="设置为'.$meta_box['title'].'">';
                if( $meta_box_value ) {
                    echo '<img src="'._get_thumb_url($meta_box_value, '150x100').'">';
                }
                else{
                    echo $meta_box['title'];
                }
            echo '</a>';
            echo '<a href="javascript:;" class="tbcus-remove" '.(!$meta_box_value?'style="display:none"':sprintf('onclick="tb_upload_remove(\'#set-%1$s-thumbnail\')"', $meta_box['name'])).'>移除</a>';
            echo '<input type="hidden" value="'.$meta_box_value.'" name="'.$meta_box['name'].'">';
        echo '</div>';

        echo '<script>var mm_'.$meta_box['name'].' = new MediaModal({
            calling_selector : "#set-'.$meta_box['name'].'-thumbnail",
            cb : function(attachment){
                tb_upload_action("#set-'.$meta_box['name'].'-thumbnail", attachment.url)
            }
        });</script>';
        
    }
    echo '<input type="hidden" name="tb_uploads_noncename" id="tb_uploads_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}
function tb_uploads_save( $post_id ) {
    global $tb_uploads;
   
    if ( !wp_verify_nonce( isset($_POST['tb_uploads_noncename']) ? $_POST['tb_uploads_noncename'] : '', plugin_basename(__FILE__) ))
        return;
   
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                   
    foreach($tb_uploads as $meta_box) {
        $data = $_POST[$meta_box['name']];
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}





