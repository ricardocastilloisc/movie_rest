<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('user/login');
	}


	private function isLoggedIn()
	{
		$user_id = $this->session->userdate('user_id');
		if (isset($user_id)) {
			return true;
		}
		return false;
	}
}
