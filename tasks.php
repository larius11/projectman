<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: ../tasks.php';
        header("Location:php/login.php");
    }
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service - Tasks</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="img/heb.ico">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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
                        $active = "task";
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
                            Tasks <small>Front End Tasks</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Tasks
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                    if ($_SESSION['clearance']>=1){
                ?>
                <!-- Task Page Heading  -->
                <div class="page-header">
                        <button type="submit" class="btn btn-primary btn-lg"><a href="tasks/add.php" style="color: #fff;">Assign Task</a></button>
                        <button type="submit" class="btn btn-heb btn-lg"><a href="tasks/delete.php" style="color: #fff;">Remove Task</a></button>
                </div>
                <?php
                    }
                ?>

                <!-- Main Task Panel -->
                <div class="row" style="background-color: #eee;">
                    <div class="jumbotron">
                        <h2>Hello, <?php echo $_SESSION['username']; ?>!</h2>
                        <h3>Assigned tasks:</h3>
                        <div class="col-sm-12">
                            <div class="list-group">
                                <?php
                                    include 'php/tasklist_process.php';
                                ?>
                            </div>
                        </div>
                        <h3>Daily tasks:</h3>
                        <div class="col-sm-12">
                            <div class="list-group">
                                <?php
                                    include 'tasks/daily.php';
                                ?>
                            </div>
                        </div>
                    </div>                    
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h1 class="panel-title">Daily Progress</h1>
                            </div>
                            <div class="panel-body">
                                <?php include 'tasks/daily_process.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h1 class="panel-title">Progress On Assignments</h1>
                            </div>
                            <div class="panel-body">
                                <?php include 'php/task_process.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

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
    
    <!-- Task Updater -->
    <script src="js/task_progress.js"></script>


</body>

</html>
