<?php
class Session
{
	public function sessionStart()
	{
		if (!$this->sessionExists() )
		{
			session_start();
		}
	}
	public function getName()
	{
		return session_name();
	}
	public function setName($name) 
	{
		session_name($name);
	}
	public function isAuth()
	{
		return $_SESSION['auth'];
	}
	public function setAuth($val)
	{
		$_SESSION['auth'] = $val;
	}
	public function cookieExists() {}
	public function sessionExists(): bool 
	{
		if ($this->getName())
		{
			return true;
		}
		return false;
	}
	public function destroy() 
	{
		if ( $this->sessionExists() )
		{
			session_destroy();
		}
	}
} 

//session_start();
//echo session_id();

//$_SESSION['login'] = $_POST['login'];
//$_SESSION['password'] = $_POST['password']; 