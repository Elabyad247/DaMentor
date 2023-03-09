<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $upassword = $_POST["password"];
    $rupassword = $_POST["passwordrepeat"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($username, $email, $upassword, $rupassword) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (notMatchedPassword($upassword, $rupassword) !== false) {
        header("location: ../signup.php?error=notMatchedPassword");
        exit();
    }

    if (userExist($GLOBALS["conn"], $username, true) !== false) {
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }

    createUser($GLOBALS["conn"], $username, $email, $firstname, $lastname, $upassword);

} else {
    header("location: ../signup.php");
    exit();
}

