<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fight extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        header('Content-type: application/json;charset=utf-8');   //设置数据格式为json
        //初始化数据包：
        $arr['head']['status'] = 101;   //状态码 默认成功
        $arr['head']['other'] = '';     //附加字段
        $arr['data'] = '';              //具体数据
        $this->load->helper('jsonencode');
    }

    function index()
    {
        //
    }

    function testadd()
    {
        $this->load->model('play_m');
        for ($i = 0; $i < 40; $i++) {
            $query = $this->play_m->addsome();
        }

    }
    /* test
    function testjoin(){
        $this->load->model('play_m');
        $result = $this->play_m->join();
        var_dump($result);
    }
    */

    //请求约战列表/刷新
    function getlist()
    {
        $json = file_get_contents("php://input");
        if (!isset($json)) {
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo my_json_encode($arr);
            exit();
        }
        $data = json_decode($json, true);
        $listtype = $data['listtype'];
        $offset = $data['offset'];
        $district = $data['district'];
        $timescpoe = $data['timescpoe'];
        $rule = $data['rule'];
        $this->load->model('play_m');
        $list = $this->play_m->getlist($listtype, $district, $offset, $timescpoe, $rule);
        if (!empty($list)) {
            $arr['head']['status'] = 101;   //成功
            $arr['head']['other'] = (string)($offset + 15);   //偏移量

            foreach ($list as $zlist) {
                $n = array();
                $n['id'] = intval($zlist->id);
                $n['name'] = json_decode($zlist->name, true);
                $n['cnames'] = json_decode($zlist->cnames, true);
                $timearr = json_decode($zlist->choseTime, true); //数组
                $newtime = (string)changestr($timearr[0]);              //将1506201变成15/06/20/1格式
                $n['choseTime'] = array($newtime);
                $n['isChose'] = intval($zlist->isChose);

                $uname = $n['name'][0];
                $u = intval($this->play_m->getuserID($uname));
                $n['userids'] = array($u);
                $cname = $n['cnames'][0];
                $c = intval($this->play_m->getcourtID($cname));
                $n['courtids'] = array($c);
                // foreach($zlist as $key => $value){
                //     $n[$key] = $value;
                // }

                $arr['data'][] = $n;
            }
        } else {
            $arr['head']['status'] = 207;
        }
        $arr['head']['type'] = 6;
        echo my_json_encode($arr);
    }

    //接受战贴
    function callfight()
    {
        $json = file_get_contents("php://input");
        if (!isset($json)) {
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo my_json_encode($arr);
            exit();
        }
        $data = json_decode($json, true);
        $name = $data['name'];
        $fightID = $data['fightID'];
        $listtype = $data['listtype'];
        $this->load->model('play_m');
        $callstatus = $this->play_m->callfight($name, $fightID, $listtype);
        $arr['head']['status'] = $callstatus;
        $arr['head']['type'] = 7;
        echo my_json_encode($arr);
    }

    //获取场地信息列表
    function courtlist()
    {
        $json = file_get_contents("php://input");
        if (!isset($json)) {
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo my_json_encode($arr);
            exit();
        }
        $data = json_decode($json, true);
        $offset = $data['offset'];
        $district = $data['district'];
        $this->load->model('play_m');
        $list = $this->play_m->getCourts($district, $offset);
        if (!empty($list)) {
            $arr['head']['status'] = 101;   //成功
            $arr['head']['other'] = (string)($offset + 15);   //偏移量
            foreach ($list as $zlist) {
                $n = array();
                foreach ($zlist as $key => $value) {
                    $n[$key] = $value;
                }
                $arr['data'][] = $n;
            }
        }
        $arr['head']['type'] = 3;
        echo my_json_encode($arr);
    }


    //获取单个场地详细信息
    function getCourt($id)
    {
        $this->load->model('play_m');
        $court = $this->play_m->getOneCourt($id);
        if (!empty($court)) {

            foreach ($court[0] as $key => $value) {
                $arr['data'][$key] = $value;
            }
            $arr['data']['amount'] = intval($arr['data']['amount']);
            //'cname,addr,intro,manager,tel,amount'
            $arr['head']['status'] = 101;   //成功
        } else {
            $arr['head']['status'] = 207;
        }
        $arr['head']['type'] = 4;
        echo my_json_encode($arr);
    }
    //获取用户信息
    function getUser($id)
    {
        $this->load->model('play_m');
        $user = $this->play_m->getUser($id);
        if (!empty($user)) {
            
            $arr['data']['id'] = intval($id);
            $arr['data']['name'] = $user[0]->name;
            $arr['data']['addr'] = $user[0]->addr;
            $arr['data']['age'] = intval($user[0]->age);
            $arr['data']['weight'] = intval($user[0]->weight);
            $arr['data']['height'] = intval($user[0]->height);
            $arr['data']['gtimes'] = intval($user[0]->gtimes);
            $arr['head']['status'] = 101;   //成功
        } else {
            $arr['head']['status'] = 207;
        }
        $arr['head']['type'] = 9;
        echo my_json_encode($arr);
    }

    //获取场地某一天可用空位时间段
    function getFreetime()
    {
        $json = file_get_contents("php://input");
        if (!isset($json)) {
            $arr['head']['type'] = 0;
            $arr['head']['status'] = 201;
            echo my_json_encode($arr);
            exit();
        }
        $data = json_decode($json, true);
        $whichday = $data['whichday'];
        $courtID = $data['courtID'];
        $this->load->model('play_m');
        $n = $this->play_m->getUsingstatus($courtID);
        $usingstatus = json_decode($n, true);     //得到场地所有已占用时间的数组

        foreach ($usingstatus as $str) {
            if (preg_match("/^" . $whichday . "+[1-9]{1}$/", $str)) {
                $usedtime[] = $str;
            }
        }   //至此得到 当天 被占用 的时间段数组

        //提取出时间段对应的数字
        foreach ($usedtime as $v) {
            $t[] = substr($v, 6, 1);
        }
        $alltime = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $freetime = array_diff($alltime, $t);   //取两个数组差值 即所求
        $result = my_json_encode($freetime);
        $arr['data'] = $result;

        $arr['head']['type'] = 8;
        echo my_json_encode($arr);


        //发起战书
        function setFight()
        {
            $json = file_get_contents("php://input");
            if (!isset($json)) {
                $arr['head']['type'] = 0;
                $arr['head']['status'] = 201;
                echo my_json_encode($arr);
                exit();
            }
            $data = json_decode($json, true);

            $m_arr['listtype'] = $data['listtype'];
            $m_arr['name'] = $data['name'];
            $m_arr['district'] = $data['district'];
            $m_arr['cnames'] = $data['cnames'];
            $m_arr['choseTime'] = $data['choseTime'];
            $m_arr['service'] = $data['service'];
            $m_arr['rule'] = $data['rule'];
            $this->load->model('play_m');
            $setFight = $this->play_m->setFight($m_arr);
            if ($setFight) {
                $arr['head']['status'] = 101;
            } else {
                $arr['head']['status'] = 201;
            }
            $arr['head']['type'] = 5;
            echo my_json_encode($arr);

        }

    }
}
