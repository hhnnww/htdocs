<?php 

get_header(); 

global $wp_query;
$cat_id = get_query_var('cat');
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

				                echo '<a class="thumbnail" href="'.get_permalink().'">'._get_post_thumbnail('thumb', get_the_title()).'<span class="type">'.get_post_meta(get_the_ID(), 'item_type', true).'</span></a>';
				                echo '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				                echo '<div class="desc">'. _get_excerpt(80, '...') .'</div>';
				                echo '<footer>';
				                	echo '<time>'.get_the_time('Y-m-d').'</time>';
				                	$name = get_post_meta(get_the_ID(), 'showname', true);
				                    if( $name ) {
				                    	echo '<span class="author"><i class="fa">&#xe60e;</i>'.$name.'</span>';
				                    }
				                    echo '<span class="views"><i class="fa">&#xe602;</i>'.(int)get_post_meta(get_the_ID(), 'views', true).'</span>';
				                    echo '<span class="price"><dfn>'.(int)get_post_meta(get_the_ID(), 'item_price', true).'</dfn>RMB/人</span>';
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