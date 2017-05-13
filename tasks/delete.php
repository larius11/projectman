<?php
	include '../php/db_service.php';
	session_start();

	$who = $_SESSION['user'];

	$stmt = $db_conx->prepare("SELECT * FROM tasks");
	$stmt->execute();
	$result = $stmt->get_result();

	$output = "";
	$event = array();
	$more = true;
	while($more) {
		$event = mysqli_fetch_row($result);

		if ($event[2] == "riveronr"){
			$who = " Ricardo Riveron";
		}
		if ($event[2] == "m648483"){
			$who = " Antonio Martinez";
		}
		if ($event[2] == "m197308"){
			$who = " Jessica Moffett";
		}
		if ($event[2] == "s730637"){
			$who = " Mark Stern";
		}
		if ($event[2] == "h101186"){
			$who = " Jackie Hamill";
		}
		if ($event[2] == "r252501"){
			$who = " Pam Ratliff";
		}
		if ($event[2] == "p618325"){
			$who = " D-Ray";
		}
		if ($event[2] == "m111000"){
			$who = " Jackie Milligan";
		}
		if ($event[2] == "w718377"){
			$who = " Will Griffin";
		}
		if ($event[2] == "l368470"){
			$who = " Stephy Luna";
		}
		if ($event[2] == "a671948"){
			$who = " Marwan Abbood";
		}

		if (!($event)){
			$more = false;
		}else{
			$output = $output."<option value=\"$event[0]\"> $event[1] - $who</option>";
		}
	}
	include 'delete.html.php';

	mysqli_close();
?>
