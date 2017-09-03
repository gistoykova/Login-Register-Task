<?
require_once("session.php");

$response 	= array();
switch($_POST['action']){
	case 'Login':
	$emailPost 	= trim(strip_tags(addslashes($_POST['email'])));
	$passPost 	= trim(strip_tags(addslashes($_POST['password'])));
	
	if(isset($emailPost) && isset($passPost)){
		$selectSql 	= "SELECT CONCAT(u.firstname,' ',u.lastname) as fullName, password FROM `users` AS u WHERE `email`= '".$emailPost."'";
		$select 	= $connection->query($selectSql);
		if($select){
			if($select->num_rows > 0){
				if($row = $select->fetch_array()){
					if($row['password'] == md5($passPost)){
						$response['status'] = 1;
						session_start();
						$_SESSION['username'] = $row['fullName'];
					}else{
						$response['status'] = 0;
						$response['text'] = 'Грешна парола';
					}
				}else{
					$response['status'] = 0;
					$response['text'] = 'Проблем при извличането на информация - 1';
				}
			}else{
				$response['status'] = 0;
				$response['text'] = 'Не съществува потребител с такъв mail';
			}
		}else{
			$response['status'] = 0;
			$response['text'] = 'Проблем при извличането на информация - 2';
		}
	}
	break;
	
	case 'Register':
	$firstname 	= trim(strip_tags(addslashes($_POST['firstname'])));
	$lastname 	= trim(strip_tags(addslashes($_POST['lastname'])));
	$email 		= trim(strip_tags(addslashes($_POST['email'])));
	$password 	= md5(trim(strip_tags(addslashes($_POST['password']))));
	
	$insertSql		= "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES ('', '$firstname', '$lastname', '$email', '$password')";
	$insert			= $connection->query($insertSql);
	if($insert){
		$response['status'] = 1;
	}else{
		$response['status'] = 0;
		$response['error']	= $connection->error;
	}
	break;
	
	case 'Delete':
		session_start();
		if($_SESSION['username']){
			require_once("session.php");
			$id		= (int)$_POST['id'];

			$sql 	= "DELETE FROM `users` WHERE `id` = '$id'";
			$result	= $connection->query($sql);
			if($result){
				$response['status'] = 1;
			}else{
				$response['status'] = 0;
				$response['text']	= 'Error! Deleting unsuccessfull!';
			}
		}else{
			$response['status'] = 0;
			$response['text']	= 'No privileges!';
		}
	break;
}

header('Content-Type: application/json');
echo json_encode($response);	
?>

