<?php 

	include '../php/db_service.php';

	$stmt = $db_conx->prepare("SELECT * FROM events_list");
	$stmt->execute();
	$result = $stmt->get_result();

	$to_encode = array();
	$i = 0;
	$begin = 'calendar/details/modal';
	$end = '.html';
	$event = array();
	$more = true;
	while($more) {
		$event = mysqli_fetch_row($result);
		if (!($event)){
			$more = false;
		}else{
			$url = $begin.$event[0].$end;
			$to_encode[$i] = array('id' => $event[0],'title' => $event[1],'url' => $url,'class' => $event[3],'start' => $event[4],'end' => $event[5]);
			$i++;
		}
	}
	echo json_encode(array('success' => 1, 'result' => $to_encode));
	header("Refresh:0");
 ?>
