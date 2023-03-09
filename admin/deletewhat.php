<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_what'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM whats where whatID='$id[$i]'");
        }
    }
    header("location: whats.php");
}