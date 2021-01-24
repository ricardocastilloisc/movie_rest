<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('user');
		$this->load->library('session');
	}
	public function index()
	{
		//echo hashPassword('12345');

		//$hashPassword = hashPassword('12345');

		//echo verifyHashedPassword('12345', hashPassword('12345'));

		if(!$this->isLoggedIn())
		{
			$this->login();
			$this->load->view('user/login');
		
		}else{

			redirect('/core/dashboard');
		}

	}


	private function isLoggedIn()
	{
		$user_id = $this->session->userdata('user_id');;
		if (isset($user_id)) {
			return true;
		}
		return false;
	}

	private function login()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');

		$this->form_validation->set_rules('email', 'Email', 'required|max_length[30]|valid_email|trim');

		if ($this->form_validation->run() == FALSE) {
	
		} else {
			$email = $this->input->post('email');

			$password = $this->input->post('password');

			$user = $this->User->checkLogin($email,$password);

			if(is_object($user))
			{
				$sessionUser = array(
					'user_id' => $user->user_id,
					'email' => $user->email,
					'name' => $user->name
				);

				$this->session->set_userdata($sessionUser);
				$this->session->set_flashdata("success", "Bienvenido $user->name");

				redirect("/core/dashboard");
			}else{

				$this->session->set_flashdata("error", "Email o contraseña incorrecta $user->name");

				echo "Email o contraseña incorrecta";
			}
		}
	}
}
