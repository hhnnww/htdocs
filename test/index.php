<?php
	$content ='<img src="http://localhost/wp-content/uploads/2018/11/18160202051513.jpg" />';
	echo $content;
	$content = preg_replace('/.jpg/','-700-300.jpg',$content);
	echo $content;
?>