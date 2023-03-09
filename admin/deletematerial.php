<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_material'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM lectures_materials where materialID='$id[$i]'");
        }
    }
    header("location: materials.php");
}