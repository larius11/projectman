<?php 

	include 'db_service.php';
	session_start();
	$event = $_POST['event'];
	$i = 0;
	$begin = '../calendar/details/modal';
	$finish = '.html';
	$stmt_one = $db_conx->prepare("SELECT * FROM events_list WHERE ID = '$event[$i]'");
	$stmt = $db_conx->prepare("DELETE FROM events_list WHERE ID = '$event[$i]'");
	
	while($event[$i]){

		$url = $begin.$event[$i].$finish;
		unlink($url);

		$stmt_one->execute();
		$result = $stmt_one->get_result();
		$row = $result->fetch_assoc();

		$stmt->execute();

		date_default_timezone_set('America/Chicago');
		$this_time =date("Y-m-d H:i:s", strtotime("now"));
		$this_item = "<i class=\"fa fa-fw fa-minus-square-o\"></i> Removed ".$row["title"]." from Calendar";
		$this_by = $_SESSION['username'];

		$col = "ID, panel_item, panel_time, panel_by";

		$stmt_two = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
		$stmt_two->bind_param("ss", $this_item, $this_by);
		$stmt_two->execute();

		$i++;
	}
	mysqli_close();
	header("Refresh:0");
	header("Location: ../calendar.php");
 ?>