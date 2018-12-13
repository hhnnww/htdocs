<?php $like = _get_post_like_data() ?>

<section class="container">
    <div class="content-wrap">
    	<div class="content">

    		<?php while (have_posts()) : the_post(); ?>

    		<header class="article-header">
    			<h1 class="article-title"><?php the_title(); ?></h1>
    			<ul class="article-meta">
                    <li class="meta-time"><?php echo get_the_time('Y-m-d') ?></li>
                    <?php $name = _get_post_showname(); if($name): ?>
                        <li class="meta-name"><i class="fa">&#xe60e;</i> <?php echo $name ?></li>
                    <?php endif; ?>
                    <?php $price = _get_post_price(); if($price): ?>
                        <li class="meta-price"><i class="fa">&#xe69d;</i> 旅行总花费：<dfn><?php echo $price ?></dfn> RMB/人</li>
                    <?php endif; ?>
                    <li class="meta-likes"><i class="fa">&#xe86f;</i> <span><?php echo $like->count; ?></span>人喜欢</li>
                    <li class="meta-views"><i class="fa">&#xe602;</i> 阅读 <?php echo _get_post_views(); ?></li>
    			</ul>
    		</header>

    		<article class="article-content">
    			<?php the_content(); ?>
            </article>

            <div class="article-like">
            	<a href="javascript:;" class="btn btn-default" etap="like" data-pid="<?php echo get_the_ID() ?>"><i class="fa">&#xe86f;</i> <span><?php echo $like->count; ?></span>人喜欢</a>
            </div>

    		<?php endwhile;  ?>
			
			<div class="article-share">
                <div class="bshare-custom"><span>分享到：</span><a title="分享到Facebook" class="bshare-facebook"></a><a title="分享到Twitter" class="bshare-twitter"></a><a title="分享到LinkedIn" class="bshare-linkedin"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到电子邮件" class="bshare-email"></a><!-- <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a> --></div><script type="text/javascript" charset="utf-8" src="//static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="//static.bshare.cn/b/bshareC0.js"></script>
            </div>

            <nav class="article-nav">
                <span class="article-nav-prev"><?php previous_post_link('上一条<br>%link','%title',true); ?></span>
                <span class="article-nav-next"><?php next_post_link('下一条<br>%link','%title',true); ?></span>
            </nav>

    	</div>
    </div>
	<?php get_sidebar(); ?>
</section>