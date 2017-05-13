<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: ../roster.php';
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

    <title>Service - Roster</title>

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
                        $active = "roster";
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
                            Roster
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-list-alt"></i> Roster
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Current Partners</h1>
                            </div>
                            <div class="panel-body" style="overflow: auto; height: 75%;">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include 'php/db_service.php';
                                                include 'php/partners_table.php';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if ($_SESSION['clearance']>=1){
                    ?>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h1 class="panel-title"><i class="fa fa-fw fa-sliders" aria-hidden="true"></i> Add/Remove</h1>
                            </div>
                            <div class="panel-body">
                                <div class="btn-group">
                                    <button class="btn btn-info" id="addBtn" value="add" onclick="addFunc()" style="background-color: #5bc080; border-color: #46b880;">Add</button>
                                    <button class="btn btn-info" id="remBtn" value="remove" onclick="remFunc()">Remove</button>
                                </div>

                                <div id="adding" style="display: none;">
                                    <div class="form-group">
                                        <form action="php/partner_add.php" method="POST">
                                            <br>
                                            <div class="alert alert-warning">
                                                <strong>Format: </strong> First name followed by Last Initial. <br>(e.g. John D for John Doe)
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><label>Name:</label></span>
                                                <input type="text" class="form-control" id="newpar" name="newpartner">
                                            </div>
                                            <button type="submit" class="btn btn-info" value="Submit" style="background-color: #5bc080; border-color: #46b880;">Submit</button>
                                        </form>
                                    </div>
                                </div>

                                <div id="removing" style="display: none;">
                                    <br>
                                    <form action="php/partner_remove.php" method="POST">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <label class="panel-title">Select Partners</label>
                                            </div>
                                            <div class="panel-body" style="overflow: auto; padding-left: 0px;">
                                                <div class="form-group">
                                                    <ul class="timeline" style="height: 35%; padding-top: 0px;">
                                                        <?php
                                                            include 'php/db_service.php';
                                                            include 'php/partners_option.php';
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="Submit">Remove</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
                <!-- /row -->

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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Options JS -->
    <script src="js/roster_options.js"></script>

</body>

</html>
