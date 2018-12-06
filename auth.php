<?php
class Authentification
{
	protected $auth = false; //Может использоваться только самим объектом класса
	protected $login = "taras"; //Может использоваться только самим объектом класса
	protected $password = 123; //Может использоваться только самим объектом класса
	public function isAuth(): bool
	{
		return $this->auth;
	}
	public function auth($log,$pass): bool
	{
		if( $log == $this->login && $pass == $this->password)
		{
			$this->auth = true;
			return $this->isAuth();
		} else
		{
			$this->auth = false;
			return $this->isAuth();	
		}
	}	
	public function getLogin(): str
	{
		return $_POST['login'];
	}
	public function logout(): bool
	{
		unset($_POST['login']);
		unset($_POST['password']);
		$this->auth = false;
		return $this->auth;
	}	
}