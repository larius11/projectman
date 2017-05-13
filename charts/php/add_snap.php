<?php
	session_start();
	$add_ipms = $_POST['snap_ipm'];
	$add_bpts = $_POST['snap_bpts'];
	$add_news = $_POST['snap_new'];
	$add_date = $_POST['snap_date'];

	$wrong = false;

	if(!is_numeric($add_ipms)){
		$wrong = true;
		$_SESSION['ipm_error']=1;
	}else{
		$_SESSION['ipm_error']=0;
	}
	if(!is_numeric($add_bpts)){
		$wrong = true;
		$_SESSION['bpts_error']=1;
	}else{
		$_SESSION['bpts_error']=0;
	}
	if(!is_numeric($add_news)){
		$wrong = true;
		$_SESSION['news_error']=1;
	}else{
		$_SESSION['news_error']=0;
	}

	if ($wrong) {
		header("Location: ../../snap.php");
	}else{
		include '../../php/db_service.php';

		date_default_timezone_set('America/Chicago');
		$this_time =date("Y-m-d H:i:s", strtotime("now"));
		$this_item = "<i class=\"fa fa-fw fa-bar-chart\"></i> Snapshot Chart updated";
		$this_by = $_SESSION['username'];

		$col = "ID, panel_item, panel_time, panel_by";

		$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
		$stmt->bind_param("ss", $this_item, $this_by);
		$stmt->execute();

		$col = "ID, period, speed, quality, new";
		$stmt = $db_conx->prepare("INSERT INTO snap_chart ($col) VALUES (NULL, ?, ?, ?, ?)");
		$stmt->bind_param("sddi", $period, $speed, $quality, $new);

		$period = $add_date;
		$speed = round($add_ipms,2);
		$quality = round($add_bpts,2);
		$new = $add_news;
		$stmt->execute();
		mysqli_close();
		header("Refresh:0");
		header("Location: ../../snap.php");
	}

?>