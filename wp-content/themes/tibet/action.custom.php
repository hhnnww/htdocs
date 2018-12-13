<?php

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	header('Allow: POST');
	header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain');
	exit;
}

require( dirname(__FILE__).'/../../../wp-load.php' );

$p_standard = isset( $_POST['standard'] ) ? trim(htmlspecialchars($_POST['standard'], ENT_QUOTES)) : 0;
$p_order    = isset( $_POST['order'] ) ? trim(htmlspecialchars($_POST['order'], ENT_QUOTES)) : 0;
$p_date     = isset( $_POST['date'] ) ? trim(htmlspecialchars($_POST['date'], ENT_QUOTES)) : '';
$p_name     = isset( $_POST['name'] ) ? trim(htmlspecialchars($_POST['name'], ENT_QUOTES)) : '';
$p_days     = isset( $_POST['days'] ) ? trim(htmlspecialchars($_POST['days'], ENT_QUOTES)) : 0;
$p_phone    = isset( $_POST['phone'] ) ? trim(htmlspecialchars($_POST['phone'], ENT_QUOTES)) : '';
$p_email    = isset( $_POST['email'] ) ? trim(htmlspecialchars($_POST['email'], ENT_QUOTES)) : '';
$p_person   = isset( $_POST['person'] ) ? trim(htmlspecialchars($_POST['person'], ENT_QUOTES)) : 0;
$p_jingdian = isset( $_POST['jingdian'] ) ? trim(htmlspecialchars($_POST['jingdian'], ENT_QUOTES)) : '';
$p_remark   = isset( $_POST['remark'] ) ? trim(htmlspecialchars($_POST['remark'], ENT_QUOTES)) : '';
$p_from     = isset( $_POST['from'] ) ? trim(htmlspecialchars($_POST['from'], ENT_QUOTES)) : '';

if( !$p_name || _str_len($p_name)>16 || _str_len($p_name)<2 ){
	print_r(json_encode(array('error'=>1, 'msg'=>'姓名为中文、英文、数字组合的2-16个字符')));
	exit;
}

if( $p_standard ){
	if( !$p_date || !_checkDateIsValid($p_date) ){
		print_r(json_encode(array('error'=>1, 'msg'=>'出发日期不能为空')));
		exit;
	}
}

if( !$p_days || $p_days>60 || $p_days<5 ){
	print_r(json_encode(array('error'=>1, 'msg'=>'天数需是5-60之间的数字')));
	exit;
}

if( $p_standard ){
	if( !$p_person || $p_person>30 || $p_person<1 ){
		print_r(json_encode(array('error'=>1, 'msg'=>'旅行人数需是1-30之间的数字')));
		exit;
	}
}

if( $p_phone && _str_len($p_phone)!==11 ){
	print_r(json_encode(array('error'=>1, 'msg'=>'手机号码是11位数字')));
	exit;
}

if( $p_email && !filter_var($p_email, FILTER_VALIDATE_EMAIL) ){
	print_r(json_encode(array('error'=>1, 'msg'=>'邮箱格式错误')));
	exit;
}

if( !$p_phone && !$p_email ){
	print_r(json_encode(array('error'=>1, 'msg'=>'手机号码和邮箱应至少填写一项')));
	exit;
}

if( $p_standard ){
	if( $p_jingdian && _str_len($p_jingdian)>200 ){
		print_r(json_encode(array('error'=>1, 'msg'=>'想去景点需在200字以内')));
		exit;
	}
}

if( $p_remark && _str_len($p_remark)>1000 ){
	print_r(json_encode(array('error'=>1, 'msg'=>'备注需在1000字以内')));
	exit;
}



if( $p_from && _str_len($p_from)>200 ){
	print_r(json_encode(array('error'=>1, 'msg'=>'系统错误，稍后再试')));
	exit;
}

$to = get_option('admin_email');

$subject = '【定制旅行】'.$p_name.' '.$p_days.'天';
if( $p_order ){
	$subject = '【在线预订】'.$p_name.' '.$p_days.'天'.($p_order?' 线路'.$p_order:'');
}

$message = '';

if( $p_name ) 
	$message .= '联系姓名：'.$p_name."\n";

if( $p_date ) 
	$message .= '出发日期：'.$p_date."\n";

if( $p_days ) 
	$message .= '旅行天数：'.$p_days."\n";

if( $p_person ) 
	$message .= '旅行人数：'.$p_person."\n";

if( $p_phone ) 
	$message .= '手机号码：'.$p_phone."\n";

if( $p_email ) 
	$message .= '电子邮箱：'.$p_email."\n";

if( $p_jingdian ) 
	$message .= '想去景点：'.$p_jingdian."\n";

if( $p_remark ) 
	$message .= '备注说明：'.$p_remark."\n";

if( $p_from ) 
	$message .= '当前网址：'.$p_from."\n";

if( $p_order ) 
	$message .= '线路 ID：'.$p_order."\n";



$p_date = strtotime($p_date);
$ip = get_ip();



_table_install();


// SEARCH DATA
$one = $wpdb->get_row(" SELECT ID FROM triporders WHERE `date`='{$p_date}' AND `persons`='{$p_person}' AND `days`='{$p_days}' AND `phone`='{$p_phone}' AND `email`='{$p_email}' AND `ip`='{$ip}' ");
if( !empty($one) ){
	print_r(json_encode(array('error'=>1, 'msg'=>'需求已存在，请不要重复提交')));
	exit;
}


// INSERT DATA
$sql_in = $wpdb->insert( 
	'triporders', 
	array( 
		'name'    => $p_name,
		'persons' => $p_person,
		'date'    => $p_date,
		'days'    => $p_days,
		'phone'   => $p_phone,
		'email'   => $p_email,
		'spot'    => $p_jingdian,
		'remark'  => $p_remark,
		'ip'      => $ip,
		'url'     => $p_from,
		'xianlu'     => $p_order,
		'ts'      => time()
	)
);

if( !$sql_in ){
	print_r(json_encode(array('error'=>1, 'msg'=>'提交失败，请稍后再试')));
	exit;
}

// EMAIL
$in_id = $wpdb->insert_id;
$mail = 0;
if( wp_mail($to, $subject, $message) ){
	$mail = 1;
}

$sql_up = $wpdb->query("UPDATE triporders SET mail={$mail} WHERE ID={$in_id}");


print_r(json_encode(array('error'=>0, 'msg'=>'提交成功，我们会联系您')));
exit;







function get_ip(){ 
    $onlineip=''; 
    if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){ 
        $onlineip=getenv('HTTP_CLIENT_IP'); 
    } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){ 
        $onlineip=getenv('HTTP_X_FORWARDED_FOR'); 
    } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){ 
        $onlineip=getenv('REMOTE_ADDR'); 
    } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){ 
        $onlineip=$_SERVER['REMOTE_ADDR']; 
    } 
    return $onlineip; 
} 


function _table_install(){
    global $wpdb;

    $table_name = "triporders";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) { 
        $sql = "CREATE TABLE " . $table_name . " (
		  `ID` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(60) DEFAULT '' NOT NULL,
		  `persons` int(11) DEFAULT '0' NOT NULL,
		  `date` int(11) DEFAULT '0' NOT NULL,
		  `days` int(11) DEFAULT '0' NOT NULL,
		  `phone` varchar(60) DEFAULT '' NOT NULL,
		  `email` varchar(60) DEFAULT '' NOT NULL,
		  `spot` varchar(255) DEFAULT '' NOT NULL,
		  `remark` text NOT NULL,
		  `ip` varchar(20) DEFAULT '' NOT NULL,
		  `url` varchar(255) DEFAULT '' NOT NULL,
		  `xianlu` int(11) DEFAULT '0' NOT NULL,
		  `mail` tinyint(1) DEFAULT '0' NOT NULL,
		  `ts` int(11) DEFAULT '0' NOT NULL,
		  PRIMARY KEY (`ID`)
          );";

        require_once(ABSPATH . "wp-admin/includes/upgrade.php");

        dbDelta($sql);
    }
}


function _str_len($str){
    return mb_strlen($str, 'utf-8');
}


function _checkDateIsValid($date, $formats = array("Y-m-d", "Y/m/d")) {
    $unixTime = strtotime($date);
    if (!$unixTime) { 
        return false;
    }

    $date = explode('-', $date);
	$m = $date[1]<10?'0'.$date[1]:$date[1];
	$d = $date[2]<10?'0'.$date[2]:$date[2];
	$date = $date[0].'-'.$m.'-'.$d;

    foreach ($formats as $format) {
        if (date($format, $unixTime) == $date) {
            return true;
        }
    }

    return false;
}