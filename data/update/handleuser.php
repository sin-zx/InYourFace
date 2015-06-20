<?php 
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.php');
	$name=$_POST['name'];
	if(empty($name)){
		echo "<script>alert('标*号的信息填写不完整，请重新填写');history.go(-1);</script>";
		exit();
	}
	$psw = '112233';
	$mail = time().'@qq.com';
	$id = $medoo->insert("user_main", array("name" => $name,"psw" => $psw,"mail" => $mail,"sex" =>0,"isCheck" => 1));
	
	if(empty($id)){
		echo "<script>alert('添加失败！请重试');window.location.href='adduser.php';</script>";
	}
	else{
		$medoo->insert("user_others", array("userID" => $id));
		echo "<script>alert('添加成功!');window.location.href='adduser.php';</script>";
	}

 ?>