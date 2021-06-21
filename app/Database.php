<?php

class Database
{
	private $db 		= 'prueba';
	private $host 		= '192.168.10.10';
	private $password 	= 'secret';
	private $user 		= 'homestead';
	private $mysqli 	= null;

	public function __construct()
	{
		$this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
	}

	public function query($query = null)
	{
		return $this->mysqli->query($query);
	}
}
