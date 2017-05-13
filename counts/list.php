<?php 
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM counts_list ORDER BY name ASC");

	$stmt->execute();
	$result = $stmt->get_result();
	$rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
	    	if ($row["completed"]==0){
	    		$list_name = $row["name"];
	    		$list_id = $row["ID"];

	    		$list_output .= "<div class=\"checkbox\" style=\"padding-bottom: 8px; font-size: large;\"><label><input type=\"checkbox\" name=\"selection[]\" value=\"$list_id\" style=\"transform: scale(2);\"><p style=\"padding-left: 5px;margin-bottom: 0px;\">$list_name</p></label></div>";
    		}
    	}
    }
    echo $list_output;	
 ?>