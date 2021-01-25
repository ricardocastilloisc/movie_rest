<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct(){
		parent::__construct();
		verifyAuth();
	}

	public function index()
	{
		$view['body'] = "<div>Hola mundo</div>";
		$view['title'] = "Titulo";
		$this->parser->parse('core/templates/body', $view);
		echo "Admin";
	}

}
