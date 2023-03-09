<?php
include('../pages/includes/db.inc.php');
if (isset($_POST['delete_noti'])){
    $id=$_POST['selector'];
    if ($id) {
        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
            $result = mysqli_query($GLOBALS["conn"],"DELETE FROM notifications where notification_id='$id[$i]'");
        }
    }
    header("location: notifications.php");
}