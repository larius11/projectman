<?php 

	include 'db_service.php';
	session_start();

	$stmt = $db_conx->prepare("SELECT * FROM tasks WHERE assign=\"all\"");

	$stmt->execute();
    $result = $stmt->get_result();
    $rowNum = $result->num_rows;
    if($rowNum > 0){
    	while ($row = $result->fetch_assoc()){

    		$title = $row["title"];
    		$per = $row["completion"];
    		$left = $row["taskleft"];
    		$id = $row["ID"];
    		$arr = str_replace(' ', '', $title)."[]";

    		$pieces = explode(", ", $left);
    		$i = 0;

    		$outtie_daily .= "<h2>$title</h2>";
    		$outtie_daily .= "<div class=\"progress\"><div class=\"progress-bar progress-bar-danger progress-bar-striped active\" role=\"progressbar\" style=\"width: $per%;\" id=\"$id\"><span class=\"sr-only\">$per% Complete</span></div></div><form action=\"tasks/daily_update.php\" method=\"get\">
    		<input type=\"text\" style=\"display: none;\" value=\"$title\" name=\"title\">
    		<input type=\"text\" style=\"display: none;\" value=\"$per\" name=\"fin_per\" id=\"fin-target-$id\">
    		<input type=\"text\" style=\"display: none;\" value=\"$id\" name=\"id\">";
    		if ($per<100){
    			$outtie_daily .= "<div class=\"form-group\"><label>Tasks left</label>";
	    		while($pieces[$i]){
		    		$outtie_daily .= "<div class=\"checkbox\"><label><input type=\"checkbox\" value=\"$pieces[$i]\" onClick=\"return updateProgress($id, $i)\" id=\"box-$id-$i\" name=\"chosen[]\" unchecked>$pieces[$i]</label></div>";
		    		$i++;
	    		}

	    		$outtie_daily .= "<button type=\"submit\" class=\"btn btn-default\">Submit</button></div></form>";
	    	}else{
	    		$outtie_daily .= "<h3>Done!</h3></form>";
	    	}
    		$outtie_daily .= "<div id=\"dom-target-$id\" style=\"display: none;\">$i</div>";
    		$outtie_daily .= "<div id=\"per-target-$id\" style=\"display: none;\">0</div>";
		    	
    	}
    }
    echo $outtie_daily;	
 ?>