<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Groups extends CI_Controller {

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
			redirect(base_url('groups-request'));
		}
	}

	public function check_isset_group($codegroup){
		$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$codegroup)->get()->row_array();
		if(!isset($view_group)){
			$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-request'));
		}else{
			// Kiểm tra thành viên có được mời trong Group không.
			$check_invite = array(
				'code_group' => $codegroup,
				'id_invite' => $this->user['iduser'],
				'status' => 0,
			);
			$view_groups_member = $this->db->select('*')->from('rmit_groups_member')->where($check_invite)->get()->row_array();
			if(!isset($view_groups_member)){
				$dataresult = array('error' => 'ok','messenger' => 'You are not a member of the Group. Please check again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups-request'));
			}
		}
	}
	public function check_strlen($string,$url_back){
		if(strlen($string) == 0){
			$dataresult = array('error' => 'ok','messenger' => 'Please enter information. Content cannot be empty!',);
			$this->session->set_flashdata($dataresult);
			redirect($url_back);
		} 
	}

	public function list_group(){

		$data['list_group'] = $this->db->select('*')->from('rmit_groups')->get()->result_array();
		$data['template'] = 'frontent/groups/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function group_request(){
		$check_invite = array(
			'id_invite' => $this->user['iduser'],
			'status' => 0,
		);
		$data['list_group'] = $this->db->select('*')->from('rmit_groups_member')->where($check_invite)->get()->result_array();
		$data['template'] = 'frontent/groups/v_request';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function group_member_disagree(){
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);

		$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
		$member_group = json_decode($view_group['member_group']);
		// Kiểm tra thành viên có được mời trong Group không.
		$check_invite = array(
			'code_group' => $_GET['codegroup'],
			'id_invite' => $this->user['iduser'],
			'status' => 0,
		);
		$view_groups_member = $this->db->select('*')->from('rmit_groups_member')->where($check_invite)->get()->row_array();

		$this->db->where('id', $view_groups_member['id']);
		$this->db->delete('rmit_groups_member');

		// Tạo thông báo tới các thành viên trong nhóm
		foreach ($member_group as $value_member_group) {
			if($this->user['iduser'] != $value_member_group){
				$code_noti = generateRandomString(30);
				$link = 'groups-profile?codegroup='.$code_group.'&code_noti='.$code_noti;
				$info_notification = array(
					'id_user_send' => $this->user['iduser'],
					'message_notification' => 'do not accept invitations to join the group " '.$view_group['name_group'].' "',
					'id_user_notification' => $value_member_group,
					'link_notification' => $link,
					'code_notification' => $code_noti,
					'status' => 0,
					'date_creat' => strtotime(date('d-m-Y H:i:s')),
				);
				$this->db->insert('rmit_notification', $info_notification);
			}
		}

		$dataresult = array('access' => 'ok','messenger' => 'You have successfully canceled your invitation to join the group!',);
		$this->session->set_flashdata($dataresult);
		redirect(base_url('groups-request'));
	}

	public function group_member_agree(){
		$this->check_get_codegroup($_GET['codegroup']);
		$this->check_isset_group($_GET['codegroup']);

		$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
		$member_group = json_decode($view_group['member_group']);
		// Kiểm tra thành viên có được mời trong Group không.
		$check_invite = array(
			'code_group' => $_GET['codegroup'],
			'id_invite' => $this->user['iduser'],
			'status' => 0,
		);
		$view_groups_member = $this->db->select('*')->from('rmit_groups_member')->where($check_invite)->get()->row_array();
		if(isset($view_groups_member)){
			$member_group = json_decode($view_group['member_group']);
			if(!in_array($this->user['iduser'],$member_group)) {
				array_push($member_group,$this->user['iduser']);
			}
			// Thêm member vào nhóm
			$update_member_group = array(
				'member_group' => json_encode($member_group),
			);
			$this->db->where('id', $view_group['id']);
			$this->db->update('rmit_groups', $update_member_group);

			// Xóa thông tin các lời mời
			$this->db->where('id', $view_groups_member['id']);
			$this->db->delete('rmit_groups_member');
		}

		// Tạo thông báo tới các thành viên trong nhóm
		foreach ($member_group as $value_member_group) {
			if($this->user['iduser'] != $value_member_group){
				$code_noti = generateRandomString(30);
				$link = 'groups-profile?codegroup='.$code_group.'&code_noti='.$code_noti;
				$info_notification = array(
					'id_user_send' => $this->user['iduser'],
					'message_notification' => 'accept invitations to join the group " '.$view_group['name_group'].' "',
					'id_user_notification' => $value_member_group,
					'link_notification' => $link,
					'code_notification' => $code_noti,
					'status' => 0,
					'date_creat' => strtotime(date('d-m-Y H:i:s')),
				);
				$this->db->insert('rmit_notification', $info_notification);
			}
		}

		$dataresult = array('access' => 'ok','messenger' => 'You have successfully joined the group!',);
		$this->session->set_flashdata($dataresult);
		redirect(base_url('groups-profile?codegroup='.$view_group['code_group']));
		
	}

	public function profile_group(){
		if(isset($_GET['codegroup'])) {
			$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$data['template_sub'] = 'frontent/groups/v_profile_content';
			$data['template'] = 'frontent/groups/v_profile_group';
			$this->load->view('frontent/layout/v_main',$data);
		}else{
			redirect(base_url('groups'));
		}
	}

	public function change_avatar_group()
	{
		if(isset($_GET['codegroup'])) {
			$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$data['template'] = 'frontent/groups/v_change_avatar_group';
			$this->load->view('frontent/layout/v_main',$data);
		}else{
			redirect(base_url('groups'));
		}
		
	}
	public function add_member_group()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)) {
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['template'] = 'frontent/groups/v_add_member_group';
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
		
	}
	public function add_member_group_check()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				if(isset($_POST['save'])){
					// Kiểm tra xem thành viên đã được mời chưa
					$check_invite = array(
						'code_group' => $_GET['codegroup'],
						'id_invite' => $this->user['iduser'],
						'status' => 0,
					);
					$view_groups_member = $this->db->select('*')->from('rmit_groups_member')->where($check_invite)->get()->row_array();
					if(!isset($view_groups_member)) {
						$dataresult = array('error' => 'ok','messenger' => 'Invited members please wait for confirmation!',);
						$this->session->set_flashdata($dataresult);
						redirect(base_url('groups-add-member?codegroup='.$_GET['codegroup']));
					}else{
						$member_group = json_decode($view_group['member_group']);
						if(!in_array($_POST['member_group'], $member_group)) {
							array_push($member_group,$_POST['member_group']);
						}
						$info_group = array(
							'member_group' => json_encode($member_group ),
						);
						$this->db->where('id', $view_group['id']);
						$this->db->update('rmit_groups', $info_group);
						$dataresult = array('access' => 'ok','messenger' => 'Added members successfully!',);
						$this->session->set_flashdata($dataresult);
						redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
					}
				}
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}
	public function member_group()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				$data['active_group_member'] = ' border-b-2 border-blue-600 text-blue-600';
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['template_sub'] = 'frontent/groups/v_member_group';
				$data['template'] = 'frontent/groups/v_profile_group';
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function discussion_group()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				$data['active_discussion'] = ' border-b-2 border-blue-600 text-blue-600';
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['template_sub'] = 'frontent/groups/v_discussion_group';
				$data['template'] = 'frontent/groups/v_profile_group';
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function groups_end()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				$member_group = json_decode($view_group['member_group']);
				$info = array(
					'status' => 1,
				);
				$this->db->where('id', $view_group['id']);
				$this->db->update('rmit_groups', $info);

				foreach ($member_group as $value_member) {
					if($value_member == $this->user['iduser']) {
						$status = 1;
					}else{
						$status = 2;
					}
					$info_group_end = array(
						'code_group' => $view_group['code_group'],
						'id_user' => $value_member,
						'status' => $status,
					);
					$this->db->insert('rmit_groups_end', $info_group_end);
				}
				
				$dataresult = array('access' => 'ok','messenger' => 'Are you sure you want to end the group. Recommended to wait for members to confirm!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function groups_end_status()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				if($view_group['status'] == 1) {
					// Kiểm tra nếu trên 60% thì vào trạng thái sẽ xóa
					$member_group = json_decode($view_group['member_group']);
					$check_agree = array(
						'code_group' => $view_group['code_group'],
						'status' => 1,
					);
					$list_agree = $this->db->select('*')->from('rmit_groups_end')->where($check_agree)->get()->result_array();

					$check_disagree = array(
						'code_group' => $view_group['code_group'],
						'status' => 0,
					);
					$list_disagree = $this->db->select('*')->from('rmit_groups_end')->where($check_disagree)->get()->result_array();

					$percentage = number_format((count($list_agree) / count($member_group))*100);
					$percentage_disagree = number_format((count($list_disagree) / count($member_group))*100);
					if($percentage >= 59){
						$update_status_delete = array(
							'status' => 2,
							'date_end' => strtotime(date('d-m-Y H:i:s')),
						);
						$this->db->where('id', $view_group['id']);
						$this->db->update('rmit_groups', $update_status_delete);

						foreach ($member_group as $value_member_group) {
							foreach ($member_group as $value_member_group_sub) {
								if($value_member_group != $value_member_group_sub) {
									$insert_array = array(
										'code_group' => $view_group['code_group'],
										'id_user_evaluate' => $value_member_group,
										'id_user_get_evaluate' => $value_member_group_sub,
										'point' => 5,
									);
									$this->db->insert('rmit_groups_evaluate', $insert_array);
								}
							}
						}

					}
					if($percentage_disagree >= 59){
						$update_status_delete = array(
							'status' => 0,
						);
						$this->db->where('id', $view_group['id']);
						$this->db->update('rmit_groups', $update_status_delete);
					}
					// Kết thúc

					$check = array(
						'code_group' => $view_group['code_group'],
						'id_user' => $this->user['iduser'],
					);
					$view_group_end = $this->db->select('*')->from('rmit_groups_end')->where($check)->get()->row_array();

					$info_group_end = array(
						'status' => $_GET['status'],
					);
					$this->db->where('id', $view_group_end['id']);
					$this->db->update('rmit_groups_end', $info_group_end);
					$dataresult = array('access' => 'ok','messenger' => 'You have confirmed the cancellation status!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'You cannot operate. Please check again!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
				}
				
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}

	public function groups_evaluate()
	{
		if(isset($_GET['codegroup']) && isset($_GET['code_user_group'])){

			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$member_group = json_decode($view_group['member_group']);
			$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
			if(isset($view_user) && in_array($view_user['id'],$member_group)){
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['view_user'] = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
				$data['template'] = 'frontent/groups/v_groups_evaluate';
				$data['codegroup'] = $_GET['codegroup'];
				$data['code_user_group'] = $_GET['code_user_group'];
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}

	public function groups_evaluate_check()
	{
		if(isset($_GET['codegroup']) && isset($_GET['code_user_group'])){
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$member_group = json_decode($view_group['member_group']);
			$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
			if(isset($view_user) && in_array($view_user['id'],$member_group) && $this->user['iduser'] != $view_user['id']){
				if(isset($_POST['save'])){
						// Kiểm tra đánh giá có trên hệ thống chưa
					$info_evaluate = array(
						'code_group' => $view_group['code_group'],
						'id_user_evaluate' => $this->user['iduser'],
						'id_user_get_evaluate' => $view_user['id'],
					);
					$check_evaluate = $this->db->select('*')->from('rmit_groups_evaluate')->where($info_evaluate )->get()->row_array();
					if(isset($check_evaluate)){
						$dataresult = array('error' => 'ok','messenger' => 'You have commented, please check again!',);
						$this->session->set_flashdata($dataresult);
						redirect('groups-profile?codegroup='.$view_group['code_group']);	
					}else{
						$info = array(
							'code_group' => $view_group['code_group'],
							'id_user_evaluate' => $this->user['iduser'],
							'id_user_get_evaluate' => $view_user['id'],
							'point' => $_POST['point'],
							'content_evaluate' => $_POST['content_evaluate'],
						);
						$this->db->insert('rmit_groups_evaluate', $info);
						$dataresult = array('access' => 'ok','messenger' => 'Nhận xét thành viên thành công!',);
						$this->session->set_flashdata($dataresult);
						redirect('groups-profile?codegroup='.$view_group['code_group']);
					}
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups'));
				}
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}

	public function groups_evaluate_edit()
	{
		if(isset($_GET['codegroup']) && isset($_GET['code_user_group'])){

			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$member_group = json_decode($view_group['member_group']);
			$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
			if(isset($view_user) && in_array($view_user['id'],$member_group)){
					// Kiểm tra đánh giá có trên hệ thống chưa
				$info_evaluate = array(
					'code_group' => $view_group['code_group'],
					'id_user_evaluate' => $this->user['iduser'],
					'id_user_get_evaluate' => $view_user['id'],
				);
				$data['view_evaluate'] = $this->db->select('*')->from('rmit_groups_evaluate')->where($info_evaluate)->get()->row_array();
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['view_user'] = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
				$data['template'] = 'frontent/groups/v_groups_evaluate_edit';
				$data['codegroup'] = $_GET['codegroup'];
				$data['code_user_group'] = $_GET['code_user_group'];
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}

	public function groups_evaluate_update()
	{
		if(isset($_GET['codegroup']) && isset($_GET['code_user_group'])){
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			$member_group = json_decode($view_group['member_group']);
			$view_user = $this->db->select('*')->from('rmit_user')->where('msv',$_GET['code_user_group'])->get()->row_array();
			if(isset($view_user) && in_array($view_user['id'],$member_group) && $this->user['iduser'] != $view_user['id']){
				if(isset($_POST['save'])){
						// Kiểm tra đánh giá có trên hệ thống chưa
					$info_evaluate = array(
						'code_group' => $view_group['code_group'],
						'id_user_evaluate' => $this->user['iduser'],
						'id_user_get_evaluate' => $view_user['id'],
					);
					$check_evaluate = $this->db->select('*')->from('rmit_groups_evaluate')->where($info_evaluate )->get()->row_array();
					if(isset($check_evaluate)){
						$info = array(
							'point' => $_POST['point'],
							'content_evaluate' => $_POST['content_evaluate'],
						);
						$this->db->where('id', $check_evaluate['id']);
						$this->db->update('rmit_groups_evaluate', $info);
						$dataresult = array('access' => 'ok','messenger' => 'Nhận xét thành viên thành công!',);
						$this->session->set_flashdata($dataresult);
						redirect('groups-profile?codegroup='.$view_group['code_group']);
					}else{
						$dataresult = array('error' => 'ok','messenger' => 'You have commented, please check again!',);
						$this->session->set_flashdata($dataresult);
						redirect('groups-profile?codegroup='.$view_group['code_group']);
					}
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups'));
				}
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Operation error, please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}

	public function groups_exit_member()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				if($view_group['creator_group'] == $this->user['iduser']){
					$dataresult = array('error' => 'ok','messenger' => 'You are the team leader. Can not leave the group!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
				}else{
					$view_user = $this->db->select('*')->from('rmit_user')->where('id',$this->user['iduser'])->get()->row_array();
					$member_group = json_decode($view_group['member_group']);
					$new_member_group = array();
					$user_point = $view_user['user_point'] - 0.5;
					if($user_point < 0){
						$user_point = 0;
					}else{
						$user_point = $user_point;
					}
					$update_point = array(
						'user_point' => $user_point,
					);
					$this->db->where('id', $this->user['iduser']);
					$this->db->update('rmit_user', $update_point);
					// Xóa giá trị user ra khỏi Group
					foreach($member_group as $value_member) {
						if($value_member != $this->user['iduser']){
							array_push($new_member_group,$value_member);
						}
					}
					$update_member_group = array(
						'member_group' => json_encode($new_member_group),
					);
					$this->db->where('id', $view_group['id']);
					$this->db->update('rmit_groups', $update_member_group);

					// Gửi thông báo tới tất cả thành viên trong nhóm có người vừa đăng nội dung
					foreach ($new_member_group as $value_member_group) {
						if($this->user['iduser'] != $value_member_group){
							$code_noti = generateRandomString(30);
							$link = 'groups-profile?codegroup='.$code_group.'&code_noti='.$code_noti;
							$info_notification = array(
								'id_user_send' => $this->user['iduser'],
								'message_notification' => 'just exited the group " '.$view_group['name_group'].' "',
								'id_user_notification' => $value_member_group,
								'link_notification' => $link,
								'code_notification' => $code_noti,
								'status' => 0,
								'date_creat' => strtotime(date('d-m-Y H:i:s')),
							);
							$this->db->insert('rmit_notification', $info_notification);
						}
					}

					$dataresult = array('error' => 'ok','messenger' => 'You have voluntarily left the group. Activity points will be deducted 0.5 points!',);
					$this->session->set_flashdata($dataresult);
					redirect(base_url('groups'));
				}
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function edit_group()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				$data['view_group'] = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
				$data['template'] = 'frontent/groups/v_edit_group';
				$this->load->view('frontent/layout/v_main',$data);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function update_group()
	{
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				$info_group = array(
					'name_group' => $_POST['name_group'],
					'content_group' => $_POST['content_group'],
				);
				$this->db->where('id', $view_group['id']);
				$this->db->update('rmit_groups', $info_group);
				$dataresult = array('access' => 'ok','messenger' => 'Edited information successfully!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Group does not exist!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('groups'));
			}
		}else{
			redirect(base_url('groups'));
		}
	}
	public function change_avatar_check_group(){
		if(isset($_GET['codegroup'])) {
			$view_group = $this->db->select('*')->from('rmit_groups')->where('code_group',$_GET['codegroup'])->get()->row_array();
			if(isset($view_group)){
				if(isset($_POST['save'])){
					// Chèn hình ảnh
					$config['upload_path'] = 'uploads';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['file_name'] = 'avatar-group-'.$this->user['msv'];
					$this->load->library("upload", $config);
					if($this->upload->do_upload("images_group")){
						$uploadData = $this->upload->data();
						$update_file = array(
							'images_group' => $uploadData['file_name'],
						);
						$this->db->where('id', $view_group['id']);
						$this->db->update('rmit_groups', $update_file);
						$dataresult = array('access' => 'ok','messenger' => 'Updated profile picture successfully!',);
						$this->session->set_flashdata($dataresult);
						redirect(base_url('groups-profile?codegroup='.$_GET['codegroup']));
					}else{
						$dataresult = array('error' => 'ok','messenger' => 'Acceptable content jpg,png,jpeg.',);
						$this->session->set_flashdata($dataresult);
						redirect(base_url('group-change-avatar?codegroup='.$_GET['codegroup']));
					}
				}
			}
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Access error. Please try again!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups'));
		}
	}
	public function creat_group(){
		$data['template'] = 'frontent/groups/v_creat';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function add_group(){
		if(isset($_POST['group'])){
			$code_group = generateRandomString(20);
			$member_group_first = array();
			array_push($member_group_first,$this->user['iduser']);
			$info_group = array(
				'name_group' => $_POST['name_group'],
				'member_group' => json_encode($member_group_first),
				'creator_group' => $this->user['iduser'],
				'date_creat' => strtotime(date("d-m-Y H:i:s")),
				'code_group' => $code_group,
			);
			$this->Model_main->insert('rmit_groups', $info_group);

			foreach ($_POST['member_group'] as $value_member) {
				if($value_member != $this->user['iduser']){
					$info_member = array(
						'code_group' => $code_group,
						'id_invite' => $value_member,
						'status' => 0,
					);
					$this->db->insert('rmit_groups_member', $info_member);

					// Tạo 1 thông báo cho người nhận nhận thông báo
					$code_noti = generateRandomString(30);
					$link = 'groups-profile?codegroup='.$code_group.'&code_noti='.$code_noti;
					$info_notification = array(
						'id_user_send' => $this->user['iduser'],
						'message_notification' => 'invite you to join Group " '.$_POST['name_group'].' "',
						'id_user_notification' => $value_member,
						'link_notification' => $link,
						'code_notification' => $code_noti,
						'status' => 0,
						'date_creat' => strtotime(date('d-m-Y H:i:s')),
					);
					$this->db->insert('rmit_notification', $info_notification);
				}
			}
			$dataresult = array('access' => 'ok','messenger' => 'Created group successfully!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('groups-profile?codegroup='.$code_group));
		}
	}

}
