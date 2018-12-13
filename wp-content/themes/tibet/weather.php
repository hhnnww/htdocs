<?php 
/**
 * Template name: 天气
 */

/*if( !is_super_admin() ){
	include '404.php';
	exit;
}
*/

/**
 * 西藏所有天气城市
 * @var array
 */
$tq_citys = array(
	'lasa'          => '拉薩',
	'dangxiong'     => '當雄',
	'nimu'          => '尼木',
	'linzhou'       => '林周',
	'duilongdeqing' => '堆龍德慶',
	'qushui'        => '曲水',
	'dazi'          => '達孜',
	'mozhugongka'   => '墨竹工卡',
	'chengguan'     => '城關',
	'rikaze'        => '日喀則',
	'lazi'          => '拉孜',
	'nanmulin'      => '南木林',
	'nielamu'       => '聶拉木',
	'dingri'        => '定日',
	'jiangzi'       => '江孜',
	'zhongba'       => '仲巴',
	'saga'          => '薩嘎',
	'jilong'        => '吉隆',
	'angren'        => '昂仁',
	'dingjie'       => '定結',
	'sajia'         => '薩迦',
	'xietongmen'    => '謝通門',
	'sangzhuzi'     => '桑珠孜',
	'gangba'        => '崗巴',
	'bailang'       => '白朗',
	'yadong'        => '亞東',
	'kangma'        => '康馬',
	'renbu'         => '仁布',
	'shannan'       => '山南',
	'gongga'        => '貢嘎',
	'zhanan'        => '扎囊',
	'jiacha'        => '加查',
	'langkazi'      => '浪卡子',
	'cuona'         => '錯那',
	'longzi'        => '隆子',
	'naidong'       => '乃東',
	'sangri'        => '桑日',
	'luozha'        => '洛扎',
	'cuomei'        => '措美',
	'qiongjie'      => '瓊結',
	'qusong'        => '曲松',
	'linzhi'        => '林芝',
	'bomi'          => '波密',
	'milin'         => '米林',
	'chayu'         => '察隅',
	'gongbujiangda' => '工布江達',
	'langxian'      => '朗縣',
	'motuo'         => '墨脫',
	'bayi'          => '巴宜',
	'changdu'       => '昌都',
	'dingqing'      => '丁青',
	'bianba'        => '邊壩',
	'luolong'       => '洛隆',
	'zuogong'       => '左貢',
	'mangkang'      => '芒康',
	'leiwuqi'       => '類烏齊',
	'basu'          => '八宿',
	'jiangda'       => '江達',
	'chaya'         => '察雅',
	'gongjue'       => '貢覺',
	'karuo'         => '卡若',
	'naqu'          => '那曲',
	'nima'          => '尼瑪',
	'jiali'         => '嘉黎',
	'bange'         => '班戈',
	'anduo'         => '安多',
	'suoxian'       => '索縣',
	'nierong'       => '聶榮',
	'baqing'        => '巴青',
	'biru'          => '比如',
	'shuanghu'      => '雙湖',
	'shenzha'       => '申扎',
	'ali'           => '阿里',
	'gaize'         => '改則',
	'pulan'         => '普蘭',
	'zhada'         => '札達',
	'gaer'          => '噶爾',
	'ritu'          => '日土',
	'geji'          => '革吉',
	'cuoqin'        => '措勤',
);

$large_citys = array(
	'lasa'    => '拉薩',
	'rikaze'  => '日喀則',
	'linzhi'  => '林芝',
	'ali'     => '阿里',
	'shannan' => '山南',
	'changdu' => '昌都',
	'naqu'    => '那曲',
);

$jingdian_citys = array(
	'布達拉宫'    =>'chengguan',
	'珠峰'      =>'dingri',
	'雅鲁藏布大峡谷' =>'linzhi',
	'鲁朗林海'    =>'linzhi',
	'巴松措'     =>'gongbujiangda',
	'納木錯'     =>'dangxiong',
	'羊卓雍錯'    =>'langkazi',
	'紮什倫布寺'   =>'rikaze',
	'白居寺'     =>'jiangzi',
	'米堆冰川'    =>'bomi',
	'然烏湖'     =>'basu',
	'桑耶寺'     =>'shannan',
	'拉姆拉錯'    =>'jiacha',
	'冈仁波齐'    =>'ali',
	'古格王朝'    =>'ali',
);


global $wp_query;

$cityslug = '';
if(isset($wp_query->query_vars['location'])) {
	$cityslug = urldecode($wp_query->query_vars['location']);
}

if( $cityslug && !$tq_citys[$cityslug] ){
	include '404.php';
	exit;
}

$pname = $post->post_name;

if( $cityslug ){

	global $cityname;
	$cityname = $tq_citys[$cityslug];


	add_filter('set_my_title', 'weather_title');
	function weather_title($text) {
		global $cityname;
	    $text = "{$cityname}天氣預報 {$cityname}最佳旅遊季節 {$cityname}最佳旅遊時間 {$cityname}幾月份最好玩-西藏域龍旅行社網";
	    return $text;
	}

	add_filter('set_my_keywords', 'weather_keywords');
	function weather_keywords($text) {
		global $cityname;
	    $text = "{$cityname}天氣預報,{$cityname}最佳旅遊季節,{$cityname}最佳旅遊時間,{$cityname}幾月份最好玩";
	    return $text;
	}

	add_filter('set_my_description', 'weather_description');
	function weather_description($text) {
		global $cityname;
	    $text = "介紹{$cityname}天氣預報，說明{$cityname}最佳旅遊季節。{$cityname}地區是西藏四季變化最明顯的地區，文章介紹遊客到西藏旅遊{$cityname}最佳旅遊時間，也會給出建議{$cityname}幾月份最好玩。同時詳細瞭解西藏{$cityname}天氣及{$cityname}周邊各地區未來一周內的天氣變化，溫度，空氣品質，降水，風力，紫外線強度等";
	    return $text;
	}



	/**
	 * 通过API获取天气数据
	 * @var string
	 */
	$data = tq_requestByKey('', $cityname);
	$data = json_decode($data);
	$data = $data->HeWeather6[0];

	/**
	 * 数据获取失败
	 */
	if( 'ok' != $data->status ){
	    return $content.'，数据调取有误';
	}


	// 7天数据
	$today = null;
	$html_daily = '';
	$weeks = array('今天','明天','后天');

	foreach ($data->daily_forecast as $key => $item) {
		if( !$key ){
			$today = $item;
		}
		if( $key>2 ){
			$weeks[] = '星期'._get_week($item->date);
		}

	    $html_daily .= '<li>';
	        $html_daily .= '<span class="-week">'. $weeks[$key] .'</span>';
	        $item->date = explode('-', $item->date);
	        $html_daily .= '<span class="-day">'. $item->date[1].'月'.$item->date[2] .'日</span>';

	        $html_daily .= '<span class="-condpic"><img src="'. get_template_directory_uri() .'/img/weather/'.$item->cond_code_d.'.png"></span>';
	        $html_daily .= '<span class="-condtxt">'. $item->cond_txt_d .'</span>';
	        $html_daily .= '<span class="-tmp">'. $item->tmp_max .'~'.$item->tmp_min.' ℃</span>';

	        $html_daily .= '<span class="-wind">'. ($item->wind_dir=='无持续风向'?'':$item->wind_dir.' '). ($item->wind_sc=='微风'?$item->wind_sc:$item->wind_sc.'级') .'</span>';
	        // $html_daily .= '<span class="-uv">紫外线强度 '. $item->uv_index.'</span>';

	    $html_daily .= '</li>';
	}

}

get_header();
?>

<section class="container weather-container">
	<div class="content-wrap">
		<div class="content">
			<?php if( $cityslug ){ ?>
				<div class="weather-hd">
					<img src="<?php echo get_template_directory_uri() .'/img/weather/'.$data->now->cond_code.'.png' ?>">
					<h1><?php echo $cityname ?>天氣預報7天</h1>
					<h2><?php echo $cityname ?>今日天氣：<?php echo $today->cond_txt_d ?>，氣溫：<?php echo $today->tmp_max ?>℃~<?php echo $today->tmp_min ?> ℃，<?php echo $item->wind_dir . ' ' . $item->wind_sc ?>级，當前溫度：<?php echo $data->now->tmp ?>℃。</h2>
				</div>
				<div class="weather-daily">
					<ul>
						<?php echo $html_daily ?>
					</ul>
				</div>
				<div class="weather-lists">
					<header class="title-base">
						<h3><?php echo $cityname ?>旅遊攻略</h3>
						<div class="links"><a class="on" href="https://www.xizanglvyou.org/gonglue/xinxi">旅遊資訊</a><a href="https://www.xizanglvyou.org/gonglue/wenda">西藏問答</a><a href="https://www.xizanglvyou.org/gonglue/jiudian">西藏酒店</a></div>
					</header>
					<ul>
						<?php 
							$nums = 16;
							$out_ids = array();
							$args = array(
								'ignore_sticky_posts' => 1,
								'posts_per_page'      => $nums,
								'category__in'        => array(9,20,50,12,11),
								's'                   => $cityname,
							);
							query_posts($args);
					        while ( have_posts() ) : the_post();
					        	$out_ids[] = get_the_ID();
								echo '<li><a target="_blank" href="'.get_permalink().'" title="'.get_the_title()._get_delimiter().get_bloginfo('name').'">'.get_the_title().'</a></li>';
							endwhile; 
				        	wp_reset_query();

				        	if( count($out_ids)<$nums ){
					        	$args = array(
									'ignore_sticky_posts' => 1,
									'posts_per_page'      => $nums-count($out_ids),
									'category__in'        => array(9,20,50,12,11),
									'post__not_in'      => $out_ids,
								);
								query_posts($args);
						        while ( have_posts() ) : the_post();
									echo '<li><a target="_blank" href="'.get_permalink().'" title="'.get_the_title()._get_delimiter().get_bloginfo('name').'">'.get_the_title().'</a></li>';
								endwhile; 
					        	wp_reset_query();
				        	}
				        ?>
					</ul>
				</div>
				
				<div class="weather-citys">
					<header class="title-base">
						<h3>西藏主要旅遊景點天氣預報</h3>
					</header>
					<ul>
						<?php 
							foreach ($jingdian_citys as $key => $value) {
								echo '<li><a href="/'.$pname.'/'.$value.'">'.$key.'天氣預報7天</a></li>';
							} 
						?>
					</ul>
				</div>

				<div class="weather-citys">
					<header class="title-base">
						<h3>西藏主要城市天氣預報</h3>
					</header>
					<ul>
						<?php 
							foreach ($large_citys as $key => $value) {
								echo '<li><a href="/'.$pname.'/'.$key.'">'.$value.'天氣預報7天</a></li>';
							} 
						?>
					</ul>
				</div>

			<?php }else{ ?>

				<div class="weather-citys">
					<header class="title-base">
						<h3>西藏主要旅遊景點天氣預報</h3>
					</header>
					<ul>
						<?php 
							foreach ($jingdian_citys as $key => $value) {
								echo '<li><a href="/'.$pname.'/'.$value.'">'.$key.'天氣預報7天</a></li>';
							} 
						?>
					</ul>
				</div>

				<?php 
					foreach ($tq_citys as $key => $value) {
						if( in_array($key, array('lasa', 'rikaze', 'shannan', 'linzhi', 'changdu', 'naqu')) ){
							if( $key != 'lasa' ){
								echo '</ul></div>';
							}
							echo '<div class="weather-citys"><header class="title-base"><h3>'.$value.'地區</h3></header><ul>';
						}
						echo '<li><a href="/'.$pname.'/'.$key.'">'.$value.'天氣預報7天</a></li>';
					} 
					echo '</ul></div>';
				?>
				
				<div class="weather-lists">
					<header class="title-base">
						<h3>西藏旅遊攻略</h3>
						<div class="links"><a class="on" href="https://www.xizanglvyou.org/gonglue/xinxi">旅遊資訊</a><a href="https://www.xizanglvyou.org/gonglue/wenda">西藏問答</a><a href="https://www.xizanglvyou.org/gonglue/jiudian">西藏酒店</a></div>
					</header>
					<ul>
						<?php 
							$nums = 16;
							$out_ids = array();
							$args = array(
								'ignore_sticky_posts' => 1,
								'posts_per_page'      => $nums,
								'category__in'        => array(9,20,50,12,11)
							);
							query_posts($args);
					        while ( have_posts() ) : the_post();
								echo '<li><a target="_blank" href="'.get_permalink().'" title="'.get_the_title()._get_delimiter().get_bloginfo('name').'">'.get_the_title().'</a></li>';
							endwhile; 
				        	wp_reset_query();
				        ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php get_sidebar() ?>
</section>

<?php get_footer();

function _get_week($date){
    $date_str=date('Y-m-d',strtotime($date));
    $arr=explode("-", $date_str);
    $year=$arr[0];
    $month=sprintf('%02d',$arr[1]);
    $day=sprintf('%02d',$arr[2]);
    $hour = $minute = $second = 0;   
    $strap = mktime($hour,$minute,$second,$month,$day,$year);
    $number_wk=date("w",$strap);
    $weekArr=array("日","一","二","三","四","五","六");
    return $weekArr[$number_wk];
}

