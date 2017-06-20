<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: http://www.ricardoriveron.com/projectman/index.php';
        header("Location:php/login.php");
    }
?>
<html lang="en">
<head>

    <meta charset=utf-8 />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service Admin Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/heb.ico">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts JavaScript -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>

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
                        $active = "dash";
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
                            Dashboard <small>Front End Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            include 'tasks/new_tasks.php'; 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php
                                        include 'php/tasklist_process.php';
                                    ?>
                                </div>
                            </div>
                            <a href="tasks.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sort-amount-desc fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h2> 
                                            Team Progress
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php
                                        include 'tasks/all_display.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Snapshot Chart</h3>
                            </div>
                            <div class="panel-body">
                                <?php include 'charts/snap_chart.php'; ?>
                                <div id="snap-chart" style="background-color: gainsboro;"></div>
                                <script type="application/javascript">
                                    Morris.Line({
                                      element: 'snap-chart',
                                      data: <?php echo json_encode($json_data_snap)?>,
                                      xkey: 'snapweek',
                                      ykeys: ['ipm','bpts', 'news'],
                                      labels: ['IPM\'s','BPTS', 'New Partners'],
                                      lineColors: ['#F50505','#2D05F5','#08BD0E'],
                                      goals: [31, 95.0],
                                      goalStrokeWidth: 5,
                                      goalLineColors: ['#EDED07'],
                                      pointSize: 2,
                                      hideHover: 'auto',
                                      parseTime: true,
                                      resize: true
                                      });
                                </script>
                                <?php 
                                    if ($_SESSION['clearance']>=2){
                                ?>
                                <div class="text-right">
                                    <br>
                                    <a href="snap.php">Add Data <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Counts On Me </h3>
                            </div>
                            <div class="panel-body">
                                <?php include 'charts/counts_chart.php'; ?>
                                <div id="counts-chart" style="height: 300px;"></div>
                                <script type="application/javascript">
                                    Morris.Donut({
                                      element: 'counts-chart',
                                      data: <?php echo json_encode($json_data)?>,
                                      backgroundColor: '#ccc',
                                      labelColor: '#000',
                                      resize: true,
                                      colors: ['#34495e','#3498db']
                                      }).select(0);
                                </script>
                                <div class="text-right">
                                    <a href="counts.php">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Task Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php
                                        include 'php/db_service.php';
                                        $amount = 6;
                                        include 'php/panel/panel.php';
                                    ?>
                                </div>
                                <div class="text-right">
                                    <a href="taskpanel.php">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

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
