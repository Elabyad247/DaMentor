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
        <div class="block-header">Add What</div>
        <div class="block-content">
            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Type:
                            <input type="text" name="materialType" placeholder="What Type" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Title:
                            <input type="text" name="materialTitle" placeholder="What Title" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Notes:
                            <textarea name="materialNotes"></textarea>
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
                $materialtype = $_POST['materialType'];
                $materialtitle = $_POST['materialTitle'];
                $materialnotes = $_POST['materialNotes'];

                mysqli_query($GLOBALS["conn"],"insert into whats (whatType,whatTitle,notes) values('$materialtype','$materialtitle','$materialnotes')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "whats.php";
                </script>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>