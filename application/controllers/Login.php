<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		//echo hashPassword('12345');

		//$hashPassword = hashPassword('12345');

		//echo verifyHashedPassword('12345', hashPassword('12345'));

		if (!isLoggedIn()) {
			$this->login();
			$this->load->view('user/login');
		} else {

			redirect('/core/dashboard');
		}
	}

	public function logout()
	{
		if($this->uri->uri_string() == "login/logout")
		{
			show_404();
		}
		$this->session->sess_destroy();
		redirect('/login');
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

			$user = $this->User->checkLogin($email, $password);

			if (is_object($user)) {
				$sessionUser = array(
					'user_id' => $user->user_id,
					'email' => $user->email,
					'name' => $user->name
				);

				$this->session->set_userdata($sessionUser);
				$this->session->set_flashdata("success", "Bienvenido $user->name");

				redirect("/core/dashboard");
			} else {

				$this->session->set_flashdata("error", "Email o contraseña incorrecta");

				echo "Email o contraseña incorrecta";
			}
		}
	}
}
