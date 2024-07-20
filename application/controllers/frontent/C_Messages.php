<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('UserFrontent')){
			redirect('login');
		}else{
			$this->user = $this->session->userdata('UserFrontent');
		}
	}

	public function index()
	{
		
	}

	public function check_strlen($string,$url_back){
		if(strlen($string) == 0){
			$dataresult = array('error' => 'ok','messenger' => 'Vui lòng nhập thông tin. Nội dung không được để trống!',);
			$this->session->set_flashdata($dataresult);
			redirect($url_back);
		} 
	}

	public function list_friend(){
		$data['template'] = 'frontent/messages/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}

}
