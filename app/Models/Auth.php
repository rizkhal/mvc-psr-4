<?php

namespace App\Models;

use App\Database\DB;
use App\Core\Session\Session;

class Auth {

	private $db;
	private $table = 'auth';

	public function __construct()
	{
		$this->db = new DB;
	}

	public function login($email, $password)
	{
		$query = "SELECT email, password FROM {$this->table} WHERE email = :email";

		$this->db->query($query);
		$this->db->bind(':email', $email);
		$data = $this->db->fetch();

		if (verify($password, $data['password'])) {
			dd($password);
		} else {
			dd('gak');
		}
	}

	public function register($name, $email, $pswd, $created_at)
	{
		$this->db->query("INSERT INTO {$this->table} (name, email, password, created_at)
			VALUES (:name, :email, :password, :created_at)");

		$test = $this->db->bind(':name', $name);
		$this->db->bind(':email', $email);
		$this->db->bind(':password', $pswd);
		$this->db->bind(':created_at', $created_at);

		return $this->db->execute();
	}

}