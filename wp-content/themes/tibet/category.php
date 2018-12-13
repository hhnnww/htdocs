<?php 

// 线路
global $wp_query;
$cat_id = get_query_var('cat');

$cat_root = _get_cat_root($cat_id);

if( $cat_root->slug == 'xianlu' ){
	get_template_part( 'category', 'xianlu' );
	exit;
}


// 文章
get_header(); 

$catdata = get_category($cat_id);

?>

<div class="leader-title" style="background-image: url(<?php echo _get_cat_banner($catdata->term_id) ?>)">
	<div class="container">
		<h1><?php echo $catdata->name ?></h1>
		<h3><?php echo $catdata->description ?></h3>
	</div>
</div>

<section class="container">
	<div class="content-wrap">
		<div class="content">

			<?php  
				/*$current_user = wp_get_current_user(); if ( 'haozi' == $current_user->user_login ) {  */
				if( $cat_root->slug == 'gonglue' ){ 
					$glnavs = array(
						9 => array('全部', '/gonglue'),
						20 => array('旅游攻略', '/gonglue/xinxi'),
						50 => array('旅游新闻', '/gonglue/news'),
						12 => array('西藏问答', '/gonglue/wenda'),
						11 => array('西藏酒店', '/gonglue/jiudian')
					); 
			?>
				<div class="gl-navs">
					<ul>
						<?php foreach ($glnavs as $key => $value) { echo '<li'.($key==$cat_id?' class="active"':'').'><a href="'.$value[1].'">'.$value[0].'</a></li>'; } ?>
					</ul>
				</div>
			<?php 
				}
			?> 
			
			<div class="excerpts">
			    <?php 
				    $sticky_ids = _get_cat_sticky_ids();
			    	if( !$paged || $paged <= 1 ){
						if( !empty($sticky_ids) ) _queryposts(array(
							'post__in'            => $sticky_ids,
							'posts_per_page'      => 9,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						));

				        $counts = get_option('posts_per_page') - count($sticky_ids);
						_queryposts(array(
							'post__not_in'        => $sticky_ids,
							'posts_per_page'      => $counts,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						));
			        }else{
			        	$counts = get_option('posts_per_page')*($paged-1) - count($sticky_ids);
						_queryposts(array(
							'post__not_in'        => $sticky_ids,
							'offset'              => $counts,
							'cat'                 => $cat_id,
							'ignore_sticky_posts' => 1
						));
			        }

			        function _queryposts($args){
			        	query_posts($args);
				        while ( have_posts() ) : the_post();
				            echo '<article class="excerpt-item">';
				                echo '<a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail('thumb', get_the_title()).'</a>';
				                echo '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				                echo '<div class="desc">'. _get_excerpt(80, '...') .'</div>';
				                echo '<footer>';
				                	echo '<time>'.get_the_time('Y-m-d').'</time>';
				                	$name = get_post_meta(get_the_ID(), 'showname', true);
				                    if( $name ) {
				                    	echo '<span class="author"><i class="fa">&#xe60e;</i>'.$name.'</span>';
				                    }
				                    echo '<span class="views"><i class="fa">&#xe602;</i>'.(int)get_post_meta(get_the_ID(), 'views', true).'</span>';
				                    echo '<a class="likes" href="javascript:;" etap="like" data-pid="'.get_the_ID().'"><i class="fa">&#xe86f;</i><span>'.(int)get_post_meta(get_the_ID(), 'likes', true).'</span>人喜欢</a>';
				                echo '</footer>';
				            echo '</article>';
				        endwhile; 
				        wp_reset_query();
			        }
					
			    ?>
			</div>
			<?php _paging(); ?>

		</div>
	</div>
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>