<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Servicepack extends CI_Controller {

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
		$data['template'] = 'frontent/home/v_servicepack';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function packet($packet){
		if($packet == 'basic_plan'){
			$data['content_packet'] = 'basic plan';
		}
		if($packet == 'standard_plan'){
			$data['content_packet'] = 'standard plan';
		}
		if($packet == 'premium_plan'){
			$data['content_packet'] = 'premium plan';
		}
		$data['template'] = 'frontent/home/v_packet';
		$this->load->view('frontent/layout/v_main',$data);
	}

}

/* End of file C_Servicepack.php */
/* Location: ./application/controllers/C_Servicepack.php */