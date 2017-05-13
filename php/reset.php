<?php	
	session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: reset.php';
        header("Location: http://www.ricardoriveron.com/projectman/php/login.php");
    }else 
    if (isSet($_POST['userre']) && isSet($_POST['passre'])){
		include 'db_service.php';

		$this_user = $_POST['userre'];
		$this_pass = $_POST['passre'];

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
				$hash_pass = password_hash($this_pass, PASSWORD_BCRYPT, $options);
	            echo $hash_pass."<br>";

				$stmt = $db_conx->prepare("UPDATE users SET pass='$hash_pass' WHERE ID='$this_id'");

				$stmt->execute();

				echo $hash_pass."<br>";

				echo password_verify($this_pass,$hash_pass)."...";

	            mysqli_close();
				// header("Refresh:0");
	   //          header('Location: http://www.ricardoriveron.com/projectman/index.php');
	        }
	    }
	}else{	
?>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service - RESET</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

    <link href="../css/sb-admin.css" rel="stylesheet">

    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    	<img class="center-block" src="../img/heb.png" style="height: 75px;">
                    	<br>
                    </div>
					<div class="col-lg-12 col-md-12">
						<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
							<div class="modal-dialog">
								<div class="loginmodal-container">
									<h1>Reset Account</h1><br>
									<form action="" method="POST">
										<div class="form-group">
											<input type="text" name="userre" placeholder="Username">
											<input type="password" name="passre" placeholder="Password">
											<input type="submit" name="login" class="login loginmodal-submit" value="Login">
										</div>
									</form>
									<!-- <div class="login-help">
										<a href="#">Forgot Password</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>
<?php

}

?>
