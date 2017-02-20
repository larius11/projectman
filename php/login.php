<?php	
	session_start();

	if (isSet($_POST['login'])){
		echo "<p>I'm working...</p>";
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

		$username = mysql_real_escape_string($_POST['user']);
        $password = sha1($_POST['pass'] );

        $query = mysql_query("SELECT * FROM users WHERE user='$username' AND pass='$password'");
        $res = mysql_num_rows($query);

        if ($res == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userobj'] = mysql_fetch_assoc($query);

            header('Location: ../index.php');
            exit;
        } else {
            echo "<p>Data does not match <br /> RE-Enter Username and Password</p>";
            header('Location: login.php');
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

    <title>Service Admin Website</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

    <link href="../css/sb-admin.css" rel="stylesheet">

    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>
    <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1>Login to Your Account</h1><br>
				<form action="" method="POST">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				</form>
				<div class="login-help">
					<a href="#">Forgot Password</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php

}

?>