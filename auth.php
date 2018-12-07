<?php
class myAuthentification
{
	protected $auth = false; //Изначально мы не залогинены
	protected $login = "taras"; //Может использоваться только самим объектом класса
	protected $password = '123'; //Может использоваться только самим объектом класса
	public function isAuth(): bool //Проверяем статус логина
	{
		return $this->auth;
	}
	public function auth($log,$pass): bool //Валидация логина и пароля
	{
		if( $log === $this->login && $pass === $this->password) //Меняем статус аутентификации при совпадении - мы залогинены
		{
			$this->auth = true; 
			return $this->isAuth();
		} else
		{
			return $this->isAuth();	//Если логин и пароль не совпадают, возвращает false
		}
	}	
	public function getLogin(): str //Получение логина для вывода
	{
		return $_POST['login'];
	}
	public function logout(): bool //Метод, стирающий данные логина и пароля при вылогинивании, меняет статус аутентификации
	{
		unset($_POST['login']);
		unset($_POST['password']);
		$this->auth = false;
		return $this->auth;
	}	
}

