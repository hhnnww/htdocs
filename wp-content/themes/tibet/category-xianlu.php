<?php 
get_header(); 

global $wp_query, $catdata, $huarenname, $pm_days;
$cat_id = get_query_var('cat');
$catdata = get_category($cat_id);
// print_r($catdata);

$catlink = get_category_link( $catdata->term_id );

$urlname = 'xianlu';
$huarenname = 'huaren';

$data_days = array(
	'0'     => '不限',
    '1'     => '1',
    '2'     => '2',
    '3'     => '3',
    '4'     => '4',
    '5'     => '5',
    '6'     => '6',
    '7'     => '7',
    '8'     => '8',
	'9'     => '9',
	'10' => '10',
	'11'    => '11',
    '12'    => '12',
    '13'    => '13',
);

$data_tese = array(
	'0'     => '不限',
	'/qgcf' => '全国出发',
	'/wbzx' => '外宾专线',
	'/czqz' => '川藏青藏',
	'/lszb' => '拉萨周边',
	'/lzsn' => '林芝山南',
	'/zfal' => '珠峰阿里',
	'/jdcx' => '经典长线',
);

$pm_days = '0';
if( isset($_GET['days']) && in_array($_GET['days'], array('1','2','3','4','5','6','7','8','9','10','12','13')) ){
	$pm_days = $_GET['days'];
}
// print_r($pm_days);

?>

<?php if( $catdata->slug!==$huarenname ){ ?>
<div class="leader-title leader-xianlu" style="background-image: url(<?php echo _get_cat_banner($catdata->term_id) ?>)">
    <div class="container">
        <h1>
            <?php echo $catdata->name ?>
        </h1>
    </div>
    <div class="tourline-filters">
        <dl>
            <dt><i class="fa">&#xe65a;</i>天数</dt>
            <dd>
                <?php 
						foreach ($data_days as $days => $name) {
							$url = $catlink;
							if( $days ) {
								$url = $catlink.'?days='.$days;
							}
							echo '<a'.($days==$pm_days?' class="active"':'').' href="'.$url.'">'.$name.'</a>';
						}
					?>
            </dd>
        </dl>
        <dl>
            <dt><i class="fa">&#xe61a;</i>特色</dt>
            <dd>
                <?php  
						foreach ($data_tese as $url => $name) {
							$addclass = '';
							if( !$url ) $url = '/'.$urlname;
							if($url === '/'.$catdata->slug) {
								$addclass = ' class="active"';
							}
							if( $url == '/'.$urlname ) $url = '';
							if( $pm_days ) $url .= '?days='.$pm_days;
							echo '<a'.$addclass.' href="'.home_url('/'.$urlname.$url).'">'.$name.'</a>';
						}
					?>
            </dd>
        </dl>
    </div>
</div>
<?php }else{ ?>
<div class="leader-title" style="background-image: url(<?php echo _get_cat_banner($catdata->term_id) ?>)">
    <div class="container">
        <h1>
            <?php echo $catdata->name ?>
        </h1>
        <h3>
            <?php echo $catdata->description ?>
        </h3>
    </div>
</div>
<?php } ?>

<section class="container">
    <div class="content-wrap">
        <div class="content">

            <?php if( $catdata->slug!==$huarenname ): ?>

            <div class="tourline-header">
                <h3>
                    <?php echo !$catdata->parent ? '热门推荐' : $catdata->name ?>
                </h3>
                <div class="tourline-filter-item tourline-filter-days">
                    <div class="tit">天数：<span><?php echo $data_days[$pm_days] ?></span><i class="fa">&#xe612;</i></div>
                    <div class="tourline-filter-options">
                        <ul>
                            <?php 
									foreach ($data_days as $days => $name) {
										$url = $catlink;
										if( $days ) {
											$url = $catlink.'?days='.$days;
										}
										echo '<li><a href="'.$url.'">'.$name.'</a></li>';
									}
								?>
                        </ul>
                    </div>
                </div>
                <div class="tourline-filter-item tourline-filter-features">
                    <div class="tit">特色：<span><?php echo !$catdata->parent ? $data_tese['0'] : $data_tese['/'.$catdata->slug] ?></span><i class="fa">&#xe612;</i></div>
                    <div class="tourline-filter-options">
                        <ul>
                            <?php  
									foreach ($data_tese as $url => $name) {
										if(!$url) $url = '';
										if( $pm_days ) $url .= '?days='.$pm_days;
										echo '<li><a href="'.home_url('/'.$urlname.$url).'">'.$name.'</a></li>';
									}
								?>
                        </ul>
                    </div>
                </div>
            </div>

            <?php endif; ?>


            <?php $_ids = array(); ?>
            <div class="tourlines">
                <?php 
			    	$sticky_ids = _get_cat_sticky_ids();
			    	if( !$paged || $paged <= 1 ){
						if( !empty($sticky_ids) ) _queryposts_xianlu(array(
							'post__in'            => $sticky_ids,
							'posts_per_page'      => 9,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						));

				        $counts = get_option('posts_per_page') - count($sticky_ids);
						_queryposts_xianlu(array(
							'post__not_in'        => $sticky_ids,
							'posts_per_page'      => $counts,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						), true);
			        }else{
			        	$counts = get_option('posts_per_page')*($paged-1) - count($sticky_ids);
						_queryposts_xianlu(array(
							'post__not_in'        => $sticky_ids,
							'offset'              => $counts,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						), true);
			        }

			        function _queryposts_xianlu($args, $paging=false){
			        	global $catdata, $huarenname, $pm_days;
			        	if( $catdata->slug!==$huarenname && $pm_days ){
							$args['meta_query'] = array(  
						        array(  
						            'key' => 'item_days',  
						            'value' => explode('-', $pm_days)
						        ) 
							);
						}

			        	query_posts($args);

				        while ( have_posts() ) : the_post();

				        	// $_ids[] = get_the_ID();

				            echo '<article class="tourline">';
				                echo '<a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail('thumb', get_the_title()).'<span class="type">'.get_post_meta(get_the_ID(), 'item_type', true).'</span></a>';
				                echo '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				                echo '<div class="desc">'. _get_excerpt(80, '...') .'</div>';
				                echo '<i class="fa mark mark-hot">&#xe63c;</i>';
				                echo '<footer>';
				                    echo '<span class="order">已有<strong>'.(int)get_post_meta(get_the_ID(), 'item_saled', true).'</strong>人购买</span>';
				                    echo '<span class="price"><dfn>'.get_post_meta(get_the_ID(), 'item_price', true).'</dfn>/人起</span>';
				                echo '</footer>';
				            echo '</article>';

				        endwhile; 
				        wp_reset_query();
				        if( $paging ) _paging();
				    }
			    ?>
            </div>

            <?php 
				/*
				// 补位
				$perpage = get_option('posts_per_page'); 
				$_num = count($_ids);
				if( $_num<$perpage && !in_array($catdata->slug, array($urlname, $huarenname, 'remen')) && _hui('list_tourline_add_cat') ){ 
			?>
            <div class="tourline-header">
                <h3>热门线路</h3>
            </div>
            <div class="tourlines">
                <?php 
				    	$args = array(
							'posts_per_page' => $perpage-$_num,
							'post__not_in'   => $_ids,
							'cat'            => trim(_hui('list_tourline_add_cat'))
						);

						query_posts($args);
				        while ( have_posts() ) : the_post();

				            echo '<article class="tourline">';
				                echo '<a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail('thumb', get_the_title()).'<span class="type">'.get_post_meta(get_the_ID(), 'item_type', true).'</span></a>';
				                echo '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				                echo '<div class="desc">'. _get_excerpt(80, '...') .'</div>';
				                echo '<i class="fa mark mark-hot">&#xe63c;</i>';
				                echo '<footer>';
				                    echo '<span class="order">已有<strong>'.(int)get_post_meta(get_the_ID(), 'item_saled', true).'</strong>人购买</span>';
				                    echo '<span class="price"><dfn>'.(int)get_post_meta(get_the_ID(), 'item_price', true).'</dfn>/人起</span>';
				                echo '</footer>';
				            echo '</article>';

				        endwhile; 

				        wp_reset_query();
				    ?>
            </div>
            <?php } */ ?>

        </div>
    </div>
    <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
