<?php
    session_start();
    if(!isset($_SESSION['username'])){
       header("Location:../php/login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service - Assign Task</title>
    <!-- <link rel="stylesheet" href="../components/bootstrap2/css/bootstrap-responsive.css"> -->
    <link rel="stylesheet" href="../css/calendar.css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Script to add/remove list items for Other task -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    if (!(window.myi)) {
        window.myi = 1;
    }
    $(document).ready(function(){

        var current = " ";

        $("#btn1").click(function(){

            current = "<div class=\"form-group input-group\"id=\"other_task_"+window.myi+"\"><span class=\"input-group-addon\">"+window.myi+":</span><input type=\"text\" class=\"form-control\" name=\"other_task_list[]\"></div>";
            $("#mylist").append(current);
            window.myi++;
        });
        $("#btn2").click(function(){
            window.myi--;
            $("#other_task_"+window.myi).remove();
        });
    });
    </script>
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
                <a class="navbar-brand" href="../index.html">Service Admin</a>
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
                        include '../php/nav.php';
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
                            Tasks <small>Assign Task</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="../tasks.php"> Tasks</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-pencil-square-o"></i>Assign Task Form
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form action="add_process.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Task:</label>
                                            <select type="text" class="form-control" id="duty" name="duty" onchange="return formOptions()">
                                                <option>Recognize Partners</option>
                                                <!-- <option>Huddles</option> -->
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Assign To:</label>
                                            <select type="text" class="form-control" id="assign" name="assign">
                                                <option>Ricardo Riveron</option>
                                                <option>Antonio Martinez</option>
                                                <option>Jessica Moffett</option>
                                                <option>Mark Stern</option>
                                                <option>Jackie Hamill</option>
                                                <option>Pam Ratliff</option>
                                                <option>D-Ray</option>
                                                <option>Jackie Milligan</option>
                                                <option>Will Griffin</option>
                                                <option>Stephanie Luna</option>
                                                <option>Marwan Abbood</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div id="partners" style="padding-top: 5px; display: none;">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Recognize For:</label>
                                                    </div>
                                                    <div class="panel-body">
                                                        <textarea type="text" class="form-control" rows="2" id="recfor" name="recfor" style="resize: none;" placeholder="'BPTS' or 'IPM's' or '9 on survey' etc..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Select Partners</label>
                                                    </div>
                                                    <div class="panel-body" style="overflow: auto; padding-left: 0px;">
                                                        <div class="form-group">
                                                            <ul class="timeline" style="height: 35%; padding-top: 0px;">
                                                                <?php
                                                                    include '../php/db_service.php';
                                                                    include '../php/partners_option.php';
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="huddles" style="padding-top: 5px; display: none;">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Huddle Notes</label>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group input-group">
                                                            <input type="file" accept="application/pdf" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Select Partners</label>
                                                    </div>
                                                    <div class="panel-body" style="overflow: auto; padding-left: 0px;">
                                                        <div class="form-group">
                                                            <ul class="timeline" style="height: 35%; padding-top: 0px;">
                                                                <?php
                                                                    include '../php/db_service.php';
                                                                    include '../php/partners_option.php';
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="otherinfo" style="padding-top: 5px; display: none;">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Task Name:</label>
                                                    </div>
                                                    <div class="panel-body">
                                                        <input type="text" class="form-control" id="other_name" name="other_name">
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <label class="panel-title">Tasklist:</label>
                                                        <div style="float: right;bottom: 6px;position: relative;">
                                                            <button type="button" id="btn1" class="btn btn-primary btn-sm" onclick="">Add</button>
                                                            <button type="button" id="btn2" class="btn btn-heb btn-sm" onclick="">Remove</button>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group" id="other_basket">
                                                            <!-- <label>1: </label>
                                                            <input type="text" class="form-control" id="other_task_one" name="other_task_one" style="width: 90%; float: right;"> -->
                                                            <div id="mylist">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <button type="submit" class="btn btn-heb btn-lg" style="width: 100%;" value="Submit">Assign</button>
                                    </div>
                                </div>
                                </form>
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Options JS -->
    <script src="../js/task_options.js"></script>

</body>

</html>
