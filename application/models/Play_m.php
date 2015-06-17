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











        function check_repeat($name,$email){
			$query_name = $this->db->get_where('user_main', array('name' => $name));
			$result1 = $query_name->result();
			if(!empty($result1)){
				return 3;
			}
            $query_email = $this->db->get_where('user_main', array('mail' => $email));
            $result2 = $query_email->result();

			if(!empty($result2 )){
				return 4;
			}
			return 1;
			
		}

		//将注册信息入库
		function register($data){
            $arr = array();
            $arr['name'] = $data['name'];
            $arr['sex'] = $data['sex'];
            $arr['psw'] = $data['psw'];
            $arr['mail'] = $data['mail'];
			$query=$this->db->insert('user_main', $arr);
			if(!$query){
				return false;
			}else{
				return true;
			}
		}
		function getID($name,$type = 1){
            if($type == 2){
                $type = 'mail';
            }else{
                $type = 'name';
            }
			$query_name = $this->db->get_where('user_main', array($type => $name));
			$result = $query_name->result();
			return $result[0]->id;
		}
        
		//修改激活状态
        function getcheck($id){
            $arr=array('isCheck'=>1);
            $this->db->where('id',$id);
            $this->db->update('user_main',$arr);
        }
        function check_id($id){
            $query_id = $this->db->get_where('user_main', array('id' => $id));
            $result = $query_id->result();
            return $result;
        }
        //验证用户登录
       	function check_login($type,$u_name,$u_psw){
       		$arr = array();

            //登陆类型
	        if($type == 1){
	        	$query = $this->db->get_where('user_main', array('name' => $u_name));
	        }else if($type == 2){
	        	$query = $this->db->get_where('user_main', array('mail' => $u_name));
	        }
       		
            $result = $query->result();
            
            if(empty($result)){
            	$arr['status']=102;
            }else{
            	$name = $result[0]->name;
	            $psw = $result[0]->psw;
	            
            	if($psw == $u_psw){
            		$arr['status']=101;
            		$isCheck = $result[0]->isCheck;
                    if($isCheck == 0){
                        $arr['other'] = 'notCheck';
                    }else{
                        $arr['other'] = 0;
                    }

            	}else{
            		$arr['status']=103;
            	}
            }
            return $arr;


       	}






		function m_get($key,$n,$nvalue)
		{
			$this->db->where($n, $nvalue);
			$this->db->select($key);
			$query = $this->db->get('item');
			return $query->result();
		}

		function m_update($table,$arr,$n,$nvalue){
			$this->db->where($n,$nvalue);
			$this->db->update($table,$arr);
			echo '更新成功！';
		}
		function m_delete($n,$nvalue){
			$this->db->where($n,$nvalue);
			$this->db->delete('item');
			echo '删除成功！';
		}

		//获取条目具体内容
		function detail_get($no){
			$query = $this->db->get_where('item', array('no' => $no));
			$data=$query->result();
			return $data;
		}

		//通过学号获取用户全部信息
		function user_get($xuehao){
			$query = $this->db->get_where('user', array('xuehao' => $xuehao));
			$data=$query->result();
			return $data;
		}

		//获取某一类型的全部数据
		function items_get($type){
			$query = $this->db->get_where('item', array('type' =>$type));
			return $query->result();
		}

		function user_check($pname,$xuehao,$rankname)
		{	
			$query = $this->db->get_where('user', array('xuehao' => $xuehao));
			$data=$query->result();
			if(empty($data)){
				$z=serialize(array());		//序列化后的空数组
				$arr=array('pname'=>$pname,'xuehao'=>$xuehao,'rankname'=>$rankname,'chose'=>$z);
				$this->db->insert('user',$arr);
				return 0;
			}else{
				return intval($data[0]->times);
			}
			
		}

		function user_update($xuehao,$no)
		{	

			$query = $this->db->get_where('user', array('xuehao' => $xuehao));
			$data=$query->result();
			$times = $data[0]->times;
			$times = $times + 1;
			$chose = unserialize( $data[0]->chose );	//反转义成数组
			$chose[] = $no;								//将编号添加到已选
			$unchose=serialize($chose);		//将其转义成字符串以便存储
			$this->db->update('user', array('times' => $times,'chose'=>$unchose), array('xuehao' => $xuehao));
		}

		//票数更新
		function poll_update($no)
		{	
			$query = $this->db->get_where('item', array('no' => $no));
			$data=$query->result();
			$poll = $data[0]->poll;
			$poll = $poll + 1;
			$arr=array('poll'=>$poll);
			$this->db->where('no',$no);
			$this->db->update('item',$arr);
			
		}



		
	}
 ?>