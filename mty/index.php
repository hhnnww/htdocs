<!DOCTYPE html>
<html>

<?php
	$title = "我們是台灣人準備明年到西藏旅遊，有沒有西藏本地實力比較大的旅行社推薦，能快速辦理入藏函保障成功率的。";

	function author_box($name,$url,$address,$time,$yidong){
		echo '<div class="item-header">
					<div class="row">
						<div class="l"><img src="'.$url.'" /></div>
						<div class="r">
							<div class="name">'.$name.'</div>
							<div class="address">'.$address.'</div>
						</div>
					</div>
					<div class="time row">
						<img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdd44jjzkj302c00i3ya.jpg" /><span>'.$time.'周前點評</span>';
		if($yidong =='on'):
			echo '<img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdfx8yctxj300h00n0om.jpg" />通過移動設備發表';
		endif;
		echo '</div></div>';
	}

	function author_footer($name){
		echo '<div class="item-footer row-bt">
					<div class="ganxie row"><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdf5m916sj300k00g0p8.jpg" /><span>感謝 '.$name.'</span></div>
					<div class="qizi"><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdf9ho96dj300f00f0ka.jpg" /></div>
				</div>';
	}
	
	$xiaoshou = array(
		array('莹莹','13659507238','https://ws1.sinaimg.cn/large/006TtLCRgy1fxei6fxzfoj30g80frwg2.jpg','inxizang'),
    	array('媛媛','13658997238','https://ww1.sinaimg.cn/mw690/006TtLCRgy1fwdjuc1w0jj30by0bymxz.jpg','iyy9340'),
    	array('瑞雪','13658991528','https://wx3.sinaimg.cn/mw690/005S5CBngy1fu10jc4p7rj30by0bywfb.jpg','xizangyulongruixue'),
    	array('晓汐','13078875725','https://ww4.sinaimg.cn/mw690/005S5CBngy1fu4cp7z0j6j30iq0owacn.jpg','xiaoximeiyi2012'),
	);
	
	$myfile = fopen('count.txt','r');
	$x = fgets($myfile);
	fclose($myfile);
	
	$xs_mz  = $xiaoshou[$x][0];
	$xs_dh  = $xiaoshou[$x][1];
	$xs_ewm = $xiaoshou[$x][2];
	$xs_wx  = $xiaoshou[$x][3];
	
	$myfile = fopen('count.txt','w');
	$x = $x + 1;
	if($x>2){
		$x = 0;
	}
	fwrite($myfile,$x);
	fclose($myfile);
	
	$name = '<a href="javascript:;" onclick="tanchu()">'.$xs_mz.'</a>';
;?>

	<head lang="zh">
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
		<title>
			<?php echo $title;?>
		</title>
		<link href="style.css" rel="stylesheet">
		<script src="layer/layer.js"></script>
	</head>

	<body>
		<div class="header">
			<div class="container row-bt">
				<div class="row">
					<li>首頁</li>
					<li>酒店</li>
					<li>景點</li>
					<li>美食</li>
					<li class="on">問答</li>
				</div>
				<div class="search"><svg t="1542693697603" class="icon" style="width: 1.4em; height: 1.4em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3143" data-spm-anchor-id="a313x.7781069.0.i0"><path d="M450.540923 835.421849C238.095329 835.421849 65.258028 662.585911 65.258028 450.14713 65.258028 237.711074 238.095329 64.873772 450.540923 64.873772 662.986518 64.873772 835.830632 237.711074 835.830632 450.14713 835.830632 662.584548 662.986518 835.421849 450.540923 835.421849L450.540923 835.421849ZM450.540923 159.705847C290.384053 159.705847 160.09419 289.998435 160.09419 450.14713 160.09419 610.297187 290.384053 740.591138 450.540923 740.591138 610.696431 740.591138 740.99447 610.297187 740.99447 450.14713 740.99447 289.998435 610.696431 159.705847 450.540923 159.705847L450.540923 159.705847Z" p-id="3144" fill="#ffffff"></path><path d="M900.538167 958.477626C885.598531 958.477626 870.668434 952.777836 859.268854 941.387795L657.978933 740.112862C635.189312 717.323242 635.189312 680.372035 657.978933 657.576963 680.77673 634.794156 717.722486 634.794156 740.518919 657.576963L941.807478 858.851896C964.598462 881.641517 964.598462 918.592724 941.807478 941.386432 930.407899 952.777836 915.477801 958.477626 900.538167 958.477626" p-id="3145" fill="#ffffff"></path></svg></div>
			</div>
		</div>

		<div class="box box-ask">
			<div class="container">
				<div class="box-header">
					<div class="list">亞洲<img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxde69qzjmj300800a0l8.jpg" />中國<img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxde69qzjmj300800a0l8.jpg" />西藏</div>
					<h1>
						<?php echo $title;?>
					</h1>
				</div>
				<div class="box-meta row">
					<span class="row"><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdd44jjzkj302c00i3ya.jpg" /> 298個點評</span>
				</div>
				<div class="box-content">
					<p>我們是來自台灣的明年三四月份準備入藏旅遊的十人團，剛剛被通知入藏證下不來。沒有任何理由，現在也不知道該怎麼辦了。</p>
					<p>有沒有成功去過西藏旅遊的台灣人，給一點推薦和建議，確實不知道該怎麼辦了。</p>
					<p>希望能推薦一家靠譜的旅行社，能快速辦理入藏函和服務質量比較好的，主要是因為我們都是台灣人，據說台灣人辦理入藏函比較麻煩。加上這次辦理失敗，所以希望能推薦一家更有實力的旅行社。</p>
				</div>
				<div class="box-meta row">
					<span class="row"><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxdde13y3ij300o00k0pa.jpg" />收藏</span>
					<span class="row"><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxddheeumfj300o00j0o6.jpg" />分享</span>
				</div>
			</div>
		</div>

		<div class="box container box-an">
			<div class="box-header row-bt">
				<h1>點評<span>（298）</span></h1>
				<div class="btn">發表點評</div>
			</div>

			<div class="item">
				<?php author_box('呂妙珍','https://tva4.sinaimg.cn/crop.66.0.382.382.180/aa2cf053gw1edj1bcxse8j20e80aoq4f.jpg','台北','1','on');?>
				<div class="item-content">
					<p>這裡給你講一下我去西藏的事情吧，我是去年去的西藏，聯繫的西藏域龍旅行網幫助我們辦理的入藏函，一開始呢，和你們的心情也是一樣的。聽說入藏函很不容易辦理，並且自己定好機票之後，也會有入藏函辦理不出來，形成作廢的情況，購買好的機票再退票也會產生不小的損失。</p>
					<p>後來網上搜資料咨詢了好久，打聽到域龍旅行網的口碑還非常不錯。就聯係了他們的客服
						<?php echo $name;?><span>(可點擊直接添加联系<?php echo $xs_mz;?>)</span>。</p>
					<p>
						<?php echo $name;?>確實非常耐心，給我解答了很久，因為我比較在意入藏函是否能成功辦理下來的問題。
						<?php echo $name;?>也去咨詢了她的領導很久，後來給了我確定的答復。因為我們是從成都飛往西藏，順帶讓
						<?php echo $name;?>也幫我們購買了成都到拉薩的飛機票，全程服務都是
						<?php echo $name;?>幫我們安排的。</p>
					<p>到了出行的日期，我們抵達成都之後，
						<?php echo $name;?>的同事就開著車把入藏函送到我們酒店來了，受寵若驚，是直接送到酒店的哦。並且還囑咐了我們一些需要注意的事項。本想留著她的同事和我們一起吃個飯，但是她同事說還有入藏函要送達，也沒有吃成飯。</p>
					<p>拿到入藏函之後就順利入藏了，全程都很輕鬆，倒是沒有體會到網上說的那種很可怕的事情。入藏函辦理不下來，或者是辦理不成功總是延期這些。</p>
					<p><b>所以，一定要找一個靠譜的旅行社，這樣會很省事。</b></p>
					<p>因為當初聯繫域龍旅行網就是感覺他們網站規模很大，很正規，所以選擇了他們。出行之後發現我的選擇的確是正確的。他們的辦公室就在拉薩的布達拉宮旁邊，規模的確很大，聽他們講他們是專門做外賓和海外華人到西藏旅遊。所以全程都覺得很輕鬆，基本上沒有自己需要操心的事情。</p>
					<p>全程酒店和用車還有導遊，司機師傅服務態度都很好，並且像線路設計，酒店預訂還有車導遊都是
						<?php echo $name;?>幫我們安排的。</p>
					<p>並且每天都會提醒我們第二天要去哪裡，帶什麼東西。同行到納木錯的另外一輛車上，就是因為沒有提醒帶好厚衣服，到了納木錯凍的直哆嗦。聽聞我們是有人專門安排和提醒他們就更生氣了，直接投訴到了接待他們的銷售。所以要選擇一個專業的旅行社真的挺重要的。</p>
				</div>
				<?php author_footer('呂妙珍');?>

				<div class="item-replay">
					<?php author_box('小九九','https://tvax1.sinaimg.cn/crop.0.0.720.720.180/006TfGEGly8flolrh98uwj30k00k140n.jpg','台中','1','');?>
					<div class="item-replay-content">
						<p>可以告知一下你們辦理入藏函花了多長時間嗎？因為我們辦理了一個多月都沒有音訊，聽著急的。我們報名的旅行社雖然說如果辦理不成功可以退費，但是我們機票都已經買好了。無法出行的話，機票的損失他們又不給我們承擔，順便可以告知一下
							<?php echo $name;?>的微信二維碼嗎？我這邊加一下她。</p>
					</div>
					<div class="item-replay">
						<?php author_box('呂妙珍','https://tva4.sinaimg.cn/crop.66.0.382.382.180/aa2cf053gw1edj1bcxse8j20e80aoq4f.jpg','台北','1','on');?>
						<div class="item-replay-content">
							<p>我們當時找
								<?php echo $name;?>辦理的，好像只需要15天左右的時間就辦理下來了。並沒有你說的一個多月都辦理不下來的情況。如果是這種情況的話，還是推薦你找
								<?php echo $name;?>辦理吧。不然到時候無法出行，造成損失就確實不划算了。</p>
							<p>這裡貼出
								<?php echo $name;?>的微信號吧，有其他西藏旅遊的問題你也可以直接問她。必經她還是比我要轉業多了，並且人也非常好，很有耐心。</p>
							<p><img class="ewm" src="<?php echo $xs_ewm;?>" /></p>
						</div>
					</div>
				</div>

				<div class="item-replay">
					<?php author_box('王歡','http://tvax3.sinaimg.cn/crop.0.0.512.512.180/4a47f46cly8frlbq1mczzj20e80e8gm1.jpg','台中','1','on');?>
					<div class="item-content">
						<p>旅行社的話一定要選擇有實力的旅行社，因為辦理入藏證確實很麻煩。找
							<?php echo $name;?>辦理就很方便快捷。我們之前也是找
							<?php echo $name;?>辦理的，基本上很輕鬆。因為從網絡上看到說台灣人辦理入藏證很容易失敗什麼的。</p>
						<p>想不到
							<?php echo $name;?>辦理下來這麼快，並沒有網上說的那麼可怕。</p>
					</div>
				</div>

			</div>
			<!--item-->
		</div>
		<div class="box container">
			<div class="item">
				<?php author_box('青果小妮子','https://tvax1.sinaimg.cn/crop.0.0.512.512.180/005uKQHbly8fkyb6n8ys8j30e80e8aar.jpg','香港','2','on');?>
				<div class="item-content">
					<p>上個星期剛從西藏回來，我算是非常有發言權的了。超級迷戀西藏這個地方，前前後後一共去過三次了都。而且每一次去西藏的感受也不一樣，挺想就這樣一直待在拉薩，不過那是不可能的，我把我這三次去西藏的體驗分享給你吧：</p>
					<p><b>第一次失敗的旅行</b></p>
					<p>帶我爸媽去的，因為貪圖便宜，隨便網絡上找了個旅行社報了個比較便宜的團。到了拉薩開始走行程之後就後悔了，行程非常趕。並且隱形消費特別多，一開始旅行社的接待人員並沒有講。去了之後就說這個不包含，按個也不包含。並且一路司機都在催促我們，真的是便宜無好貨。</p>
					<p>最令人差勁的就是酒店了，雖然貪圖了便宜，但是酒店簡直就不是人住的地方。還好只去了林芝、拉薩、納木錯就返程了。因為沒有去過珠峰，所以就一直心心念念想著去珠峰一次。但是是絕對不會再找這種垃圾旅行社了。</p>
					<p>後來才了解到，我選擇的這個差勁的旅行社根本就不是西藏本地的旅行社。是內地的一個社，然後轉賣給西藏的旅行社。西藏旅行社接待我們因為並不是直接找他們報名，他們也無需考慮自己的口碑，對我們的服務質量所以就很差勁。同行的人呢告訴我們一定要找西藏本土的旅行社。在轉公賬的時候可以看到旅行社的名字，或者直接咨詢接待是否是西藏本土的旅行社。</p>
					<p><b>第二次成功的選擇了西藏域龍</b></p>
					<p>因為有了第一次沒有去成珠峰，並且加上旅行社的選擇的失敗經驗，第二次就在網上找了很久，也做了很多功課。接觸到了域龍旅行網，他們就是西藏的本土旅行社。也聯繫到了他們的在線客服
						<?php echo $name;?>。</p>
					<p>和
						<?php echo $name;?>聊了很久，她知道了我第一次的失敗經驗和顧慮之後。不厭其煩的給我做了一個非常詳細的清單，包含了所有價格的明細、和指定酒店的名稱房型。也告知了他們旅行社在拉薩辦公室的地址（據說他們旅行社非常大，在內地也有好幾個辦公室），就在布達拉宮的旁邊。整體上感覺非常專業和可靠，不過還是抱著將信將疑的態度選擇了他們。</p>
					<p>抵達拉薩之後果真沒有讓人失望，特別舒適的四星級酒店，熱情的哈達接機。這個是第一次來全部都沒有體驗到的。抵達酒店后就和我們簽訂了正規的旅遊合同。全程
						<?php echo $name;?>都非常細心的咨詢我們遊玩的情況，有沒有不滿意的地方，甚至連司機態度好不好都在問我們，如果有了什麼不滿意的可以第一時間給他們提。</p>
					<p>後來才知道，他們在海外華人、香港、台灣、澳門市場做華人西藏旅遊基本上是最大的。並且這一次旅行也是最滿意的，成功的看到了南迦巴瓦峰和珠峰。體驗了雪山的震撼，在雲霧之中，那種感覺是看多少照片都體會不到的。</p>
					<p><b>第三次：帶著爸媽來圓夢。</b></p>
					<p>第一次帶爸媽來西藏，因為旅行社沒有選擇好，讓爸媽也沒有玩開心。主要是和旅行社鬧了一點不愉快，旅行社的態度也非常差。導致第一次的旅行非常失敗，第二次選擇域龍回到香港后給爸媽講了第二次的旅行非常開心。爸媽又心癢癢了，想著再去體驗一次。</p>
					<p>於是正好這段時間有假期，帶著爸媽直接找西藏域龍報名了。依舊指定了
						<?php echo $name;?>接地我們，因為想帶著爸媽去珠峰。臨行去日喀則的時候，
						<?php echo $name;?>給我們偷偷的塞了好幾瓶氧氣，並且囑咐我如果我爸媽有啥不舒服的，就第一時間回來。要讓我們注意高反。</p>
					<P>這一點讓我爸媽也很暖心，到了珠峰大本營居然也沒什麼反應，下面貼一下我和我爸媽們在珠峰的照片吧。我媽55，我爸58，成功抵達珠峰大本營，也可以給後面想來的人一個參考。</P>
					<p><img src="https://ws1.sinaimg.cn/mw690/006TtLCRgy1fxejmc03qij30tz1a3aix.jpg" /></p>
					<p>因為大本營的風的確是太大了，爸媽抵達后就早早的進了帳篷也沒有來拍照。如果想看更多的照片，可以直接去看我的facebook哦。</p>
				</div>
				<?php author_footer('青果小妮子');?>
				<div class="item-replay">
					<?php author_box('大果子醬','https://tvax4.sinaimg.cn/crop.0.0.690.690.180/007r45OYly8fwtiw1avfsj30j60j6mxc.jpg','香港','2','off');?>
					<div class="item-replay-content">
						<p>真羨慕你可以去西藏啊，還能去三次，哎！我要是也能去一次就好了。</p>
					</div>
				</div>
				<div class="item-replay">
					<?php author_box('xqq','https://tvax4.sinaimg.cn/crop.1.0.747.747.180/c4c6b19fly8fj50srv2zmj20ku0krq3x.jpg','馬來西亞','2','off');?>
					<div class="item-replay-content">
						<p>我們最近也想去西藏玩，可以說一下你們去珠峰的具體行程嗎。還有大概花費，我也是帶著我媽過去玩，不過糾結究竟去不去珠峰，因為怕我爸媽身體承受不了。</p>
					</div>
					<div class="item-replay">
						<?php author_box('青果小妮子','https://tvax1.sinaimg.cn/crop.0.0.512.512.180/005uKQHbly8fkyb6n8ys8j30e80e8aar.jpg','香港','2','on');?>
						<div class="item-replay-content">
							<p>那我就大概說一下我們去西藏珠峰的具體行程吧，第三次帶我爸媽去是總共玩了12天，行程也是
								<?php echo $name;?>安排的。</p>
							<p>
								D1.抵達拉薩<br> D2.布达拉宫，大昭寺，八廓街，在拉薩市內
								<br> D3.罗布林卡、色拉寺，在拉薩市內
								<br> D4.巴松措、尼洋河、林芝，已經開始前往林芝了
								<br> D5.南迦巴瓦峰、魯朗林海
								<br> D6.卡定溝、卡定溝瀑布
								<br> D7.羊湖、卡若拉冰川
								<br> D8.珠峰大本營、絨布寺、看珠峰的星空，特別美
								<br> D9.早上看珠峰日出、日喀則
								<br> D10.納木錯、扎什倫布寺、晚上住納木錯景區酒店非常有特色
								<br> D11.納木錯、念情唐古拉
								<br> D12.返程
								<br>
							</p>
							<p>基本上就是這些，這個行程的日期較長，包含了基本上西藏的所有景點。之前和
								<?php echo $name;?>溝通的時候，了解到他們也有一個9天的行程。價格的話看國籍哦，台灣人要貴一些（貌似台灣人進藏非常麻煩），因為我麼是香港人，所以簡單一點，價格是8300一個人，全程酒店是掛牌三星準四星級酒店，非常nice。</p>
							<p>不過每個季節的報價和行程都有所不同，如果詳細的你可以直接加
								<?php echo $name;?>的微信了解一下哦。這裡是他的wechat：
								<?php echo $xs_wx;?>
							</p>
						</div>
						<div class="item-replay">
							<?php author_box('xqq','https://tvax4.sinaimg.cn/crop.1.0.747.747.180/c4c6b19fly8fj50srv2zmj20ku0krq3x.jpg','馬來西亞','2','off');?>
							<div class="item-replay-content">
								<p>謝謝你的詳細解答哦，我這就去加她的微信了解一下。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box container">

			<div class="item">
				<?php author_box('陶靜怡','https://tvax4.sinaimg.cn/crop.0.0.1125.1125.180/49282834ly8fvi8ifbnz4j20v90v9tau.jpg','台中','4','off');?>
				<div class="item-content">
					<p>畢業，是人生的轉折點，在此之前，我們受制於父母，沒有辦法來一場說走就走的旅行；從此以後，我們受困於現實，也許沒有長時間的空閒，也許沒有忙裡偷閒的心態，也許沒有志同道合的伙伴。寒窗苦讀數十載，我不需要一舉成名天下知，我要打賞我自己；這個世界荒誕又現實，在闖入成人世界前，我要無底線歡脫。沒去過西藏，有什麼故事好炫耀？在這里特別感謝一下
						<?php echo $name;?>，沒有她好的安排，我們就不會有這麼開心的一次旅行！</p>
					<p><img src="http://wx2.sinaimg.cn/mw690/005S5CBngy1fu10o44ifzj30m80et0wt.jpg" /></p>
					<p>因為是和我爸媽一起去，想玩的輕鬆一點。貼心的
						<?php echo $name;?>給我們安排了林芝一個排龍溫泉度假村的行程，像室外桃園一樣的地方，泡溫泉，住木屋別墅，晚上的露天電影，還有早上的徒步體驗。</p>
					<p>並且這個行程地方還是
						<?php echo $name;?>他們背後的團隊獨立策劃開發的，別家的都沒有，我們體驗過後真的很舒適。因為我們是很早的一批體驗的客人，溫泉啥的都是免費泡，挺謝謝
						<?php echo $name;?>的。</p>
				</div>
				<?php author_footer('陶靜怡');?>
				<div class="item-replay">
					<?php author_box('王雲吉','https://tvax3.sinaimg.cn/crop.0.0.996.996.180/6f82140fly8ff4g8p94glj20ro0ro40g.jpg','澳大利亞','4','off');?>
					<div class="item-replay-content">
						<p>可以貼一下你們當時去西藏的酒店照片嗎？因為從網上聽說西藏的條件都挺差的，不知道到底有多差哦。</p>
					</div>
					<div class="item-replay">
						<?php author_box('陶靜怡','https://tvax4.sinaimg.cn/crop.0.0.1125.1125.180/49282834ly8fvi8ifbnz4j20v90v9tau.jpg','台中','4','off');?>
						<div class="item-replay-content">
							<p>我們一開始定的是三星級酒店，感覺是差了點，並且
								<?php echo $name;?>一開始也講了。西藏的三星級酒店只能和其他地方的經濟連鎖酒店差不多。</p>
							<p>不過我們還是選擇先看看在考慮是否升級，
								<?php echo $name;?>也很貼心，讓我們抵達拉薩之後帶我們一家家看酒店，然後再決定住在哪裡。其實我們都還挺不好意思的，覺得麻煩了
								<?php echo $name;?>，但是
								<?php echo $name;?>的服務真的是好，看完酒店之後我爸媽覺得三星級就可以了。</p>
							<p>不過我還是希望我爸媽住的好一點，就升級了四星級的酒店。
								<?php echo $name;?>在升級酒店也沒有掙我們的錢，房差費用現付給了酒店，並且還是內部優惠價。等於是花了三星級酒店的錢，還是住上了四星級酒店。</p>
							<p><img src="http://wx2.sinaimg.cn/mw690/005S5CBngy1fu10ks5erpj30m80g341q.jpg" /></p>
							<p><img src="http://wx3.sinaimg.cn/mw690/005S5CBngy1fu10ks8oa1j30m80et3zq.jpg" /></p>
							<p>這是剛住進去的時候拍的，應該是
								<?php echo $name;?>帶我們精挑細選之後最好的四星級酒店了。當然也可以選擇像瑞吉這樣的五星酒店，那就更豪華了，但是價格也是比較高的。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box container">
			<div class="item">
				<?php author_box('郭于婷','http://tvax2.sinaimg.cn/crop.21.0.1083.1083.180/48c5dd21ly8fn9qdmh6qtj20v90u30vp.jpg','香港','5','on');?>
				<div class="item-content">
					<p>上個月我和老公以及朋友夫妻在拉薩、林芝、羊湖、納木錯、遊玩了9天，選的是
						<?php echo $name;?>的網紅套餐，哈哈，西藏好的景點都玩到了，隨手一拍就是風景大片，美不勝收！但是呢，最大的感受就是西藏的景點過於分散，自己玩容易走回頭路，非常浪費時間，我個人覺得現在國內的成熟的旅遊景點比如西藏這樣的，最好還是結伴玩，可以請一個導遊，畢竟出來玩，重要的是輕鬆和開心嘛！這裡是
						<?php echo $name;?>的微信號,大家可以加一下她問問關於西藏的情況,並且
						<?php echo $name;?>也非常熱情，這是微信號：
						<?php echo $xs_wx;?>
					</p>
					<p>順便貼一下我們在西藏拍的照片吧，我們也是找的
						<?php echo $name;?>做的包車行程，因為自己包車自由一點嘛，隨走隨停，想怎麼玩就怎麼玩。全程都是
						<?php echo $name;?>安排的，的確很舒適哦。</p>
					<p><img src="http://wx3.sinaimg.cn/mw690/005S5CBngy1fu10m7oqvej30m813igud.jpg" /></p>
					<p><img src="http://wx1.sinaimg.cn/mw690/005S5CBngy1fu10m7lghvj30m80etdih.jpg" /></p>
					<p><img src="http://wx2.sinaimg.cn/mw690/005S5CBngy1fu10m7lndij30m80etjtg.jpg" /></p>
					<p><img src="http://wx1.sinaimg.cn/mw690/005S5CBngy1fu10m7m02dj30m80etacj.jpg" /></p>
					<p>
						<?php echo $name;?>安排的車和司機楊師傅都非常滿意，特別是楊師傅，到了一個好看的地方就主動叫我們下去拍照，並且我們想走了還一個勁說多拍會嘛~~~來一次西藏可不容易哦，楊師傅真的超級nice。</p>
				</div>
				<?php author_footer('郭于婷');?>
				<div class="item-replay">
					<?php author_box('賴佳玲','http://tvax2.sinaimg.cn/crop.0.0.1242.1242.180/686fe7e0ly8fm8dt5krjjj20yi0yiwgw.jpg','香港','5','');?>
					<div class="item-replay-content">
						<p>拍的真美，可以說一下
							<?php echo $name;?>安排的行程、酒店還有餐飲安排嗎？然後玩了9天花了多少錢呢？</p>
					</div>
					<div class="item-replay">
						<?php author_box('郭于婷','http://tvax2.sinaimg.cn/crop.21.0.1083.1083.180/48c5dd21ly8fn9qdmh6qtj20v90u30vp.jpg','香港','5','on');?>
						<div class="item-replay-content">
							<p>這個你可以直接去加
								<?php echo $name;?>的微信吧，這裡是她的微信，她非常熱情的，加了她可以咨詢關於西藏的所有事情。
								<?php echo $name;?>的微信：
								<?php echo $xs_wx;?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box container">
			<div class="item">
				<?php author_box('張書合','https://tvax3.sinaimg.cn/crop.0.0.1080.1080.180/65d26b38ly8fxeaq9xaqbj20u00u0tcs.jpg','台北','4','on');?>
				<div class="item-content">
					<p>我上個月去西藏玩了8天，好巧，我也是找
						<?php echo $name;?>安排的，確實安排的非常好！</p>
					<p>並且
						<?php echo $name;?>還免費找來了藏服，安排了牦牛，給我們用來拍照，在納木錯的湖邊，真的太好看了。感謝
						<?php echo $name;?>給我們安排了這麼一個完美的行程。西藏旅遊找她準沒錯~~~</p>
					<p><img src="http://wx2.sinaimg.cn/mw690/005S5CBngy1fu19syg918j31kw0zkanz.jpg" /></p>
				</div>
				<?php author_footer('張書合');?>
				<div class="item-replay">
					<?php author_box('黃靜佩','https://tvax4.sinaimg.cn/crop.0.0.1242.1242.180/4bb7eaf9ly8fdgoh8tn51j20yi0yitc0.jpg','台北','4','off');?>
					<div class="item-replay-content">
						<p>樓主您好，你們是跟團游還是自由行呢？台灣籍可以自由行嗎？</p>
					</div>
					<div class="item-replay">
						<?php author_box('張書合','https://tvax3.sinaimg.cn/crop.0.0.1080.1080.180/65d26b38ly8fxeaq9xaqbj20u00u0tcs.jpg','台北','4','on');?>
						<div class="item-replay-content">
							<p>台灣籍在西藏不能自由行的哦，我們是找的
								<?php echo $name;?>幫我們安排的結伴遊，她幫我們找了幾個台灣籍的遊客安排拼了一個團。出行前我們就有過溝通，感覺都還很nice，就愉快的決定了一起出遊。</p>
							<p>從成都開始集合，然後一起坐火車進藏。不過非常值得說的是，火車進藏的沿途風景，真的太美了！！！！不過台灣籍同團后必須要一起進藏，因為只有一張入藏紙。之前在群里為了飛機進藏還是火車進藏討論了好久，還好最後一致同意火車進藏。</p>
							<p>詳細的信息你可以直接咨詢
								<?php echo $name;?>。</p>
						</div>
						<div class="item-replay">
							<?php author_box('黃靜佩','https://tvax4.sinaimg.cn/crop.0.0.1242.1242.180/4bb7eaf9ly8fdgoh8tn51j20yi0yitc0.jpg','台北','4','off');?>
							<div class="item-replay-content">
								<p>好的，我這就去聯繫
									<?php echo $name;?>。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="box container">
			<div class="item">
				<?php author_box('吕正信','https://tva4.sinaimg.cn/crop.0.0.180.180.180/ba8d3519jw1e8qgp5bmzyj2050050aa8.jpg','马来西亚','4','off');?>
				<div class="item-content">
					<p>西藏的藍天白雲的確令人嚮往，覺得這輩子不去一次西藏簡直就是人生中的一個遺憾。之前去過至今還有嚮往，那邊的宗教、山、藍天、還有白雲。</p>
					<p><img src="https://ws1.sinaimg.cn/large/006TtLCRgy1fxfp1rm4b4j315o0rstcq.jpg" /></p>
				</div>
				<?php author_footer('吕正信');?>
				<div class="item-replay">
					<?php author_box('卢韵宁','https://tva3.sinaimg.cn/crop.0.0.640.640.180/6973530djw8efnj94tjzdj20hs0hsmy0.jpg','馬來西亞','4','on');?>
					<div class="item-replay-content">
						<p>拍的不錯，真的美~~~</p>
					</div>
				</div>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<div class="box container">
			<div class="item">
				<?php author_box('李吉星','https://tva1.sinaimg.cn/crop.23.24.254.254.180/9426d723jw8eob301a8ktj208c08cjre.jpg','新加坡','4','on');?>
				<div class="item-content">
					<p>西藏旅遊注意事項！ ！ ！ ！ ！ ！ ！ ！</p>
					<p>西藏紫外線很強。要帶夠防曬裝備</p>

					<p>1.充足倍數的防曬霜（最好30倍以上）<br> 2.墨鏡
						<br> 3.帽子或者絲巾什麼的
						<br> 4.保濕面膜必不可少 ！ ！ ！</p>

					<p>西藏的晝夜溫差比較大，要帶個厚外套哦。</p>
					<p>必要可以帶個那種很薄的羽絨服或者衝鋒衣。這個很有用 ！ ！ ！</p>
					<p>個別可能會有高原反應。</p>
					<p>要多喝水，多喝水，多喝水。有的高原反應會覺得口渴，喝了水會緩解很多。</p>
					<p>剛到拉薩，不要做跑跑跳跳的劇烈運動。 ！ ！ ！</p>
					<p>坐飛機可以備點口香糖，咀嚼的動作會稍微緩解下耳鳴的狀態 ！ ！ ！</p>
					<p>飛機托運或者個人攜帶物品會有一定注意事項，建議打包行李多注意下。</p>
					<p>拿走不謝~</p>
				</div>
				<?php author_footer('李吉星');?>
				<div class="item-replay">
					<?php author_box('常平惠','https://tvax3.sinaimg.cn/crop.0.0.996.996.180/0076Fwi0ly8fqffbimxzgj30ro0romyz.jpg','新加坡','4','off');?>
					<div class="item-replay-content">
						<p>不知道第一次去西藏的人會有高反嗎？您去的時候有高反了嗎？</p>
					</div>
					<div class="item-replay">
						<?php author_box('李吉星','https://tva1.sinaimg.cn/crop.23.24.254.254.180/9426d723jw8eob301a8ktj208c08cjre.jpg','新加坡','4','on');?>
						<div class="item-replay-content">
							<p>一般年輕人還容易高反一點，高反主要看心態，如果總是想著高反就多半會高反。心態好的話，即使有高反也不會難受。心態不好的話，就很難受了。</p>
						</div>
						<div class="item-replay">
							<?php author_box('常平惠','https://tvax3.sinaimg.cn/crop.0.0.996.996.180/0076Fwi0ly8fqffbimxzgj30ro0romyz.jpg','新加坡','4','off');?>
							<div class="item-replay-content">
								<p>明白啦，謝謝您的回答。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<div class="box container">
			<div class="item">
				<?php author_box('沈芷蕊','https://tvax3.sinaimg.cn/crop.0.0.1242.1242.180/005N9GuZly8fvsgrfxtmrj30yi0yi75k.jpg','香港','7','on');?>
				<div class="item-content">
					<p>感覺拉薩、林芝、納木錯、羊湖8日遊，貌似是大多數人的選擇啊，我也是這麼玩的，找個有實力的公司安排，專業的人帶著玩確實能省不少事，題主打算什麼時候去？如果是西藏旅遊旺季的時候去，拉薩人非常多啊，住宿都不好安排，我們差點就訂不到酒店，幸虧
						<?php echo $name;?>幫我們安排，特別感謝!</p>
				</div>
				<?php author_footer('沈芷蕊');?>
				<div class="item-replay">
					<?php author_box('林韶丽','https://tva1.sinaimg.cn/crop.0.0.180.180.180/3ea972b4jw1e8qgp5bmzyj2050050aa8.jpg','香港','7','off');?>
					<div class="item-replay-content">
						<p>沒錯啊，去西藏之前一定要提前預訂。不然到時候酒店和跟團費用價格簡直飛漲。這個是前車之鑒，因為之前一直猶猶豫豫，臨近出發日期才開始定下行程。到了拉薩之後啥都貴啊，連布達拉宮的門票都翻了好幾番。</p>
					</div>
					<div class="item-replay">
						<?php author_box('沈芷蕊','https://tvax3.sinaimg.cn/crop.0.0.1242.1242.180/005N9GuZly8fvsgrfxtmrj30yi0yi75k.jpg','香港','7','on');?>
						<div class="item-content">
							<p>是啊，如果想去的話，可以先提前找
								<?php echo $name;?>了解詳細的行程和價格，決定了之後可以讓
								<?php echo $name;?>先預定下來酒店和車，還有布達拉宮的門票。這樣會省錢很多。</p>
						</div>
					</div>
				</div>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<div class="box container">
			<div class="item">
				<?php author_box('小雨','https://tva3.sinaimg.cn/crop.110.96.859.859.180/006qNCgujw8f3qlj1nnjgj30sg0sgwgr.jpg','澳門','9','on');?>
				<div class="item-content">
					<p>加了
						<?php echo $name;?>微信聊了一個多星期了，感覺態度都是蠻好的，覺得選不選擇她都會在很用心的幫你，我們最終還是選擇了
						<?php echo $name;?>，女人的直覺告訴我這趟不會讓我失望。確實如此。</p>
				</div>
				<?php author_footer('小雨');?>
				<div class="item-replay">
					<?php author_box('檸檬綠茶','https://tva3.sinaimg.cn/crop.0.0.180.180.180/006eqiTdgw1f9buj67j6nj3050050glp.jpg','澳門','9','off');?>
					<div class="item-replay-content">
						<p>在拉薩已經定居四年多了，四年時間差不多將自己的足跡遍布西藏的各個角落，高至珠穆朗瑪峰與天相接巍峨壯麗，納木錯邊與我愛的人相訴衷腸。</p>
						<p>建議大家第一次過來可以找個當地導遊，景點比較分散，自己玩會行程比較緊比較累~</p>
					</div>
				</div>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<div class="box container">
			<div class="item">
				<?php author_box('秦太文','https://tvax4.sinaimg.cn/crop.0.0.1242.1242.180/0065K79ily8fnev4t6m8wj30yi0yi0vo.jpg','美國','12','off');?>
				<div class="item-content">
					<p>很多人問西藏是跟團好還是自由行好？可以肯定的是，不管你去哪個地方有個熟悉的人帶著您肯定是最好的。出門在外有很多的不便，大多旅遊城市都比較黑，能找個可靠的人帶你就不用自己瞎折騰了，本身出門旅行就是為了散心的，事事都操心就很難玩的好，要享受旅行的過程。</p>

					<p>所以建議大家找個靠譜的人帶你玩很重要！</p>
				</div>
				<?php author_footer('秦太文');?>
				<div class="item-replay">
					<?php author_box('奶茶叔叔','https://tvax4.sinaimg.cn/crop.0.0.180.180.180/5e21d8d1ly8fs76do58dcj2050050746.jpg','澳門','4','on');?>
					<div class="item-replay-content">
						<p>點個贊</p>
					</div>
				</div>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<div class="box container">
			<div class="item">
				<?php author_box('Mengzen','https://tvax2.sinaimg.cn/crop.0.0.1242.1242.180/686fe7e0ly8fm8dt5krjjj20yi0yiwgw.jpg','澳門','15','on');?>
				<div class="item-content">
					<p>我覺得非大陸的遊客去西藏，像台灣、香港、海外的華人去西藏最麻煩的就是入藏證了。這個一定是需要注意的地方，因為這個證件辦理時間很長。所以一定要提前找有實力的旅行社先辦理下來。</p>
					<p>如果旅行社實力不夠，就很有可能辦理失敗的情況。到時候就無法入藏了。</p>
				</div>
				<?php author_footer('Mengzen');?>
			</div>
			<!--item-->
		</div>
		<!--空白-->

		<!--
		<div class="box container">
			<div class="item">
				<?php author_box('','','','','');?>
				<div class="item-content">

				</div>
				<?php author_footer('');?>
				<div class="item-replay">
					<?php author_box('','','','','');?>
					<div class="item-replay-content">

					</div>
				</div>
			</div>
		</div>
-->

	</body>



</html>


<script>
	function tanchu() {
		layer.open({
			content: '	<div class="mesbox"><h1>聯繫<?php echo $xs_mz;?></h1><form action="action.php" method="post">			<div class="mesitem">				<div class="row"><label>姓名：</label><input type="text" name="name"></div>			</div>			<div class="mesitem">				<div class="row"><label>聯絡軟件：</label><input type="text" name="line"></div>				<div class="info">* 可填寫LINE，WhatApp，WeChat，Email，電話等</div>			</div>			<div class="mesitem">				<div class="row"><label>旅行計劃：</label><textarea name="line"></textarea></div>				<div class="info">* 可簡單介紹出發時間、國籍、人數。</div>			</div>			<div class="mesitem">				<div class="row"><input class="btn" type="submit" value="提交"></div>			</div>		</form>		<div class="info">* 提交成功後，我們會在2小時內聯繫您。</div>	</div>',
		});
	}

</script>
