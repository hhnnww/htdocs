<?php if( !is_page_template('custom.php') ): ?>
<section class="customtrip" style="background-image: url(http://ot2yj3uh9.bkt.clouddn.com/c81e728d9d4c2f6-7.jpg?imageView2/0/q/60)">
    <div class="container">
        <div class="customtrip-intro">
            <header>
                <h2>西藏订制旅行</h2>
                <h4>让西藏旅行更简单</h4>
            </header>
            <p class="item-01">自2005年起 <strong>十几年耕耘西藏旅游</strong></p>
            <p class="item-02">每年接待超过8万人次进藏旅游</p>
            <p class="item-03">好评率近100%</p>
        </div>
        <div class="customtrip-form">

            <form id="customform">
                <div class="item item-name"><label for="name">姓名</label><input name="name" type="text"></div>
                <div class="item item-days"><label for="days">天数</label><input type="text" name="days" id="customdays" readonly="readonly"></div>
                <div class="item item-phone"><label for="phone">手机</label><input name="phone" type="text"></div>
                <div class="item item-email"><label for="email">邮箱</label><input name="email" type="text"></div>
                <div class="item item-remark"><label for="remark">备注</label><textarea name="remark" rows="4"></textarea></div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default" data-form="#customform" etap="custom">立即提交</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="footer-faqs">
    <div class="container">
        <div class="inner">
            <h4>常见问题：</h4>
            <ul>
                <?php 
				wp_list_bookmarks(array(
					'category'         => _hui('faqs_linkcat'),
					'orderby'          => 'rating',
					'order'            => 'DESC',
					'show_description' => false,
					'between'          => '',
					'title_before'     => '<h4>',
					'title_after'      => '</h4>',
					'title_li'         => '',
					'categorize'       => 0,
					'category_before'  => '',
					'category_after'   => ''
				));
			?>
            </ul>
        </div>
    </div>
</div>
<div class="footer-sitelinks">
    <div class="container">
        <div class="inner">
            <h4>友情链接：</h4>
            <ul>
                <?php 
				wp_list_bookmarks(array(
					'category'         => _hui('sitelinks_linkcat'),
					'orderby'          => 'rating',
					'order'            => 'DESC',
					'show_description' => false,
					'between'          => '',
					'title_before'     => '<h4>',
					'title_after'      => '</h4>',
					'title_li'         => '',
					'categorize'       => 0,
					'category_before'  => '',
					'category_after'   => ''
				));
			?>
            </ul>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="brand">
            <img src="<?php echo _hui('logo_src_b') ?>">
        </div>
        <div class="inner">
            <ul class="aboutlinks">
                <?php 
					wp_list_bookmarks(array(
						'category'         => _hui('aboutlinks_linkcat'),
						'orderby'          => 'rating',
						'order'            => 'DESC',
						'show_description' => false,
						'between'          => '',
						'title_before'     => '<h4>',
						'title_after'      => '</h4>',
						'title_li'         => '',
						'categorize'       => 0,
						'category_before'  => '',
						'category_after'   => ''
					));
				?>
            </ul>
            <p>
                <?php echo str_replace("\n", '<br>', _hui('bom_contact')) ?></p>
        </div>
        <div class="wechat">
            <span class="tit"><i class="fa">&#xe623;</i>微信扫描二维码<br>关注我们</span>
            <img src="<?php echo _hui('wechat_qrcode') ?>">
        </div>
    </div>
</footer>
<div class="copyright">
    Copyright &copy;
    <?php echo date('Y'); ?> 西藏中国青年旅行社 版权所有 &nbsp; &nbsp; 经营许可证编号：L-XZ00003 &nbsp; &nbsp; 备案号：<a href="http://www.miitbeian.gov.cn/">藏ICP备16000189号-3</a> &nbsp; &nbsp;
    <?php echo _hui('trackcode') ?>
</div>

<?php 
	
	// 跟团游 团购日历配置
	$tourline_tuan = array();
	$tourline_price = 0;
	if( is_tourline() ){
		global $linedata;
		$tourline_price = isset($linedata['item_price']) ? trim($linedata['item_price']) : 0;
		
		if( isset($linedata['item_istuan']) && !empty($linedata['item_istuan']) ){
			$tuan = explode("\n", $linedata['item_tuan']); 
	        foreach ($tuan as $value) {
	        	$value = explode('=', $value);
	            $tourline_tuan[trim($value[0])] = trim($value[1]);
	        }
        }
        
	}

?>
<script>
    window.TIBET = {
        uri: '<?php echo get_stylesheet_directory_uri() ?>',
        tourline_price: <?php echo json_encode($tourline_price) ?>,
        tourline_tuan: <?php echo json_encode($tourline_tuan) ?>
    }

</script>
<?php wp_footer(); ?>
<?php if( _hui('footcode') ) echo _hui('footcode') ?>
</body>

</html>
