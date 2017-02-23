<?php
    session_start();
    if(!isset($_SESSION['username'])){
       header("Location:php/login.php");
    }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service - FAQ's</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.html">Service Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Jessica Moffett</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>We need a cart count by 02/12/17</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Jessica Moffett</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Today at 12:06 PM</p>
                                        <p>CER's are finished but need some OJT's done.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Messages</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php
                        $active = "pam";
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
                            Pam's Notebook <small>FAQ's</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-book"></i>Pam's Notebook
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="alert alert-warning">
                            <strong>Note:</strong> All instructions assume you're logged in as Manager at the scan mode screen.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h1 class="panel-title">Important Phone Numbers</h1>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Store</td>
                                                <td>(512)-502-8445</td>
                                            </tr>
                                            <tr>
                                                <td>Help Desk</td>
                                                <td>(210)-938-8464</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Lock/Unlock Register</h1>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'Manager'</td>
                                                <td>Pops up manager menu</td>
                                            </tr>
                                            <tr>
                                                <td>'6'</td>
                                                <td>Manager Lock/Unlock</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Print Active Lane Report</h1>
                            </div>
                            <div class="panel-body">
                                <h4></h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'Manager'</td>
                                                <td>Pops up manager menu</td>
                                            </tr>
                                            <tr>
                                                <td>'3'</td>
                                                <td>Cash Control Functions</td>
                                            </tr>
                                            <tr>
                                                <td>'F5'</td>
                                                <td>Mode Switch</td>
                                            </tr>
                                            <tr>
                                                <td>'F5'</td>
                                                <td>Enters Manager Interface</td>
                                            </tr>
                                            <tr>
                                                <td>'3'</td>
                                                <td>Settlement Correction Menu</td>
                                            </tr>
                                            <tr>
                                                <td>'6'</td>
                                                <td>Prints Active Lane Report</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Partner Cashier #</h1>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'Manager'</td>
                                                <td>Pops up manager menu</td>
                                            </tr>
                                            <tr>
                                                <td>'3'</td>
                                                <td>Cash Control Functions</td>
                                            </tr>
                                            <tr>
                                                <td>'3'</td>
                                                <td>Checker Reports Menu</td>
                                            </tr>
                                            <tr>
                                                <td>'1'</td>
                                                <td>Till Reports Menu</td>
                                            </tr>
                                            <tr>
                                                <td>'6'</td>
                                                <td>Checker Status - All</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
