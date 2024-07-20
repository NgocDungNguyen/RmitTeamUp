<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Friend extends CI_Controller {

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

	public function friend_request(){
		$data['template'] = 'frontent/friend/v_request';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function friend_add(){
		if(isset($_GET['code'])){
			$view_user_to = $this->db->select('*')->from('rmit_user')->where('id',$this->user['iduser'])->get()->row_array();
			$view_user_from = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code'])->get()->row_array();
			$friend_group = json_decode($view_user_to['friend_group']);
			$friend_group_from = json_decode($view_user_from['friend_group']);
			if(!in_array($view_user_from['id'],$friend_group)) {
				array_push($friend_group, $view_user_from['id']);
				$user_friend_group = array(
					'friend_group' => json_encode($friend_group),
				);
				$this->db->where('id',$view_user_to['id']);
				$this->db->update('rmit_user', $user_friend_group);
				// Xem người gửi đã có trong danh sách bạn bè chưa thì thêm vào
				if(!in_array($view_user_to['id'],$friend_group_from)) {
					array_push($friend_group_from, $view_user_to['id']);
					$user_friend_group_from = array(
						'friend_group' => json_encode($friend_group_from),
					);
					$this->db->where('id',$view_user_from['id']);
					$this->db->update('rmit_user', $user_friend_group_from);
				}
				// Cập nhật lại trạng thái kết bạn trong chuỗi kết bạn
				$check_friend = array(
					'id_from' => $view_user_from['id'],
					'id_to' => $view_user_to['id'],
				);
				$view_status_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend)->get()->row_array();
				$user_status_friend = array(
					'status' => 1,
				);
				$this->db->where('id',$view_status_friend['id']);
				$this->db->update('rmit_friend', $user_status_friend);
				$dataresult = array('access' => 'ok','messenger' => 'Bạn đã kết bạn thành công',);
				$this->session->set_flashdata($dataresult);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Bạn đã kết bạn',);
				$this->session->set_flashdata($dataresult);
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Bạn đã kết bạn',);
			$this->session->set_flashdata($dataresult);
		}
		redirect('friend-request');
	}

	public function friend_delete(){
		$msv = $_GET['code'];
		$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$msv)->get()->row_array();

		// Kiểm tra xem gửi kết bạn đã tồn tại chưa
		$check_friend = array(
			'id_from' => $view_user['id'],
			'id_to' => $this->user['iduser'],
		);
		$view_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend)->get()->row_array();
		if(isset($view_friend)){
			$this->db->where('id', $view_friend['id']);
			$this->db->delete('rmit_friend');
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã hủy kết bạn thành công!',);
			$this->session->set_flashdata($dataresult);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Thao tác không thành công!',);
			$this->session->set_flashdata($dataresult);
		}
		$dataresult = array('access' => 'ok','messenger' => 'Bạn đã hủy kết bạn thành công!',);
			$this->session->set_flashdata($dataresult);
		redirect('friend-request');
	}

}
