<?php


class Session
{

	public function __construct()
	{
		@session_start();
	}

	public function get($key = null)
	{
		return isset( $_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	public function check($key = null)
	{
		return isset( $_SESSION[$key]) ? true : false;
	}

	public function destroy($key = null)
	{
		if( isset( $_SESSION[$key]) )
			unset($_SESSION[$key]);

		return false;
	}

	public function put( $key = null, $value = '')
	{
		$_SESSION[$key] = $value;
	}

}
