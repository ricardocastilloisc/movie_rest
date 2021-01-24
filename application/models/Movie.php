<?php

class Movie extends CI_MODEL {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public $table = "movies";
	public $table_id = "movie_id";

	function findall(){
		$this->db->select();
		$this->db->from($this->table);

		$query  = $this->db->get();
		return $query->result();
	}

	function find($id){
		$this->db->select();
		$this->db->from($this->table);
		$this->db->where($this->table_id, $id);

		$query  = $this->db->get();
		return $query->row();
	}
}
