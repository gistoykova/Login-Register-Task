<?
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "123asd";
	$dbname = "firstdatabase";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_set_charset($connection, 'utf8');
?>