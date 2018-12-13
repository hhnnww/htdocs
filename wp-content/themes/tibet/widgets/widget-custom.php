<?php 

class widget_custom extends WP_Widget {
	
	function __construct(){
		parent::__construct( 'widget_custom', '定制旅行', array( 'classname' => 'widget_custom' ) );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title       = apply_filters('widget_name', (isset($instance['title']) ? $instance['title'] : ''));

		$link       = isset($instance['link']) ? $instance['link'] : _hui('customtour_link');

		echo $before_widget;
		echo $before_title.$title.$after_title; 

		echo '<ul>
			<li><i class="fa">&#xe7e5;</i><strong>专业优质</strong><p>专业定制师+深度体验<br>跟团玩不到！</p></li>
			<li><i class="fa">&#xe62f;</i><strong>自由个性</strong><p>根据需求极速调整路线<br>说走就走</p></li>
			<li><i class="fa">&#xe68e;</i><strong>省心省力</strong><p>机票、酒店、活动、租车<br>专人预定，锁定稀缺资源</p></li>
		</ul>
		<footer>
			<a href="'. $link .'" class="btn btn-default">定制我的西藏之旅</a>
		</footer>';

		echo $after_widget;

	}

	function form( $instance ) {
		$defaults = array( 
			'title'       => '定制旅行',
			'link'       => _hui('customtour_link')
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p><label>
			<?php echo __('标题：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</label></p>

		<p><label>
			<?php echo __('定制旅行链接：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
		</label></p>
	<?php
	}
}
