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
			$query=$this->db->insert('user_main', $data); 
			if(!$query){
				return false;
			}else{
				return true;
			}
		}
        function checklogin($name,$psw){
            $query_name = $this->db->get_where('user_main', array('name' => $name));
            $result = $query_name->result();
            if(empty($result)){
                return 0;
            }
            if($result[0]->psw == $psw){
                return 1;
            }
        }

        function getcheck($name){
            $arr=array('isCheck'=>1);
            $this->db->where('name',$name);
            $this->db->update('user_main',$arr);
        }
        function check_name($name){
            $query_name = $this->db->get_where('user_main', array('name' => $name));
            $result = $query_name->result();
            return $result;
        }




		function test(){
			$query_name = $this->db->get_where('user_main', array('name' => 'xzx'));
			return $query_name->result();
			
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