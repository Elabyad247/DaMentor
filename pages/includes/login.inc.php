<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $upassword = $_POST["password"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $upassword) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($GLOBALS["conn"], $username, $upassword);

} else {
    header("location: ../login.php");
    exit();
}
