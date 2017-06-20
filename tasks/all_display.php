<?php 

	include 'db_service.php';
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM tasks ORDER BY completion DESC");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    $output = "";

    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
    		if ($row["assign"]!="all"){

	    		$title = $row["title"];

	    		if (substr_compare($title, "Recognize Partners -", 0, 20, TRUE) == 0){
	    			$title = substr($title, 20);
	    		}

	    		$str_t = $row["assign"];
	    		if ($str_t == "riveronr"){
					$str_t = "Ricardo Riveron";
				}
				if ($str_t == "m648483"){
					$str_t = "Antonio Martinez";
				}
				if ($str_t == "m197308"){
					$str_t = "Jessica Moffett";
				}
				if ($str_t == "s730637"){
					$str_t = "Mark Stern";
				}
				if ($str_t == "h101186"){
					$str_t = "Jackie Hamill";
				}
				if ($str_t == "r252501"){
					$str_t = "Pam Ratliff";
				}
				if ($str_t == "p618325"){
					$str_t = "D-Ray";
				}
				if ($str_t == "m111000"){
					$str_t = "Jackie Milligan";
				}
				if ($str_t == "g718377"){
					$str_t = "Will Griffin";
				}
				if ($str_t == "l368470"){
					$str_t = "Stephy Luna";
				}
				if ($str_t == "a671948"){
					$str_t = "Marwan Abbood";
				}

	    		$array_name = explode(" ", $str_t);
	    		$display_name = $array_name[0];

	    		$per = $row["completion"];
	    		$output .= "<a class=\"list-group-item\"> $title - $display_name <strong style=\"float: right;\">$per&#37;</strong></a>";

	    	}
    	}
    }
    echo $output;	
 ?>