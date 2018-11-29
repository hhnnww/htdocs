<!DOCTYPE html>
<html lang="zh">

<head>
	<title>西藏行程创建</title>
	<link rel='stylesheet' href='style.css'>
</head>

<body>
	<div class="site-main">
		<?php if(empty($_GET['days'])):?>
		<div class="box">
			<form action="" method="get">
				天数：<input type='number' name="days">
				<input type="submit" value="提交">
			</form>
		</div>
		<?php endif;?>

		<?php if(!empty($_GET['days'])):?>

		<form action="CreatText.php" method="post">
			<div class="box">
				<group>
					<label>标题：</label>
					<input class="full" type='text' name="title">
				</group>

				<group>
					<label>副标题：</label>
					<input class="full" type="text" name="sub-title">
				</group>

				<group>
					<label>简略行程：</label>
					<textarea name="sub-line" rows="5"></textarea>
				</group>
				<?php for($x=1;$x<=$_GET['days'];$x++):?>
				<group>
					<label><?php echo '第'.$x.'天标题';?></label>
					<input type="text" class="full" name="<?php echo 'd'.$x.'_title';?>">
				</group>
				<group>
					<label><?php echo '第'.$x.'天行程';?></label>
					<textarea class="full" name="<?php echo 'd'.$x.'_tour';?>"></textarea>
				</group>
				<group>
					<label><?php echo '第'.$x.'天餐宿';?></label>
					<input type="text" class="full" name="<?php echo 'd'.$x.'_cansu';?>">
				</group>
				<hr />
				<?php endfor;?>

				<group>
					<input type="submit" value="提交">
				</group>
			</div>
		</form>
		<?php endif;?>
	</div>
</body>

</html>
