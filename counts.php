<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: ../counts.php';
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

    <title>Service - Counts On Me</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/heb.ico">

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

    <!-- Bootstrap CSS for timeline -->
    <link href="css/timeline.css" rel="stylesheet">

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
                            Dashboard <small>Counts On Me</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Current Status</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-xs-12">
                                    <?php include 'charts/counts_chart.php'; ?>
                                    <div id="counts-chart2" style="height: 300px;"></div>
                                    <script type="application/javascript">
                                        Morris.Donut({
                                          element: 'counts-chart2',
                                          data: <?php echo json_encode($json_data)?>,
                                          backgroundColor: '#ccc',
                                          labelColor: '#000',
                                          resize: true,
                                          colors: ['#34495e','#3498db']
                                          }).select(0);
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
	                    <form action="counts/update.php" method="POST">
	                    	<div class="panel panel-default">
	                            <div class="panel-heading">
	                                <h3 class="panel-title">Remaining Partners</h3>
	                            </div>
	                            <div class="panel-body" style="overflow: auto;">
	                            	<div class="form-group">
	                            		<ul class="timeline" style="height: 50%; padding-top: 0px;">
		                                	<?php
	                                			include 'php/db_service.php';
	                                			include 'counts/list.php';
	                                		?>
			                            </ul>
	                            	</div>
	                            </div>
	                        </div>
							<button type="submit" class="btn btn-heb btn-lg" value="Submit">Update</button>
                        </form>
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

</body>

</html>
