<?
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf8">
	<title>Login Form in PHP with Session</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<a href="logout.php">Logout</a>
		<a href="reg.php">Add New</a>
		<div id="main">
		<?
		require_once("session.php");
		if($_SESSION['username']){
			echo 'Welcome '.$_SESSION['username'];
			echo '<hr>';
			$selectSql	= "SELECT * FROM `users`";
			$select		= $connection->query($selectSql);
			if($select){
				echo 'id -- firstname -- lastname -- password <hr>';
				while($row = $select->fetch_array())
				{
					echo $row['id'].' -- '.$row['firstname'].' -- '.$row['lastname'].' -- '.$row['password'].' -- <a data-id = '.$row['id'].' id="delete">delete</a><br>';
					
				}
				// print_r($data);
			}
		}else{
			echo '<h1>No access! Auth yourself!</h1>';
			echo '<a href="login.php"><h1>Login</h1></a>';
			
		}	
		?>
		</div>
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on("click", "#delete", function(){
		var id 	= $(this).data('id');
		$.ajax({
			type: "POST",
			cache: false,
			url: "login_process.php",
			data:{
				action: 'Delete',
				id: id,
			},
			success: function(response){				
				if(response.status == 0){
					alert('Внимание !!! Проблем при регистрацията!');
					console.log(response.text);
				}else{
					window.location.href = 'index.php';
				}
			}
		});
	});
});
</script>
