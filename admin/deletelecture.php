<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_lecture'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM lectures where lectureID='$id[$i]'");
        }
    }
    header("location: lectures.php");
}