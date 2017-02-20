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

	echo "<p>Im about to begin!!</p>";

	$result = mysql_query("SELECT * FROM comm_list");
	// date_default_timezone_set('America/Chicago');
	$today=date("Y-m-d h:i:sa", strtotime("now"));
	$data = array();
	$post = array();
	$i = 0;
	$more = true;
	echo "<p>Im about to end.</p>";
	while($more) {
		$data = mysql_fetch_row($result);

		if (!($data)){
			$more = false;
		}else{
			$elapsed = (strtotime($today)- strtotime($data[2]))/60;
			if ($i%2 == 0){
				$post[$i] = "<li><div class=\"timeline-badge\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i></div><div class=\"timeline-user\">".$data[1]."</div><div class=\"timeline-panel\"><div class=\"timeline-heading\"><h4 class=\"timeline-title\">".$data[3]."</h4><p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i>".$elapsed." minutes ago</small></p></div><div class=\"timeline-body\"><p>".$data[4]."</p></div></div></li>"
			}else{
				$post[$i] = "
				<li clas=\"timeline-inverted\">
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
                </li>"
			}
			echo $post[$i];
			$i++;
		}
	}
 ?>