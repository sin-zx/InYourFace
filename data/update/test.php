<?php 
header("Content-Type: text/html;charset=UTF-8");
/*
echo md5("许梓鑫");
$url = "http://www.weather.com.cn/weather/101050101.shtml";
$t1 = time();
    
$page_content = file_get_contents($url);
$t2 = time();

$start = 1;
$end = 3;

if ($end > 7){
    echo "超出预报能力范围，请重新设置！";
}else {
    echo "未来".($end-$start)."天哈尔滨的天气预报（"
              .date('Y-m-j')."发布）";

    eregi("--day $start--(.*)--day $end--", $page_content, $res);

    $forecast = str_replace("<img src=\"",
        "<img src=\"http://www.weather.com.cn", $res[0]);
    $t3 = time();

    echo $forecast;

    echo 'First step costs '.($t2 - $t1).' ms.';
    echo 'Last step costs '.($t3 - $t2).' ms.';
}
*/
/*
echo time();
echo '<br>';
echo time()+3600*24;
echo '<br>';
echo time()+3600*24*2;
*/
//$arr = array('a' => array('1' => 2,'2'=>'erw' ),'b'=> array('c' => 'sdad' ) );
//echo json_encode($arr);

/*$arr = array('a','a','a','d','f','e' );
$arr[] = 's';
echo date('Y-m-j h:i:s',1434498393);*/

$arr = array('' => , '' => ,'' => ,'' => );
echo json_encode($arr);
 ?>