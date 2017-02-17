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

	$result = mysql_query("SELECT * FROM events_list");

	echo($result);

	// $output = "<div id=\"box\"><div class=\"box-top\"> $title </div><div class=\"box-panel\">This is sort of working.</div></div>";
	// include 'delete.html.php';

	// mysql_close();
?>
