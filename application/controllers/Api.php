<?php


use Restserver\Libraries\Rest_Controller;

require APPPATH . '/libraries/Rest_Controller.php';
require APPPATH . '/libraries/Format.php';

class Api extends Rest_Controller {
	

	public function data_get()
	{
		$data = array(
			'data1' => 1,
			'data2' => 2,
		);

		$this->response($data);
	}
}
/** End of file Controllername.php **/
