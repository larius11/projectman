<?php 
	if(!empty($_POST['duty']) && !empty($_POST['assign'])){
		include '../php/db_service.php';

		$duty = $_POST['duty'];
		$assign = $_POST['assign'];

		switch ($duty) {
			case "Closing Duties":
				$taskleft = "Clean/Lock Registers, Tobacco Fixtures Locked, Refilled Bags and Receipt Tapes, Electric Carts charging, Removed Stickers, Picked up ALL returns, Organize Returns Area, Damages, Red Baskets on 13, Parking Lot, Cleaned Vacuum"; 
				break;
			case "Opening Duties":
				$taskleft = "WGO Walk, Intercom Check for MIC, Put Out Mats, Check Receipt Tape and Bags, Refill Cleaning Supplies, Check BOB stickers, Clean&Clear Hi-side and Bye-Side, Clean Buddy Machine, Check Red Baskets on 13, Wipe Down Electric Carts"; 
				break;
			case "Recognize Partners":
				if(!empty($_POST['partners']) && !empty($_POST['recfor'])){
					$duty .= " - ".$_POST['recfor'];
					$partners = $_POST['partners'];
					$task_i = 0;
					$taskleft = $partners[$task_i]."";
					$task_i++;
					while($partners[$task_i]){
						$taskleft .=", ".$partners[$task_i];
						$task_i++;
					}
				}
				break;
			case "Other":
				if(!empty($_POST['other_name']) && !empty($_POST['other_task_list'])){
					$other_list = $_POST['other_task_list'];
					$duty =  $_POST['other_name'];
					$other_i = 0;
					$taskleft = $other_list[$other_i]."";
					$other_i++;
					while($other_list[$other_i]){
						$taskleft .=", ".$other_list[$other_i];
						$other_i++;
					}

				}
				break;
		}

		session_start();

		date_default_timezone_set('America/Chicago');
		$this_time =date("Y-m-d H:i:s", strtotime("now"));
		$this_item = "<i class=\"fa fa-fw fa-plus\"></i> ".$duty." assigned to ".$assign;
		$this_by = $_SESSION['username'];

		$col = "ID, panel_item, panel_time, panel_by";

		$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
		$stmt->bind_param("ss", $this_item, $this_by);
		$stmt->execute();

		switch($assign){    
	        case "Ricardo Riveron":
	            $assign = "riveronr";
	            break;
	        case "Antonio Martinez":
	            $assign = "m648483";
	            break;
	        case "Jessica Moffett":
	            $assign = "m197308";
	            break;
	        case "Mark Stern":
	            $assign = "s730637";
	            break;
	        case "Jackie Hamill":
	            $assign = "h101186";
	            break;
	        case "Pam Ratliff":
	            $assign = "r252501";
	            break;
	        case "D-Ray":
	            $assign = "p618325";
	            break;
	        case "Jackie Milligan":
	            $assign = "m111000";
	            break;
            case "Will Griffin":
	            $assign = "g718377";
	            break;
	        case "Stephanie Luna":
	            $assign = "l368470";
	            break;
	        case "Marwan Abbood":
	            $assign = "a671948";
	            break;
	    }

		$col = "ID, title, assign, completion, taskleft, seen";

		$stmt = $db_conx->prepare("INSERT INTO tasks ($col) VALUES (NULL, ?, ?, 0, ?, 0)");
		$stmt->bind_param("sss", $one, $two, $four);

		$one = $duty;
		$two = $assign;
		$four = $taskleft;

		$stmt->execute();

		mysqli_close();

		header("Refresh:0");
		header("Location: ../tasks.php");
	}else{
		echo "<p>There's been an <strong>Error</strong>!</p>";
	}
 ?>