<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('UserFrontent');
		redirect('login');
	}

}

/* End of file C_Logout.php */
/* Location: ./application/controllers/C_Logout.php */