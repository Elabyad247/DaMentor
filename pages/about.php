<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="DaMentor For MUFCI Students" />
    <title>DaMentor - About</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>

    .card {
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        max-width: 400px;
        text-align: center;
        font-family: var(--font_family);
        background-color: var(--brand_third);
        border-radius: 10px;
    }

    .card .title {
        color: white;
        font-size: 20px;
    }

    .card a {
        text-decoration: none;
        font-size: 25px;
        color: black;
    }

    .card a:hover {
        color: #fff;
    }

    </style>
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../index.php">Home</a>
            <a href="../pages/notifications.php">Notifications</a>
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
    <h2 style="text-align: center; color: #fff">Contact one of us</h2>

    <div class="courses">
        <div class="card">
            <img src="../assets/me.jpg" alt="Saif" style="width: 100%" />
            <h1>Saifaldin Elabyad</h1>
            <p class="title"></p>
            <p>Anything</p>
            <div style="margin: 24px 0">
                <a href="#"><i class="fa fa-question-circle"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
            </div>
            <br>
        </div>

        <div class="card">
            <img src="../assets/me.jpg" alt="Blax" style="width: 100%" />
            <h1>Bla Bla</h1>
            <p class="title"></p>
            <p>Math</p>
            <div style="margin: 24px 0">
                <a href="#"><i class="fa fa-question-circle"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
            </div>
            <br>
        </div>

        <div class="card">
            <img src="../assets/me.jpg" alt="Test" style="width: 100%" />
            <h1>Test Test</h1>
            <p class="title"></p>
            <p>Problem Solving</p>
            <div style="margin: 24px 0">
                <a href="#"><i class="fa fa-question-circle"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
            </div>
            <br>
        </div>

        <div class="card">
            <img src="../assets/me.jpg" alt="Test2" style="width: 100%" />
            <h1>Test2 Test2</h1>
            <p class="title"></p>
            <p>Programming Basics</p>
            <div style="margin: 24px 0">
                <a href="#"><i class="fa fa-question-circle"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
            </div>
            <br>
        </div>
    </div>

</body>
<script src="../scripts/script.js"></script>

</html>