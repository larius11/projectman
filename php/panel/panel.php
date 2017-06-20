<?php 
	// MAKE SURE TO ESTABLISH CONNECTION BEFORE INCLUDING FUNCTION!
	// session_start();
	if ($amount == -1){
		$stmt = $db_conx->prepare("SELECT * FROM panel_list ORDER BY panel_time DESC");
	}else{
		$stmt = $db_conx->prepare("SELECT * FROM panel_list ORDER BY panel_time DESC LIMIT $amount");
	}

	date_default_timezone_set('America/Chicago');
	$today=date("Y-m-d H:i:s", strtotime("now"));
	$data = array();
	$post = array();
	$time = "";
	$panel_out = "";

	$stmt->execute();
	$result = $stmt->get_result();
	$rowNum = $result->num_rows;
	if ($rowNum > 0){
		while($row = $result->fetch_assoc()) {

			$elapsed = (strtotime($today)- strtotime($row["panel_time"]));

			if ($elapsed < 60){
				$elapsed = floor($elapsed);
				$time = $elapsed . " seconds ago";
			}else{
				$elapsed = $elapsed/60;
				if ($elapsed < 60){
					$elapsed = floor($elapsed);
					$time = $elapsed . " minutes ago";
				}else{
					$elapsed = $elapsed/60;
					if ($elapsed < 24){
						$elapsed = floor($elapsed);
						$time = $elapsed . " hours ago";
					}else{
						$elapsed = $elapsed/24;
						if ($elapsed < 7){
							$elapsed = floor($elapsed);
							$time = $elapsed . " days ago";
						}else{
							$elapsed = $elapsed/7;
							if ($elapsed < 52){
								$elapsed = floor($elapsed);
								$time = $elapsed . " weeks ago";
							}else{
								$elapsed = $elapsed/52;
								$elapsed = floor($elapsed);
								$time = $elapsed . " years ago";
							}
						}
					}
				}
			}

			$panel_out .= "<a class=\"list-group-item\"><span class=\"badge\">".$time."</span>".$row["panel_item"]."<br><p style=\"text-align: center;\">by <strong>".$row["panel_by"]."</strong></p></a>";

			/* FORMAT:
			<a class="list-group-item">
                <span class="badge">just now</span>
                <i class="fa fa-fw fa-calendar"></i> Deep Cleaning scheduled
            </a>
			*/
		}
		echo $panel_out;
	}
 ?>