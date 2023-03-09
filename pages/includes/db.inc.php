<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "damentor";

$GLOBALS["conn"] = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$GLOBALS["conn"]) {
    die("Connection failed: " . mysqli_connect_error());
}
$GLOBALS["counter"] = 0;
