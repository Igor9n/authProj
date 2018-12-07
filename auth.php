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
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Well done!</strong> You successfully logged in.
			</div>
			<?php
			$this->auth = true; 
			return $this->isAuth();
		}elseif ( !$log || !$pass ) //Если логин или пароль не заполнены, возвращает false
		{
			?><div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Hmm!</strong> You haven't filled in all fields</div><?php
			return $this->isAuth();
		}else //Если логин и пароль не совпадают, возвращает false
		{
			?><div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Nope!</strong> Wrong login or password</div><?php
			return $this->isAuth();	
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

