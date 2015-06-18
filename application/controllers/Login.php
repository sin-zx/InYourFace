<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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


    //注册
	function register(){
		$json=file_get_contents("php://input");
		if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
		}
        $data  = json_decode($json,true);
		$name=$data['name'];
		$psw=$data['psw'];
		$sex=$data['sex'];
		$email=$data['mail'];
		$this->load->model('user_m');
		$checkinfo = $this->user_m->check_repeat($name,$email);
		if($checkinfo==101){
			if(!$this->user_m->register($data)){
				$checkinfo=202;
			}
            //发送邮件
            $encrypt_name=md5($name);
            $id = $this->user_m->getID($name);
            $link = 'http://119.29.58.57/inyourface/login/checkemail'.'/'.$id.'/'.$encrypt_name;
            $this->load->helper('mailer');
            $send_result = send_mailer($email,$link);

            if(!$send_result){
                $checkinfo = 202;
            }
        }
        $arr['head']['status'] = $checkinfo;
        $arr['head']['type'] = 1;
		echo json_encode($arr);
	}

    //登陆
    function start()
    {
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo json_encode($arr);
            exit();
        }
        $data  = json_decode($json,true);
        $name=$data['name'];
        $psw=$data['psw'];

        //判断登录名是否为邮箱格式
        if( preg_match("/^[-a-zA-Z0-9_.]+@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$/",$name) ){
            $type = 2;
        }else{
            $type = 1;
        }
        $this->load->model('user_m');
        $checklogin = $this->user_m->check_login($type,$name,$psw);
        if($checklogin['status'] == 101) {
            if ($checklogin['other'] == 0) {
                $id = $this->user_m->getID($name, $type);
                $checklogin['other'] = (string)$id;
            }
        }
        $checklogin['type'] = 2;
        $arr['head'] = $checklogin;
        echo json_encode($arr);
    }

    function resend_mail(){
        $json=file_get_contents("php://input");
        $data  = json_decode($json,true);
        $name=$data['name'];
        $psw=$data['psw'];
        $type=intval($data['type']);
        $this->load->model('user_m');

    }

    //接收激活邮箱请求
    function checkemail($id,$nameA){
        $this->load->model('user_m');
        $result = $this->user_m->check_id($id);
        if(empty($result)){
            die("用户名不存在");
        }

        if($result[0]->isCheck == 1){
            die('你已经激活！无需重复激活');
        }
        if(!$this->user_m->getcheck($id)){
            echo '验证失败！服务器繁忙请稍后重试';
        }else{
            echo '验证成功！欢迎来到InYourFace！';
        }
    }


	//注销登陆
	function logout()
	{
		session_destroy();
		header(site_url());
	}
}
