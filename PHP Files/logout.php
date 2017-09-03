<?PHP
session_start();
session_destroy();
if(!headers_sent()){
	header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login.php');
}else{
	die('Could not redirect; Headers already sent (output).');
}
?>
