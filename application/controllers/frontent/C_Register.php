<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('UserFrontent')){
			$active_user = $this->session->userdata('UserFrontent')['status'];
			if($active_user == 0) {
				redirect('profile-active');
			}else{
				redirect('home');
			}
		}
	}

	public function index()
	{
		$this->load->view('frontent/user/v_register');
	}
	public function check_msv($msv){
		// Kiểm tra msv đã tồn tại chưa
		$view_msv = $this->db->select('*')->from('rmit_user')->where('msv',$msv)->get()->row_array();
		if($view_msv){
			$dataresult = array('error' => 'ok','messenger' => 'Mã sinh viên đã tồn tại. Vui lòng đăng nhập hoặc kiểm tra lại!',);
			$this->session->set_flashdata($dataresult);
			redirect('register','refresh');
		}
	}
	public function check_pass($password,$repassword){
		if($password != $repassword){
			$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!',);
			$this->session->set_flashdata($dataresult);
			redirect('register','refresh');
		}
	}
	public function check()
	{
		if(isset($_POST['register'])){
			$this->check_msv($_POST['msv']);
			$this->check_pass($_POST['password'],$_POST['repassword']);
			$info_user = array(
				'username' => $_POST['username'],
				'msv' => $_POST['msv'],
				'password' => $_POST['password'],
				'user_point' => 0,
				'friend_group' => json_encode(array()),
				'status' => 0,
			);
			$id_insert = $this->Model_main->insert('rmit_user',$info_user);
			if($id_insert){
				$userdata = array(
					'login'  => 'yes',
					'iduser'  => $id_insert,
					'nameuser'  => $_POST['username'],
					'msv'  => $_POST['msv'],
					'password' => $_POST['password'],
					'status'  => 0,
				);
				$this->session->set_userdata('UserFrontent', $userdata);
				
				redirect('profile-active');
			}
		}
	}

}

/* End of file C_Register.php */
/* Location: ./application/controllers/C_Register.php */