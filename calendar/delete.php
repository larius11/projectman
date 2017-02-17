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

	// $result = mysql_query("SELECT * FROM events_list");
	// $output = "";
	// $event = array();
	// $more = true;
	// while($more) {
	// 	$event = mysql_fetch_row($result);
	// 	if (!($event)){
	// 		$more = false;
	// 	}else{
	// 		$output = $output."<option> $event[1] </option>";
	// 	}
	// }
	$output = "<p>Beginnings of our Dashboard</p>";
	include 'delete.html.php';

	mysql_close();
?>
