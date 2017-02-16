<?php 

	// define('DB_NAME','service');
	// define('DB_USER','heb');
	// define('DB_PASSWORD','Austin04');
	// define('DB_HOST', 'localhost');

	// $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

	// if (!$link) {
	// 	die('Could not connect: ' . mysql_error());
	// }

	// $db_selected = mysql_select_db(DB_NAME, $link);

	// if (!$db_selected){
	// 	die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
	// }

	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];

	echo($title);
	echo(" 1\n");
	echo($start);
	echo(" 2\n");
	echo($end);
	echo(" 2\n");
	
	
	

	// $col = "title, body";
	// $val = "'$title', '$body'";

	// $sql = "INSERT INTO projects ($col) VALUES ($val)";

	// if (!mysql_query($sql)){
	// 	die('Error: ' . mysql_error());
	// }

	// mysql_close();
 ?>