<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        session_destroy();
        
			log_message('error','Theiiiiiii::');
        $data['webtitle']='百星输出服务';
        $data['notice']='';
        
		$this->load->view('welcome/header',$data);
		$this->load->view('welcome/index',$data);
		$this->load->view('welcome/footer',$data);
	}

}
