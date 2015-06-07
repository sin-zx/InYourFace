<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ry extends CI_Controller {
	function index($type=1)
	{	//判断是否登陆
		if(!isset($_SESSION['cas']) || empty($_SESSION['cas']))
		{
			header(site_url());
		}else{
		$this->load->model('testmodel');
		$xuehao = $_SESSION['cas']['StudentNo'];
		$user = $this->testmodel->user_get($xuehao);
		$data['times']=$user->times;
		$data['pname']=$user->pname;
		$data['items']=$this->testmodel->items_get($type);		//取得相应类型的全部方案

		//导航活跃状态判断
		switch ( $type ) {
		    case  1 :
		        $data['n1']='active';
		        break;
		    case  2 :
		        $data['n2']='active';
		        break;
		    case  3 :
		        $data['n3']='active';
		        break;
		    case  4 :
		        $data['n4']='active';
		        break;
		    case  5 :
		        $data['n5']='active';
		        break;
		}
		//传递数据，载入视图
		$this->load->view('ry/header',$data);
		$this->load->view('ry/main',$data);
		$this->load->view('ry/footer');
	}
	}

	function detail($no)
	{	
		$this->load->model('testmodel');
		$data = $this->testmodel->detail_get($no);
		$this->load->view('ry/header');
		$this->load->view('ry/detail',$data);
		$this->load->view('ry/footer');
	}

	function intro()
	{
		$this->load->view('ry/header');
		$this->load->view('ry/intro');
		$this->load->view('ry/footer');
	}

	function vote($no,$xuehao)
	{	

		if(!isset($_SESSION['cas']) || empty($_SESSION['cas']))
		{
			header( site_url() );
		}else{

		$this->load->model('testmodel');
		$user=$this->testmodel->user_get($xuehao);		//判断用户

		if(!empty($user) &&  intval($user->times)>=0 && intval($user->times)< 3 )
		{
			$query1=$this->testmodel->poll_update($no);					//添加票数
			$query2=$this->testmodel->user_update($xuehao);						//更新用户数据
			if(!$query1 || !$query2){
				echo "<script>alert('投票失败！请稍后重试或者直接联系我们');</script>";
				header('site_url("ry")');
			}
			echo "<script>alert('投票成功！');</script>";
			header('site_url("ry")');
		}else{
			echo "<script>alert('你的投票次数已达上限');</script>";
			header('site_url("ry")');
		}
	}

	}

}
