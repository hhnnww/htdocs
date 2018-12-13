<?php 

class widget_safe extends WP_Widget {
	
	function __construct(){
		parent::__construct( 'widget_safe', '旅行保障', array( 'classname' => 'widget_safe' ) );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title       = apply_filters('widget_name', (isset($instance['title']) ? $instance['title'] : ''));

		echo $before_widget;
		echo $before_title.$title.$after_title; 

		echo '<ul>
			<li><a href="'._hui('wan_link').'" target="_blank"><i class="fa">&#xe601;</i><strong>纯玩保证</strong><p>行程花费一价全部<br>杜绝套路</p></a></li>
			<li><a href="'._hui('danbao_link').'" target="_blank"><i class="fa">&#xe648;</i><strong>担保交易</strong><p>行程结束再付款<br>旅游无忧</p></a></li>
		</ul>';

		echo $after_widget;

	}

	function form( $instance ) {
		$defaults = array( 
			'title'       => '旅行保障'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label>
				<?php echo __('标题：', 'haoui') ?>
				<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
	<?php
	}
}
