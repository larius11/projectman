<?php
	include '../../php/db_service.php';
	session_start();

	$to = $_SESSION['user'];
	$stmt = $db_conx->prepare("SELECT * FROM counts_list WHERE completed = 1");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
			$res_id = $row['ID'];
			$stmt = $db_conx->prepare("UPDATE counts_list SET completed=0 WHERE ID=$res_id");
			$stmt->execute();
		}
	}
	$counts_com = 0;
	$counts_rem = 0;
	$stmt = $db_conx->prepare("SELECT * FROM counts_list");
	$stmt->execute();
	$result = $stmt->get_result();
	$rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
	    	if ($row["completed"]==0){
	    		$counts_rem++;
    		}else{
    			$counts_com++;
    		}
    	}
    	$stmt = $db_conx->prepare("UPDATE counts_chart SET done=$counts_com, todo=$counts_rem WHERE ID=1");
    	$stmt->execute();
    }
	mysqli_close();
	header("Refresh:0");
    header('Location: ../../counts.php');	        		
?>