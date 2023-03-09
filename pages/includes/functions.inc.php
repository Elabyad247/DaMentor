<?php

function emptyInputSignUp($username, $email, $upassword, $rupassword)
{
    $result = false;
    if (empty($username) || empty($email) || empty($upassword) || empty($rupassword)) {
        $result = true;
    }

    return $result;
}

function invalidUsername($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function notMatchedPassword($upassword, $rupassword)
{
    $result = false;
    if ($upassword !== $rupassword) {
        $result = true;
    }

    return $result;
}

function userExist($connection, $username, $issignform)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);

    if ($issignform === true) {
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
    } else {
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=stmtFailed");
            exit();
        }
    }


    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultStmt = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultStmt)) {
        return $row;
    } else {
        return false;
    }

    /** @noinspection PhpUnreachableStatementInspection */
    mysqli_stmt_close($stmt);

}

function createUser($connection, $username, $email, $firstname, $lastname, $upassword)
{
    $sql = "INSERT INTO users (username, email, firstname, lastname, upassword) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    $hashedPassword = password_hash($upassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $firstname, $lastname, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?state=userCreated");
    exit();
}

function emptyInputLogin($username, $upassword)
{
    $result = false;
    if (empty($username) || empty($upassword)) {
        $result = true;
    }

    return $result;
}

function loginUser($connection, $username, $upassword)
{
    $userExists = userExist($connection, $username, false);
    if ($userExists) {
        $hashedPassword = $userExists["upassword"];
        $checkpassword = password_verify($upassword, $hashedPassword);
        if ($checkpassword === true) {
            session_start();
            $_SESSION["userid"] = $userExists["userID"];
            $_SESSION["username"] = $userExists["username"];
            header("location: ../../index.php");
        } else {
            header("location: ../login.php?error=wrongPassword");
        }
    } else {
        header("location: ../login.php?error=wrongUsername");
    }
    exit();
}

function loginAdmin($connection, $adminname, $apassword)
{
    $userExists = userExist($connection, $adminname, false);
    if ($userExists) {
        $hashedPassword = $userExists["upassword"];
        $checkpassword = password_verify($apassword, $hashedPassword);
        $isadmin = $userExists["isadmin"];
        if ($checkpassword === true) {
            if ($isadmin == 1) {
                session_start();
                $_SESSION["adminid"] = $userExists["userID"];
                $_SESSION["adminname"] = $userExists["username"];
                $_SESSION["isadmin"] = $userExists["isadmin"];
                header("location: ../../admin/admindashboard.php");
            } else {
                header("location: ../../admin/?error=notAdmin");
            }
        } else {
            header("location: ../../admin/?error=wrongPassword");
        }
    } else {
        header("location: ../../admin/?error=wrongUsername");
    }
    exit();
}