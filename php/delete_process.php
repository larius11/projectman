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

	$event = $_POST['event'];
	$i = 0;
	
	while($event[$i]){
		$sql = "DELETE FROM events_list WHERE ID = '$event[$i]'";
		if (!mysql_query($sql)){
			die('Error: ' . mysql_error());
		} 
		$i++;
	}


	// $col = "ID, title, url, class, start, end";
	// $val = "NULL, '$title', '$url', '$class', '$start', '$end'";

	// $sql = "INSERT INTO  events_list ($col) VALUES ($val)";

	

	mysql_close();
 ?>