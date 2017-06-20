<?php
	if (!empty($_GET['title']) && !empty($_GET['chosen']) && !empty($_GET['fin_per'])){

		include '../php/db_service.php';
		session_start();

		$up_title = $_GET['title'];
		$up_data = $_GET['chosen'];
		$up_str = "";
		$up_per = $_GET['fin_per'];
		$email_tasks = "";
		$email_to = "s0968m@heb.com";
		// $email_to = "larius828@yahoo.com";
		$email_subject = $up_title;
		$email_user = $_SESSION['username']; 


		$stmt = $db_conx->prepare("SELECT * FROM tasks WHERE assign=\"all\"");

		$stmt->execute();
	    $result = $stmt->get_result();
	    $rowNum = $result->num_rows;
	    if($rowNum > 0){
	    	while ($row = $result->fetch_assoc()){
		    	if ($row["title"]==$up_title){
					$up_pieces = explode(", ", $row["taskleft"]);
					$up_id = $row["ID"];
					date_default_timezone_set('America/Chicago');
					$sub_time = date('l jS \of F Y h:i:s A');

					$email_message = "Some ".$up_title." completed by".$email_user.".\r\n";
					$email_message = "Date and Time: ".$sub_time."\r\n\r\n";

					foreach ($up_data as $key) {
						$up_i = 0;
						$up_str = "";
						while($up_pieces[$up_i]){
							if ($key!=$up_pieces[$up_i]){

								if ($up_str == ""){
									$up_str .= "".$up_pieces[$up_i];
								}else{
									$up_str .= ", ".$up_pieces[$up_i];
								}
							}
							$up_i++;
						}
						$email_message .= "\t" . $key . "\r\n";
						$up_pieces = explode(", ", $up_str);
					}

					mail($email_to, $email_subject, $email_message);

					$stmt = $db_conx->prepare("UPDATE tasks SET completion=$up_per, taskleft=? WHERE ID=$up_id");

					$stmt->bind_param('s', $up_str);
					$stmt->execute();
					mysqli_close();
					header("Refresh:0");
		            header('Location: ../tasks.php');
		        	
				}
			}
		}
	}
	
?>