<?php  

$postid = get_the_ID();

$metas = "'item_price','item_saled','item_type','item_start','item_bourn','item_days','item_feature','item_route','item_outprice','item_istuan','item_tuan','item_inprice_che','item_inprice_zhu','item_inprice_can','item_inprice_piao','item_inprice_bao','item_image_1','item_image_2','item_image_3','item_image_4','item_image_5'";

// 打包获取meta
$db_linedata = $wpdb->get_results( "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = $postid AND meta_key IN({$metas})", ARRAY_A );


$metas = str_replace("'", '', $metas);
$metas = explode(',', $metas);

global $linedata;
$linedata = array();

foreach ($metas as $value) {
    $linedata[$value] = '';
}

foreach ($db_linedata as $key => $value) {
    $linedata[$value['meta_key']] = $value['meta_value'];
}
// var_dump($linedata);


$Parsedown = new Parsedown();
// echo $Parsedown->text('Hello _Parsedown_!');

?>

<section class="container">
    <div class="linedetail-side">
        <div class="linedetail-pics">
            <?php 
                $slide_imgs = '';
                $carousel_imgs = '';
                for ($i=1; $i < 6; $i++) { 
                    if( $linedata['item_image_'.$i] ){
                        $url = $linedata['item_image_'.$i];
                        $slide_imgs .= '<li><img src="'._get_thumb_url($url, '600x400').'"></li>';
                        $carousel_imgs .= '<li><img src="'._get_thumb_url($url, '150x100').'"></li>';
                    }
                }
            ?>
            <div class="linedetail-slider flexslider">
                <ul class="slides">
                    <?php echo $slide_imgs ?>
                </ul>
            </div>
            <div class="linedetail-carousel flexslider">
                <ul class="slides">
                    <?php echo $carousel_imgs ?>
                </ul>
            </div>
        </div>
        <?php if( !empty($linedata['item_istuan']) ): ?>
        <div class="linedetail-calendar"></div>
        <?php endif; ?>
    </div>
    <div class="linedetail-focus<?php echo !empty($linedata['item_istuan']) ? ' linedetail-focus-tuan':'' ?>">
        <header class="linedetail-title">
            <h1>
                <?php echo get_the_title() ?>
            </h1>
            <span class="type"><?php echo $linedata['item_type'] ?></span>
        </header>
        <div class="linedetail-price">
            <span class="price">产品价格：<dfn><?php echo $linedata['item_price'] ?></dfn>/人起</span>
            <span class="apply"><?php echo $linedata['item_saled'] ?>人报名</span>
        </div>

        <?php if( $linedata['item_feature'] ): ?>
        <div class="linedetail-intro">
            <ul>
                <?php 
                    $features = explode("\n", $linedata['item_feature']); 
                    foreach ($features as $key => $value) {
                        echo '<li><i class="fa">&#xe668;</i>'.$value.'</li>';
                    }
                ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="linedetail-desc">
            <dl>
                <dt><span class="t"><span>出发地</span></span>：</dt>
                <dd>
                    <?php echo $linedata['item_start'] ?>
                </dd>
            </dl>
            <dl>
                <dt><span class="t"><span>目的地</span></span>：</dt>
                <dd>
                    <?php echo $linedata['item_bourn'] ?>
                </dd>
            </dl>
            <dl>
                <dt>行程天数：</dt>
                <dd>
                    <?php echo $linedata['item_days'] ?>天</dd>
            </dl>
        </div>
        <div class="linedetail-action">
            <a href="https://ala.zoosnet.net/LR/Chatpre.aspx?id=ALA86109551&cid=1523322215516907927562&lng=cn&sid=1523840705716494339743&p=https%3A//www.inxizang.com/1942.html&rf1=https%3A//www.inxizang&rf2=.com/xianlu&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&msg=&d=1523855865392" target="_blank" class="btn btn-default">咨询客服</a>
            <a href="javascript:;" class="btn btn-order">在线预订</a>
        </div>
        <div class="linedetail-custom">
            <i class="fa">&#xe644;</i><a target="_blank" href="<?php echo _hui('customtour_link') ?>">西藏中青旅 · 定制旅行</a>不跟团不自助，让旅行更省心
        </div>
        <div class="linedetail-share">
            <div class="bshare-custom"><span>分享到：</span><a title="分享到Facebook" class="bshare-facebook"></a><a title="分享到Twitter" class="bshare-twitter"></a><a title="分享到LinkedIn" class="bshare-linkedin"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到电子邮件" class="bshare-email"></a>
                <!-- <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a> --></div>
            <script type="text/javascript" charset="utf-8" src="//static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
            <script type="text/javascript" charset="utf-8" src="//static.bshare.cn/b/bshareC0.js"></script>
        </div>
    </div>
</section>

<section class="container">
    <div class="content-wrap">
        <div class="content">

            <div class="linedetail-nav">
                <ul class="nav">
                    <li class="active"><a href="#feature">线路特色</a></li>
                    <li><a href="#routes">详细行程</a></li>
                    <li><a href="#cost">费用说明</a></li>
                    <li><a href="#notice">预订须知</a></li>
                </ul>
            </div>

            <div id="feature" class="article-content linedetail-article">
                <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

            <div class="huochepiao">
                <p>代订全国进藏火车票</p>
            </div>

            <div id="routes" class="linedetail-routes">
                <header class="linedetailtitle">
                    <h3><i class="fa">&#xe682;</i>详细行程</h3>
                </header>

                <div class="linedetail-routelist">
                    <div class="item">
                        <?php 
                        $r_content = do_shortcode( $Parsedown->text($linedata['item_route']) );
                        $r_content = str_replace("\n<h2>", '</div>'."\n".'<div class="item"><h2>', $r_content);
                        echo $r_content; 
                    ?>
                    </div>
                </div>
            </div>

            <div id="cost" class="linedetail-cost">
                <header class="linedetailtitle">
                    <h3><i class="fa">&#xe69d;</i>费用说明</h3>
                </header>

                <h4>费用包含：</h4>

                <?php if( $linedata['item_inprice_che']): ?>
                <dl><dt>用车：</dt>
                    <dd>
                        <?php echo $linedata['item_inprice_che'] ?>
                    </dd>
                </dl>
                <?php endif; ?>
                <?php if( $linedata['item_inprice_zhu']): ?>
                <dl><dt>住宿：</dt>
                    <dd>
                        <?php echo $linedata['item_inprice_zhu'] ?>
                    </dd>
                </dl>
                <?php endif; ?>
                <?php if( $linedata['item_inprice_can']): ?>
                <dl><dt>用餐：</dt>
                    <dd>
                        <?php echo $linedata['item_inprice_can'] ?>
                    </dd>
                </dl>
                <?php endif; ?>
                <?php if( $linedata['item_inprice_piao']): ?>
                <dl><dt>门票：</dt>
                    <dd>
                        <?php echo $linedata['item_inprice_piao'] ?>
                    </dd>
                </dl>
                <?php endif; ?>
                <?php if( $linedata['item_inprice_bao']): ?>
                <dl><dt>保险：</dt>
                    <dd>
                        <?php echo $linedata['item_inprice_bao'] ?>
                    </dd>
                </dl>
                <?php endif; ?>

                <?php if( $linedata['item_outprice']): ?>
                <h4 id="costout">费用不含：</h4>
                <ol>
                    <?php 
                        $outs = explode("\n", $linedata['item_outprice']); 
                        foreach ($outs as $key => $value) {
                            echo '<li>'.$value.'</li>';
                        }
                    ?>
                </ol>
                <?php endif; ?>
            </div>


            <div id="notice" class="linedetail-notice">
                <header class="linedetailtitle">
                    <h3><i class="fa">&#xe631;</i>预定须知</h3>
                </header>
                <ol>
                    <?php 
                        if( _hui('ordernotice') ){
                            $notices = explode("\n", _hui('ordernotice')); 
                            foreach ($notices as $key => $value) {
                                echo '<li>'.$value.'</li>';
                            }
                        }
                    ?>
                </ol>
            </div>


        </div>
    </div>
    <?php get_sidebar(); ?>
</section>

<div class="ordertour-mask"></div>
<div class="ordertour">
    <h3>在线预订</h3>
    <span class="ordertour-close"><i class="fa">&#xe7a2;</i></span>
    <div class="customtrip-form">
        <form id="orderform">
            <div class="item item-name"><label for="name">姓名</label><input name="name" type="text"></div>
            <div class="item item-days"><label for="days">天数</label><input type="text" name="days" id="orderdays" readonly="readonly"></div>
            <div class="item item-phone"><label for="phone">手机</label><input name="phone" type="text"></div>
            <div class="item item-email"><label for="email">邮箱</label><input name="email" type="text"></div>
            <div class="item item-remark"><label for="remark">备注</label><textarea name="remark" rows="4"></textarea></div>
            <div class="actions">
                <input type="hidden" name="order" value="<?php echo get_the_ID() ?>">
                <a href="javascript:;" class="btn btn-default" data-form="#orderform" etap="custom">立即提交</a>
            </div>
        </form>
    </div>
</div>
