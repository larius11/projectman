<?php 

	define('DB_NAME','service');
	define('DB_USER','heb');
	define('DB_PASSWORD','Austin04');
	define('DB_HOST', 'localhost');

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db(DB_NAME, $link);

	if (!$db_selected){
		die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
	}

	$result = mysql_query("SELECT * FROM comm_list");
	date_default_timezone_set('America/Chicago');
	$today=date("Y-m-d h:i:sa", strtotime("now"));
	$data = array();
	$post = array();
	$time = "";
	$i = 0;
	$more = true;
	while($more) {
		$data = mysql_fetch_row($result);

		if (!($data)){
			$more = false;
		}else{
			$elapsed = (strtotime($today)- strtotime($data[2]));

			if ($elapsed < 60){
				$elapsed = floor($elapsed);
				$time = $elapsed . " seconds ago";
			}else{
				$elapsed = $elapsed/60;
				echo $elapsed;
			}
			if ($elapsed < 60){
				$elapsed = floor($elapsed);
				$time = $elapsed . " minutes ago";
			}else{
				$elapsed = $elapsed/60;
			}
			if ($elapsed < 24){
				$elapsed = floor($elapsed);
				$time = $elapsed . " hours ago";
			}else{
				$elapsed = $elapsed/24;
			}
			if ($elapsed < 7){
				$elapsed = floor($elapsed);
				$time = $elapsed . " days ago";
			}else{
				$elapsed = $elapsed/7;
			}
			if ($elapsed < 52){
				$elapsed = floor($elapsed);
				$time = $elapsed . " weeks ago";
			}else{
				$elapsed = $elapsed/52;
				$elapsed = floor($elapsed);
				$time = $elapsed . " years ago";
			}



			echo "<br>";
			if ($i%2 == 0){
				$post[$i] = "<li><div class=\"timeline-badge\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i></div><div class=\"timeline-user\">$data[1]</div><div class=\"timeline-panel\"><div class=\"timeline-heading\"><h4 class=\"timeline-title\">$data[3]</h4><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i>$elapsed minutes ago</small></p></div><div class=\"timeline-body\"><p>$data[4]</p></div></div></li>";
			}else{
				$post[$i] = "
				<li class=\"timeline-inverted\">
                    <div class=\"timeline-badge\">
                        <i class=\"fa fa-user\" aria-hidden=\"true\"></i>
                    </div>
                    <div class=\"timeline-useri\">
                            ". $data[1] . "
                    </div>
                    <div class=\"timeline-panel\">
                        <div class=\"timeline-heading\">
                            <h4 class=\"timeline-title\">".$data[3]."</h4>
                            <p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i>".$elapsed." minutes ago</small></p>
                        </div>
                        <div class=\"timeline-body\">
                            <p>".$data[4]."</p>
                        </div>
                    </div>
                </li>";
			}
			echo $post[$i];
			$i++;
		}
	}
 ?>