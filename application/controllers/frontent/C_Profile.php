<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Profile extends CI_Controller {

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
		$this->load->view('frontent/user/v_profile_active');
	}

	public function check_strlen($string,$url_back){
		if(strlen($string) == 0){
			$dataresult = array('error' => 'ok','messenger' => 'Vui lòng nhập thông tin. Nội dung không được để trống!',);
			$this->session->set_flashdata($dataresult);
			redirect($url_back);
		} 
	}

	public function check(){
		if(isset($_POST['save'])){
			$user_info = array(
				'username' => $_POST['nameuser'],
				'email' => $_POST['email'],
				'usersex' => $_POST['usersex'],
				'relationship' => $_POST['relationship'],
				'userbio' => $_POST['userbio'],
				'status' => 1,
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $user_info);

			// Chèn hình ảnh
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $this->user['msv'];
			$this->load->library("upload", $config);
			if($this->upload->do_upload("images_check")){
				$uploadData = $this->upload->data();
				$update_file = array(
					'images_check' => $uploadData['file_name'],
				);
				$this->db->where('id', $this->user['iduser']);
				$this->db->update('rmit_user', $update_file);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Nội dung chấp nhận jpg,png,jpeg.',);
				$this->session->set_flashdata($dataresult);
			}
			redirect('profile-waiting');
		}
	}

	public function waiting(){
		$this->load->view('frontent/user/v_profile_waiting');
	}

	public function edit_images(){
		$this->load->view('frontent/user/v_edit_images');
	}

	public function edit_images_check(){
		if(isset($_POST['save'])){
			// Chèn hình ảnh
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $this->user['msv'];
			$this->load->library("upload", $config);
			if($this->upload->do_upload("images_check")){
				$uploadData = $this->upload->data();
				$update_file = array(
					'images_check' => $uploadData['file_name'],
				);
				$this->db->where('id', $this->user['iduser']);
				$this->db->update('rmit_user', $update_file);
				redirect('profile-waiting');
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Nội dung chấp nhận jpg,png,jpeg.',);
				$this->session->set_flashdata($dataresult);
				redirect('profile-edit-images');
			}
			
		}
	}

	public function edit_info(){
		$this->load->view('frontent/user/v_edit_info');
	}

	public function edit_info_check(){
		if(isset($_POST['save'])){
			$user_info = array(
				'username' => $_POST['nameuser'],
				'email' => $_POST['email'],
				'usersex' => $_POST['usersex'],
				'relationship' => $_POST['relationship'],
				'userbio' => $_POST['userbio'],
				'status' => 1,
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $user_info);
			redirect('profile-waiting');
		}
	}

	public function setting_edit_info_check(){
		if(isset($_POST['save'])){
			$user_info = array(
				'username' => $_POST['nameuser'],
				'email' => $_POST['email'],
				'usersex' => $_POST['usersex'],
				'relationship' => $_POST['relationship'],
				'userbio' => $_POST['userbio'],
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $user_info);
			$dataresult = array('access' => 'ok','messenger' => 'Thông tin cập nhật thành công!',);
			$this->session->set_flashdata($dataresult);
			redirect('setting');
		}
	}

	public function change_avatar(){
		$data['template'] = 'frontent/user/v_edit_avatar';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function change_avatar_check(){
		if(isset($_POST['save'])){
			// Chèn hình ảnh
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = 'avatar-'.$this->user['msv'];
			$this->load->library("upload", $config);
			if($this->upload->do_upload("user_avatar")){
				$uploadData = $this->upload->data();
				$update_file = array(
					'user_avatar' => $uploadData['file_name'],
				);
				$this->db->where('id', $this->user['iduser']);
				$this->db->update('rmit_user', $update_file);
				$dataresult = array('access' => 'ok','messenger' => 'Cập nhật ảnh đại diện thành công!',);
				$this->session->set_flashdata($dataresult);
				redirect('setting');
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Nội dung chấp nhận jpg,png,jpeg.',);
				$this->session->set_flashdata($dataresult);
				redirect('change-avatar');
			}
			
		}
	}

	public function change_password(){
		$data['template'] = 'frontent/user/v_edit_password';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function check_pass_old($passold){
		$view_user = $this->db->select('*')->from('rmit_user')->where('id',$this->user['iduser'])->get()->row_array();
		if($view_user['password'] != $passold){
			$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu cũ nhập không đúng. Vui lòng nhập lại!',);
			$this->session->set_flashdata($dataresult);
			redirect('change-password');
		}

	}

	public function check_pass_new($passnew,$repassnew){
		if($passnew != $repassnew){
			$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu mới không trùng khớp. Vui lòng nhập lại!',);
			$this->session->set_flashdata($dataresult);
			redirect('change-password');
		}

	}

	public function change_password_check(){
		if(isset($_POST['save'])){
			$this->check_strlen(trim($_POST['passold']),'change-password');
			$this->check_strlen(trim($_POST['passnew']),'change-password');
			$this->check_strlen(trim($_POST['repassnew']),'change-password');
			$this->check_pass_old(trim($_POST['passold']));
			$this->check_pass_new(trim($_POST['passnew']),trim($_POST['repassnew']));
			$info_user = array(
				'password' => trim($_POST['passnew']),
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $info_user);
			$dataresult = array('access' => 'ok','messenger' => 'Thay đổi mật khẩu thành công!',);
			$this->session->set_flashdata($dataresult);
			redirect('setting');
		}
	}
}
