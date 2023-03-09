<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_subject'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM subjects where subID='$id[$i]'");
        }
    }
    header("location: subjects.php");
}