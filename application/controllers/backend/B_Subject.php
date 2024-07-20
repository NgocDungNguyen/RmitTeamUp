<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_Subject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['list_subject'] = $this->db->select('*')->from('rmit_subject')->get()->result_array();
		$data['template'] = 'backend/subject/v_main';
		$this->load->view('backend/layout/v_main', $data);
	}

	public function creat(){
		$data['title'] = 'Thêm môn học';
		$data['template'] = 'backend/subject/v_creat';
		$this->load->view('backend/layout/v_main', $data);
	}

	public function add(){
		if(isset($_POST['creat'])){
			$info_subject = array(
				'code_subject' => $_POST['code_subject'],
				'name_subject' => $_POST['name_subject'],
				'study_level' => $_POST['study_level'],
				'credit_points' => $_POST['credit_points'],
				'subject_area' => $_POST['subject_area'],
				'campus' => $_POST['campus'],
			);
			$this->db->insert('rmit_subject', $info_subject);
			redirect('backend/subject','refresh');
		}
	}

	public function edit($id){
		$data['title'] = 'Chỉnh sửa môn học';
		$data['view_subject'] = $this->db->select('*')->from('rmit_subject')->where('id',$id)->get()->row_array();
		$data['template'] = 'backend/subject/v_edit';
		$this->load->view('backend/layout/v_main', $data);
	}
	public function update($id){
		if(isset($_POST['update'])){
			$info_subject = array(
				'code_subject' => $_POST['code_subject'],
				'name_subject' => $_POST['name_subject'],
				'study_level' => $_POST['study_level'],
				'credit_points' => $_POST['credit_points'],
				'subject_area' => $_POST['subject_area'],
				'campus' => $_POST['campus'],
			);
			$this->db->where('id', $id);
			$this->db->update('rmit_subject', $info_subject);
			redirect('backend/subject','refresh');
		}
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('rmit_subject');
		redirect('backend/subject','refresh');
	}
}
