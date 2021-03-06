<?php
require_once 'auth.php';

$aobj = new myAuthentification();

if ( isset($_POST['submit']) )
{
    $aobj->auth($_POST['login'], $_POST['password']);
}

if ( isset($_POST['logout']) )
{
	$aobj->logout();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<?php
	if ( $aobj->isAuth() )
	{?>
        <div class="page-header">
            <h1>You logged as <?=$_SESSION['login'];?></h1>
            <form method="POST">
                <button type="submit" name="logout" class="btn btn-default">Logout</button>
            </form>
        </div>
	<?php
	} else
	{?>	
        <div class="page-header">
            <h1>Login to continue</h1>
        </div>
	<?php
	}?>	
</head>
<body>
	<?php
	if ( $aobj->isAuth() )
	{?>
        <div class="list-group">
            <a href="https://getbootstrap.com/docs/3.3/components/" target="_blank" class="list-group-item">Bootstrap components</a>
            <a href="http://php.net/manual/en/language.oop5.php" target="_blank" class="list-group-item">OOP in PHP</a>
            <a href="http://php.net/manual/en/book.session.php" target="_blank" class="list-group-item">Sessions in PHP</a>
        </div>
	<?php
	} else
	{?>	
        <div class="panel panel-primary">
            <form class="navbar-form navbar-left" method="POST">
                <div class="form-group">
                    <input type="text" name="login" class="form-control" placeholder="Login">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
	<?php
	}?>	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>     
</body>
</html>
