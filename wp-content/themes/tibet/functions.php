<?php

    function home_cp_list($id){;?>
		<?php $the_query = new WP_Query(array( 'post__in' => array($id),'ignore_sticky_posts' => 1,'orderby' => 'none')); ?>
    	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        	<li>
        		<a href="<?php the_permalink();?>" target="_blank">
        		<span class="home-cp-type"><?php echo get_post_meta(get_the_ID(), 'item_type', true);?></span>
        		<div class="home-cp-pic"><img src="<?php the_post_thumbnail_url('thumb_md');?>" /></div>
        		<div class="home-cp-title"><?php the_title(); ?></div>
        		<div class="home-cp-info">
        			<div class="home-cp-info-jg"><span>¥ <?php echo get_post_meta(get_the_id(),'item_price',true);?></span> /人</div>
        			<div class="home-cp-info-xs">已有<span><?php echo get_post_meta(get_the_id(),'item_saled',true);?></span>购买</div>
        		</div>
                </a>
        	</li>
    	<?php endwhile; ?>
    	<?php wp_reset_postdata();
	 }

	 function home_cp_wd($cate_id,$post_num){;?>
	 	<?php $the_query2 = new WP_Query(array('cat' => $cate_id,'posts_per_page' => $post_num));?>
	 	<ul>
	 	<?php while ($the_query2->have_posts()):$the_query2->the_post();?>
	 		<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
	 	<?php endwhile;?>
            <li class="more"><a href="">查看更多</a></li>
	 	</ul>
	 	<?php wp_reset_postdata();
	 }

// Require theme functions
require get_stylesheet_directory() . '/functions-theme.php';

// Customize your functions
// add_filter( 'show_admin_bar', '__return_false' );

