<?php 

	include 'db_service.php';
	session_start();

	$to = $_SESSION['user'];
	$stmt = $db_conx->prepare("SELECT * FROM tasks ORDER BY completion DESC");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){
	    	if ($row["assign"]==$to){

	    		$title = $row["title"];
	    		$per = $row["completion"];
	    		$left = $row["taskleft"];
	    		$id = $row["ID"];
	    		$arr = str_replace(' ', '', $title)."[]";

	    		$pieces = explode(", ", $left);
	    		$i = 0;

	    		$outtie .= "<h2>$title</h2>";
	    		$outtie .= "<div class=\"progress\"><div class=\"progress-bar progress-bar-danger progress-bar-striped active\" role=\"progressbar\" style=\"width: $per%;\" id=\"$id\"><span class=\"sr-only\">$per% Complete</span></div></div><form action=\"php/task_update.php\" method=\"get\">
	    		<input type=\"text\" style=\"display: none;\" value=\"$title\" name=\"title\">
	    		<input type=\"text\" style=\"display: none;\" value=\"$per\" name=\"fin_per\" id=\"fin-target-$id\">
	    		<input type=\"text\" style=\"display: none;\" value=\"$id\" name=\"id\">";
	    		if ($per<100){
	    			$outtie .= "<div class=\"form-group\"><label>Tasks left</label>";
		    		while($pieces[$i]){
			    		$outtie .= "<div class=\"checkbox\"><label><input type=\"checkbox\" value=\"$pieces[$i]\" onClick=\"return updateProgress($id, $i)\" id=\"box-$id-$i\" name=\"chosen[]\" unchecked>$pieces[$i]</label></div>";
			    		$i++;
		    		}

		    		$outtie .= "<button type=\"submit\" class=\"btn btn-default\">Submit</button></div></form>";
		    	}else{
		    		$outtie .= "<button type=\"submit\" class=\"btn btn-default\" name=\"done\" value=\"yes\">Done!</button></form>";
		    	}
	    		$outtie .= "<div id=\"dom-target-$id\" style=\"display: none;\">$i</div>";
	    		$outtie .= "<div id=\"per-target-$id\" style=\"display: none;\">0</div>";
		    	
    		}
    	}
    }
    echo $outtie;	
 ?>