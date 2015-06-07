<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
		{
			parent::__construct();
            header('Content-type: application/json');   //设置数据格式为json

			//session_start();
			// {
			// 	header("Location: ".site_url());
			// }
		}
	function index()
	{		
		/*
		$json=file_get_contents("php://input");
		$data  = json_decode($json,true);
		$name = $data['name'];
		$psw = $data['psw'];
		*/
	}

    //注册
	function register(){
		$json=file_get_contents("php://input");
		if(!isset($json)){
			$info= array('status' => 5);
			echo json_encode($info);
			exit();
		}
        $data  = json_decode($json,true);
		$name=$data['name'];
		$psw=$data['psw'];
		$sex=$data['sex'];
		$email=$data['mail'];

		$this->load->model('user_m');
		$checkinfo = $this->user_m->check_repeat($name,$email);
		if($checkinfo==1){
			if(!$this->user_m->register($data)){
				$checkinfo=2;
			}

            //$this->load->library('encrypt');
           // $encrypt_name = $this->encrypt->encode($name);  //对用户名加密后作为激活链接后缀
            $encrypt_name=$name;

            //发送邮件
            $this->load->library('email');
            $this->email->from('inyourfaceapp@163.com', '来自猩猩的小队');
            $this->email->to($email);
          //$this->email->cc('525114969@qq.com');
           //$this->email->bcc('inyourfaceapp@163.com');
            $this->email->subject('验证你的InYourFace账号');
            $msg = '<h1>请点击以下链接激活您的账号:</h1>'.'http://119.29.58.57/inyourface/login/checkemail'.'/'.$encrypt_name;
            $this->email->message($msg);

            if(!$this->email->send()){
                $checkinfo = 2;
            }
        }
		$info= array('status' => $checkinfo);
		echo json_encode($info);
	}

    //接收激活邮箱请求
    function checkemail($str){
//        $this->load->library('encrypt');
//        $name = $this->encrypt->decode($str);
        $name = $str;
        $this->load->model('user_m');
        $result = $this->user_m->check_name($name);
        if(empty($result)){
            die("用户名不存在");
        }
        if($result[0]->isCheck == 1){
            die('你已经激活！无需重复激活');
        }

        if(!$this->user_m->getcheck($name)){
            echo '验证失败！服务器繁忙请稍后重试';
        }else{
            echo '验证成功！欢迎来到InYourFace！';
        }
    }
    function start()
    {
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $info= array('status' => 5);
            echo json_encode($info);
            exit();
        }
        $data  = json_decode($json,true);
    }

	function test(){

        echo UNKNOWN_ERR;
        echo NORMAL;
	}
    function sendmail(){

        $this->load->library('email');
        $this->email->from('inyourfaceapp@163.com', '来自猩猩的小队');
        $this->email->to('525114969@qq.com');
        $this->email->cc('525114969@qq.com');
        $this->email->bcc('525114969@qq.com');
        $this->email->subject('Email Test');
        $this->email->message('message ');

        var_dump( $this->email->send());
    }

	//注销登陆
	function logout()
	{
		session_destroy();
		header(site_url());
	}

	

}
