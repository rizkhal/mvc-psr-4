<?php

namespace App\Models;

use App\Database\DB;


class Home {

	private $db;
	private $table = 'mahasiswa';

	public function __construct()
	{
		$this->db = new DB;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->fetchAll();
	}

	public function store($name, $email)
	{
		$query = "INSERT INTO {$this->table} (name, email) VALUES (:name, :email)";
		$this->db->query($query);
		$this->db->bind(':name', $name);
		$this->db->bind(':email', $email);
		
		return $this->db->execute();
	}

	public function getWhereEmail($id)
	{
		$query = "SELECT * FROM {$this->table} WHERE id = :id";
		$this->db->query($query);
		$this->db->bind(':id', $id);
		return $this->db->fetch();
	}

	public function updateWhereId($id, $name, $email)
	{
		$query = "UPDATE {$this->table} SET name = :name, email = :email WHERE id = :id";
		$this->db->query($query);
		$this->db->bind(':id', $id);
		$this->db->bind(':name', $name);
		$this->db->bind(':email', $email);
		return $this->db->execute();
	}
	
}