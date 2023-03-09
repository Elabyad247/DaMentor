<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_stuff'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM useful_stuff where usefulID='$id[$i]'");
        }
    }
    header("location: useful.php");
}