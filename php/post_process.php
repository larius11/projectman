<?php 
	if(!empty($_POST['title']) && !empty($_POST['body'])){

		include 'db_service.php';
		session_start();

		date_default_timezone_set('America/Chicago');
		$time =date("Y-m-d H:i:s", strtotime("now")); 

		$user = mysqli_real_escape_string($db_conx, $_SESSION['username']);
		$title = mysqli_real_escape_string($db_conx, $_POST['title']);
		$body = $_POST['body'];

		$col = "ID, user, time, title, body";

		$stmt = $db_conx->prepare("INSERT INTO  comm_list ($col) VALUES (NULL, ?, '$time', ?, ?)");
		$stmt->bind_param("sss", $username, $titlei, $bodyi);

		$username = $user;
		$titlei = $title;
		$bodyi = $body;
		$stmt->execute();

		date_default_timezone_set('America/Chicago');
		$this_time =date("Y-m-d H:i:s", strtotime("now"));
		$this_item = "<i class=\"fa fa-fw fa-weixin\"></i> Communication Post";
		$this_by = $_SESSION['username'];

		$col = "ID, panel_item, panel_time, panel_by";

		$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
		$stmt->bind_param("ss", $this_item, $this_by);
		$stmt->execute();

		// $result = $stmt->get_result();

		mysqli_close();
		header("Refresh:0");
		header("Location: ../communication.php");

	}else{

		echo "Missing Arguments!!!";
		header("Location: ../communication.php");

	}
 ?>