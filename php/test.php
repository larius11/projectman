<?php	
	if (isSet($_POST['teststr'])){

		$options = [
		    'cost' => 9,
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$hash_pass = password_hash($_POST['teststr'], PASSWORD_BCRYPT, $options);
        echo $hash_pass."<br>";
        
	}else{	
?>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TEST - GET OUT!</title>

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
									<h1>Test</h1><br>
									<form action="" method="POST">
										<input type="text" name="teststr" placeholder="string">
										<input type="submit" name="login" class="login loginmodal-submit" value="Login">
									</form>
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
