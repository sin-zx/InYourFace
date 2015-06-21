<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklogin extends CI_Controller {

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
			$MyServer = "http://su.szu.edu.cn";//您的网站域名，需要备案，否则不生效
			$CASserver = "http://yigong.szu.edu.cn/CAS/";//身份认证URL**不能修改**
			$ReturnURL = site_url("checklogin/hello");//用户认证后跳回到您的网站，根据实际情况修改
			function RegexLog($xmlString,$subStr)
		    {
				preg_match('/<cas:'.$subStr.'>(.*)<\/cas:'.$subStr.'>/i',$xmlString,$matches);
				return $matches[1];  
		    }
			if(isset($_GET["ticket"]))
			{
				$URL = $CASserver . "serviceValidate?ticket=" . $_GET["ticket"] . "&service=". urlencode($ReturnURL);
				$xmlString = file_get_contents($URL);//ticket短时间内一次请求有效，请自行保存session
				$_SESSION['cas']['casName']= RegexLog($xmlString, "PName");//姓名
				$_SESSION['cas']['StudentNo']= RegexLog($xmlString, "StudentNo");//学号
				$_SESSION['cas']['RankName']= RegexLog($xmlString, "RankName");//用户类别ID编号
				$pname=$_SESSION['cas']['casName'];
				$xuehao=$_SESSION['cas']['StudentNo'];
				$rankname=$_SESSION['cas']['RankName'];
				$this->load->model('testmodel');
				$this->testmodel->user_check($pname,$xuehao,$rankname);
				header("Location: ".site_url('ry'));
			}else{
				show_404();
			}
	}


	function logout()
	{	
		session_destroy();
		$URL = site_url('checklogin');
		header("Location: ". $URL);
	}
}
