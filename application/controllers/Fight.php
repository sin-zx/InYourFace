<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fight extends CI_Controller {
	function __construct()
		{
			parent::__construct();
            header('Content-type: application/json;charset=utf-8');   //设置数据格式为json
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
            $info= array('status' => 10000);
            $arr['head'] = $info;
            echo json_encode($arr);
            exit();
        }
        $data = json_decode($json,true);
        $offset = $data['offset'];
        $district = $data['district'];
        $this->load->model('play_m');
        $list = $this->play_m->getlist($district,$offset);
        if(empty($list)){
            $arr['head']['status'] = 100;   //没有记录
        }else{
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
            $info= array('status' => 5);
            echo json_encode($info);
            exit();
        }
        $arr = array('status'=>101);
        $data = json_decode($json,true);
        $offset = $data['offset'];
        $district = $data['district'];
        $this->load->model('play_m');
        $list = $this->play_m->getCourts($district,$offset);
        if(empty($list)){
            $arr['head']['status'] = 100;   //没有记录
        }else{
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


    //获取特定场地信息
    function getCourt($id){
        $this->load->model('play_m');
        $court = $this->play_m->getOneCourt($id);
        if(empty($court)){
            $arr['head']['status'] = 100;   //没有记录
        }else{

            foreach($court[0] as $key => $value){
                $arr['data'][$key] = json_decode($value);
            }
            $arr['head']['status'] = 101;   //成功
        }
        $arr['head']['type'] = 4;
        echo json_encode($arr);
    }

    //发起战书
    function setFight(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $info= array('status' => 5);
            echo json_encode($info);
            exit();
        }
        $arr = array('status'=>101);
        $data = json_decode($json,true);
        $user = $data['user'];

    }






}
