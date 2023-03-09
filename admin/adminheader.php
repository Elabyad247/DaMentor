<?php
include_once '../pages/includes/db.inc.php';
session_start();
?>

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="DaMentor For MUFCI Students"/>
    <title>DaMentor's Control Panel</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="home-container">
    <header class="home-navbar-interactive">
        <span class="home-text">DaMentor Admin Panel</span>
        <?php
        if (isset($_SESSION["adminid"])) {
            echo '<a id="logoutadmin" class="logoutadmin" href="../pages/includes/adminlogout.inc.php" style="float: right;">Logout</a>';
        }
        ?>
    </header>
</div>
