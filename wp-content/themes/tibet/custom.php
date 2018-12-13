<?php 
/**
 * Template name: 定制旅游
 */

get_header();

$focus_src = trim(get_post_meta($post->ID, 'focus_src', true)); 
if( !$focus_src ) {
	$focus_src = _hui('page_focus_image');
}

?>

<div class="leader-title" style="background-image: url(<?php echo $focus_src ?>)">
	<div class="container">
		<h1>西藏定制旅游</h1>
		<h3>自由个性，给你最原汁原味的藏地体验</h3>
	</div>
</div>

<section class="container customform-container">

	<form class="customform" id="customform2">
		<div class="item">
			<label for="name">姓名</label>
			<input name="name" type="text">
		</div>
		<div class="item">
			<label for="person">旅行人数</label>
			<input id="customperson" name="person" type="text" readonly="readonly">
		</div>
		<div class="item">
			<label for="date">出发日期</label>
			<input id="customdate" name="date" type="text" readonly="readonly">
			<div class="datecalendar" id="datecalendar"></div>
		</div>
		<div class="item">
			<label for="days">游玩天数</label>
			<input id="customdays" name="days" type="text" readonly="readonly">
		</div>
		<div class="item">
			<label for="phone">手机号码</label>
			<input name="phone" type="text">
		</div>
		<div class="item">
			<label for="email">电子邮箱</label>
			<input name="email" type="text">
		</div>
		<div class="item item-jingdian">
			<label for="jingdian">想去景点</label>
			<textarea name="jingdian" id="" cols="30" rows="3"></textarea>
		</div>
		<div class="item item-remark">
			<label for="remark">备注说明</label>
			<textarea name="remark" id="" cols="30" rows="5"></textarea>
		</div>
		<div class="item item-actions">
			<a href="javascript:;" class="btn btn-default" data-form="#customform2" etap="custom">立即提交</a>
		</div>
	</form>


</section>

<?php get_footer(); ?>