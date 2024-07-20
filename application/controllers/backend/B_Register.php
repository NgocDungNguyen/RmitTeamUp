<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('UserBackend')){
			redirect('admin');
		}else{
			$this->user_backend = $this->session->userdata('UserBackend');
		}
	}

	public function list_user($id)
	{
		$data['list_user_reg'] = $this->db->select('*')->from('rmit_user')->get()->result_array();
		$data['template'] = 'backend/resigter/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function status($id,$id_user)
	{
		$update = array(
			'status' => $id,
		);
		$this->db->where('id', $id_user);
		$this->db->update('rmit_user', $update);
		redirect('backend/register/1');
	}

}
