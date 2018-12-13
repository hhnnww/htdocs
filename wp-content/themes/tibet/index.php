<?php get_header(); ?>



<div class="focusbox">
    <img class="pic" src="https://www.inxizang.com/wp-content/uploads/2018/03/c4ca4238a0b9238-12.jpg" alt="<?php echo _hui('home_focusbanner_1_title') ?>">
    <div class="inner-wrap">
        <div class="inner">
            <h2>
                <?php echo _hui('home_focusbanner_1_title') ?>
            </h2>
            <p>
                <?php echo str_replace("\n", '<br>', _hui('home_focusbanner_1_desc')) ?></p>
            <?php if( _hui('home_focusbanner_1_btntext') ){ ?>
            <div class="actions">
                <a class="btn btn-default" <?php echo _hui( 'home_focusbanner_1_btnlink_blank')? ' target="_blank"': '' ?> href="<?php echo _hui('home_focusbanner_1_btnlink') ?>"><?php echo _hui('home_focusbanner_1_btntext') ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="ix-md">
    <div class="container">
        <div class="content-wrap">
            <li>
                <i></i>
                <h1>西藏本土旅行大社</h1>
                <p>西藏域龙国际旅行社，每年累计接待游客超30万人次。</p>
            </li>
            <li>
                <i></i>
                <h1>99.9% 好评率，深得客户口碑。</h1>
                <p>18年来坚持提供优质旅游服务，服务好每一位游客是我们与生俱来的使命。</p>
            </li>
            <li>
                <i></i>
                <h1>18年行业服务经验。</h1>
                <p>18年行业服务经验，在西藏本土旅游价格优，服务标准高。</p>
            </li>
        </div>
    </div>
</div>

<section class="container">

    <div class="content-wrap h-box">
        <header class="title-base">
            <h3>全国出发<small>包含往返西藏大交通 卧去飞回</small></h3>
            <div class="more"><a target="_blank" href="https://www.inxizang.com/xianlu/qgcf">查看更多</a></div>
        </header>
        <div class="line">
            <div class="row-c row-c-line">
                <?php home_cp_list('1771');?>
                <?php home_cp_list('1745');?>
                <?php home_cp_list('1759');?>
                <?php home_cp_list('1724');?>
            </div>
        </div>
    </div>

    <div class="content-wrap h-box">
        <header class="title-base">
            <h3>当季热卖<small>性价比产品 现在预订更优惠</small></h3>
            <div class="more"><a target="_blank" href="https://www.inxizang.com/xianlu/qgcf">查看更多</a></div>
        </header>
        <div class="line">
            <div class="row-c row-c-line">
                <?php home_cp_list('1490');?>
                <?php home_cp_list('1829');?>
                <?php home_cp_list('1888');?>
                <?php home_cp_list('1789');?>
            </div>
        </div>
    </div>



    <a href="https://www.inxizang.com/zuche" target="_blank"><img class="h-img" src="https://www.inxizang.com/wp-content/uploads/2018/04/1b1cfefcf4b4571.jpg" /></a>

    <div class="content-wrap h-box">
        <header class="title-base">
            <h3>拉萨发团<small></small></h3>
            <div class="more"><a target="_blank" href="https://www.inxizang.com/xianlu/jdcx">查看更多</a></div>
        </header>
        <div class="line">
            <div class="row-s">
                <div class="row-s-item">
                    <h1>西藏旅游问答</h1>
                    <?php home_cp_wd('25','8');?>
                </div>
                <div class="row-s-item">
                    <h1>西藏旅游攻略</h1>
                    <?php home_cp_wd('22','8');?>
                </div>
            </div>
            <div class="row-c">
                <?php home_cp_list('1829');?>
                <?php home_cp_list('1490');?>
                <?php home_cp_list('406');?>
                <?php home_cp_list('383');?>
                <?php home_cp_list('358');?>
                <?php home_cp_list('243');?>
            </div>
        </div>
    </div>

    <a href="https://www.inxizang.com/waibinruzanghan" target="_blank"><img class="h-img" src="https://www.inxizang.com/wp-content/uploads/2018/03/c81e728d9d4c2f6-5.jpg" /></a>

    <div class="content-wrap h-box">
        <header class="title-base">
            <h3>外宾专线<small>快速办理外国人、台湾人等入藏函。</small></h3>
            <div class="more"><a target="_blank" href="https://www.inxizang.com/xianlu/wbzx">查看更多</a></div>
        </header>
        <div class="line">
            <div class="row-s">
                <a href="https://www.inxizang.com/rzh"><img src="https://www.inxizang.com/wp-content/uploads/2018/03/94f6d7e04a4d452.jpg" /></a>
            </div>
            <div class="row-c">
                <?php home_cp_list('1630');?>
                <?php home_cp_list('1654');?>
                <?php home_cp_list('1352');?>
                <?php home_cp_list('1505');?>
                <?php home_cp_list('1693');?>
                <?php home_cp_list('1451');?>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="content">
            <header class="title-base">
                <h3>
                    <?php echo _hui('home_newslist_title', '西藏旅游攻略') ?>
                </h3>
                <div class="links">
                    <?php echo _get_linkmore('home_newslist_more'); ?>
                </div>
            </header>

            <div class="excerpts">
                <?php 
					if( _hui('home_newslist_cat') ){
						$cat_id = trim(_hui('home_newslist_cat'));
					}else{
						$cat_id = 0;
					}

					$sticky_ids = _get_cat_sticky_ids($cat_id);
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
				    }
			    ?>
            </div>
            <?php _paging(); ?>
            <?php wp_reset_query(); ?>

        </div>
    </div>
    <?php get_sidebar() ?>
</section>

<?php get_footer(); ?>
