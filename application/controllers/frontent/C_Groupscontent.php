<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Groupscontent extends CI_Controller {

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

	public function index()
	{
		
	}

	public function check_get_codegroup($codegroup){
		if(!isset($codegroup)){
			$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}

	public function check_isset_group($codegroup){
		$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$codegroup)->get()->row_array();
		if(!isset($view_group)){
			$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}else{
			// Kiểm tra thành viên có tồn tại trong Group không. Nếu có mới được thao tác
			$member_group = json_decode($view_group['member_group']);
			if(!in_array($this->user['iduser'],$member_group)){
				$dataresult = array('error' => 'ok','messenger' => 'You are not a member of the Group. Please check again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}
	}
	public function content_creat(){
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);

		$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
		$data['template'] = 'frontent/groups/v_content_creat';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function content_add(){
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);

		$this->check_get_codegroup($_POST['save']);
		$this->check_get_codegroup($_POST['content_group']);

		$info_group = array(
			'content_group' => $_POST['content_group'],
			'code_group' => $_GET['codegroup'],
			'date_creat' => strtotime(date('d-m-Y H:i:s')),
			'id_user_send' => $this->user['iduser'],
		);
		$id_insert = $this->Model_main->insert('rmit_group_cloud', $info_group);
		$file_name = $_FILES['file_group']['name'];

		if(strlen($file_name) > 0) {
			// Chèn hình ảnh
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|rar|zip|doc|docx|ppt|pptx|mp3|mp4|mov';
			$config['max_size'] = 20480;
			$config['file_name'] = 'file-group-'.$_GET['codegroup'].'-'.$id_insert;
			$this->load->library("upload", $config);

			if($this->upload->do_upload("file_group")){
				$uploadData = $this->upload->data();
				$file_tmp = $uploadData['image_type'];
				if($file_tmp == 'gif' || $file_tmp == 'jpg' || $file_tmp == 'png' || $file_tmp == 'jpeg'){
					$type_content = 'images';
				}else{
					$type_content = 'files';
				}
				$update_file = array(
					'file_group' => $uploadData['file_name'],
					'type_content' => $type_content,
				);
				$this->db->where('id', $id_insert);
				$this->db->update('rmit_group_cloud', $update_file);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'The file is not suitable or you have uploaded a file larger than 20Mb!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups-content?codegroup='.$_GET['codegroup']));
			}
		}else{
			
		}
		$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
		$member_group = json_decode($view_group['member_group']);
		// Gửi thông báo tới tất cả thành viên trong nhóm có người vừa đăng nội dung
		foreach ($member_group as $value_member_group) {
			if($this->user['iduser'] != $value_member_group){
				$code_noti = generateRandomString(30);
				$link = 'groups-profile?codegroup='.$code_group.'&code_noti='.$code_noti;
				$info_notification = array(
					'id_user_send' => $this->user['iduser'],
					'message_notification' => 'just posted content in the group " '.$view_group['name_group'].' "',
					'id_user_notification' => $value_member_group,
					'link_notification' => $link,
					'code_notification' => $code_noti,
					'status' => 0,
					'date_creat' => strtotime(date('d-m-Y H:i:s')),
				);
				$this->db->insert('rmit_notification', $info_notification);
			}
		}
		
		redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
	}

	public function content_edit()
	{
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);
		$this->check_get_codegroup($_GET['id_post']);

		$view_post = $this->Model_main->viewId('rmit_group_cloud',$_GET['id_post']);
		if($view_post['id_user_send'] == $this->user['iduser']){
			$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$data['view_cloud'] = $this->Model_main->viewId('rmit_group_cloud',$_GET['id_post']);
			$data['template'] = 'frontent/groups/v_content_edit';
			$this->load->view('frontent/layout/v_main',$data);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'You do not have the right to delete other people files. Please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
		}

	}
	public function content_update()
	{
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);
		$this->check_get_codegroup($_GET['id_post']);

		$view_post = $this->Model_main->viewId('rmit_group_cloud',$_GET['id_post']);
		if($view_post['id_user_send'] == $this->user['iduser']){
			$update_content = array(
				'content_group' => $_POST['content_group'],
			);
			$this->db->where('id', $_GET['id_post']);
			$this->db->update('rmit_group_cloud', $update_content);

			$file_name = $_FILES['file_group']['name'];

			if(strlen($file_name) > 0) {
			// Chèn hình ảnh
				$config['upload_path'] = 'uploads';
				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|rar|zip|doc|docx|ppt|pptx|mp3|mp4|mov';
				$config['max_size'] = 20480;
				$config['file_name'] = 'file-group-'.$_GET['codegroup'].'-'.$id_insert;
				$this->load->library("upload", $config);

				if($this->upload->do_upload("file_group")){
					$uploadData = $this->upload->data();
					$file_tmp = $uploadData['image_type'];
					if($file_tmp == 'gif' || $file_tmp == 'jpg' || $file_tmp == 'png' || $file_tmp == 'jpeg'){
						$type_content = 'images';
					}else{
						$type_content = 'files';
					}
					$update_file = array(
						'file_group' => $uploadData['file_name'],
						'type_content' => $type_content,
					);
					$this->db->where('id', $_GET['id_post']);
					$this->db->update('rmit_group_cloud', $update_file);
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'The file is not suitable or you have uploaded a file larger than 20Mb!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups-content-edit?codegroup='.$_GET['codegroup'].'&id_post='.$view_cloud['id']));
				}
			}else{

			}
			$dataresult = array('access' => 'ok','messenger' => 'You have successfully edited the content!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
			
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'You do not have the right to delete other people files. Please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
		}
	}
	public function content_delete_attachments()
	{
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);
		$this->check_get_codegroup($_GET['id_post']);

		$view_post = $this->Model_main->viewId('rmit_group_cloud',$_GET['id_post']);
		if($view_post['id_user_send'] == $this->user['iduser']){
			if (strlen($view_post['file_group']) > 0){
				unlink('uploads/'.$view_post['file_group']);
			}
			$info_update = array(
				'file_group' => '',
				'type_content' => '',
			);
			$this->db->where('id', $view_post['id']);
			$this->db->update('rmit_group_cloud',$info_update);
			$dataresult = array('access' => 'ok','messenger' => 'You have successfully deleted the post!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-content-edit?codegroup='.$_GET['codegroup'].'&id_post='.$_GET['id_post']));
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'You do not have the right to delete other people files. Please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
		}
	}


	public function content_delete()
	{
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);
		$this->check_get_codegroup($_GET['id_post']);

		$view_post = $this->Model_main->viewId('rmit_group_cloud',$_GET['id_post']);
		if($view_post['id_user_send'] == $this->user['iduser']){
			if (strlen($view_post['file_group']) > 0){
				unlink('uploads/'.$view_post['file_group']);
			}
			$this->db->where('id', $view_post['id']);
			$this->db->delete('rmit_group_cloud');
			$dataresult = array('access' => 'ok','messenger' => 'You have successfully deleted the post!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'You do not have the right to delete other people files. Please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
		}

	}


}

/* End of file C_Groupscontent.php */
/* Location: ./application/controllers/C_Groupscontent.php */