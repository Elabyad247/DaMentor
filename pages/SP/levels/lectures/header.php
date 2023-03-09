<?php
include_once '../../../../pages/includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="DaMentor For MUFCI Students" />
    <title>DaMentor - Statistics & Probabilities</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../../../../index.php">Home</a>
            <a href="../../../notifications.php">Notifications</a>
            <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
            <a href="../../../useful.php">Good Stuff</a>
            <a href="../../../what.php">WHAT?</a>

            <?php
            /*
            if (isset($_SESSION["userid"])) {
                echo '<a id="logoutnav" href="../pages/includes/logout.inc.php" style="float: right;">Logout</a>';
                echo '<a id="profilenav" href="../pages/profile.php" style="float: right;">Profile</a>';
            } else {
                echo '<a id="loginnav" href="../pages/login.php" style="float: right;">Login</a>';
                echo '<a id="signnav" href="../pages/signup.php" class="active" style="float: right;">Sign Up</a>';
            }
            */
            ?>
            <a href="javascript:void(0);" class="icon" onclick="navFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <input type="button" class="btn" value="Back" onclick="window.location = '../<?php echo $_SESSION['levelCode']; ?>.php';">
