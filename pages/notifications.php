<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="DaMentor For MUFCI Students" />
    <title>DaMentor - Notifications</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../index.php">Home</a>
            <a href="../pages/notifications.php" class="active">Notifications</a>
            <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
            <a href="../pages/useful.php">Useful Stuff</a>
            <a href="../pages/what.php">WHAT?</a>
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
    <h2 style="text-align: center; color: #fff">Notifications</h2>

    <div class="notifications-container">
        <?php
        $notiid = -1;
        $notifications_query = mysqli_query($GLOBALS["conn"],"select * from notifications order by notification_date DESC") or die(mysqli_error($GLOBALS["conn"]));
        while ($row = mysqli_fetch_array($notifications_query)) {
            $notiid = $row['notification_id'];
            ?>

            <div class="notification" id="<?php echo $notiid; ?>">
                <?php echo $row['notification']; ?>
                <hr>
                <div class="pull-right">
                    <i class="fa fa-calendar">  <?php echo $row['notification_date']; ?></i>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

</body>
<script src="../scripts/script.js"></script>

</html>