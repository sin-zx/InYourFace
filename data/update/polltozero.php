<?php 
	//将票数清零
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.php');

	$users = array('user1');
	$court = array(13,15,13);
	$Time = array(1434498393,1434498393,1434498393);
	$district = 440305;
	$courtID = json_encode($court);
	$choseTime = json_encode($Time);
	echo $medoo->insert("date_list", array('district'=>$district,'users'=>$users,'courtID'=>$courtID,'choseTime'=>$choseTime ));
	
 ?>