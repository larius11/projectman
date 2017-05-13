<?php

	include 'php/db_service.php';
	session_start();

	$new_stmt = $db_conx->prepare("SELECT * FROM tasks");

	$new_stmt->execute();
    $new_result = $new_stmt->get_result();
    $new_rowNum = $new_result->num_rows;
    $new_to = $_SESSION['user']; 

    $new_total = 0;
    $total = 0;

    if($new_rowNum > 0){
    	while ($new_row = $new_result->fetch_assoc()){
	    	if ($new_row["assign"]==$new_to){
	    		if ($new_row["seen"]==0){
		    		$new_total++;
	    		}
	    		$total++;
	    	}
	    }
	}

	if ($new_total>0){
		echo "<div class=\"huge\">$new_total</div><div>New Tasks!</div>";
	}else{
		echo "<div class=\"huge\">$total</div><div>Total Tasks!</div>";
	}
?>