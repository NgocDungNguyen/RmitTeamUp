<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Home extends CI_Controller {

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
		$data['template'] = 'frontent/home/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function load_num_noti_head(){
		$check_noti = array(
			'id_user_notification' => $this->user['iduser'],
			'status' => 0,
		);
		$data['list_noti'] = $this->db->select('*')->from('rmit_notification')->where($check_noti)->get()->result_array();
		$this->load->view('frontent/home/v_noti',$data);
	}

	public function load_num_mess(){
		$check_noti = array(
			'id_user_to' => $this->user['iduser'],
			'status' => 0,
		);
		$list_noti = $this->db->select('*')->from('rmit_messenger')->where($check_noti)->get()->result_array();
		echo count($check_noti);
	}
}

/* End of file C_Profile.php */
/* Location: ./application/controllers/C_Profile.php */