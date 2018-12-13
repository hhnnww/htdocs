<?php 

class widget_spots extends WP_Widget {
	
	function __construct(){
		parent::__construct( 'widget_spots', '旅游景点', array( 'classname' => 'widget_spots' ) );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title       = apply_filters('widget_name', (isset($instance['title']) ? $instance['title'] : '西藏旅游景点'));
		$cats       = isset($instance['cats']) ? $instance['cats'] : '';

		echo $before_widget;
		echo $before_title.$title.$after_title; 

		echo '<div class="inner">';
			$links = wp_list_bookmarks(array(
				'category'         => $cats,
				'categorize'       => 1,
				'category_orderby' => 'slug',
				'category_order'   => 'ASC',
				'orderby'          => 'rating',
				'order'            => 'DESC',
				'show_description' => false,
				'between'          => '',
				'title_before'     => '<dt>',
				'title_after'      => '</dt>',
				'link_before'         => '',
				'link_after'         => '',
				'title_li'         => '',
				'echo'         => 0,
				'before'         => '',
				'after'         => '',
				'category_before'  => '<dl>',
				'category_after'   => '</dl>'
			));
			$links = str_replace("<ul class='xoxo blogroll'>", '<dd>', $links);
			$links = str_replace("</ul>", '</dd>', $links);
			$links = str_replace("\n", '', $links);

			echo $links;
		echo '</div>';

		echo $after_widget;

	}

	function form( $instance ) {
		$defaults = array( 
			'title'       => '西藏旅游景点',
			'cats'       => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label>
				<?php echo __('标题：', 'haoui') ?>
				<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				<?php echo __('链接分类ID（英文逗号隔开）：', 'haoui') ?>
				<input style="width:100%;" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" type="text" value="<?php echo $instance['cats']; ?>" />
			</label>
		</p>
	<?php
	}
}