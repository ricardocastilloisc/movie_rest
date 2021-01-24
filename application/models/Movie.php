<?php

class Movie extends MY_Model {
	public function __construct(){
		parent::__construct();
	}
	public $table = "movies";
	public $table_id = "movie_id";

}
