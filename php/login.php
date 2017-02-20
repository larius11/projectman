<?php 	
	session_start();

	if (isSet($_POST['login']){
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

		// Get values passed from the login-form in login.php file
		$username = $_POST['user'];
		$password = $_POST['pass'];

		// Query the database for user
		$result = mysql_query("select * from users where user = '$username' and pass = '$password'") or die("Failed to query database ".mysql_error());
		$row = mysql_fetch_array($result);

		if (($row['user'] == $username) && ($row['pass'] == $password) ){
			header("Location: ../index.php");
			exit;
		} else {
			echo 'Login Failed; <br> Try Again.';
		}
	} else {
echo "<html lang=\"en\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Service Admin Website</title>

    <link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../css/login.css\" rel=\"stylesheet\">

    <link href=\"../css/sb-admin.css\" rel=\"stylesheet\">

    <link href=\"../font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">

</head>
<body>
	<div id=\"wrapper\">
		<div id=\"page-wrapper\">
            <div class=\"container-fluid\">
                <div class=\"row\">
                	<div class=\"col-lg-3 col-md-3\">
                	</div>
                	<div class=\"col-lg-6 col-md-6\">
                		<a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\">Login</a>

						<div class=\"modal fade\" id=\"login-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"display: none;\">
						    	  <div class=\"modal-dialog\">
										<div class=\"loginmodal-container\">
											<h1>Login to Your Account</h1><br>
										  <form>
											<input type=\"text\" name=\"user\" placeholder=\"Username\">
											<input type=\"password\" name=\"pass\" placeholder=\"Password\">
											<input type=\"submit\" name=\"login\" class=\"login loginmodal-submit\" value=\"Login\">
										  </form>
											
										  <div class=\"login-help\">
											<a href=\"#\">Register</a> - <a href=\"#\">Forgot Password</a>
										  </div>
										</div>
									</div>
								  </div>
                	</div>
                	<div class=\"col-lg-3 col-md-3\">
                	</div>
                </div>
            </div>
        </div>
	</div>
</body>
</html>";
}
?>