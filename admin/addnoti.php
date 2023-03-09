<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Add Notification</div>
        <div class="block-content">
            <form class="block-form" method="post">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Notification:
                            <input type="text" name="notification" placeholder="Notification" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Notification Type:
                            <input type="text" name="notification_type" placeholder="Notification Type" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button name="save" type="submit" class="btn btn-info">Add</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['save'])) {
                $notification = $_POST['notification'];
                $notificationtype = $_POST['notification_type'];

                mysqli_query($GLOBALS["conn"],"insert into notifications (notification,notification_type) values('$notification','$notificationtype')")or die(mysqli_error($GLOBALS["conn"]));

            ?>
                <script>
                    window.location = "notifications.php";
                </script>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>