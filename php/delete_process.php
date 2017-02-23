<?php 

	include 'db_service.php';

	$event = $_POST['event'];
	$i = 0;
	$begin = '../calendar/details/modal';
	$finish = '.html';
	$stmt = $db_conx->prepare("DELETE FROM events_list WHERE ID = '$event[$i]'");
	
	while($event[$i]){
		$url = $begin.$event[$i].$finish;
		unlink($url);
		$stmt->execute();
		$i++;
	}
	mysqli_close();
	header("Refresh:0");
	header("Location: ../calendar.php");
 ?>