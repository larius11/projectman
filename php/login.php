<?php	
	if (isSet($_POST['user'])){

		include 'db_service.php';
		session_start();

		$username = mysqli_real_escape_string($db_conx, $_POST['user']);
        $password = mysqli_real_escape_string($db_conx, $_POST['pass']);

        $stmt = $db_conx->prepare("SELECT * FROM users WHERE user=? AND pass=?");
        $stmt->bind_param("ss", $one, $two);

        $one = $username;
        $two = $password;
        $stmt->execute();
        $result = $stmt->get_result();
        $rowNum = $result->num_rows;
        if($rowNum > 0){
			if ($row = $result->fetch_assoc()){
				if ($username == "riveronr"){
					$username = " Ricardo Riveron";
				}
				if ($username == "m6484830"){
					$username = " Antonio Martinez";
				}

	            $_SESSION['username'] = $username;
	            $_SESSION['password'] = $password;
	            mysqli_close();
				header("Refresh:0");
	            header('Location: ../index.php');
	            exit;
	        }
	    }else{
            echo "<p>Data does not match <br /> RE-Enter Username and Password</p>";
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

    <title>Service Admin Website - Login</title>

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
									<h1>Login - Front End</h1><br>
									<form action="" method="POST">
										<input type="text" name="user" placeholder="Username">
										<input type="password" name="pass" placeholder="Password">
										<input type="submit" name="login" class="login loginmodal-submit" value="Login">
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