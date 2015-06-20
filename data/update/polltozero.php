<?php 
	//将票数清零
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.php');

	$usingStatus = json_encode(array());
	for ($i=13; $i <=32 ; $i++) { 
		$medoo->update("court_main", array('usingStatus'=>$usingStatus),array('id'=>$i));
	}
	
	
 ?>