<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('backend/user/v_login');
	}

	public function login_admin(){
		if(isset($_POST['login'])){
			// Check user
			$info = array(
				'username' => $_POST['username'],
				'password' => $_POST['password'],
			);

			$check = $this->db->select('*')->from('rmit_user_admin')->where($info)->get()->row_array();
			if(isset($check)){
				$userdata = array(
					'login'  => 'yes',
					'iduser'  => $check['id'],
					'username'  => $check['username'],
				);
				$this->session->set_userdata('UserBackend', $userdata);
				redirect('backend/home');

			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Sai thông tin tài khoản. Vui lòng nhập lại!',);
				$this->session->set_flashdata($dataresult);
				redirect('admin','refresh');
			}
		}
	}

}

/* End of file B_Login.php */
/* Location: ./application/controllers/B_Login.php */