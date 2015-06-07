<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		
		echo "hello world!<br>";
		echo site_url();
		echo '<br>'.base_url();
		echo  '<a href="'.base_url('upload').'">s</a>';
	}
	public function say()
	{	
		$this->load->model('testmodel');

		$this->db->where('num', 356);
		$this->db->select('title');
		$query = $this->db->get('item');
		$data=$query->result();
		var_dump($data);

		/*
		foreach ($data as $key) {
			echo $key->num;
		}
		*/
	}
	public function 批量插入数据()
	{	
		$this->load->model('testmodel');
		for($i=106;$i<=125;$i++){
			$arr=array('no'=>$i,'title'=> 'title'.$i,'author'=>'author'.$i,'imgname'=>$i.'.jpg','filename'=>$i.'.docx','type'=>5);
			$this->testmodel->m_insert($arr);
		}
		echo "sucess!";
		

		/*
		foreach ($data as $key) {
			echo $key->num;
		}
		*/
	}
	public function get()
	{	
		echo $_GET['id'];
		

		/*
		foreach ($data as $key) {
			echo $key->num;
		}
		*/
	}

	public function show(){
		$c=array('one'=>'this ','two'=>'is ','three'=>'me.');
		$arr= array('name' => 'xu', 'num'=>012,'arr'=>$c);
		$this->load->view('testview',$arr);		//多个视图只需传入一个即可
		$this->load->view('testview_foot');
		
	}
}
