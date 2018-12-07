<?php
class mySession
{
	public function mySessionStart() //Старт сессии
	{
		if ( !$this->sessionExists() ) //Если её нет
		{
			session_start();
		}
	}
	protected function getId () //Возвращает ID сесии или ничего при отстутсвии сессии
	{
		return session_id();
	}
	public function isAuth() //Проверка статуса аутентификации в сессии
	{
		return $_SESSION['auth'];
	}
	public function setAuth($val,$log) //Выставить аутентификацию в сессии
	{
		$_SESSION['auth'] = $val;
		$_SESSION['login'] = $log;
	}
	protected function sessionExists(): bool //Проверка существования сессии
	{
		if ( $this->getId() )
		{
			return true;
		}
		return false;
	}
	public function destroy() //Уничтожение сессии и стирание статуса аутентификации
	{
		if ( $this->sessionExists() )
		{
			unset($_SESSION['auth']);
			session_destroy();
		}
	}
} 

