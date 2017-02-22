<?php 

	include 'db_service.php';

	session_start();

	if(!empty($_POST['title']) && !empty($_POST['body'])){

		date_default_timezone_set('America/Chicago');
		$time =date("Y-m-d H:i:s", strtotime("now")); 

		$user = mysqli_real_escape_string($db_conx, $_SESSION['username']);
		$title = mysqli_real_escape_string($db_conx, $_POST['title']);
		$body = mysqli_real_escape_string($db_conx, $_POST['body']);

		$col = "ID, user, time, title, body";
		$val = "NULL, '$user', '$time', '$title', '$body'";

		$sql = "INSERT INTO  comm_list ($col) VALUES ($val)";

		$stmt = $conn->prepare("INSERT INTO  comm_list ( ? ) VALUES ( ? )");
		$stmt->bind_param("ss", $column, $values);

		$column = $col;
		$values = $val;
		$stmt->execute();

		// $result = $stmt->get_result();

		if (!mysqli_query($db_conx, $sql)){
			die('Error: ' . mysqli_error());
		}

		mysqli_close();
		header("Refresh:0");
		header("Location: ../communication.php");

	}else{

		echo "Missing Arguments!!!";
		header("Location: ../communication.php");

	}
 ?>