<?php
	$content ='<img src="http://localhost/wp-content/uploads/2018/11/002.jpg" />';
	$content = preg_replace('/.jpg/','_200.jpg',$content);
	echo $content;
?>