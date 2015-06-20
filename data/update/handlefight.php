<?php 
	header("Content-type: text/html; charset=utf-8");
	function my_json_encode($value)
{
    if (version_compare(PHP_VERSION,'5.4.0','<'))
    {
        $str = json_encode($value);
        $str = preg_replace_callback(
                                    "#\\\u([0-9a-f]{4})#i",
                                    function($matchs)
                                    {
                                         return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
                                    },
                                     $str
                                    );
        return $str;
    }
    else
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}

	require_once('conn.php');
	$name=$_POST['name'];
		$name=my_json_encode(array($name));
	$cnamess=$_POST['cnames'];
		$cnames=my_json_encode(array($cnamess));
	$district=intval($_POST['district']);
	$choseTime1=intval($_POST['choseTime']);
		$choseTime=my_json_encode(array($choseTime1));
	$rule=intval($_POST['rule']);
	$service = my_json_encode(array(0,1));
	if(empty($name) || empty($cnames) || empty($district) || empty($choseTime)){
		echo "<script>alert('信息填写不完整，请重新填写');history.go(-1);</script>";
		exit();
	}
	$id = $medoo->insert("fightfree", array("name" => $name,"cnames" => $cnames,"district" => $district,"choseTime" => $choseTime,
		"rule" => $rule,"service" => $service));
	if(empty($id)){
		echo "<script>alert('添加失败！请重试');window.location.href='addfight.php';</script>";
	}
	else{
		$datas = $medoo->select("court_main", array('usingStatus'), array('cname'=>$cnamess));
		$usingStatus = $datas[0]['usingStatus'];
		$usingStatus = json_decode($usingStatus);
		$usingStatus[] = $choseTime1;
		$usingStatus = my_json_encode($usingStatus);
		$medoo->update("court_main", array('usingStatus'=>$usingStatus),array('cname'=>$cnamess));
		echo "<script>alert('添加成功!');window.location.href='addfight.php';</script>";
	}

 ?>