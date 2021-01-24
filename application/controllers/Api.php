<?php


use Restserver\Libraries\Rest_Controller;

require APPPATH . '/libraries/Rest_Controller.php';
require APPPATH . '/libraries/Format.php';

class Api extends Rest_Controller {
	

	public function data_get()
	{
		$this->load->model('Movie');
		
		$data = $this->Movie->find(1);

		$this->response($data);
	}
}
/** End of file Controllername.php **/
