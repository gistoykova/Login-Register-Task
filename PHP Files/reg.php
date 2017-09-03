<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf8">
	<title>Login Form</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<h1>Sign Up</h1>
			<div id="login">
				<h2>Sign Up</h2>
				
					<label>First name</label>
						<input id="firstname" name="firstname" placeholder="" type="text">
					<label>Last name</label>
						<input id="lastname" name="lastname" placeholder="" type="text">
					<label>Email</label>
						<input id="email" name="email" placeholder="" type="text">
					<label>Password (6 or more characters)</label>
						<input id="password" name="password" placeholder="" type="password">
					<p>By clicking Sign Up, you agree to <p1>User Agreement</p1>, <p1>Privacy Policy</p1>, and <p1>Cookie Policy</p1>.</p>
					
					<input id="actionLogin" type="button" value=" Sign Up ">
					<span><?php echo $error; ?></span>
				
			</div>
		</div>
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on("click", "#actionLogin", function(){
		var firstname 	= $("#firstname").val();
		var lastname 	= $("#lastname").val();
		var email 	= $("#email").val();
		var password 	= $("#password").val();
		
		// console.log(firstname, lastname, email, password);
		$.ajax({
			type: "POST",
			cache: false,
			url: "login_process.php",
			data:{
				action: 'Register',
				firstname: firstname,
				lastname: lastname,
				email: email,
				password: password,
			},
			success: function(response){				
				if(response.status == 0){
					alert('Внимание !!! Проблем при регистрацията!');
					console.log(response.error);
				}else{
					console.log(response.text);
					window.location.href = 'login.php';
				}
			}
		});
	});
});
</script>