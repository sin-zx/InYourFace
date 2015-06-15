<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
		{
			parent::__construct();
            header('Content-type: application/json;charset=utf-8');   //设置数据格式为json
		}
	function index()
	{		
		//
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
            

            //发送邮件
            $encrypt_name=md5($name);
            $id = $this->user_m->getID($name);
            $link = 'http://119.29.58.57/inyourface/login/checkemail'.'/'.$id.'/'.$encrypt_name;
            $this->load->helper('mailer');
            $send_result = send_mailer($email,$link);

            if(!$send_result){
                $checkinfo = 2;
            }
        }
		$info= array('status' => $checkinfo);
		echo json_encode($info);
	}


    //接收激活邮箱请求
    function checkemail($id,$nameA){
//        $this->load->library('encrypt');
//        $name = $this->encrypt->decode($str);
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

    //登陆
    function start()
    {
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $info= array('status' => 5);
            echo json_encode($info);
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
        if($checklogin['other'] == 0){
            $id = $this->user_m->getID($name,$type);
            $checklogin['other'] = (string)$id;
        }
        echo json_encode($checklogin);
    }

    function resend_mail(){
        $json=file_get_contents("php://input");
        $data  = json_decode($json,true);
        $name=$data['name'];
        $psw=$data['psw'];
        $type=intval($data['type']);
        $this->load->model('user_m');
        
    }
	function test(){

        $this->load->helper('mailer');
        send_mailer();

	}

    function sendemail(){
        $config = array();
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/sbin/sendmail"; // or "/usr/sbin/sendmail"
        $config['mailtype'] = 'text';
        $config['protocol']    = 'smtp';
        $config['smtp_port']   =  587;
        $config['smtp_host']   = 'smtp.qq.com';
        $config['smtp_user']   = '525114969@qq.com';
        $config['smtp_pass']   = 'cherish941026';
        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('525114969@qq.com', '来自猩猩的小队');
        $this->email->to('sin_112233@163.com');
        $this->email->cc('554659766@qq.com');
       //$this->email->bcc('525114969@qq.com');
        $this->email->subject('Email Test');
        $this->email->message('message ');

        var_dump( $this->email->send());
        echo $this->email->print_debugger();
    }

	//注销登陆
	function logout()
	{
		session_destroy();
		header(site_url());
	}
}
