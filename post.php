<?php
$data = array("name" => "chrysalissss", "sex" => "man", "mail" => "525114969@qq.com", "psw" => "112233");
$data_string = json_encode($data);
$ch = curl_init('http://119.29.58.57/inyourface/login/register');
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
