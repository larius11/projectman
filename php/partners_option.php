<?php 
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM partner_list ORDER BY name ASC");

	$stmt->execute();
	$result = $stmt->get_result();
	$rowNum = $result->num_rows;
    $list_output = "";
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
    		$list_name = $row["name"];

    		$list_output .= "<div class=\"checkbox\" style=\"padding-bottom: 8px; font-size: large;\"><label><input type=\"checkbox\" name=\"partners[]\" value=\"$list_name\" style=\"transform: scale(2);\"><p style=\"padding-left: 5px;margin-bottom: 0px;\">$list_name</p></label></div>";
    	}
    }
    echo $list_output;	
 ?>