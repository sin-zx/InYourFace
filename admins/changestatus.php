<?php 
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.php');
	$used=$_GET['used'];
	$time=intval($_GET['time']);	//1506221

	$datas = $medoo->select("court_main", array('usingStatus'), array("id" => 20));
	$usingtime = $datas[0]['usingStatus'];
	$timearr = json_decode($usingtime);


	if($used == 0){
		$timearr[] = $time;
		$timearr = json_encode($timearr);
		if($medoo->update("court_main", array('usingStatus'=>$timearr), array("id" => 20))){
			echo "<script>alert('更新成功!');window.location.href='index.php';</script>";
		}else{
			// echo "<script>alert('更新失败！请重试');window.location.href='index.php';</script>";
			var_dump($medoo->error());
		}

	}else if($used == 1){
		if(($key = array_search($time,$timearr))){
    		unset($timearr[$key]);
		}
		echo "<script>alert('更新成功!');window.location.href='index.php';</script>";
	}
	/*if(empty($cname) || empty($addr) || empty($tel) || empty($amount)){
		echo "<script>alert('标*号的信息填写不完整，请重新填写');history.go(-1);</script>";
		exit();
	}
	$id = $medoo->insert("court_main", array("cname" => $cname));
	
	if(empty($id)){
		echo "<script>alert('添加失败！请重试');window.location.href='index.php';</script>";
	}
	else{
		$medoo->insert("court_others", array("courtID" => $id,'district'=>$district,'addr'=>$addr,'tel'=>$tel,'manager'=>$manager,
		'intro'=>$intro,'amount'=>$amount ));
		echo "<script>alert('添加成功!');window.location.href='index.php';</script>";
	}*/

 ?>