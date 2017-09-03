<?
session_start();
if($_SESSION['username']){
	if(!headers_sent()){
	header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php');
	}else{
		die('Could not redirect; Headers already sent (output).');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf8">
	<title>Login Form</title>
	<link href="style2.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<h1>Login Form</h1>
			<div id="login">
			<table> 
			<tr>
				<td><input id="email" name="email" placeholder="Email" type="text"></td>
				<td><input id="password" name="password" placeholder="Password" type="password"></td>
				<td><input id="actionLogin" type="button" value=" Sign in "></td>
			</tr>
			</table>

				<span><?php echo $error; ?></span>	
			</div>
		</div>
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on("click", "#actionLogin", function(){
		var email 		= $("#email").val();
		var password 	= $("#password").val();
		
		// console.log(firstname, lastname, email, password);
		$.ajax({
			type: "POST",
			cache: false,
			url: "login_process.php",
			data:{
				action: 'Login',
				email: email,
				password: password,
			},
			success: function(response){				
				if(response.status == 0){
					alert('Внимание !!! Проблем при входа!');
					alert(response.text);
				}else{
					window.location.href = 'index.php';
				}
			}
		});
	});
});
</script>