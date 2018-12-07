<?php
require_once 'session.php';
session_start();

class myAuthentification
{
	protected $login = "admin";
	protected $password = "admin";
	public function isAuth(): bool
	{
		if ($_SESSION['login'] === $this->login && $_SESSION['password'] === $this->password)
        {
            return true;
        }
        return false;
	}
	public function auth($log,$pass): bool
	{
		if( $log === $this->login && $pass === $this->password) 
		{
			mySession::mySessionStart();
			mySession::setAuth($log,$pass);
			return true;
		}else
		{
			return false;
		}
	}	
	public function getLogin(): string
	{
		return $_SESSION['login'];
	}
	public function logout()
	{
        unset($_POST['login']);
        unset($_POST['password']);
	    mySession::destroy();
	}

}

