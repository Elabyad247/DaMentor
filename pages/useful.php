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
    <title>DaMentor - Good Stuff</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v16.0" nonce="ighJrswP"></script>
<header>
    <div class="topnav" id="myTopnav">
        <a href="../index.php">Home</a>
        <a href="../pages/notifications.php">Notifications</a>
        <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
        <a href="../pages/useful.php" class="active">Useful Stuff</a>
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
<h2 style="text-align: center; color: #fff">Useful Stuff</h2>

<?php

$usefulquery = mysqli_query($GLOBALS['conn'],"select * from useful_stuff order by usefulID DESC")or die(mysqli_error($GLOBALS['conn']));

?>

<div class="matetrial-container">

    <?php while ($usefulrow = mysqli_fetch_array($usefulquery)) {
        ?>

    <h4 style="text-align: center; color: #fff"><?php echo $usefulrow['usefulTitle']; ?></h4>

        <?php
            if ($usefulrow['usefulType'] == 'Youtube') {
        ?>
                <p><?php echo $usefulrow['notes']; ?></p>
            <iframe class="video-player"
                src="<?php echo $usefulrow['link']; ?>" title="<?php echo $usefulrow['usefulTitle']; ?>" allow="accelerometer; encrypted-media; picture-in-picture" allowfullscreen>
            </iframe>

        <?php
            } elseif ($usefulrow['usefulType'] == 'Drive') {
        ?>
                <p><?php echo $usefulrow['notes']; ?></p>
                <iframe class="drive" src="<?php echo $usefulrow['link']; ?>" width="640" height="480" allow="autoplay"></iframe>

        <?php } elseif ($usefulrow['usefulType'] == 'Image') { ?>
                <p><?php echo $usefulrow['notes']; ?></p>
                <img src="<?php echo $usefulrow['link']; ?>" class="usefulimage" alt="<?php echo $usefulrow['usefulTitle']; ?>" height="<?php echo $usefulrow['height']; ?>">

        <?php } elseif ($usefulrow['usefulType'] == 'Facebook') { ?>
                <p><?php echo $usefulrow['notes']; ?></p>
                <div class="fb-post" data-href="<?php echo $usefulrow['link']; ?>" data-width="500" data-show-text="true"><blockquote cite="<?php echo $usefulrow['link']; ?>" class="fb-xfbml-parse-ignore"><p></blockquote></div>
        <?php }  elseif ($usefulrow['usefulType'] == 'Text') { ?>

                <p><?php echo $usefulrow['notes']; ?></p>

         <?php }   elseif ($usefulrow['usefulType'] == 'Twitter') { ?>

            <blockquote class="twitter-tweet"><p lang="ar" dir="<?php echo $usefulrow['link']; ?>"><?php echo $usefulrow['notes']; ?></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

            <?php } ?>

    <?php } ?>
</div>

</body>
<script src="../scripts/script.js"></script>

</html>