<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'tibet';
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'face' => 'yahei',
		'style' => 'normal',
		'color' => '#383121' );
		
	$typography_content = array(
		'size' => '13px',
		'face' => 'yahei',
		'style' => 'normal',
		'color' => '#000000' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	// $options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}



	$options_linkcats = array();
	$options_linkcats_obj = get_terms('link_category');
	foreach ( $options_linkcats_obj as $tag ) {
		$options_linkcats[$tag->term_id] = $tag->name;
	}

	// If using image radio buttons, define a directory path
	$adsdesc =  '可添加任意广告联盟代码或自定义代码';



	$qrcode = get_stylesheet_directory_uri() . '/img/qrcode.png';
	$logo = get_stylesheet_directory_uri() . '/img/logo.png';

	$options = array();












	
	$options[] = array(
		'name' => '基本',
		'type' => 'heading');

	$options[] = array(
		'name' => 'Logo 电脑端',
		'id' => 'logo_src',
		'desc' => 'Logo 最大高：40px；格式：png',
		'std' => get_stylesheet_directory_uri() . '/img/logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Logo 手机端',
		'id' => 'logo_src_m',
		'desc' => 'Logo 最大高：40px；格式：png',
		'std' => get_stylesheet_directory_uri() . '/img/logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Logo 网站底部',
		'id' => 'logo_src_b',
		'desc' => 'Logo 最大高：40px；格式：png',
		'std' => get_stylesheet_directory_uri() . '/img/logo-b.png',
		'type' => 'upload');

	$options[] = array(
		'name' => '客服电话',
		'id' => 'service_tel',
		'std' => '1398-9999-242',
		'type' => 'text');

	$options[] = array(
		'name' => '客服链接',
		'id' => 'service_link',
		'std' => home_url(),
		'type' => 'text');

	$options[] = array(
		'name' => '纯玩保证链接',
		'id' => 'wan_link',
		'std' => home_url(),
		'type' => 'text');

	$options[] = array(
		'name' => '担保交易链接',
		'id' => 'danbao_link',
		'std' => home_url(),
		'type' => 'text');


	$options[] = array(
		'name' => '定制旅行链接',
		'id' => 'customtour_link',
		'std' => home_url(),
		'type' => 'text');

	$options[] = array(
		'name' => '定制旅行 模块 图片',
		'id' => 'custom_bg_src',
		'desc' => '建议尺寸：1920*600',
		'std' => get_stylesheet_directory_uri() . '/img/banner-custom-default.jpg',
		'type' => 'upload');

	$options[] = array(
		'name' => '热门线路补位分类',
		'id' => 'list_tourline_add_cat',
		'std' => '',
		'desc' => '格式：分类ID之间用英文逗号隔开，如：6,21。分类ID在后台-文章-分类目录中可以获取',
		'type' => 'text');
	

	$options[] = array(
		'name' => '常见问题 链接分类',
		'id' => 'faqs_linkcat',
		'options' => $options_linkcats,
		'type' => 'select');

	$options[] = array(
		'name' => '合作网站 链接分类',
		'id' => 'sitelinks_linkcat',
		'options' => $options_linkcats,
		'type' => 'select');

	$options[] = array(
		'name' => '底部关于我们 链接分类',
		'id' => 'aboutlinks_linkcat',
		'options' => $options_linkcats,
		'type' => 'select');

	$options[] = array(
		'name' => '底部联系方式',
		'id' => 'bom_contact',
		'std' => '客服：0891-6821001   13989999242（同微信） 王先生
传真：0891-6846868
地址：西藏自治区北京西路40号人保基地6-2号',
		'settings' => array(
			'rows' => 3
		),
		'type' => 'textarea');



	$options[] = array(
		'name' => '微信公众号 二维码',
		'id' => 'wechat_qrcode',
		'desc' => '',
		'std' => get_stylesheet_directory_uri() . '/img/qrcode.png',
		'type' => 'upload');

	/*$options[] = array(
		'name' => '网站整体变灰',
		'id' => 'site_gray',
		'type' => "checkbox",
		'std' => false,
		'desc' => '开启'.'（支持IE、Chrome，基本上覆盖了大部分用户，不会降低访问速度）');*/


	



	$options[] = array(
		'name' => 'SEO',
		'type' => 'heading');

	$options[] = array(
		'name' => '首页SEO关键字',
		'id' => 'home_keywords',
		'std' => '123,12345',
		'desc' => '用英文逗号隔开',
		'settings' => array(
			'rows' => 3
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => '首页SEO描述',
		'id' => 'home_description',
		'std' => '123 一个高端大气上档次的网站',
		'settings' => array(
			'rows' => 3
		),
		'type' => 'textarea');





	
	$options[] = array(
		'name' => '首页',
		'type' => 'heading');

	$options[] = array(
		'name' => '首图',
		'id' => 'home_focusbanner_1_src',
		'std' => get_stylesheet_directory_uri() . '/img/banner-home-default.jpg',
		'desc' => '尺寸：1920*500',
		'type' => 'upload');

	$options[] = array(
		'name' => '首图：标题',
		'id' => 'home_focusbanner_1_title',
		'std' => '域龙旅行，西藏最好的旅行管家',
		'type' => 'text');

	$options[] = array(
		'name' => '首图：描述',
		'id' => 'home_focusbanner_1_desc',
		'std' => '自2005年以来，始终做一件事情
为你私人订制一次难忘的西藏之旅',
		'settings' => array(
			'rows' => 2
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => '首图：按钮 文字',
		'id' => 'home_focusbanner_1_btntext',
		'std' => '立即定制',
		'type' => 'text');

	$options[] = array(
		'name' => '首图：按钮 链接',
		'id' => 'home_focusbanner_1_btnlink',
		'std' => home_url(),
		'type' => 'text');

	$options[] = array(
		'id' => 'home_focusbanner_1_btnlink_blank',
		'type' => "checkbox",
		'std' => false,
		'desc' => '新窗口打开');



	$options[] = array(
		'name' => '热门线路：标题',
		'id' => 'home_tourline_title',
		'std' => '热门线路',
		'type' => 'text');

	$options[] = array(
		'name' => '热门线路：标题右侧链接',
		'id' => 'home_tourline_more',
		'desc' => '一行一个链接，格式：海外华人线路 | '.home_url().' | on，其中on表示颜色高亮',
		'std' => '海外华人线路 | '.home_url().' | on
更多推荐线路 &raquo; | '.home_url(),
		'settings' => array(
			'rows' => 4
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => '热门线路：显示数量',
		'id' => 'home_tourline_count',
		'std' => '6',
		'options' => array(
			'3' => '3',
			'6' => '6',
			'9' => '9'
		),
		'type' => 'select');

	$options[] = array(
		'name' => '热门线路：文章分类',
		'id' => 'home_tourline_cat',
		'std' => '6,21',
		'desc' => '格式：分类ID之间用英文逗号隔开，如：6,21。分类ID在后台-文章-分类目录中可以获取，填写一级分类ID会自动调取其下所有子分类内容。',
		'type' => 'text');



	$options[] = array(
		'name' => '最新列表：标题',
		'id' => 'home_newslist_title',
		'std' => '西藏旅游攻略',
		'type' => 'text');

	$options[] = array(
		'name' => '最新列表：标题右侧链接',
		'id' => 'home_newslist_more',
		'desc' => '一行一个链接，格式：西藏酒店 | '.home_url().' | on，其中on表示颜色高亮',
		'std' => '西藏地图 | '.home_url().' | on
西藏问答 | '.home_url(),
		'settings' => array(
			'rows' => 4
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => '最新列表：文章分类',
		'id' => 'home_newslist_cat',
		'std' => '6,21',
		'desc' => '格式：分类ID之间用英文逗号隔开，如：6,21。分类ID在后台-文章-分类目录中可以获取，填写一级分类ID会自动调取其下所有子分类内容。',
		'type' => 'text');





	$options[] = array(
		'name' => '线路详情',
		'type' => 'heading');

	$options[] = array(
		'name' => '热门线路：标题',
		'id' => 'single_tourline_title',
		'std' => '热门线路',
		'type' => 'text');

	$options[] = array(
		'name' => '热门线路：标题右侧链接',
		'id' => 'single_tourline_more',
		'desc' => '一行一个链接，格式：海外华人线路 | '.home_url().' | on，其中on表示颜色高亮',
		'std' => '海外华人线路 | '.home_url().' | on
更多推荐线路 &raquo; | '.home_url(),
		'settings' => array(
			'rows' => 4
		),
		'type' => 'textarea');

	$options[] = array(
		'name' => '热门线路：显示数量',
		'id' => 'single_tourline_count',
		'std' => '6',
		'options' => array(
			'3' => '3',
			'6' => '6',
			'9' => '9'
		),
		'type' => 'select');

	$options[] = array(
		'name' => '热门线路：文章分类',
		'id' => 'single_tourline_cat',
		'std' => '6,21',
		'desc' => '格式：分类ID之间用英文逗号隔开，如：6,21。分类ID在后台-文章-分类目录中可以获取，填写一级分类ID会自动调取其下所有子分类内容。',
		'type' => 'text');



	$options[] = array(
		'name' => '预定须知',
		'id' => 'ordernotice',
		'desc' => '一行一条，每行前面不加编号',
		'settings' => array(
			'rows' => 10
		),
		'type' => 'textarea');









	
	/*$options[] = array(
		'name' => '文章详情',
		'type' => 'heading');*/




	$options[] = array(
		'name' => '页面详情',
		'type' => 'heading');


	$options[] = array(
		'name' => '焦点图 默认图片',
		'id' => 'page_focus_image',
		'std' => get_stylesheet_directory_uri() . '/img/banner-default.jpg',
		'desc' => '尺寸建议：1920x240px，如果页面中的焦点图地址为空将自动使用此图',
		'type' => 'upload');







/*



	$options[] = array(
		'name' => '广告位',
		'type' => 'heading' );

	$ads = array(
		'ad_list_header' => '列表头部 (宽度900px)',
		'ad_list_footer' => '列表底部 (宽度900px)',
		'ad_post_header' => '文章内容上 (宽度900px)',
		'ad_post_title' => '文章标题下 (宽度840px)',
		'ad_post_footer' => '文章内容下 (宽度900px)'
	);

	foreach ($ads as $key => $adtit) {
		$options[] = array(
			'name' => $adtit,
			'id' => $key.'_s',
			'std' => false,
			'desc' => '开启',
			'type' => 'checkbox');
		$options[] = array(
			'desc' => '非手机端'.' '.$adsdesc,
			'id' => $key,
			'std' => '',
			'settings'=>array('rows'=>6),
			'type' => 'textarea');
		$options[] = array(
			'id' => $key.'_m',
			'std' => '',
			'desc' => '手机端'.' '.$adsdesc,
			'settings'=>array('rows'=>6),
			'type' => 'textarea');
	}
*/











	
	$options[] = array(
		'name' => '自定义代码',
		'type' => 'heading' );

	$options[] = array(
		'name' => '自定义CSS样式',
		'desc' => '位于&lt;/head&gt;之前，直接写样式代码，不用添加&lt;style&gt;标签',
		'id' => 'csscode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => '自定义头部代码',
		'desc' => '位于&lt;/head&gt;之前，这部分代码是在主要内容显示之前加载，通常是CSS样式、自定义的<meta>标签、全站头部JS等需要提前加载的代码',
		'id' => 'headcode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => '自定义底部代码',
		'desc' => '位于&lt;/body&gt;之前，这部分代码是在主要内容加载完毕加载，通常是JS代码',
		'id' => 'footcode',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => '网站统计代码',
		'desc' => '位于底部，用于添加第三方流量数据统计代码，如：百度统计、CNZZ、51la，国内站点推荐使用百度统计，国外站点推荐使用Google analytics',
		'id' => 'trackcode',
		'std' => '',
		'type' => 'textarea');



		
	return $options;
}