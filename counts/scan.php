<?php

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
?>