<?php
	include '../php/db_service.php';
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM events_list ORDER BY start ASC");
	$stmt->execute();
	$result = $stmt->get_result();

	$output = "";
	$event = array();
	$more = true;
	while($more) {
		$event = mysqli_fetch_row($result);
		if (!($event)){
			$more = false;
		}else{
			$output = $output."<option value=\"$event[0]\"> $event[1] </option>";
		}
	}
	include 'delete.html.php';

	mysqli_close();
?>
