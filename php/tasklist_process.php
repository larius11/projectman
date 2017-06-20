<?php 

	include 'db_service.php';
	session_start();

	$to = $_SESSION['user'];
	$asterisk = "<i class=\"fa fa-asterisk\" aria-hidden=\"true\" style=\"color: rgb(192, 57, 43);\"></i>";
	$stmt = $db_conx->prepare("SELECT * FROM tasks ORDER BY completion DESC");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
	    	if ($row["assign"]==$to){
	    		$title = $row["title"];
	    		if (substr_compare($title, "Recognize Partners -", 0, 20, TRUE) == 0){
	    			$title = substr($title, 20);
	    		}
	    		$per = $row["completion"];
	    		$up_id = $row["ID"];
			    $stmt = $db_conx->prepare("UPDATE tasks SET seen=1 WHERE ID=$up_id");
	    		$stmt->execute();
	    		$output .= "<a class=\"list-group-item\">";
	    		if($row["seen"]==0){
	    			$output .= $asterisk."";
	    		}
	    		$output .= " $title <strong style=\"float: right;\">$per&#37;</strong></a>";
    		}
    	}
    }
    echo $output;	
 ?>