<?php 
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM partner_list ORDER BY name ASC");

	$stmt->execute();
	$result = $stmt->get_result();
	$rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
    		$list_name = $row["name"];

    		$list_output .= "<tr><td>$list_name</td></tr>";
    	}
    }
    echo $list_output;	
 ?>