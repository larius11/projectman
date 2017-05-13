<?php 

	if (!empty($_POST["newpartner"])){

		include 'db_service.php';
		session_start();

		$newpar = $_POST["newpartner"];

		date_default_timezone_set('America/Chicago');
		$this_time =date("Y-m-d H:i:s", strtotime("now"));
		$this_item = "<i class=\"fa fa-fw fa-user\"></i> Welcome ".$newpar."! ";
		$this_by = $_SESSION['username'];

		$col = "ID, panel_item, panel_time, panel_by";

		$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
		$stmt->bind_param("ss", $this_item, $this_by);
		$stmt->execute();

		$col = "ID, name, completed";

		$stmt = $db_conx->prepare("INSERT INTO counts_list ($col) VALUES (NULL, ?, 0)");
		$stmt->bind_param("s", $newpar);
		$stmt->execute();

		include '../counts/scan.php';

		$col = "ID, name";

		$stmt = $db_conx->prepare("INSERT INTO partner_list ($col) VALUES (NULL, ?)");
		$stmt->bind_param("s", $newpar);
		$stmt->execute();

		mysqli_close();

		header("Refresh:0");
		header("Location: ../roster.php");
	}
 ?>