<?php
$con = new mysqli('localhost','root','','test');
if(!$con){
	echo 'error';
}
else{
	echo $_POST['title'];
}
?>
