<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Find_Teammate extends CI_Controller {

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
		if(isset($_GET['check'])) {
			if(isset($_GET['subject_id']) && isset($_GET['scores'])){
				$check_teammate = array(
					'subject_id' => $_GET['subject_id'],
					'scores' => $_GET['scores'],
					'user_id!=' => $this->user['iduser'],
				);
				$data['list_teammeat'] = $this->db->select('*')->from('rmit_user_subject')->where($check_teammate)->get()->result_array();
				$data['subject_id'] = $_GET['subject_id'];
				$data['scores'] = $_GET['scores'];
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu đã bị điều chỉnh. Vui lòng thao tác chính xác!',);
				$this->session->set_flashdata($dataresult);
				redirect(base_url('find-teammate'));
			}
		}
		$data['template'] = 'frontent/findteammate/v_main';
		$this->load->view('frontent/layout/v_main',$data);
		
	}

}

