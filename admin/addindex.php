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
        <div class="block-header">Add Index</div>
        <div class="block-content">
            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Subject:
                            <input type="text" name="subject" placeholder="Index Subject" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Level:
                            <input type="text" name="level" placeholder="Index Level" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Lecture:
                            <input type="text" name="lecture" placeholder="Index Lecture" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Details:
                            <input type="text" name="details" placeholder="Index Details">
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
                $subject = $_POST['subject'];
                $level = $_POST['level'];
                $lecture = $_POST['lecture'];
                $details = $_POST['details'];

                mysqli_query($GLOBALS["conn"],"insert into index_list (subject,level,lecture,details) values('$subject','$level','$lecture','$details')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "index_list.php";
                </script>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>