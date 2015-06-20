<?php 
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.php');
	$cname=$_POST['cname'];
	$district=intval($_POST['district']);
	$addr=$_POST['addr'];
	$tel=$_POST['tel'];
	$manager=$_POST['manager'];
	$intro=$_POST['intro'];
	$amount=intval($_POST['amount']);
	if(empty($cname) || empty($addr) || empty($tel) || empty($amount)){
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
	}

 ?>