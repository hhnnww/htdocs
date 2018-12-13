<div class="sidebar">
<?php 
	if (function_exists('dynamic_sidebar')){

		if (is_home()){
			dynamic_sidebar('home'); 
		}
		else if (is_category(array('xianlu', 'huaren'))){
			dynamic_sidebar('tourline'); 
		}
		else if (is_category()){
			dynamic_sidebar('cat'); 
		}
		else if (is_single()){
			if( get_post_format()=='status' ){
				echo '<div class="sidebarinner">';
				dynamic_sidebar('tourline-single');
				echo '</div>';
			}
			else{
				dynamic_sidebar('single'); 
			}
		}
		else if (is_page('tianqi')){
			dynamic_sidebar('page-tianqi'); 
		}
		else if (is_page()){
			dynamic_sidebar('page'); 
		}

	}
?>
</div>