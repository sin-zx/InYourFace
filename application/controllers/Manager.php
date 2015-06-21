<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			session_start();
			
		}
	function index()
	{		
			if(!isset($_SESSION['name']) || empty($_SESSION['name']) )
			{
				header("Location: ".base_url('admins/login.php'));
			}else{
				header("Location: ".base_url('admins/index.php'));
			}
	}
	function getlogin(){
			
	}


	function logout()
	{	
		session_destroy();
		$URL = site_url('manager');
		header("Location: ". $URL);
	}
}
