<?php

if (isset($_POST["adminsubmit"])) {
    $adminname = $_POST["adminname"];
    $apassword = $_POST["adminpass"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($adminname, $apassword) !== false) {
        header("location: ../../admin/?error=emptyInput");
        exit();
    }

    loginAdmin($GLOBALS["conn"], $adminname, $apassword);

} else {
    header("location: ../../admin/");
    exit();
}
