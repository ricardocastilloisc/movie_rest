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

	function findRecords($type_movie_id = null, $year = null){
		$this->db->select('m.*, tm.name as type_movie');
		
		$this->db->from("$this->table as m");

		$this->db->join('types_movie as tm','tm.type_movie_id = m.type_movie_id', 'LEFT');

		$query  = $this->db->get();

		if(isset($type_movie_id)){
			$this->db->where('tm.type_movie_id', $type_movie_id);
		}

		if(isset($year)){
			$this->db->where('year', $year);
		}

		return $query->result();
	}


}
