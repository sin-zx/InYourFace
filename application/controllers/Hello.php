<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
	function __construct()
		{
			
		}

	function index()
	{		
		header('Content-type: application/json; charset=utf-8');
		$json=file_get_contents("php://input");
		$data  = json_decode($json,true);
		$name=$data['name'];
		$psw=$data['psw'];
		$sex=$data['sex'];
		$email=$data['mail'];
		$arr= array('yourname' => $name, 'password'=>md5($psw));
		echo json_encode($arr);

	}
	

	

}
