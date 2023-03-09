<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $notiid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Notification</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from notifications where notification_id = '$notiid'")or die(mysqli_error($GLOBALS['conn']));
            $row = mysqli_fetch_array($query);
            ?>

            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Notification:
                            <input type="text" name="notification" placeholder="Notification" value="<?php echo $row['notification']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Notification Date:
                            <input type="text" name="notification_date" placeholder="Notification Date" value="<?php echo $row['notification_date']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Notification Type:
                            <input type="text" name="notification_type" placeholder="Notification Type" value="<?php echo $row['notification_type']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button name="update" type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['update'])){
                $notification = $_POST['notification'];
                $notificationdate = $_POST['notification_date'];
                $notificationtype = $_POST['notification_type'];

                mysqli_query($GLOBALS['conn'],"update notifications set notification = '$notification' ,
																		notification_date = '$notificationdate',
																		notification_type = '$notificationtype'
																		where notification_id = '$notiid' ")or die(mysqli_error($GLOBALS['conn']));

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