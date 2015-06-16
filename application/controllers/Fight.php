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

    //请求约战列表
    function getlist(){
        $json=file_get_contents("php://input");
        if(!isset($json)){
            $info= array('status' => 5);
            echo json_encode($info);
            exit();
        }
        $data = json_decode($json,true);
        $data['id'];
    }

}
