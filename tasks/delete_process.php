<?php 

	include '../php/db_service.php';

	session_start();

	$my_event = $_POST['event'];
	$tsk = $my_event[0];

	$stmt = $db_conx->prepare("SELECT * FROM tasks WHERE ID = $tsk");
	$stmt->execute();
	$result = $stmt->get_result();
	$my_event = mysqli_fetch_row($result);

	if ($my_event[2] == "riveronr"){
		$this_name = " Ricardo Riveron";
	}
	if ($my_event[2] == "m648483"){
		$this_name = " Antonio Martinez";
	}
	if ($my_event[2] == "m197308"){
		$this_name = " Jessica Moffett";
	}
	if ($my_event[2] == "s730637"){
		$this_name = " Mark Stern";
	}
	if ($my_event[2] == "h101186"){
		$this_name = " Jackie Hamill";
	}
	if ($my_event[2] == "r252501"){
		$this_name = " Pam Ratliff";
	}
	if ($my_event[2] == "p618325"){
		$this_name = " D-Ray";
	}
	if ($my_event[2] == "m111000"){
		$this_name = " Jackie Milligan";
	}
	if ($my_event[2] == "g718377"){
		$this_name = " Will Griffin";
	}
	if ($my_event[2] == "l368470"){
		$this_name = " Stephy Luna";
	}
	if ($my_event[2] == "a671948"){
		$this_name = " Marwan Abbood";
	}

	date_default_timezone_set('America/Chicago');
	$this_time =date("Y-m-d H:i:s", strtotime("now"));
	$this_item = "<i class=\"fa fa-fw fa-minus\"></i> Removed ".$my_event[1]." from".$this_name;
	$this_by = $_SESSION['username'];

	$col = "ID, panel_item, panel_time, panel_by";

	$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
	$stmt->bind_param("ss", $this_item, $this_by);
	$stmt->execute();

	$stmt = $db_conx->prepare("DELETE FROM tasks WHERE ID = $tsk");
	$stmt->execute();
	mysqli_close();
	header("Refresh:0");
	header("Location: ../tasks.php");
 ?>