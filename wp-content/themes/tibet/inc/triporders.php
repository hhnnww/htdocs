<?php 


date_default_timezone_set('PRC');

add_action('admin_menu', 'triporder_menu');
function triporder_menu() {  
	add_dashboard_page('旅行订单', '旅行订单', 'administrator', 'triporder', 'triporder');
}  

function triporder() { 
	global $wpdb;

	$counts = $wpdb->get_var( "SELECT COUNT(*) FROM triporders" );

	$pageshow = 20;
	$maxpager = ceil($counts/$pageshow);

	$pager = 1;
	if( isset($_GET['paged']) && floor($_GET['paged'])==$_GET['paged'] ){
		$pager = floor($_GET['paged']);
	}

	$prev_pager = $pager-1;
	$next_pager = $pager+1;
	if( $next_pager > $maxpager ){
		$next_pager = 0;
	}

	$limit_start = ($pager-1)*$pageshow;

	$datas = $wpdb->get_results("SELECT * FROM triporders ORDER BY ID DESC LIMIT {$limit_start}, {$pageshow}");

	?>
	
	<style>
		#triporderform{overflow: hidden;margin-top: 10px;}
		#triporderform .item{float: left;width: 200px;margin-right: 15px;margin-bottom: 15px;}
		#triporderform .item label{display: block;}
		#triporderform .item input{width: 100%;}
	</style>

	<div class="wrap">
		<h1 class="wp-heading-inline">旅行订单</h1>
		
		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th scope="col" class="manage-column" width="100"><strong>姓名</strong></th>
					<th scope="col" class="manage-column" width="80"><strong>出发日</strong></th>
					<th scope="col" class="manage-column" width="60"><strong>人数</strong></th>
					<th scope="col" class="manage-column" width="60"><strong>天数</strong></th>
					<th scope="col" class="manage-column" width="120"><strong>手机号</strong></th>
					<th scope="col" class="manage-column" width="120"><strong>邮箱</strong></th>
					<th scope="col" class="manage-column" width="120"><strong>想去景点</strong></th>
					<th scope="col" class="manage-column" width="200"><strong>备注说明</strong></th>
					<th scope="col" class="manage-column" width="120"><strong>当前页面</strong></th>
					<th scope="col" class="manage-column" width="60"><strong>线路</strong></th>
					<th scope="col" class="manage-column" width="120"><strong>IP</strong></th>
					<th scope="col" class="manage-column" width="60"><strong>通知</strong></th>
					<th scope="col" class="manage-column" width="140"><strong>时间</strong></th>
				</tr>
			</thead>
			<tbody>
		    <?php 
			    foreach ($datas as $key => $item) {
					echo '<tr>';
						echo '<td>'. $item->name .'</td>';
						echo '<td>'. ($item->date ? date('Y-m-d', $item->date) : '') .'</td>';
						echo '<td>'. ($item->persons ? $item->persons : '') .'</td>';
						echo '<td>'. ($item->days ? $item->days : '') .'</td>';
						echo '<td>'. $item->phone .'</td>';
						echo '<td>'. $item->email .'</td>';
						echo '<td>'. $item->spot .'</td>';
						echo '<td>'. $item->remark .'</td>';
						echo '<td>'. ($item->url ? '<a href="'. $item->url .'" target="_blank">'. $item->url .'</a>' : '') .'</td>';
						echo '<td>'. ($item->xianlu ? $item->xianlu : '') .'</td>';
						echo '<td>'. $item->ip .'</td>';
						echo '<td>'. ($item->mail ? '√' : '×') .'</td>';
						echo '<td>'. ($item->ts ? date('Y-m-d H:i:s', $item->ts) : '') .'</td>';
					echo '</tr>';
				} 
			?>
			</tbody>
		</table>
		<div class="tablenav bottom">
			<div class="tablenav-pages">
				<span class="displaying-num">共<?php echo $counts ?>个订单</span>
				<span class="pagination-links">
					<?php if( $prev_pager ){ ?>
						<a class="first-page" href="<?php echo home_url().'/wp-admin/index.php?page=triporder&paged=1' ?>"><span aria-hidden="true">«</span></a>
						<a class="prev-page" href="<?php echo home_url().'/wp-admin/index.php?page=triporder&paged='.$prev_pager ?>"><span aria-hidden="true">‹</span></a>
					<?php }else{ ?>
						<span class="tablenav-pages-navspan" aria-hidden="true">«</span>
						<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
					<?php } ?>
					<span id="table-paging" class="paging-input"><span class="tablenav-paging-text">第<?php echo $pager ?>页，共<?php echo $maxpager ?>页</span></span>
					<?php if( $next_pager ){ ?>
						<a class="next-page" href="<?php echo home_url().'/wp-admin/index.php?page=triporder&paged='.$next_pager ?>"><span aria-hidden="true">›</span></a>
						<a class="last-page" href="<?php echo home_url().'/wp-admin/index.php?page=triporder&paged='.$maxpager ?>"><span aria-hidden="true">»</span></a>
					<?php }else{ ?>
						<span class="tablenav-pages-navspan" aria-hidden="true">›</span>
						<span class="tablenav-pages-navspan" aria-hidden="true">»</span>
					<?php } ?>
				</span>
			</div>
			<br class="clear">
		</div>
	</div>
    
	<?php 

} 
