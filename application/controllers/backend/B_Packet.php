<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_Packet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if(!$this->session->userdata('UserBackend')){
			redirect('admin');
		}else{

			$this->user_backend = $this->session->userdata('UserBackend');
		}
	}

	public function list_user()
	{
		$data['list_user_reg'] = $this->db->select('*')->from('rmit_user')->get()->result_array();
		$data['list_packet'] = $this->db->select('*')->from('rmit_packet')->get()->result_array();
		$data['template'] = 'backend/packet/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function status($id_user,$id_packet)
	{
		$view_user = $this->db->select('*')->from('rmit_user')->where('id',$id_user)->get()->row_array();
		$today = date('d-m-Y H:i:s');
		if($view_user['service_pack'] == 1){
			$date = date('d-m-Y H:i:s');
			$newdate = strtotime ('+1 month',strtotime($date));
			$update_packet = array(
				'expiration_date' => $newdate,
				'service_pack' => $id_packet,
			);
			$this->db->where('id',$id_user);
			$this->db->update('rmit_user',$update_packet);
		}elseif($view_user['expiration_date'] < $today){
			$date = date('d-m-Y H:i:s');
			$newdate = strtotime ('+1 month',strtotime($date));
			$update_packet = array(
				'expiration_date' => $newdate,
				'service_pack' => $id_packet,
			);
			$this->db->where('id',$id_user);
			$this->db->update('rmit_user',$update_packet);
		}elseif($view_user['service_pack'] == $id_packet){
			$newdate = strtotime ('+1 month',$view_user['expiration_date']);
			$update_packet = array(
				'expiration_date' => $newdate,
			);
			$this->db->where('id',$id_user);
			$this->db->update('rmit_user',$update_packet);
		}else{
			$date = date('d-m-Y H:i:s');
			$newdate = strtotime('+1 month',strtotime($date));
			$update_packet = array(
				'expiration_date' => $newdate,
				'service_pack' => $id_packet,
			);
			$this->db->where('id',$id_user);
			$this->db->update('rmit_user',$update_packet);
		}

		redirect('backend/packet');
	}

}
