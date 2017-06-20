<?php 

	include 'db_service.php';
	session_start();

	$asterisk = "<i class=\"fa fa-asterisk\" aria-hidden=\"true\" style=\"color: rgb(192, 57, 43);\"></i>";
	$stmt = $db_conx->prepare("SELECT * FROM tasks WHERE assign=\"all\"");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
	    		$title = $row["title"];
	    		$per = $row["completion"];
	    		$up_id = $row["ID"];
	    		$output_daily .= "<a class=\"list-group-item\">";
	    		$output_daily .= " $title <strong style=\"float: right;\">$per&#37;</strong></a>";
    	}
    }
    echo $output_daily;	
 ?>