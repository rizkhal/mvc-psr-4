<?php

namespace App\Database;

use PDO;

class DB {

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbes = DB_BASE;

	private $dbh;
	private $stmt;

	/**
	 * connection
	 * 
	 */
	public function __construct()
	{
		$dsn = "mysql:host={$this->host};dbname=$this->dbes";

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE 	 => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $e) {
			dd($e->getMessage());
		}
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		return $this->stmt->bindParam($param, $value, $type);
	}

	/**
	 * prepare before run query
	 * @param  $query sql
	 * @return mixed
	 */
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	/**
	 * execute
	 * @return mixed
	 */
	public function execute()
	{
		$this->stmt->execute();
	}

	/**
	 * fetch all
	 * @return array
	 * 
	 */
	public function fetchAll()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * fetch single
	 * @return array
	 * 
	 */
	public function fetch()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}