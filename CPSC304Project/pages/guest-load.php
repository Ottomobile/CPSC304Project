<?php
    session_start();

    $connection = mysql_connect("localhost", "root", "") or die("<p>Couldn't connect to the database!</p>");
    mysql_select_db("amusement_park", $connection) or die("<p>Couldn't connect to the database!</p>");

    // Get current account balance
    $name = $_SESSION['loggedInUser'][1];

    // Prepare update statement
    $query = sprintf("SELECT accountBalance FROM guest WHERE name ='%s';", $name);

    // Perform query
    $result = mysql_query($query);

    // Check result
    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    $row = mysql_fetch_assoc($result);
    $accountBalance = $row['accountBalance'];
?>      

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../styles/custom.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <title>Edit Guest Details</title>
</head>
<body style="background-image:url('../images/AmusementPark-1.jpg'); height:100%">
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
                        <a href="guest-account.php">Guest</a>
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
            <h1 id="header-1">Load Account Balance</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form role="form" action="guest-load-done.php" id="form-background" method="post">
                <div class="form-group">
                    <?php 
                        echo "<p id='p-label'>Current Balance: $" . $accountBalance . "</p>"
                    ?>
                    <label for="loadAmount">Load Amount ($):</label>
                    <input name="loadAmount" type="number" min="1" class="form-control" id="loadAmount" placeholder="Load Amount ($)" />
                </div>
                <button type="submit" class="btn btn-primary">Load</button>
            </form>
        </div>
    </div>

    <script src="../scripts/jquery-2.1.4.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>
