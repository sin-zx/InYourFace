<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fight extends CI_Controller {
	function __construct()
		{
			parent::__construct();
            header('Content-type: application/json;charset=utf-8');   //设置数据格式为json
            //初始化数据包：
            $arr['head']['status'] = 101;   //状态码 默认成功
            $arr['head']['other'] = '';     //附加字段
            $arr['data'] = '';              //具体数据
		}
	function index()
	{		
		//
	}
    /* test
    function testadd(){
        $this->load->model('play_m');
        $query =  $this->play_m->addsome();
        if($query){
            echo 'good';
        }
    }
    function testjoin(){
        $this->load->model('play_m');
        $result = $this->play_m->join();
        var_dump($result);
    }
    */

    //请求约战列表/刷新
    function getlist(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
        }
        $data = json_decode($json,true);

        $listtype = $data['listtype'];
        $offset = $data['offset'];
        $district = $data['district'];
        $timescpoe = $data['timescpoe'];
        $rule = $data['rule'];
        $this->load->model('play_m');
        $list = $this->play_m->getlist($district,$offset);
        if(!empty($list)){
            $arr['head']['status'] = 101;   //成功
            $arr['head']['other'] = (string)($offset + 15);   //偏移量
            foreach($list as $zlist){
                $n = array();
                foreach($zlist as $key => $value){
                    $n[$key] = $value;
                }
                $arr['data'][] = $n;
            }
        }
        $arr['head']['type'] = 6;
        echo json_encode($arr);
    }

    //获取场地信息列表
    function courtlist(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
        }
        $data = json_decode($json,true);
        $offset = $data['offset'];
        $district = $data['district'];
        $this->load->model('play_m');
        $list = $this->play_m->getCourts($district,$offset);
        if(!empty($list)){
            $arr['head']['status'] = 101;   //成功
            $arr['head']['other'] = (string)($offset + 15);   //偏移量
            foreach($list as $zlist){
                $n = array();
                foreach($zlist as $key => $value){
                    $n[$key] = $value;
                }
                $arr['data'][] = $n;
            }
        }
        $arr['head']['type'] = 3;
        echo json_encode($arr);
    }


    //获取单个场地详细信息
    function getCourt($id){
        $this->load->model('play_m');
        $court = $this->play_m->getOneCourt($id);
        if(!empty($court)){

            foreach($court[0] as $key => $value){
                $arr['data'][$key] = json_decode($value);
            }
            $arr['head']['status'] = 101;   //成功
        }
        $arr['head']['type'] = 4;
        echo json_encode($arr);
    }

    //获取场地某一天可用空位时间段
    function getFreetime(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
        }
        $data = json_decode($json,true);
        $whichday = $data['whichday'];
        $courtID = $data['courtID'];
        $this->load->model('play_m');
        $n = $this->play_m->getUsingstatus($courtID);
        $usingstatus = json_decode($n);     //得到场地所有已占用时间的数组

        foreach($usingstatus as $str) {
            if( preg_match("/^".$whichday."+[1-9]{1}$/",$str) ){
                $usedtime[] =  $str;
            }
        }   //自此得到 当天 被占用 的时间段数组

        //提取出时间段对应的数字
        foreach ($usedtime as $v) {
            $t[] = substr($v,6,1);
        }
        $alltime = array(1,2,3,4,5,6,7,8,9);
        $freetime = array_diff($alltime, $t);   //取两个数组差值 即所求
        $result = json_encode($freetime);
        $arr['data'] = $result;

        $arr['head']['type'] = 7;
        echo json_encode($arr);
    }


    //发起战书
    function setFight(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
        }
        $arr = array('status'=>101);
        $data = json_decode($json,true);
        $user = $data['user'];

    }






}
