<?php

class mySession
{
	public static function mySessionStart()
	{
		if ( !self::sessionExists() )
		{
			session_start();
		}
	}
	public static function setAuth($log,$pass)
	{
        $_SESSION['login'] = $log;
		$_SESSION['password'] = $pass;
	}
	public static function sessionExists(): bool
	{
        $sessionName = session_name();
        if (isset($_COOKIE[$sessionName]))
        {
            return true;
        }
        return false;
	}
	public static function destroy()
	{
	    if ( self::sessionExists() )
	    {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            session_destroy();
        }
	}
} 

