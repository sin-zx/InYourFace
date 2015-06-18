<?php 
	class Play_m extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

        /* 测试用

        function addsome(){
            $user = array('user6');
            $court = array(26);
            $Time = array(1454198393);
            $district = 440305;
            $users = json_encode($user);
            $courtID = json_encode($court);
            $choseTime = json_encode($Time);
            $this->db->insert('date_list',array('district'=>$district,'users'=>$users,'courtID'=>$courtID,'choseTime'=>$choseTime ));
        }
        */

        //获取场馆列表 联表查询
        function getCourts($district=0,$offset = 0,$limit = 15){
            $this->db->select('id,cname,addr');
            $this->db->from('court_main');
            $this->db->join('court_others', 'court_main.id = court_others.courtID');
            if($district != 0){
                $this->db->where('district',$district); //限定区
            }

            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result();
        }

        //
        function getOneCourt($id){
            $this->db->select('cname,addr,intro,manager,tel,amount');
            $this->db->from('court_main');
            $this->db->join('court_others', 'court_main.id = court_others.courtID');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $query->result();
        }

        //获取场地可用时间段
        function getUsingstatus($courtID){
            $query = $this->db->get_where('court_main', array('id' => $courtID));
            $result = $query->result();
            $usingstatus = $result[0]->usingStatus;
            return $usingstatus;
        }

        //约战信息列表
        function getlist($district=0,$offset = 0,$limit = 15){
            $this->db->select('id,name,cnames,addr,choseTime,isChose');
            if($district == 0){
                $query = $this->db->get('date_list', $limit, $offset);
            }else{
                $query = $this->db->get_where('date_list', array('district' => $district), $limit, $offset);
            }
            return $query->result();
        }




        //获取用户信息
        function getUser($id){
            $query = $this->db->get_where('court_others', array('id' => $id));
            return $query->result();
        }



	}
 ?>