<?php 
	if(!empty($_POST['title']) && !empty($_POST['url'])){
		include 'db_service.php';

		$title = mysqli_real_escape_string($db_conx, $_POST['title']);
		$body = mysqli_real_escape_string($db_conx, $_POST['url']);
		$url = "#";
		$begin = '../calendar/details/modal';
		$finish = '.html';
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

		$stmt = $db_conx->prepare("INSERT INTO  events_list ($col) VALUES (NULL, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssii", $one, $two, $three, $four, $five);

		$one=$title;
		$two=$url;
		$three=$class;
		$four=$start;
		$five=$end;
		$stmt->execute();

		$stmt = $db_conx->prepare("SELECT * FROM events_list WHERE title=?");
		$stmt->bind_param("s", $six);
		$six = $title;
		$stmt->execute();
		$result = $stmt->get_result();
		$rowNum = $result->num_rows;
        if($rowNum > 0){
        	if ($row = $result->fetch_assoc()){
        		$num = $row["ID"];
        	}
        	$url = $begin.$num.$finish;

        	$file = fopen($url,"w") or die("Couldn't open...");

			$txt = "<html lang=\"en\"><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><meta name=\"description\" content=\"\"><meta name=\"author\" content=\"\"><title>Service Admin Website</title><!-- Bootstrap Core CSS --><link href=\"../../css/bootstrap.min.css\" rel=\"stylesheet\"><!-- Custom CSS --><link href=\"../../css/sb-admin.css\" rel=\"stylesheet\"><!-- Morris Charts CSS --><link href=\"../../css/plugins/morris.css\" rel=\"stylesheet\"><!-- Custom Fonts --><link href=\"../../font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesnt work if you view the page via file:// --><!--[if lt IE 9]><script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script><script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script><![endif]--></head><body style=\"background-color: rgba(0,0,0,0);\"><div class=\"col-md-12\"><div class=\"panel panel-info\"><div class=\"panel-heading\"><h3 class=\"panel-title\">$title</h3></div><div class=\"panel-body\">$body</div></div></div></body></html>";
			fwrite($file, $txt) or die("Unable to write file!");
			fclose($file);
        }


		mysqli_close();
		header("Refresh:0");
		header("Location: ../calendar.php");
	}else{
		echo "<p>Please insert a <strong>Title</strong></p>";
	}
 ?>