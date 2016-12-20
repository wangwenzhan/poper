<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belstar extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
        $this->bms = array();
        $this->bms['url']='localhost/output/msbelstar/belstar';
        $this->bms['port']=80;
        $this->bms['user']='belstar';
        $this->bms['pass']='20161122';
    }
    //general
    public function rpc($ms,$method,$paras){
        $result=array();
        $this->load->library('xmlrpc');
        $server_url='http://'.$ms['user'].':'.$ms['pass'].'@'.$ms['url'];
        $this->xmlrpc->server($server_url, $ms['port']);
        $this->xmlrpc->method($method);
        $this->xmlrpc->request($paras);
        if ( ! $this->xmlrpc->send_request()){
            echo $this->xmlrpc->display_error();
        }else{
            $aa=html_entity_decode($this->xmlrpc->display_response());
            $result=json_decode($aa,true);
        }
        return $result;
    }
    public function add_blankrecord(){
        $paras=array($_POST['tname']);
        $resultno=$this->rpc($this->bms,'add_blankrecord',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function delete_record(){
        $paras=array($_POST['id'],$_POST['tname']);
        $resultno=$this->rpc($this->bms,'delete_record',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    //生产处理微服务
    public function msproduce(){
        $paras=array();
        $data['msproduces']=$this->rpc($this->bms,'get_msproduces',$paras);
        $data['others']='';
        $this->load->view('belstar/header',$data);
        $this->load->view('belstar/msproduce',$data);
        $this->load->view('belstar/footer',$data);
    }
    public function save_msproduce(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['url'],$_POST['port'],$_POST['user'],$_POST['pass']);
        $resultno=$this->rpc($this->bms,'save_msproduce',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    
}
