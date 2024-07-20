<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Profileuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if(!$this->session->userdata('UserFrontent')){
			redirect('login');
		}else{
			$this->user = $this->session->userdata('UserFrontent');
		}
	}

	public function read_noti($codenoti){
		if(isset($codenoti)){
			$view_code_noti = $this->db->select('*')->from('rmit_notification')->where('code_notification',$codenoti)->get()->row_array();
			if(isset($view_code_noti)){
				// Nếu tồn tại thông báo thì update đã đọc
				$update = array(
					'status' => 1,
				);
				$this->db->where('id', $view_code_noti['id']);
				$this->db->update('rmit_notification', $update);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Vui lòng nhập thông tin. Nội dung không được để trống!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('home'));
			}
		}
	}

	public function index()
	{
		$data['msv'] = $_GET['id'];
		if(isset($_GET['subject_id']) && isset($_GET['scores'])) {
			$data['subject_id'] = $_GET['subject_id'];
			$data['scores'] = $_GET['scores'];
		}
		if(isset($_GET['code_noti'])){
			$this->read_noti($_GET['code_noti']);
		}
		$data['template'] = 'frontent/profileuser/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function user_me(){
		$data['view_user'] = $this->db->select('*')->from('rmit_user')->where('id',$this->user['iduser'])->get()->row_array();
		$data['template'] = 'frontent/profileuser/v_user_me';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function check_strlen($string,$url_back){
		if(strlen($string) == 0){
			$dataresult = array('error' => 'ok','messenger' => 'Vui lòng nhập thông tin. Nội dung không được để trống!',);
			$this->session->set_flashdata($dataresult);
			redirect($url_back);
		} 
	}

	public function add_friend(){
		$msv = $_GET['code'];
		$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$msv)->get()->row_array();

		// Kiểm tra xem gửi kết bạn đã tồn tại chưa
		$check_friend = array(
			'id_from' => $this->user['iduser'],
			'id_to' => $view_user['id'],
		);
		$view_add_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend)->get()->row_array();
		if(isset($view_add_friend)){
			$dataresult = array('error' => 'ok','messenger' => 'You have sent a friend request, please wait for confirmation!',);
			$this->session->set_flashdata($dataresult);
			if(isset($_GET['subject_id']) && isset($_GET['scores'])){
				redirect('find-teammate?check=1&id='.$msv.'&subject_id='.$_GET['subject_id'].'&scores='.$_GET['scores']);
			}else{
				redirect(base_url('profile?id='.$msv));
			}
			
		}else{
			if(isset($view_user)){
				$info_friend = array(
					'id_from' => $this->user['iduser'],
					'id_to' => $view_user['id'],
					'status' => 0,
				);
				$this->db->insert('rmit_friend', $info_friend);
			}

			// Tạo 1 thông báo cho người nhận nhận thông báo
			$code_noti = generateRandomString(30);
			$link = 'profile?id='.$this->user['msv'].'&code_noti='.$code_noti;
			$info_notification = array(
				'id_user_send' => $this->user['iduser'],
				'message_notification' => 'sent you a friend request.',
				'id_user_notification' => $view_user['id'],
				'link_notification' => $link,
				'code_notification' => $code_noti,
				'status' => 0,
				'date_creat' => strtotime(date('d-m-Y H:i:s')),
			);
			$this->db->insert('rmit_notification', $info_notification);
			$dataresult = array('access' => 'ok','messenger' => 'You have successfully sent a friend request!',);
			$this->session->set_flashdata($dataresult);
			if(isset($_GET['subject_id']) && isset($_GET['scores'])){
				redirect('find-teammate?check=1&id='.$msv.'&subject_id='.$_GET['subject_id'].'&scores='.$_GET['scores']);
			}else{
				redirect(base_url('profile?id='.$msv));
			}
		}
	}

	public function cancel_friend_request(){
		$msv = $_GET['code'];
		$subject_id = $_GET['subject_id'];
		$scores = $_GET['scores'];
		$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$msv)->get()->row_array();

		// Kiểm tra xem gửi kết bạn đã tồn tại chưa
		$check_friend = array(
			'id_from' => $this->user['iduser'],
			'id_to' => $view_user['id'],
		);
		$view_add_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend)->get()->row_array();
		if(isset($view_add_friend)){
			$this->db->where('id', $view_add_friend['id']);
			$this->db->delete('rmit_friend');
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã hủy kết bạn thành công!',);
			$this->session->set_flashdata($dataresult);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Thao tác không thành công!',);
			$this->session->set_flashdata($dataresult);
		}
		$dataresult = array('access' => 'ok','messenger' => 'Bạn đã hủy kết bạn thành công!',);
			$this->session->set_flashdata($dataresult);
		redirect('find-teammate?check=1&id='.$msv.'&subject_id='.$subject_id.'&scores='.$scores);
	}

}
