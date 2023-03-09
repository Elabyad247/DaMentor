<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_level'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM levels where levelID='$id[$i]'");
        }
    }
    header("location: levels.php");
}