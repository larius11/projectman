<?php
	if (!empty($_GET['title']) && !empty($_GET['chosen']) && !empty($_GET['fin_per'])){
		$up_title = $_GET['title'];
		$up_data = $_GET['chosen'];
		$up_str = "";
		$up_per = $_GET['fin_per'];

		include 'db_service.php';
		session_start();

		$to = $_SESSION['user'];
		$stmt = $db_conx->prepare("SELECT * FROM tasks ORDER BY completion DESC");

		$stmt->execute();
	    $result = $stmt->get_result();
	    $rowNum = $result->num_rows;
	    if($rowNum > 0){
	    	while ($row = $result->fetch_assoc()){
		    	if (($row["assign"]==$to) && ($row["title"]==$up_title)){
					$up_pieces = explode(", ", $row["taskleft"]);
					$up_id = $row["ID"];

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
						$up_pieces = explode(", ", $up_str);
					}
					$stmt = $db_conx->prepare("UPDATE tasks SET completion=$up_per, taskleft=? WHERE ID=$up_id");

					$stmt->bind_param('s', $up_str);
					$stmt->execute();
					mysqli_close();
					header("Refresh:0");
		            header('Location: ../tasks.php');
		        	
				}
			}
		}
	}else{
		if ($_GET['done']=="yes"){
			include 'db_service.php';
			session_start();

			date_default_timezone_set('America/Chicago');
			$this_time =date("Y-m-d H:i:s", strtotime("now"));
			$this_item = "<i class=\"fa fa-fw fa-check\"></i> ".$_GET['title']." completed";
			$this_by = $_SESSION['username'];

			$col = "ID, panel_item, panel_time, panel_by";

			$stmt = $db_conx->prepare("INSERT INTO  panel_list ($col) VALUES (NULL, ?, '$this_time', ?)");
			$stmt->bind_param("ss", $this_item, $this_by);
			$stmt->execute();

			$del_id = $_GET['id'];
			$stmt = $db_conx->prepare("DELETE FROM tasks WHERE ID = $del_id");
			$stmt->execute();
			header("Refresh:0");
			header('Location: ../tasks.php');
		}else{
			header("Refresh:0");
			header('Location: ../tasks.php');		
	    }	
	}
	
?>