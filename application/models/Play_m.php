<?php 
	class Play_m extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
            $this->load->helper('jsonencode');
		}

        function getuserID($uname){
            $query = $this->db->get_where('user_main', array('name' => $uname));
            $result = $query->result();
            if(empty($result)){
                return null;
            }
            return $result[0]->id;
        }
        function getcourtID($cname){
            $query = $this->db->get_where('court_main', array('cname' => $cname));
            $result = $query->result();
            if(empty($result)){
                return null;
            }
            return $result[0]->id;
        }
       /* 测试用
        function addsome(){
            $user = array('testuser');
            $users = my_json_encode($user);
            $court = array('荔香公园篮球场');
            $court = my_json_encode($court);
            $district = 440305;
            $choseTime = array(1506222);
            $choseTime = my_json_encode($choseTime);
            $service = array(0,1);
            $service = my_json_encode($service);
            $this->db->insert('fightfree',array('district'=>$district,'name'=>$users,'cnames'=>$court,'choseTime'=>$choseTime,
                'service'=>$service,'rule'=>2 ));
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
        function getlist($listtype,$district,$offset,$timescpoe,$rule){ 
            $limit = 15;
            if($listtype == 1){
                $database = 'fightfree';
            }elseif($listtype == 2){
                $database = 'fightfixed';
            }
            $this->db->select('id,name,cnames,choseTime,isChose');
            $arr = array();
            if($district != 0){
                $arr['district'] = $district;
            }
            if($rule != 0){
                $arr['rule'] = $rule;
            }
            if($timescpoe == 0){
                $time = time()+3600*24*100;
            }else if($timescpoe == 1){
                $time = time()+3600*24*3;
            }else if($timescpoe == 2){
                $time = time()+3600*24*7;
            }
            else if($timescpoe == 3){
                $time = time()+3600*24*30;
            }
            $t1[] = intval(date('ymd',$time).'0');
            $t2[] = intval(date('ymd').'0');
            $arr['choseTime<='] = my_json_encode($t1);
            $arr['choseTime>='] = my_json_encode($t2);
            $this->db->order_by("id", "desc"); 
            $query = $this->db->get_where($database, $arr, $limit, $offset);
            return $query->result();
        }


        function callfight($name,$fightID,$listtype){
            $this->db->select('name,cnames,choseTime,isChose');
            if($listtype == 1){
                $database = 'fightfree';
                $query = $this->db->get_where($database, array('id' => $fightID) );
            }elseif($listtype == 2){
                $database = 'fightfixed';
                $query = $this->db->get_where($database, array('id' => $fightID) );
            }
            $result = $query->result();
            if(empty($result)){

                return 202;
            }
            $uname = json_decode($result[0]->name,true);
            $cnames = json_decode($result[0]->cnames,true);
            $choseTime = json_decode($result[0]->choseTime,true);
            //更新战贴信息
            $uname[] = $name;
            $data = array(
               'name' => $uname,
               'isChose' => 1
            );
            $this->db->where('id', $fightID);
            if($this->db->update($database, $data)){    //更新战贴记录，变为已确定状态
                return 101;
            }else{
                return 202;
            }
        }

        function setFight($arr){
            $arr1[] = $arr['cnames'];
            $arr2[] = $arr['choseTime'];
            $arr3[] = $arr['name'];
            $cnames = my_json_encode($arr1);
            $choseTime = my_json_encode($arr2);
            $name = my_json_encode($arr3);
            $service = my_json_encode($arr['service']);
            
            if($arr['listtype'] == 1){
                $database = 'fightfree';
            }elseif($arr['listtype'] == 2){
                $database = 'fightfixed';
            }
            $this->db->set('district', $arr['district']);
            $this->db->set('cnames', $cnames);
            $this->db->set('choseTime', $choseTime);
            $this->db->set('service', $service);
            $this->db->set('name', $name);
            if($arr['rule'] != 0){
                $this->db->set('rule', $arr['rule']);
            }
            if($this->db->insert($database)){
                return true;
            }else{
                return false;
            }
        }

        //获取用户信息
        function getUser($id){
            $query = $this->db->get_where('court_others', array('id' => $id));
            return $query->result();
        }



	}
 ?>