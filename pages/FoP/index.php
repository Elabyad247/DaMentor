<?php
include_once '../../pages/includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="DaMentor For MUFCI Students" />
    <title>DaMentor - Fundamentals of Programming</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
<header>
    <div class="topnav" id="myTopnav">
        <a href="../../index.php">Home</a>
        <a href="../notifications.php">Notifications</a>
        <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
        <a href="../useful.php">Good Stuff</a>
        <a href="../what.php">WHAT?</a>


        <?php
        /*
        if (isset($_SESSION["userid"])) {
            echo '<a id="logoutnav" href="../includes/logout.inc.php" style="float: right;">Logout</a>';
            echo '<a id="profilenav" href="../profile.php" style="float: right;">Profile</a>';
        } else {
            echo '<a id="loginnav" href="../login.php" style="float: right;">Login</a>';
            echo '<a id="signnav" href="../signup.php" style="float: right;">Sign Up</a>';
        }
        */
        ?>
        <a href="javascript:void(0);" class="icon" onclick="navFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>

<h2 style="color: white; text-align: center">Fundamentals of Programming</h2>
<div class="courses">

    <?php
        $levelid = -1;
        $levels_query = mysqli_query($GLOBALS["conn"],"select * from levels where subCode = 'FoP'") or die(mysqli_error($GLOBALS["conn"]));
        $tempid = 1;
        while ($row = mysqli_fetch_array($levels_query)) {
            $levelid = $tempid;
    ?>

        <div class="card" id="<?php echo $row['levelCode']; ?>" onclick="changepadge('../levels/<?php echo $row['levelCode']; ?>.php')">
            <img src="../../assets/<?php echo $row['subCode'] ?>.jpg" alt="Avatar" style="width: 100%" />
            <div class="container">
                <h4><b>Level <?php echo $levelid; ?>: <?php echo $row['levelTitle']; ?></b></h4>
                <p><?php echo $row['levelDescription']; ?></p>
            </div>
        </div>

    <?php $tempid++; } ?>
</div>
</body>
<script src="../../scripts/script.js"></script>

</html>