<?php 

// DELETE WIDGETS
function unregister_d_widget(){
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Video');
    // unregister_widget('WP_Widget_Text');
}
add_action('widgets_init','unregister_d_widget');



// ADD WIDGETS
function widget_ui_loader() {
	$widgets = array( 
		'safe',
		'custom',
		'service',
		'counselor',
		'spots',
		'postlist'
	);
	foreach ($widgets as $widget) {
		include 'widgets/widget-'. $widget .'.php';
		register_widget( 'widget_'.$widget );
	}
}
add_action( 'widgets_init', 'widget_ui_loader' );

