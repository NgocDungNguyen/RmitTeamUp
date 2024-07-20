<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Subject extends CI_Controller {

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
		$data['template'] = 'frontent/subject/v_main';
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function check_isset($subject_id){
		$subject = array(
			'subject_id' => $subject_id,
			'user_id' => $this->user['iduser'],
		);
		$check = $this->db->select('*')->from('rmit_user_subject')->where($subject)->get()->row_array();
		if(isset($check)) {
			$dataresult = array('error' => 'ok','messenger' => 'Môn học đã tồn tại. Vui lòng chỉnh sửa ở danh sách môn học!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('subject'));
		}
	}
	public function max_scores($scores){
		if($scores < 0 || $scores > 4) {
			$dataresult = array('error' => 'ok','messenger' => 'Bạn vui lòng nhập điểm số môn học từ 0.0 tới 4.0!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('subject'));
		}
	}

	public function add()
	{
		if(isset($_POST['save'])){
			$this->check_isset($_POST['subject_id']);
			$this->max_scores($_POST['scores']);
			
			$subject = array(
				'subject_id' => $_POST['subject_id'],
				'scores' => $_POST['scores'],
				'user_id' => $this->user['iduser'],
			);
			$this->db->insert('rmit_user_subject', $subject);

			// Lấy hệ số tính tổng
			$all_point = 0;
			$all_he_so = 0;
			$gpa = 0;
			$list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$this->user[iduser])->get()->result_array();
			foreach($list_subject_user as $value){
				if($value['scores'] == 'HD'){
					$point = 4;
				}elseif($value['scores'] == 'HD'){
					$point = 3;
				}elseif($value['scores'] == 'HD'){
					$point = 2;
				}else{
					$point = 1;
				}
				$view_subject = $this->db->select('*')->from('rmit_subject')->where('id', $value['subject_id'])->get()->row_array();

				$all_point = $all_point + ($point * $view_subject['credit_points']);
				$all_he_so = $all_he_so + $view_subject['credit_points'];
			}

			$gpa = number_format(($all_point/$all_he_so),2);

			$update_gpa = array(
				'user_gpa' => $gpa,
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $update_gpa);

			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã nhập môn học thành công!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('subject'));
		}
	}
	public function check_user($id_subject_user){
		$view_subject = $this->db->select('*')->from('rmit_user_subject')->where('id',$id_subject_user)->get()->row_array();
		if($view_subject['user_id'] != $this->user['iduser']){
			$dataresult = array('error' => 'ok','messenger' => 'Bạn không thể chỉnh sửa môn học này. Vui lòng kiểm tra lại!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('subject'));
		}
	}
	public function edit($id_subject_user){
		$this->check_user($id_subject_user);

		$data['view_subject_user'] = $this->db->select('*')->from('rmit_user_subject')->where('id',$id_subject_user)->get()->row_array();
		$data['template'] = 'frontent/subject/v_edit';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function update($id_subject_user)
	{
		if(isset($_POST['save'])){
			$this->check_user($id_subject_user);
			$subject = array(
				'scores' => $_POST['scores'],
			);
			$this->db->where('id', $id_subject_user);
			$this->db->update('rmit_user_subject', $subject);
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã cập nhật môn học thành công!',);
			
			// Lấy hệ số tính tổng
			$all_point = 0;
			$all_he_so = 0;
			$gpa = 0;
			$list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$this->user[iduser])->get()->result_array();
			foreach($list_subject_user as $value){
				if($value['scores'] == 'HD'){
					$point = 4;
				}elseif($value['scores'] == 'HD'){
					$point = 3;
				}elseif($value['scores'] == 'HD'){
					$point = 2;
				}else{
					$point = 1;
				}
				$view_subject = $this->db->select('*')->from('rmit_subject')->where('id', $value['subject_id'])->get()->row_array();

				$all_point = $all_point + ($point * $view_subject['credit_points']);
				$all_he_so = $all_he_so + $view_subject['credit_points'];
			}

			$gpa = number_format(($all_point/$all_he_so),2);

			$update_gpa = array(
				'user_gpa' => $gpa,
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $update_gpa);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('subject'));
		}
	}

	public function delete($id_subject_user){
		$this->check_user($id_subject_user);
		$this->db->where('id', $id_subject_user);
		$this->db->delete('rmit_user_subject');
		$dataresult = array('access' => 'ok','messenger' => 'Bạn đã xóa môn học thành công!',);
		$this->session->set_flashdata($dataresult);

		// Lấy hệ số tính tổng
			$all_point = 0;
			$all_he_so = 0;
			$gpa = 0;
			$list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$this->user[iduser])->get()->result_array();
			foreach($list_subject_user as $value){
				if($value['scores'] == 'HD'){
					$point = 4;
				}elseif($value['scores'] == 'HD'){
					$point = 3;
				}elseif($value['scores'] == 'HD'){
					$point = 2;
				}else{
					$point = 1;
				}
				$view_subject = $this->db->select('*')->from('rmit_subject')->where('id', $value['subject_id'])->get()->row_array();

				$all_point = $all_point + ($point * $view_subject['credit_points']);
				$all_he_so = $all_he_so + $view_subject['credit_points'];
			}

			$gpa = number_format(($all_point/$all_he_so),2);

			$update_gpa = array(
				'user_gpa' => $gpa,
			);
			$this->db->where('id', $this->user['iduser']);
			$this->db->update('rmit_user', $update_gpa);

		redirect(base_url('subject'));
	}

}

