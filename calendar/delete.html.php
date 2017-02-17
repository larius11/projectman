<html>
    <head>
        <title>DNA</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/general.js"></script>
    </head>
    <body>

        <div id="header"> 
            <div class="logo"><a href="index.html" class="button">DNA <span>Inc.</span></a></div>
        </div>

        <a class="mobile" href="#">
            <img src="icons/menu.svg" style="height: 15px;"/>
        </a>

        <div id="container">
            <div class="sidebar">
                <ul id="nav">
                    <li><a href="index.html"> Dashboard</a></li>
                    <li><a href="php/login.php"> Admin Hub</a></li>
                    <li><a href="search.html"> Search</a></li>
                    <li><a class="selected" href="projects.php"> Projects</a></li>
                    <li><a href="about.html"> About </a></li>
                </ul>
            </div>
            <div class="content">
                <h1 style="text-decoration: underline;">Projects</h1>
                <p>Beginnings of our Dashboard</p>

                <?php echo $output; ?>
            </div>
        </div>

    </body>
</html>