<?php
	if (!empty($_POST['partners'])){

		include 'db_service.php';
		session_start();

		$selection = $_POST['partners'];

		$stmt = $db_conx->prepare("DELETE FROM counts_list WHERE name=?");
		$stmt->bind_param('s',$par_name);
		$stmt_two = $db_conx->prepare("DELETE FROM partner_list WHERE name=?");
		$stmt_two->bind_param('s',$par_name);
		foreach ($selection as $ids){
			$par_name = $ids;
			$stmt->execute();
			$stmt_two->execute();
		}

		include '../counts/scan.php';

		mysqli_close();
		header("Refresh:0");
        header('Location: ../roster.php');	    

	}
?>