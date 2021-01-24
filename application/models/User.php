<?php

class User extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public $table = "users";
	public $table_id = "user_id";

	function checkLogin($email, $plainPasssword)
	{
		$this->db->select();

		$this->db->from($this->table);

		$this->db->where('email', $email);

		$query  = $this->db->get();

		$user = $query->row();

		if (!empty($user)) {
			if (verifyHashedPassword($plainPasssword, $user->password)) {
				return $user;
			}
		}
		return null;
	}
}
