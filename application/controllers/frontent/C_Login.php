<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if($this->session->userdata('UserFrontent')){
			$user_info = $this->session->userdata('UserFrontent');
			$active_user = $user_info['status'];
			if($active_user == 0) {
				redirect('profile-active');
			}elseif($active_user == 1){
				redirect('profile-waiting');
			}elseif($active_user == 3){
				redirect('profile-waiting');
			}else{
				redirect('home');
			}
		}
	}

	public function index()
	{
		$this->load->view('frontent/user/v_login');
	}

	public function check(){
		if(isset($_POST['login'])){
			// Check user
			$info = array(
				'msv' => $_POST['msv'],
				'password' => $_POST['password'],
			);

			$check = $this->db->select('*')->from('rmit_user')->where($info)->get()->row_array();
			if(isset($check)){
				if($check['date_creat'] == 0 && $check['status'] == 2){
					$date = date("d-m-Y H:i:s");
					$newdate = strtotime ('+3 day', strtotime($date));
					$update_creat = array(
						'date_creat' => strtotime($date),
						'expiration_date' => $newdate,
					);
					$this->db->where('id', $check['id']);
					$this->db->update('rmit_user', $update_creat);
				}
				$userdata = array(
					'login'  => 'yes',
					'iduser'  => $check['id'],
					'username'  => $check['username'],
					'msv'  => $check['msv'],
					'status'  => $check['status'],
				);
				$this->session->set_userdata('UserFrontent', $userdata);
				if($check['status'] == 0){
					redirect('profile-active');
				}elseif($check['status'] == 1){
					redirect('profile-waiting');
				}else{
					redirect('home');
				}
				
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Sai thông tin tài khoản. Vui lòng nhập lại!',);
				$this->session->set_flashdata($dataresult);
				redirect('login','refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('UserFrontent');
		redirect('login');
	}

}

/* End of file C_Login.php */
/* Location: ./application/controllers/C_Login.php */