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

	$title = $_POST['title'];
	$url = "#";
	$class = $_POST['class'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	
	$start = strtotime($start) * 1000;
	$end = strtotime($end) * 1000;

	if ($start == $end){
		$end += 28800;
	}else if ($start > $end){
		$temp = $start;
		$start = $end;
		$end = $temp;
	}

	switch($class){    
        case "Informative":
            $class = "event-info";
            break;
        case "Recurring":
            $class = "event-inverse";
            break;
        case "Special":
            $class = "event-special";
            break;
        case "Important":
            $class = "event-important";
            break;
    }

	$col = "ID, title, url, class, start, end";
	$val = "NULL, '$title', '$url', '$class', '$start', '$end'";

	$sql = "INSERT INTO  events_list ($col) VALUES ($val)";

	if (!mysql_query($sql)){
		die('Error: ' . mysql_error());
	}

	mysql_close();
	header("Location: ../calendar.html");
 ?>