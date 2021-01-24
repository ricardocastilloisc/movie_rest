<?php

class Type_movie extends CI_MODEL {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public $table = "types_movies";
	public $table_id = "type_movie_id";



}
