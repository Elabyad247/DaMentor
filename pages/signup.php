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
    <title>DaMentor - Signup</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?ts=<?= time() ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
    <div class="sub-form">
        <h2 style="text-align: center; color: #fff;">Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <label>
                <b>Username:</b>
                <input type="text" name="username" placeholder="Username..." class="editbox" required>
            </label>
            <label>
                <b>Email:</b>
                <input type="email" name="email" placeholder="Email..." class="editbox" required>
            </label>
            <label>
                <b>First name (Optional):</b>
                <input type="text" name="firstname" placeholder="First name..." class="editbox">
            </label>
            <label>
                <b>Last name (Optional):</b>
                <input type="text" name="lastname" placeholder="Last name..." class="editbox">
            </label>
            <label>
                <b>Password:</b>
                <input type="password" name="password" placeholder="Password..." class="editbox" required>
            </label>
            <label>
                <b>Repeat password:</b>
                <input type="password" name="passwordrepeat" placeholder="Repeat password..." class="editbox" required>
            </label>

            <input type="submit" name="submit" id="signbtn" class="submitbtn" value="Sign Up">
        </form>

        <?php

        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "<p>Fill in all the fields!</p>";
            } else if ($_GET["error"] == "invalidUsername") {
                echo "<p>Write a proper username!</p>";
            } else if ($_GET["error"] == "invalidEmail") {
                echo "<p>Write a proper email!</p>";
            } else if ($_GET["error"] == "notMatchedPassword") {
                echo "<p>Repeat password doesn't match passowrd!</p>";
            } else if ($_GET["error"] == "usernameTaken") {
                echo "<p>Username already taken!</p>";
            } else if ($_GET["error"] == "stmtFailed") {
                echo "<p>Something went wrong, try again!</p>";
            } else {
                echo "<p>Something went wrong, contact admin!</p>";
            }
        } else if (isset($_GET["state"])) {
            if ($_GET["state"] == "userCreated") {
                echo "<p style=\"color=green;\">User created successfully</p>";
            }
        }

        ?>

    </div>
</body>
<script src="../scripts/script.js"></script>

</html>