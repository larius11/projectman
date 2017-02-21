<?php 

	define('DB_NAME','service');
	define('DB_USER','heb');
	define('DB_PASSWORD','Austin04');
	define('DB_HOST', 'localhost');
	session_start();

	if(!empty($_POST['title']) && !empty($_POST['body'])){
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}

		$db_selected = mysql_select_db(DB_NAME, $link);

		if (!$db_selected){
			die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
		}

		date_default_timezone_set('America/Chicago');
		$time =date("Y-m-d H:i:s", strtotime("now")); 

		$user = $_SESSION['username'];
		$title = $_POST['title'];
		$body = $_POST['body'];



		$col = "ID, user, time, title, body";
		$val = "NULL, '$user', '$time', '$title', '$body'";

		$sql = "INSERT INTO  comm_list ($col) VALUES ($val)";

		if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		}

		mysql_close();
		header("Refresh:0");
		header("Location: ../communication.php");
	}else{
		echo "Missing Arguments!!!";
		header("Location: ../communication.php");
	}
 ?>