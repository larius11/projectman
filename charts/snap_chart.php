<?php 

	include 'php/db_service.php';
	session_start();

	$stmt = $db_conx->prepare("SELECT period as cuando, speed as ipm, quality as bpts, new as ter FROM snap_chart ORDER BY period ASC");

	$stmt->execute();
	$result = $stmt->get_result();
	$json_data_snap=array();	
	while($row = $result->fetch_assoc()){ 
	    $json_array_snap['snapweek']=$row['cuando'];  
	    $json_array_snap['ipm']=round($row['ipm'], 2);
	    $json_array_snap['bpts']=round($row['bpts'], 2);
	    $json_array_snap['news']=$row['ter'];  
	    array_push($json_data_snap,$json_array_snap);
 	}
 ?>