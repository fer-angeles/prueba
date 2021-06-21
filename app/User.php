<?php

include 'app/Database.php';
include 'app/Session.php';

class User
{
	public $session = null;


	/**
	 * User constructor.
	 */
	public function __construct()
	{
		$this->session = new Session();
	}

	public function register($data = null)
	{
		$keys 	= [];
		$values = [];

		foreach ($data as $key => $value)
		{
			$keys[] 	= $key;
			$values[] 	= "'".$value."'";
		}

		$new = new Database();
		$response = $new->query("INSERT INTO users (".(implode(',',$keys)).") VALUES (".(implode(',',$values)).")");

		return $response === true ? true : false;
	}


	public function signin($data = null)
	{
		if( !isset($data["email"]) && !isset($data["passsword"]))
			return false;

		$query 		= new Database();
		$response 	= $query->query("SELECT * FROM users WHERE email='".$data['email']."' AND password='".$data['password']."' limit 1");

		if( $response->num_rows == 1 )
		{
			$email = $response->fetch_assoc()['email'];
			$this->session->put('email', $email);
			return true;
		}

		return false;

	}

	public function check_auth()
	{
		if( isset($_SESSION["email"]) )
			return true;
		return false;

	}
	public function logout()
	{
		if( isset($_SESSION["email"]) )
		{
			unset($_SESSION["email"]);
			return true;
		}

		return false;

	}

	public function update_password($data)
	{
		if( !isset($data["email"]) && !isset($data["password"]))
			return false;

		$query 		= new Database();
		$response 	= $query->query("UPDATE users SET password='".$data['password']."' WHERE email='".$data['email']."'");
		return ( $response ) ? true : false;
	}

}
