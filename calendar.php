<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: ../calendar.php';
        header("Location:php/login.php");
    }
?>
<html lang="en">
<head>
	<title>Service - Calendar</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta charset="UTF-8">

	<link rel="stylesheet" href="components/bootstrap2/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/calendar.css">
    <link rel="icon" href="img/heb.ico">
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding-left: 15px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="margin-right: 40px;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding-left: 0px;">Service Admin</a>
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
                        $active = "calendar";
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
                            Calendar
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-calendar"></i> Calendar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Calendar Page Heading -->
                <div class="page-header">
                	<div class="pull-right form-inline">
                        <?php 
                            if ($_SESSION['clearance']>=2){
                        ?>
                        <div class="btn-group" style="padding-bottom: 5px;">
                            <button class="btn btn-success"><a href="calendar/add.php" style="color: #fff;">Add</a></button>
                            <button class="btn btn-heb"><a href="calendar/delete.php" style="color: #fff;">Delete</a></button>
                        </div>
                        <?php } ?>
						<div class="btn-group" style="padding-bottom: 5px;">
							<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
							<button class="btn btn-primary" data-calendar-nav="today">Today</button>
							<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
						</div>
						<div class="btn-group" style="padding-bottom: 5px;">
							<button class="btn btn-primary" data-calendar-view="year">Year</button>
							<button class="btn btn-primary active" data-calendar-view="month">Month</button>
							<button class="btn btn-primary" data-calendar-view="week">Week</button>
							<button class="btn btn-primary" data-calendar-view="day">Day</button>
						</div>
					</div>
					<h3></h3>
					<small>All events in calendar and along the side/bottom of the page.</small>
				</div>

				<div class="row">
					<div class="span6">
						<div id="calendar"  style="padding-left: 35px; padding-right: 5px;"></div>
					</div>
					<div class="span3">
						<h4>Events</h4>
						<ul id="eventlist" class="nav nav-list" style="overflow: auto; height: 35%;"></ul>
					</div>
				</div>

				<div class="clearfix"></div>
				<br><br>

				<div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: rgba(192, 57, 43,0.7);">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body" style="height: 400px;background-color: rgba(127, 140, 141,1.0);">
                            </div>
                            <div class="modal-footer" style="background-color: rgba(236, 240, 241,1.0);">
                                <a href="#" data-dismiss="modal" class="btn">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<script type="text/javascript" src="components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="components/underscore/underscore-min.js"></script>

		<!-- Bootstrap Core JavaScript -->
    	<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/app.js"></script>

	</div>
</body>
</html>
