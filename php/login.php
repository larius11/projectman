<?php	
	if ($_SERVER['HTTP_HOST'] == "ricardoriveron.com"){
	   header("Location: http://www.ricardoriveron.com/projectman/php/login.php");
	} 
	if (isSet($_POST['user'])){

		include 'db_service.php';
		session_start();
		if(empty($_SESSION['location'])){
			$_SESSION['location'] = 'Location: http://www.ricardoriveron.com/projectman/index.php';
		}

		$username = strtolower($_POST['user']);
        $password = $_POST['pass'];

        $stmt = $db_conx->prepare("SELECT * FROM users WHERE user=?");
        $stmt->bind_param("s", $one);

        $one = $username;
        $stmt->execute();
        $result = $stmt->get_result();
        $rowNum = $result->num_rows;
        if($rowNum > 0){
			if ($row = $result->fetch_assoc()){
				if (password_verify($password, $row['pass'])){

					$_SESSION['user'] = $username;
					$_SESSION['clearance'] = 0;

					if ($username == "riveronr"){
						$username = " Ricardo Riveron";
						$_SESSION['clearance'] = 1;
					}
					if ($username == "m648483"){
						$username = " Antonio Martinez";
						$_SESSION['clearance'] = 1;
					}
					if ($username == "m197308"){
						$username = " Jessica Moffett";
						$_SESSION['clearance'] = 3;
					}
					if ($username == "s730637"){
						$username = " Mark Stern";
					}
					if ($username == "h101186"){
						$username = " Jackie Hamill";
					}
					if ($username == "r252501"){
						$username = " Pam Ratliff";
						$_SESSION['clearance'] = 1;
					}
					if ($username == "p618325"){
						$username = " D-Ray";
						$_SESSION['clearance'] = 2;
					}
					if ($username == "m111000"){
						$username = " Jackie Milligan";
						$_SESSION['clearance'] = 2;
					}
					if ($username == "g718377"){
						$username = " Will Griffin";
						$_SESSION['clearance'] = 1;
					}
					if ($username == "l368470"){
						$username = " Stephy Luna";
					}
					if ($username == "a671948"){
						$username = " Marwan Abbood";
					}

		            $_SESSION['username'] = $username;
		            $_SESSION['password'] = $password;
		            mysqli_close();
					header("Refresh:0");
		            header($_SESSION['location']);
		        }else{
		        	$_SESSION["pass_error"] = 1;
		        	header('Location: http://www.ricardoriveron.com/projectman/php/login.php');
		        }
	        }
	    }else{
	    	$_SESSION["user_error"] = 1;
            header('Location: http://www.ricardoriveron.com/projectman/php/login.php');
        }
	}else{	
		session_start();
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
									<?php 
										if ($_SESSION["pass_error"]){
											echo "
												<h3 style=\"color:red; text-align: center;\">Incorrect Password</h3>
											";
											$_SESSION["pass_error"] = 0;
										}
									?>
									<?php 
										if ($_SESSION["user_error"]){
											echo "
												<h3 style=\"color:red; text-align: center;\">Incorrect Username</h3>
											";
											$_SESSION["user_error"] = 0;
										}
									?>
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
