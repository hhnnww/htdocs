<?php 

class widget_service extends WP_Widget {
	
	function __construct(){
		parent::__construct( 'widget_service', '客服咨询', array( 'classname' => 'widget_service' ) );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title       = apply_filters('widget_name', (isset($instance['title']) ? $instance['title'] : ''));

		$btn       = isset($instance['btn']) ? $instance['btn'] : "免费咨询";
		$desc       = isset($instance['desc']) ? $instance['desc'] : "剔除你对西藏旅行的期待和要求\n剩下的就交给我们";
		$link       = isset($instance['link']) ? $instance['link'] : _hui('service_link');

		echo $before_widget;
		// if( $title ) echo $before_title.$title.$after_title; 

		echo '<a style="display:block" href="'. $link .'"><h3>'. $title .'</h3>
			<p>'. str_replace("\n", '<br>', $desc) .'</p>
			<span class="btn btn-default">'.$btn.'</span></a>';

		echo $after_widget;

	}

	function form( $instance ) {
		$defaults = array( 
			'btn'       => '免费咨询',
			'title'       => '旅行顾问，让你的旅行更省心',
			'desc'       => "剔除你对西藏旅行的期待和要求\n剩下的就交给我们",
			'link'       => _hui('service_link')
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p><label>
			<?php echo __('标题：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</label></p>

		<p><label>
			<?php echo __('描述：', 'haoui') ?>
			<textarea style="width:100%;" rows="3" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $instance['desc']; ?></textarea>
		</label></p>

		<p><label>
			<?php echo __('咨询文字：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('btn'); ?>" name="<?php echo $this->get_field_name('btn'); ?>" type="text" value="<?php echo $instance['btn']; ?>" />
		</label></p>

		<p><label>
			<?php echo __('咨询链接：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
		</label></p>
	<?php
	}
}
