<?php
//$data = array("name" => "梓鑫", "sex" => "man", "mail" => "525114969@qq.com", "psw" => "112233");
//$data = array("name" => "梓鑫", "psw" => "112233");
 $data = array("district" => 0, "offset" => 0,'listtype'=>1,'timescpoe'=>2,
 	'rule'=>0);
// $data = array("listtype"=>1,"district" => 440305, "name"=>"testuser","cnames"=>"蛇口体育中心篮球场","choseTime"=>1506221,
// 			"service"=>array(0,1),"rule"=>1);
$data_string = json_encode($data);
//$ch = curl_init('http://119.29.58.57/inyourface/login/register');
$ch = curl_init('http://119.29.58.57/inyourface/fight/getlist');
//$ch = curl_init('http://119.29.58.57/inyourface/fight/setFight');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
echo $result;
?>
