<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Setting extends CI_Controller {

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
		$data['template'] = 'frontent/setting/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}

}
