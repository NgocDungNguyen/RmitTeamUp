<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('UserFrontent')){
			$active_user = $this->session->userdata('UserFrontent')['status'];
			if($active_user == 0) {
				redirect('profile-active');
			}elseif($active_user == 1){
				redirect('profile-waiting');
			}elseif($active_user == 3){
				redirect('profile-waiting');
			}else{
				redirect('home');
			}
		}
	}
	public function index()
	{
		$this->load->view('frontent/user/v_login');
	}

	public function disconnect(){

	}
}
