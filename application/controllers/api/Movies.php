<?php


use Restserver\Libraries\Rest_Controller;

require APPPATH . '/libraries/Rest_Controller.php';
require APPPATH . '/libraries/Format.php';

class Movies extends Rest_Controller {
	

	public function show_get()
	{

		//filtro
		$type_movie_id = $this->input->get("type_movie_id");
		$year = $this->input->get("year");


		$this->load->model('Movie');
		
		$data = $this->Movie->findRecords($type_movie_id,$year);

		$this->response($data);
	}
}
/** End of file Controllername.php **/
