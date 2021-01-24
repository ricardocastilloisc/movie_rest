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

	function findRecords($search = array(), $type_movie_id = null, $year = null, $offset = 0){

		$this->db->select('m.*, tm.name as type_movie');
		
		$this->db->from("$this->table as m");

		$this->db->join('types_movie as tm','tm.type_movie_id = m.type_movie_id', 'LEFT');

		//$busqueda

		foreach ($search as $key => $token) {
			$this->db->like('m.name', $token);
		}


		//filtros
		if(isset($type_movie_id)){
			$this->db->where('tm.type_movie_id', $type_movie_id);
		}

		if(isset($year)){
			$this->db->where('year', $year);
		}

		$this->db->limit(PAGE_SIZE,$offset);

		$query  = $this->db->get();

		return $query->result();
	}


}
