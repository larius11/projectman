<?php 

	include 'php/db_service.php';
	session_start();

	$stmt = $db_conx->prepare("SELECT done as cat, todo as amt FROM counts_chart");

	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$json_data=array();	
 
    $json_array['label']="Completed";  
    $json_array['value']=$row['cat'];  
    array_push($json_data,$json_array);
    $json_array['label']="Remaining";  
    $json_array['value']=$row['amt'];  
    array_push($json_data,$json_array); 
 ?>