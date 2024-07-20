<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Jquery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->user = $this->session->userdata('UserFrontent');
	}

	public function index()
	{
		
	}

	public function load_user_friend(){
		$this->load->view('frontent/jquery/v_load_user_friend');
	}
	public function load_user_friend_search(){
		$this->load->view('frontent/jquery/v_load_user_friend_search');
	}

	public function load_messenger(){
		if (isset($_POST['iduserfriend'])) {
			$data['view_user_friend'] = $this->db->select('*')->from('rmit_user')->where('id',$_POST['iduserfriend'])->get()->row_array();
			$this->load->view('frontent/jquery/v_load_messenger',$data);
		}else{
			echo 'Không tồn tại biến';
		}
	}

	public function send_messenger($id_user_to){

		// check xem 1 trong 2 đã tồn tại chưa
		$check_from = array(
			'id_user_from' => $this->user['iduser'],
			'id_user_to' => $id_user_to,
		);
		$check_to = array(
			'id_user_from' => $id_user_to,
			'id_user_to' => $this->user['iduser'],
		);

		$view_from = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
		$view_to = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();


		if(!isset($view_from) && !isset($view_to)){
			$code_group_mess = auto_string(20);
			$info_group_mess = array(
				'id_user_from' => $this->user['iduser'],
				'id_user_to' => $id_user_to,
				'code_mess' => $code_group_mess,
				'date_group_mess' => strtotime(date('d-m-Y')),
				'date_creat' => strtotime(date('d-m-Y')),
				'time_creat' => strtotime(date('H:i:s')),
				'content_end' => $_POST['messenger'],
			);
			$id_insert = $this->Model_main->insert('rmit_messenger_group', $info_group_mess);
			$id_group_mess = $id_insert;

			// Thểm Mess vào bằng Mess
			$info_mess = array(
				'id_user_from' => $this->user['iduser'],
				'id_user_to' => $id_user_to,
				'content' => $_POST['messenger'],
				'date_creat' => strtotime(date('H:i:s')),
				'code_group_mess' => $code_group_mess,
				'date_group_mess' => $id_insert,
			);
			$this->db->insert('rmit_messenger', $info_mess);

		}else{
			if(isset($view_from)){
				$code_group_mess = $view_from['code_mess'];
				$id_group_mess = $view_from['id'];
			}
			if(isset($view_to)){
				$code_group_mess = $view_to['code_mess'];
				$id_group_mess = $view_to['id'];
			}
			// Kiểm tra xem ngày đấy đã tồn tại chưa nếu chưa thì thêm vào
			$today = strtotime(date('d-m-Y'));
			$check_today = array(
				'father_group_mess' => $id_group_mess,
				'date_group_mess' => $today,
			);
			$view_today = $this->db->select('*')->from('rmit_messenger_group')->where($check_today)->get()->row_array();
			if(isset($view_today)){
				$id_insert_sub = $view_today['id'];
			}else{
				$info_group_mess = array(
					'date_group_mess' => strtotime(date('d-m-Y')),
					'father_group_mess' => $id_group_mess,
				);
				$id_insert_sub = $this->Model_main->insert('rmit_messenger_group', $info_group_mess);
			}
			
			// Update time mới nhất vào Group Mess
			$update_time = array(
				'date_creat' => strtotime(date('d-m-Y')),
				'time_creat' => strtotime(date('H:i:s')),
				'content_end' => $_POST['messenger'],
			);
			$this->db->where('id', $id_group_mess);
			$this->db->update('rmit_messenger_group', $update_time);

			// Thểm Mess vào bằng Mess
			$info_mess = array(
				'id_user_from' => $this->user['iduser'],
				'id_user_to' => $id_user_to,
				'content' => $_POST['messenger'],
				'code_group_mess' => $code_group_mess,
				'date_creat' => strtotime(date('H:i:s')),
				'date_group_mess' => $id_insert_sub,
			);
			$this->db->insert('rmit_messenger', $info_mess);
		}
	}

	public function load_messenger_info(){
		// check xem 1 trong 2 đã tồn tại chưa
			$check_from = array(
				'id_user_from' => $this->user['iduser'],
				'id_user_to' => $_POST['iduserfriend'],
				'father_group_mess' => 0,
			);
			$check_to = array(
				'id_user_from' => $_POST['iduserfriend'],
				'id_user_to' => $this->user['iduser'],
				'father_group_mess' => 0,
			);
			$view_from = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
			$view_to = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();
			if(isset($view_from)){
				$data['view_group_mess'] = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
				$view_group_mess = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
			}
			if(isset($view_to)){
				$data['view_group_mess'] = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();
				$view_group_mess = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();
			}
			if(isset($view_group_mess)){
				$check_status = array(
					'code_group_mess' => $view_group_mess['code_mess'],
					'status' => 0,
					'id_user_from' => $_POST['iduserfriend'],
				);
				$list_mess = $this->db->select('*')->from('rmit_messenger')->where($check_status)->get()->result_array();
				foreach($list_mess as $value_mess) {
					$update_status = array(
						'status' => 1,
					);
					$this->db->where('id', $value_mess['id']);
					$this->db->update('rmit_messenger', $update_status);
				}
			}
			$data['title'] = '';
			// Lấy danh sách tin nhắn chưa đọc chuyển thành tin đã đọc
		$this->load->view('frontent/jquery/v_load_messenger_info',$data);
	}

}
