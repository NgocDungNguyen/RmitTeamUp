<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['template'] = 'backend/home/v_main';
		$this->load->view('backend/layout/v_main', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */