<?php

namespace App\Database;

use Mysqli;

class Mysql {

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbes = DB_BASE;

	private static $_instance;
	private $mysqli;

	public function __construct()
	{
		$this->mysqli = new Mysqli($this->host, $this->user, $this->pass, $this->dbes);
	}

	public static function getInstance()
	{
		if (isset(self::$_instance)) {
			self::$_instance = new Mysql;
		}

		return self::$_instance;
	}

	

}