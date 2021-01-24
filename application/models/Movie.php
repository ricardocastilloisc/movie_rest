<?php

class Movie extends MY_Model {
	public function __construct(){
		parent::__construct();
	}
	public $table = "movies";
	public $table_id = "movie_id";

	function findall(){
		$this->db->select('m.*, tm.name as type_movie');
		$this->db->from("$this->table as m");

		$this->db->join('types_movie as tm','tm.type_movie_id = m.type_movie_id', 'LEFT');

		$query  = $this->db->get();
		return $query->result();
	}


}
