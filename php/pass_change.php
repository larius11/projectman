<?php	
	if (!empty($_POST['newpass'])){

		include 'db_service.php';
		session_start();

		$this_user = $_SESSION['user'];
		$this_newpass = $_POST['newpass'];

        $stmt = $db_conx->prepare("SELECT * FROM users WHERE user='$this_user'");
        $stmt->execute();
        $result = $stmt->get_result();
        $rowNum = $result->num_rows;
        if($rowNum > 0){
			if ($row = $result->fetch_assoc()){

				$this_id = $row["ID"];

				$options = [
				    'cost' => 9,
				    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
				];
				$hash_pass = password_hash($this_newpass, PASSWORD_BCRYPT, $options);

				$stmt = $db_conx->prepare("UPDATE users SET pass='$hash_pass' WHERE ID='$this_id'");

				$stmt->execute();

	            mysqli_close();
				header("Refresh:0");
	            header('Location: http://www.ricardoriveron.com/projectman/profile.php');
	        }
	    }else{
            header('Location: http://www.ricardoriveron.com/projectman/profile.php');
        }
	}else{
		header('Location: http://www.ricardoriveron.com/projectman/profile.php');
	}	
?>
