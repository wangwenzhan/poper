<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
        $this->cms = array();
        $this->cms['url']='localhost/output/mscenter/center';
        $this->cms['port']=88;
        $this->cms['user']='belstar';
        $this->cms['pass']='20161122';
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
    public function setsession()
    {
        $idname=$_POST['idname'];
        $idvalue=$_POST['idvalue'];
        $titlename=$_POST['titlename'];
        $titlevalue=$_POST['titlevalue'];
        $msname=$_POST['msname'];
        $msvalue=$_POST['msvalue'];
        $_SESSION[$idname]=$idvalue;
        if(strlen($titlename)>2)
        $_SESSION[$titlename]=$titlevalue;
        if(strlen($msname)>1)
        $_SESSION[$msname]=$msvalue;
        
        log_message('error',$idname.'::'.$_SESSION[$idname]);

        $data=array('resultno'=>1 );
        echo json_encode($data);
    }
    public function add_blankrecord(){
        $paras=array($_POST['tname']);
        $resultno=$this->rpc($this->cms,'add_blankrecord',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function delete_record(){
        $paras=array($_POST['id'],$_POST['tname']);
        $resultno=$this->rpc($this->cms,'delete_record',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function stafflogin()
	{
		
        $resultno=0;//登录0失败；1成功
        $this->load->library('form_validation');
        $this->form_validation->set_rules('accountno', '账户', 'required');
        $this->form_validation->set_rules('password', '密码', 'required',
            array('required' => '你必须提供一个%s.')
        );
        if ($this->form_validation->run('passcheck') == FALSE)
        {
            redirect('welcome/index');
        }
        else
        {
            $paras=array($_POST['accountno']);
			log_message('error','The $paras::'.$paras[0]);
            $staff=$this->rpc($this->cms,'get_staff',$paras);

            if($staff!=null and password_verify($_POST['password'],$staff['password']))
            {
                $resultno=1;
                $_SESSION['staffid']=$staff['id'];
                $_SESSION['staffemail']=$staff['email'];
                $_SESSION['staffname']=$staff['name'];
                $_SESSION['opcenterid']=$staff['opcenter_id'];
            }
        }

        $data=array('resultno'=>$resultno );
        echo json_encode($data);
	}
    public function sendstaffemail(){
        $paras=array($_POST['email']);
        $resultno=$this->rpc($this->cms,'sendstaffemail',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function setstaffpassword(){
        $paras=array($_POST['email'],$_POST['yzm'],$_POST['password']);
        $resultno=$this->rpc($this->cms,'setstaffpassword',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }

    //登陆后首页
    public function index(){
        $paras=array($_SESSION['staffid']);
        $_SESSION['themenu']=$this->rpc($this->cms,'get_smenu',$paras);
        $_SESSION['currentmenuid']=0;
        $data['others']='';
		
		log_message('error','The staffid::'.$_SESSION['staffid']);
        $this->load->view('center/header',$data);
        $this->load->view('center/index',$data);
        $this->load->view('center/footer',$data);
    }
    //职员功能树
    public function sactree(){
        $paras=array($_SESSION['staffid']);
        $data['sactree']=$this->rpc($this->cms,'get_sactree',$paras);
        $data['others']='';
        $this->load->view('center/header',$data);
        $this->load->view('center/sactree',$data);
        $this->load->view('center/footer',$data);
    }
    public function save_sactree(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['action'],$_POST['formenu'],$_POST['forentry']);
        $resultno=$this->rpc($this->cms,'save_sactree',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function addson_sactree(){
        $paras=array($_POST['id']);
        $resultno=$this->rpc($this->cms,'addson_sactree',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function addbrother_sactree(){
        $paras=array($_POST['id']);
        $resultno=$this->rpc($this->cms,'addbrother_sactree',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function move_sactree(){
        $paras=array($_POST['id'],$_POST['samelayer']);
        $resultno=$this->rpc($this->cms,'move_sactree',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    public function delete_sactree(){
        $paras=array($_POST['id']);
        $resultno=$this->rpc($this->cms,'delete_sactree',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    //基础配置微服务
    public function msbase(){
        $paras=array();
        $data['msbases']=$this->rpc($this->cms,'get_msbases',$paras);
        $data['others']='';
        $this->load->view('center/header',$data);
        $this->load->view('center/msbase',$data);
        $this->load->view('center/footer',$data);
    }
    public function save_msbase(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['url'],$_POST['port'],$_POST['user'],$_POST['pass']);
        $resultno=$this->rpc($this->cms,'save_msbase',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    //委外客户
    public function customer(){
        $paras=array();
        $data['customers']=$this->rpc($this->cms,'get_customers',$paras);
        $data['msbases']=$this->rpc($this->cms,'get_msbases',$paras);
        $data['others']='';
        $this->load->view('center/header',$data);
        $this->load->view('center/customer',$data);
        $this->load->view('center/footer',$data);
    }
    public function save_customer(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['code'],$_POST['memo'],$_POST['scaleout'],$_POST['isactive'],$_POST['msbase_id']);
        $resultno=$this->rpc($this->cms,'save_customer',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    //百星制作中心
    public function opcenter(){
        $paras=array();
        $data['opcenters']=$this->rpc($this->cms,'get_opcenters',$paras);
        $data['others']='';
        $this->load->view('center/header',$data);
        $this->load->view('center/opcenter',$data);
        $this->load->view('center/footer',$data);
    }
    public function save_opcenter(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['code'],$_POST['memo'],$_POST['isvirtual'],$_POST['isactive'],$_POST['postcodeprefix'],$_POST['addressee'],$_POST['postcode'],$_POST['address'],$_POST['email'],$_POST['tel'],$_POST['mobile']);
        $resultno=$this->rpc($this->cms,'save_opcenter',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    //百星职员
    public function staff(){
        $paras=array();
        $data['staffs']=$this->rpc($this->cms,'get_staffs',$paras);
        $data['opcenters']=$this->rpc($this->cms,'get_opcenters',$paras);
        $data['others']='';
        $this->load->view('center/header',$data);
        $this->load->view('center/staff',$data);
        $this->load->view('center/footer',$data);
    }
    public function save_staff(){
        $paras=array($_POST['id'],$_POST['name'],$_POST['accountno'],$_POST['email'],$_POST['mobile'],$_POST['isactive'],$_POST['opcenter_id']);
        $resultno=$this->rpc($this->cms,'save_staff',$paras);
        
        $data=array('resultno'=>$resultno,);
        echo json_encode($data);
    }
    
}
