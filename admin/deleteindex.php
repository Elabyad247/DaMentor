<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_index'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM index_list where id='$id[$i]'");
        }
    }
    header("location: index_list.php");
}