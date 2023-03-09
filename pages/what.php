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
    <title>DaMentor - WHAT?</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/listree/dist/listree.min.css"/>
</head>

<body>
<header>
    <div class="topnav" id="myTopnav">
        <a href="../index.php">Home</a>
        <a href="../pages/notifications.php">Notifications</a>
        <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
        <a href="../pages/useful.php">Useful Stuff</a>
        <a href="../pages/what.php" class="active">WHAT?</a>
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


<div class="matetrial-container">
    <h1 style="text-align: center; color: #fff">Schedule</h1>
    <img src="../assets/schedule.jpg" alt="schedule" class="scheduleimage">

    <hr>

    <h1 style="text-align: center; color: #fff">Frequently Asked Questions</h1>
    <?php
    $studyquery = mysqli_query($GLOBALS['conn'],"select * from whats where whatType = 'faq'")or die(mysqli_error($GLOBALS['conn']));
    while ($study = mysqli_fetch_array($studyquery)) {
        ?>

        <h4 style="text-align: center; color: #fff; direction: rtl"><?php echo $study['whatTitle']; ?></h4>
        <p><?php echo $study['notes']; ?></p>

    <?php } ?>

    <hr>

    <h1 style="text-align: center; color: #fff">What we have took so far</h1>
    <p>Check everthing</p>

    <ul class="listree">
        <?php
        $indexquery = mysqli_query($GLOBALS['conn'],"select DISTINCT subject from index_list order by subject ASC")or die(mysqli_error($GLOBALS['conn']));
        while ($index = mysqli_fetch_array($indexquery)) {
            ?>

            <li><div class="listree-submenu-heading"><?php echo $index['subject']; ?></div>
                <ul class="listree-submenu-items">
                    <?php
                    $sub = $index['subject'];
                    $subquery = mysqli_query($GLOBALS['conn'],"select DISTINCT level from index_list where subject = '$sub'")or die(mysqli_error($GLOBALS['conn']));
                    while ($subject = mysqli_fetch_array($subquery)) {
                    ?>
                        <li><div class="listree-submenu-heading"><?php echo $subject['level']; ?></div>
                            <ul class="listree-submenu-items">
                                <?php
                                $lvl = $subject['level'];
                                $lvlquery = mysqli_query($GLOBALS['conn'],"select DISTINCT lecture from index_list where subject = '$sub' and level = '$lvl'")or die(mysqli_error($GLOBALS['conn']));
                                while ($level = mysqli_fetch_array($lvlquery)) {
                                ?>

                                    <li><div class="listree-submenu-heading"><?php echo $level['lecture']; ?></div>
                                        <ul class="listree-submenu-items">
                                            <?php
                                            $lect = $level['lecture'];
                                            $detquery = mysqli_query($GLOBALS['conn'],"select * from index_list where subject = '$sub' and level = '$lvl' and lecture = '$lect'")or die(mysqli_error($GLOBALS['conn']));
                                            while ($details = mysqli_fetch_array($detquery)) {
                                                if ($details['details']) {
                                                ?>

                                                <li><?php echo $details['details']; ?></li>

                                            <?php } } ?>
                                        </ul>
                                    </li>

                                <?php } ?>
                            </ul>
                        </li>

                    <?php } ?>
                </ul>
            </li>
            <br>

        <?php } ?>

    </ul>

</div>

</body>
<script src="https://unpkg.com/listree/dist/listree.umd.min.js"></script>
<script>
    listree();
</script>
<script src="../scripts/script.js"></script>

</html>