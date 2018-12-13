<?php 

class widget_counselor extends WP_Widget {
	
	function __construct(){
		parent::__construct( 'widget_counselor', '旅行顾问', array( 'classname' => 'widget_counselor' ) );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title       = apply_filters('widget_name', (isset($instance['title']) ? $instance['title'] : ''));

		$postid       = isset($instance['postid']) ? $instance['postid'] : '1';

		echo $before_widget;
		echo $before_title.$title.$after_title; 

		$args = array(
			'order'            => 'DESC',
			'post__in'            => explode(',', $postid),
			'ignore_sticky_posts' => 1
		);
		query_posts($args);
		while (have_posts()) : the_post(); 

			echo '<a class="inner" href="'. get_the_permalink() .'">
					'. _get_post_thumbnail() .'
					<footer>
						<span class="level">'. get_post_meta(get_the_ID(), 'showname', true) .'</span>
						<span class="tit">'. get_the_title() .'</span>
						<div class="intro">'. _get_excerpt(50, '...') .'</div>
					</footer>
				</a>';

		endwhile; 
		wp_reset_query();

		echo $after_widget;

	}

	function form( $instance ) {
		$defaults = array( 
			'title'       => '旅行顾问推荐',
			'postid'       => '1'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p><label>
			<?php echo __('标题：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</label></p>

		<p><label>
			<?php echo __('旅行顾问文章ID：', 'haoui') ?>
			<input style="width:100%;" id="<?php echo $this->get_field_id('postid'); ?>" name="<?php echo $this->get_field_name('postid'); ?>" type="text" value="<?php echo $instance['postid']; ?>" />
		</label></p>
	<?php
	}
}
