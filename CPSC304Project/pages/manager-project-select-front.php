<?php
    session_start();
    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Project Select Query</title>
</head>
<body style="background-image:url('../images/AmusementPark-3.jpg'); background-size:100%; background-repeat:repeat-y">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Team Supreme</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="manager-account.php">Manager</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 id="header-1">Project Select Query</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="manager-project-select-back.php" id="form-background" method="post">
                <p id="p-label">Find the names of guests born after the given year.</p>
                <div class="form-group">
                    <label for="year">Please input the year:</label>
                    <input name="year" type="number" min="0" class="form-control" id="year" placeholder="Year" required />
                </div>
                <br />
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-default" href="manager-account.php">Cancel</a>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>