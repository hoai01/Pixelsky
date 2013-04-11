<?php
set_time_limit(5);
error_reporting(E_ALL ^ E_NOTICE);

if(!isset($_GET['password']) || $_GET['password'] != 'wetravel')
{
	exit;
}

header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');

$db = array(
	'host' => '159.253.0.105',
	'user' => 'waynede76_wt',
	'pass' => 'XXAFQem0',
	'db' => 'waynede76_wt'
);

$mysql = mysql_connect($db['host'],$db['user'],$db['pass'])

if(!$mysql) {
	die('Verbinding error');
}
mysql_select_db($db['db']);

if($_GET['action'] == 'login' || $_POST['action'] == 'login')
{
	//check if user exists
	//return true/false
	//als je ingelogd bent -> return 1
	//als je niet ingelogd bent -> return 0
	$data = array(
		'result' => 0
	);
	echo json_encode($data);
}



?>