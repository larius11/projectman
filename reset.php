<?php
	// Will reset opening and closing duties
	// /var/www/html/projectman/reset.php

	define('DB_NAME','service');
	define('DB_USER','heb');
	define('DB_PASSWORD','Austin04');
	define('DB_HOST', 'localhost');

	$db_conx = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}

	$duty = "Closing Duties";
	$left = "Clean/Lock Registers, Tobacco Fixtures Locked, Refilled Bags and Receipt Tapes, Electric Carts charging, Removed Stickers, Picked up ALL returns, Organize Returns Area, Damages, Red Baskets on 13, Parking Lot, Cleaned Vacuum";

	$stmt = $db_conx->prepare("UPDATE tasks SET completion = 0, taskleft=? WHERE title=?");
	$stmt->bind_param('ss', $left, $duty);
	$stmt->execute();

	$duty = "Opening Duties";
	$left = "WGO Walk, Intercom Check for MIC, Put Out Mats, Check Receipt Tape and Bags, Refill Cleaning Supplies, Check BOB stickers, Clean&Clear Hi-side and Bye-Side, Clean Buddy Machine, Check Red Baskets on 13, Wipe Down Electric Carts";
	$stmt->execute();

	mysqli_close($db_conx);

?>