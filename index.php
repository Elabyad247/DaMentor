<?php
include_once 'pages/includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="DaMentor For MUFCI Students" />
    <title>DaMentor - MUFCI</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="pages/notifications.php">Notifications</a>
            <a href="https://drive.google.com/drive/folders/1wHI48O_TRrDdV-e25FHEqthY13V6OTt6?usp=share_link" target="_blank">Materials (Drive)</a>
            <a href="pages/useful.php">Useful Stuff</a>
            <a href="pages/what.php">WHAT?</a>

            <?php
            /*
            if (isset($_SESSION["userid"])) {
                echo '<a id="logoutnav" href="pages/includes/logout.inc.php" style="float: right;">Logout</a>';
                echo '<a id="profilenav" href="pages/profile.php" style="float: right;">Profile</a>';
            } else {
                echo '<a id="loginnav" href="pages/login.php" style="float: right;">Login</a>';
                echo '<a id="signnav" href="pages/signup.php" style="float: right;">Sign Up</a>';
            }
            */
            ?>
            <a href="javascript:void(0);" class="icon" onclick="navFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <p style="text-align: center;color: white;direction: rtl">لمعرفة أخر التحديثات أفتح صفحة Notifictions ، للرجوع اضغط زر Home أو زر Back أعلى اليسار!</p>
    <div class="courses">

        <?php
            $subid = -1;
            $subjects_query = mysqli_query($GLOBALS["conn"],"select * from subjects") or die(mysqli_error($GLOBALS["conn"]));
            while ($row = mysqli_fetch_array($subjects_query)) {
                $subid = $row['subID'];
        ?>

            <div class="card" id="<?php echo $row['subCode']; ?>" onclick="changepadge('<?php echo $row['subCode']; ?>/')">
                <img src="assets/<?php echo $row['subCode'] ?>.jpg" alt="Avatar" style="width: 100%" />
                <div class="container">
                    <h4><b><?php echo $row['subTitle']; ?></b></h4>
                    <p><?php echo $row['subDescription']; ?></p>
                </div>
            </div>

        <?php
            }
        ?>
    </div>
</body>

<script src="scripts/native.history.js"></script>
<script src="scripts/script.js"></script>

</html>