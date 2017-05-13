<?php
    session_start();

    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: http://www.ricardoriveron.com/projectman/huddle.php';
        header("Location:php/login.php");
    }
    if (isset($_POST["submit"])){

        $target_dir = "huddles/";
        $target_file = $target_dir . basename($_FILES["newhud"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $target_file = $target_dir . "huddle.pdf";

        // Allow certain file formats
        if($imageFileType != "pdf" ) {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "We are tryting this...<br>";
                $mademe = unlink('huddles/huddle.pdf');
                echo "This is it: ". $mademe ."...";
            }
            echo "<br>About to upload...<br>";
            if (move_uploaded_file($_FILES["newhud"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["newhud"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }else{
?>
<html lang="en">
<head>

    <meta charset=utf-8 />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service - Huddles</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="icon" href="img/heb.ico">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Service Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://www.ricardoriveron.com/projectman/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="http://www.ricardoriveron.com/projectman/php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php
                        $active = "huddle";
                        include 'php/nav.php';
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Huddle <small>Notes</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-users"></i> Huddles
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <embed src="http://www.ricardoriveron.com/projectman/huddles/huddle.pdf" width="100%" height="100%" type='application/pdf' />
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    if ($_SESSION['clearance'] >= 1){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <br>
                        <input type="file" name="newhud" id="newhud" class="btn btn-heb">
                        <br>
                        <button type="submit" class="btn btn-info" value="Submit" name="submit">Upload</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                    }
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
<?php
    }
?>