<?php 
	class User_m extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		//检验用户名和邮箱是否已存在
        /**
         * @param $name
         * @param $email
         * @return int
         */
        function check_repeat($name,$email){
			$query_name = $this->db->get_where('user_main', array('name' => $name));
			$result1 = $query_name->result();
			if(!empty($result1)){
				return 203;
			}
            $query_email = $this->db->get_where('user_main', array('mail' => $email));
            $result2 = $query_email->result();

			if(!empty($result2 )){
				return 204;
			}
			return 101;
			
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
            	$arr['status']=205;
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
            		$arr['status']=206;
            	}
            }
            return $arr;
       	}


	}
 ?>