<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['location'] = 'Location: ../snap.php';
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

    <title>Service - Snapshot Chart</title>

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

    <!-- add styles -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    <!-- add scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var day = new Date();
        var n = (day.getDay() - 1);
        if (n==-1){
            n = 6;
        }
        $(function(){
            $('#datepicker').datepicker({ 
                firstDay: 1,
                minDate: -n - 7,
                showAnim: "blind",
                dateFormat: "yy-mm-dd",
                beforeShowDay: function(day){ return [day.getDay() == 1,""]}
            });
        });
    </script>


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
                            Dashboard <small>Snapshot Chart</small>
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
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-plus-circle"></i> Add Data
                                </h3>
                            </div>
                            <form action="charts/php/add_snap.php" method="POST">
                                <div class="panel-body">
                                    <!-- IPM's w & w/o error -->
                                    <?php
                                        session_start();
                                        if ($_SESSION['ipm_error']==1){
                                    ?>
                                    <div class="form-group input-group has-error">
                                        <span class="input-group-addon"><strong>IPM's:</strong></span>
                                        <input type="number" step="0.01" class="form-control" name="snap_ipm" placeholder="##.##" />
                                    </div>
                                    <?php
                                        $_SESSION['ipm_error']=0;
                                        }else{
                                    ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>IPM's:</strong></span>
                                        <input type="number" step="0.01" class="form-control" name="snap_ipm" placeholder="##.##" />
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <!-- BPTS w & w/o error -->
                                    <?php
                                        if ($_SESSION['bpts_error']==1){
                                    ?>
                                    <div class="form-group input-group has-error">
                                        <span class="input-group-addon"><strong>BPTS:</strong></span>
                                        <input type="number" step="0.01" class="form-control" name="snap_bpts" placeholder="##.##">
                                    </div>
                                    <?php
                                        $_SESSION['bpts_error']=0;
                                        }else{
                                    ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>BPTS:</strong></span>
                                        <input type="number" step="0.01" class="form-control" name="snap_bpts" placeholder="##.##">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <!-- New Partners w & w/o error -->
                                    <?php
                                        if ($_SESSION['news_error']==1){
                                    ?>
                                    <div class="form-group input-group has-error">
                                        <span class="input-group-addon"><strong>New Partners:</strong></span>
                                        <input type="number" class="form-control" name="snap_new" placeholder="##">
                                    </div>
                                    <?php
                                        $_SESSION['news_error']=0;
                                        }else{
                                    ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>New Partners:</strong></span>
                                        <input type="number" class="form-control" name="snap_new" placeholder="##">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Week:</strong></span>
                                        <input id="datepicker" class="form-control" type="text" name="snap_date">
                                    </div>
                                    <button type="submit" class="btn btn-heb" style="width: 100%;" value="Submit"><strong>Add</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Current Snapshot</h3>
                            </div>
                            <div class="panel-body">
                                <?php include 'charts/snap_chart.php'; ?>
                                <div id="snap-chart2" style="background-color: gainsboro;"></div>
                                <script type="application/javascript">
                                    Morris.Line({
                                      element: 'snap-chart2',
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
