<?php
//start session
session_start();
 
include_once('./user_controller.php');
 
$user = new User();
 
if(isset($_POST['login'])){
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
 
	$auth = $user->check_login($username, $password);
 
	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:../views/index.php');
	}
	else{
		$_SESSION['user'] = $auth;
        $_SESSION['message'] = 'Welcome';
		header('location:../views/home.php');
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:index.php');
}
?>
